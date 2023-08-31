@extends('template.layout')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="flex justify-between">
                        <h1 class="text-white text-bold" style="font-size: 1.5em">DATA DIAGNOSA</h1>
                        <button class="btn btn-outline-light" data-target=".modal-form" data-toggle="modal" type="button">
                            <i class="fa fa-save"></i> Mulai Diagnosa</button>
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
                    <div class="w-full pb-10 pt-2">
                        <table class="display responsive nowrap" id="tables" style="width:100%">
                            <thead class="bg-gray-100 text-gray-500 shadow-md">
                                <tr>
                                    <th class="w-[25px]">No</th>
                                    <th>Kode Diagnosa</th>
                                    <th>Nama Pasien</th>
                                    <th>Kode Penyakit</th>
                                    <th>Nama Penykit</th>
                                    <th>Number Poin</th>
                                    <th>Persentase</th>
                                    <th>Status</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($diagnosa as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->kode_diagnosa }}</td>
                                        <td>{{ $item->pasien->nama_pasien }}</td>
                                        <td>{{ $item->kode_penyakit }}</td>
                                        <td>{{ \App\Models\penyakit::where('kode_penyakit', $item->kode_penyakit)->first()->nama_penyakit }}
                                        </td>
                                        <td>{{ $item->number_poin }}</td>
                                        <td>{{ $item->persentase }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>

                                            <a class="btn btn-outline-primary p-2"
                                                href="{{ url('/diagnosa/prediksi/' . $item->kode_diagnosa) }}"
                                                type="button">
                                                <i class="fa fa-eye"></i> DETAIL</a>

                                        </td>
                                @endforeach
                            <tfoot class="bg-gray-100 text-gray-500 shadow-md">
                                <tr>
                                    <th class="w-[25px]">No</th>
                                    <th>Kode Diagnosa</th>
                                    <th>Nama Pasien</th>
                                    <th>Kode Penyakit</th>
                                    <th>Kode Gejala</th>
                                    <th>Number Poin</th>
                                    <th>Persentase</th>
                                    <th>Status</th>
                                    <th>#</th>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div aria-hidden="true" aria-labelledby="myLargeModalLabel" class="modal fade modal-form" role="dialog"
        style="display: none;" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="myLargeModalLabel">FORMULIR DIAGNOSA</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/diagnosa" id="form-entry" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 mb-2">
                                <div class="form-grop">
                                    <label for="">Nama Pasien</label>
                                    <select class="form-control" name="">
                                        <option value="">A</option>
                                        <option value="">B</option>
                                        <option value="">C</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <hr>
                                <h5><strong>Gejala Yang Dialamai</strong></h5>
                            </div>

                            @foreach ($use_gejala as $item)
                                <div class="col-sm-6 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" id="{{ $item->kode_gejala }}" name="gejala[]"
                                            type="checkbox" value="{{ $item->kode_gejala }}">
                                        <label class="form-check-label"
                                            for="{{ $item->kode_gejala }}">{{ $item->nama_gejala }}</label>
                                    </div>
                                </div>
                            @endforeach


                        </div>



                        <div class="flex justify-end" style="width: 100%">
                            <button class="btn btn-primary bg-green-500 w-[200px]" type="submit">Diagnosa</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        new DataTable('#tables');
    </script>
@endsection
