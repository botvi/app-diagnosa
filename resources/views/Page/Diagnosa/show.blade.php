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
                    <h1>konten</h1>
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
