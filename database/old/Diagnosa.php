<?php

namespace Database\Seeders;

use App\Models\Aturan;
use App\Models\Diagnosa as ModelsDiagnosa;
use App\Models\penyakit;
use App\Models\ProbabilitasGejalaPenyakit;
use App\Models\ProbabilitasPenyakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Diagnosa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->logic();
    }
    public function logic()
    {
        $kode_diagnosa = \Str::random(5);
        $gejala = ["G004", "G006", "G008", "G020", "G021"];
        $penyakit = penyakit::all();
        $aturan = Aturan::whereIn("kode_gejala", $gejala)->get()->groupBy("kode_penyakit");
        $P_probabiliy = [];
        ProbabilitasPenyakit::truncate();
        foreach ($aturan as $ky => $val) {
            $P_probabiliy[] = [
                "kode_penyakit" => $ky,
                "probability" => number_format((1 / (count($penyakit))), 2, '.', ''),
                "jumlah_penyakit" => $penyakit
            ];
            $gejal = [];
            foreach ($val as $gej) {
                $gejal[] = $gej['kode_gejala'];
            }
            ProbabilitasPenyakit::create(
                [
                    "kode_penyakit" =>  $ky,
                    "kode_gejala" => implode(",", $gejal),
                    "jumlah_seluruh_penyakit" => count($penyakit),
                    "jumlah_kemunculan" =>  1,
                    "probability" => number_format((1 / (count($penyakit))), 2, '.', ''),
                    "keterangan" => "1/" . count($penyakit)
                ]
            );
        }
        $predic = ProbabilitasPenyakit::all();
        $total_probabilitas = count($predic);
        ProbabilitasGejalaPenyakit::truncate();
        foreach ($predic as $prediksi) {

            foreach ($gejala as $gej) {
                $gejInProbability = $prediksi->kode_gejala;
                $ex = explode(",", $gejInProbability);
                $eex = false;
                foreach ($ex as $gejInPorbEx) {
                    if ($gejInPorbEx == $gej) {
                        $eex = true;
                        ProbabilitasGejalaPenyakit::create(
                            [
                                "kode_Penyakit" => $prediksi->kode_penyakit,
                                "kode_gejala" => $gej,
                                "kemunculan" => $total_probabilitas,
                                "jumlah_gangguan" => 1,
                                "probability" => number_format((1 / ($total_probabilitas)), 2, '.', ''),
                                "keterangan" => "1/" . $total_probabilitas
                            ]
                        );
                    }
                }
                if (!$eex) {
                    ProbabilitasGejalaPenyakit::create(
                        [
                            "kode_Penyakit" => $prediksi->kode_penyakit,
                            "kode_gejala" => $gej,
                            "kemunculan" => $total_probabilitas,
                            "jumlah_gangguan" => 0,
                            "probability" => number_format((0 / ($total_probabilitas)), 2, '.', ''),
                            "keterangan" => "0/" . $total_probabilitas
                        ]
                    );
                }
            }
        }

        $useProbabilitasGejalaPenyakit = ProbabilitasGejalaPenyakit::get()->groupBy("kode_penyakit");
        $result = [];
        foreach ($useProbabilitasGejalaPenyakit as $kpg => $pg) {

            $hasil_indexP = [];
            foreach ($pg as $lpg) {
                $getP = ProbabilitasPenyakit::where("kode_penyakit", $kpg)->first();

                $g = $lpg->probability;
                $p = $getP->probability;
                $G004_P001 = $g * $p;
                $us = [];
                foreach ($predic as $pppg) {
                    $getProbabilitasGejalaPenyakit =  ProbabilitasGejalaPenyakit::where("kode_penyakit", $pppg->kode_penyakit)->where("kode_gejala", $lpg->kode_gejala)->first();
                    $g =  $getProbabilitasGejalaPenyakit->probability;
                    $pi = $pppg->probability;
                    $gxp1 =  ($g * $pi);
                    $us[] = [
                        "penyakit" => $pppg->kode_penyakit,
                        "probability_penyakit" => $pppg->probability,
                        "gejala" => $getProbabilitasGejalaPenyakit->kode_gejala,
                        "probabilitas_gejala" => $getProbabilitasGejalaPenyakit->probability,
                        "perkalian" => $getProbabilitasGejalaPenyakit->probability * $pppg->probability
                    ];
                }
                $gpI = collect($us)->sum("perkalian");
                $pembagian = 0;
                if ($gpI != 0)
                    $pembagian = $G004_P001 / $gpI;
                array_push($hasil_indexP, [
                    "penyakit" => $kpg,
                    "gejala" => $lpg->kode_gejala,
                    "hitung_probalitas_awal" => [
                        "probabilitas_penyakit" => $getP->probability,
                        "probabilitas_gejala" => $lpg->probability
                    ],
                    "G004_P001" => $G004_P001,
                    "P&G" => $us,
                    "hasil_P&G" => $gpI,
                    "hasil_pebagian" =>  $pembagian
                ]);
            }

            $hPI = collect($hasil_indexP)->sum("hasil_pebagian");
            $result[] = [
                "kode_penyakit" => $kpg,
                "hasil" => (float) number_format($hPI, 2)
            ];
        }
        $result_sum = (float) number_format(round((float)collect($result)->sum("hasil"), 2), 2);
        $res = collect($result)->map(function ($items) use ($result_sum, $gejala, $kode_diagnosa) {
            $presentase = ($items["hasil"] / $result_sum) * 100;
            ModelsDiagnosa::create([
                "pasien_id" => 1,
                "kode_diagnosa" => $kode_diagnosa,
                "kode_penyakit" => $items["kode_penyakit"],
                "kode_gejala" => implode(",", $gejala),
                "number_poin" => $items["hasil"],
                "persentase" => $presentase,
            ]);
            $items["hasil_kalkulasi"] = $presentase;
            return $items;
        });
        $getDiagnosa = ModelsDiagnosa::where("kode_diagnosa", $kode_diagnosa)->get();
        $Collect = collect($getDiagnosa)->max();
        $upM = ModelsDiagnosa::find($Collect->id);
        $upM->status = "predik";
        $upM->save();
        return [
            "data" => $res,
            "hasil" => $res->max(),
            "sum" => $result_sum
        ];
    }
}
