<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\penyakit;
use App\Service\DataTableFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenyakitController extends Controller
{
    public function show()
    {
        return view("Page.Penyakit.show");
    }
    public function show_data()
    {
        return DataTableFormat::Call()->query(function () {
            return penyakit::query();
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
                'kode_penyakit' => 'required|string|max:100',
                'nama_penyakit' => 'required|string',
                'deskripsi' => 'required|string',
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
              

                $penyakitData = $request->except(['kode_penyakit', 'nama_penyakit', 'deskripsi']);
                $penyakitData += $validator->validated();
                $penyakit = penyakit::create($penyakitData);
                if (!$penyakit) {
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
                'kode_penyakit' => 'required|string|max:100',
                'nama_penyakit' => 'required|string',
                'deskripsi' => 'required|string',
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
            $penyakit = penyakit::findOrFail($id);

            // Update data operator
            $penyakit->update($request->only([
                'kode_penyakit',
                'nama_penyakit',
                'deskripsi',
             
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
            $op = penyakit::find($id);
            $op->delete();
            Alert::success('Success', 'Data berhasil dihapus');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Validation Error', 'fatal error!');
            return redirect()->back();
        }
    }



}
