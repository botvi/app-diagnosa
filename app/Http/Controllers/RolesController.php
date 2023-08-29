<?php

namespace App\Http\Controllers;

use App\Models\penyakit;
use App\Models\gejala;
use App\Models\Aturan;
use App\Service\DataTableFormat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;


class RolesController extends Controller
{
    public function show()
    {
         $gejala = gejala::all();
         $penyakit = penyakit::all();

        return view('Page.Roles.show', compact('gejala','penyakit'));
    }

    public function show_data()
    {

        return DataTableFormat::Call()->query(function () {
            return Aturan::query();
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
         {
            $validator = Validator::make($request->all(), [
                'kode_penyakit' => 'required|string|max:100',
                'kode_gejala' => 'required|string',
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
              

                $rolesData = $request->except([ 'kode_penyakit', 'kode_gejala','created_at','updated_at']);
                $rolesData += $validator->validated();
                $roles = Aturan::create($rolesData);
                if (!$roles) {
                    Alert::error('Validation Error', 'gagal menyimpan data');
                    return redirect()->back();
                }
            });
            Alert::success('Success', 'Data berhasil disimpan');
            return redirect()->back();
        } 
    }

    public function update(Request $request, $id)
    {
        try {
            $hafalan = Aturan::find($id);
            $data = [
                'kode_penyakit' => $request->kode_penyakit,
                'kode_gejala' => $request->kode_gejala,
               
            ];
            $hafalan->update($data);
            Alert::success('Success', 'Data berhasil diedit');
            return redirect("/roles");
        } catch (\Exception $e) {
            Alert::error($e->getMessage());
            return redirect()->back();
        }
    }
    
    public function destroy($id)
    {
        try {
            $op = Aturan::find($id);
            $op->delete();
            Alert::success('Success', 'Data berhasil dihapus');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Validation Error', 'fatal error!');
            return redirect()->back();
        }
    }
}
