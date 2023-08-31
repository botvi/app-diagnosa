<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\gejala;
use App\Service\DataTableFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GejalaController extends Controller
{
    public function show()
    {
        return view("Page.Gejala.show");
    }
    public function show_data()
    {
        return DataTableFormat::Call()->query(function () {
            return gejala::query();
        })
            ->formatRecords(function ($result, $start) {
                return $result->map(function ($item, $index) use ($start) {
                    $item['no'] = $start + 1;
                    return $item;
                });
            })
            ->Short("id")
            ->get()
            ->json();
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'kode_gejala' => 'required|string|max:100',
                'nama_gejala' => 'required|string',
            ]);
            if ($validator->fails()) {
                $errorMessages = $validator->messages();
                $message = '';
                foreach ($errorMessages->all() as $msg) {
                    $message .= $msg . ',';
                }
                Alert::error('Validation Error', $message);
                return redirect()->back();
            }

            \DB::transaction(function () use ($request, $validator) {
              

                $gejalaData = $request->except(['kode_gejala', 'nama_gejala']);
                $gejalaData += $validator->validated();
                $gejala = gejala::create($gejalaData);
                if (!$gejala) {
                    Alert::error('Validation Error', 'gagal menyimpan data');
                    return redirect()->back();
                }
            });
            Alert::success('Success', 'Data berhasil disimpan');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Validation Error', 'fatal error!');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'kode_gejala' => 'required|string|max:100',
                'nama_gejala' => 'required|string',
            ]);
            if ($validator->fails()) {
                $errorMessages = $validator->messages();
                $message = '';
                foreach ($errorMessages->all() as $msg) {
                    $message .= $msg . ',';
                }
                Alert::error('Validation Error', $message);
                return redirect()->back();
            }

            // Cari operator berdasarkan operator_id
            $gejala = gejala::findOrFail($id);

            // Update data operator
            $gejala->update($request->only([
                'kode_gejala',
                'nama_gejala',
             
            ]));



            // Simpan perubahan pada user (akun)
            Alert::success('Success', 'Data berhasil diupdate');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Validation Error', 'fatal error!');
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        try {
            $op = gejala::find($id);
            $op->delete();
            Alert::success('Success', 'Data berhasil dihapus');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Validation Error', 'fatal error!');
            return redirect()->back();
        }
    }

    public function laporan()
    {
        $data["rep"] = gejala::all();
        return view("Page.Gejala.report", $data);
    }



}
