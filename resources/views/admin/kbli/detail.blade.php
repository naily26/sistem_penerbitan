@extends('layouts.admin.master')

@section('content')
<!-- start: PAGE -->
<div class="main-content">

    <div class="container">
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12">

                <!-- start: PAGE TITLE & BREADCRUMB -->
                <ol class="breadcrumb">
                    <li>
                        <i class="clip-pencil"></i>
                        <a href="{{ route('kbli.index')}}">
                            Data KBLI
                        </a>
                    </li>
                    <li class="active">
                        edit data
                    </li>
                </ol>
                <div class="page-header">
                    <h1>Detail Data Kode KBLI </h1>
                </div>

                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <!-- end: PAGE HEADER -->
        <!-- start: PAGE CONTENT -->
        <div class="row">
            <div class="col-sm-12">
                <!-- start: TEXT FIELDS PANEL -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form  class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="kode">
                                    Kode:
                                </label>
                                <div class="col-sm-9">
                                    <p class="form-control-static display-value" data-display="{{ $kbli->kode}}">{{ $kbli->kode}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="keterangan">
                                    Keterangan:
                                </label>
                                <div class="col-sm-9">
                                    <p class="form-control-static display-value" data-display="{{ $kbli->keterangan}}">{{ $kbli->keterangan}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="uraian">
                                    Uraian:
                                </label>
                                <div class="col-sm-9">
                                    <p class="form-control-static display-value" data-display="{{ $kbli->uraian}}">{{ $kbli->uraian}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-9">
                                    <a href="{{ route('kbli.index')}}" class="btn btn-blue next-step btn-block">
                                        Kembali <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end: TEXT FIELDS PANEL -->
            </div>
        </div>
        <!-- end: PAGE CONTENT-->
    </div>
</div>
<!-- end: PAGE -->
@endsection

@push('script')
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="assets/admin/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="assets/admin/plugins/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<script src="assets/admin/js/form-wizard.js"></script>

<script src="assets/admin/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="assets/admin/plugins/autosize/jquery.autosize.min.js"></script>
<script src="assets/admin/plugins/select2/select2.min.js"></script>
<script src="assets/admin/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
<script src="assets/admin/plugins/jquery-maskmoney/jquery.maskMoney.js"></script>
<script src="assets/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/admin/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="assets/admin/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script src="assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="assets/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="assets/admin/plugins/bootstrap-colorpicker/js/commits.js"></script>
<script src="assets/admin/plugins/jQuery-Tags-Input/jquery.tagsinput.js"></script>
<script src="assets/admin/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
<script src="assets/admin/plugins/summernote/build/summernote.min.js"></script>
<script src="assets/admin/plugins/ckeditor/ckeditor.js"></script>
<script src="assets/admin/plugins/ckeditor/adapters/jquery.js"></script>
<script src="assets/admin/js/form-elements.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script>
    jQuery(document).ready(function () {
        Main.init();
        FormWizard.init();
    });

</script>
<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    }

</script>
@endpush

@push('style')
<link rel="stylesheet" href="assets/admin/plugins/select2/select2.css">
<link rel="stylesheet" href="assets/admin/plugins/datepicker/css/datepicker.css">
<link rel="stylesheet" href="assets/admin/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="assets/admin/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css">
<link rel="stylesheet" href="assets/admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css">
<link rel="stylesheet" href="assets/admin/plugins/jQuery-Tags-Input/jquery.tagsinput.css">
<link rel="stylesheet" href="assets/admin/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
<link rel="stylesheet" href="assets/admin/plugins/summernote/build/summernote.css">
@endpush
