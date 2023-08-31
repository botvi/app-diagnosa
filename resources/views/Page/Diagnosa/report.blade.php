<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
    <style>
        @media print {

            /* CSS untuk mengatur tampilan saat dicetak */
            body {
                padding: 20px;
                font-family: Arial, sans-serif;
            }

            #table {
                border-collapse: collapse;
                width: 100%;
                margin-bottom: 20px;
            }

            #table th,
            #table td {
                border: 1px solid #000;
                padding: 8px;
                text-align: left;
            }

            #table th {
                background-color: #f2f2f2;
            }
        }

        /* CSS tambahan untuk desain tabel */
        #table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0 auto;
            width: 100%;
        }

        #table th,
        #table td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        #table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        #table td {
            text-align: left;
        }

        .bg-orange-200 {
            background-color: #ffd7a3;
        }
    </style>
</head>

<body>
    <table class="table table-borderless text-center"
        style="border-width:0px!important; border:none; text-align:center; width:100%">
        <tbody>
            <tr>
                <td>
                    <h4>...<br />
                        KECAMATAN ..<br />
                        ...</h4>

                    <p style="margin-left:0px; margin-right:0px">Alamat : Taluk Kuantan, Kode Pos : 29295, No. Telp :
                        628765355353</p>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table table-borderless text-center"
        style="border-width:0px!important; border:none; text-align:center; width:100%">
        <tbody>
            <tr>
                <td>
                    <h3>HASIL DIAGNOSA</h3>
                </td>
            </tr>
        </tbody>
    </table>
    <div
        style="background:#000000; cursor:text; height:4px; margin-bottom:0px; margin-left:0px; margin-right:0px; margin-top:0px; width:100%">
        &nbsp;</div>

    <div style="background:#000000; cursor:text; height:2px; margin-top:2px; width:100%">&nbsp;</div>

    <table id="table">
        <thead>
            <tr>
                <th>Nama Pasien : nama_pasien</th>
            </tr>
        </thead>
    </table>

    <div
        style="background:#000000; cursor:text; height:4px; margin-bottom:0px; margin-left:0px; margin-right:0px; margin-top:0px; width:100%">
        &nbsp;</div>

    <div style="background:#000000; cursor:text; height:2px; margin-top:2px; width:100%">&nbsp;</div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card mt-2" style="border-top: 3px solid green">
                <div class="card-body">
                    <table>
                        <tr>
                            <td class="p-3" style="width: 150px">Nama Pasien</td>
                            <td class="w-1">:</td>
                            <td>
                                <?= $diagnosa[0]->pasien->nama_pasien ?? '' ?>
                            </td>

                        </tr>

                        <tr>
                            <td class="p-3" style="width: 150px">Jenis Kelamin</td>
                            <td class="w-1">:</td>
                            <td>
                                <?= $diagnosa[0]->pasien->jenis_kelamin ?? '' ?>
                            </td>

                        </tr>

                        <tr>
                            <td class="p-3" style="width: 150px">Alamat</td>
                            <td class="w-1">:</td>
                            <td>
                                <?= $diagnosa[0]->pasien->alamat ?? '' ?>
                            </td>

                        </tr>

                    </table>
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

                                <p>Dari hasil prediksi algoritma native bayes pada gejala diatas penyakit yang
                                    diprediksi
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
    <script>
        window.print();
    </script>
</body>

</html>
