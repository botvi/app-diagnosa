@extends('template.layout')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="d-flex">
                        <h1 class="text-white text-bold mr-auto p-2" style="font-size: 1.5em">HASIL DIAGNOSA</h1>
                        @foreach ($diagnosa as $item)
                            @php
                                $baseURL = '/diagnosa/laporan';
                                $id = $item->kode_diagnosa;
                            @endphp
                        @endforeach


                        <a class="btn btn-outline-light p-2" href="{{ $baseURL }}/{{ $id }}" type="button">
                            <i class="fa fa-print"></i> LAPORAN</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <table>
                            <tr>
                                <td class="w-20 p-3">Nama</td>
                                <td class="w-1">:</td>
                                <td>nama asal</td>

                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card mt-2" style="border-top: 3px solid green">

                <div class="card-body">
                    <div class="card-header">
                        <h1 class="text-dark text-bold" style="font-size: 1.5em">Gejala</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mt-2">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Kode Gejala</th>
                                            <th>Nama Gejala</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gejala as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->kode_gejala }}
                                                </td>
                                                <td>
                                                    {{ $item->nama_gejala }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-2" style="border-top: 3px solid green">

                <div class="card-body">
                    <div class="card-header">
                        <h1 class="text-dark text-bold" style="font-size: 1.5em">Penyakit Terdeteksi</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mt-2">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Kode Penyakit</th>
                                            <th>Nama Penyakit</th>
                                            <th>Probabilitas Total</th>
                                            <th>Presentase Prediksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $res = [];
                                        @endphp
                                        @foreach ($diagnosa as $item)
                                            @php
                                                if ($item->status == 'predik') {
                                                    $res = $item;
                                                }
                                            @endphp
                                            <tr class="{{ $item->status == 'predik' ? 'bg-orange-200' : '' }}">
                                                <td>{{ $item->kode_penyakit }}</td>
                                                <td>{{ \App\Models\penyakit::where('kode_penyakit', $item->kode_penyakit)->first()->nama_penyakit }}
                                                </td>
                                                <td>{{ $item->number_poin }}</td>
                                                <td>{{ number_format($item->persentase, 2, '.', '') }} %</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-2" style="border-top: 3px solid green">

                <div class="card-body">
                    <div class="card-header">
                        <h1 class="text-dark text-bold" style="font-size: 1.5em">HASIL</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mt-2">

                                <p>Dari hasil prediksi algoritma native bayes pada gejala diatas penyakit yang diprediksi
                                    adalah
                                    <strong>
                                        {{ \App\Models\penyakit::where('kode_penyakit', $res->kode_penyakit)->first()->nama_penyakit }}</strong>
                                    dengan presentase prediksi {{ number_format($res->persentase, 2, '.', '') }} %
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
