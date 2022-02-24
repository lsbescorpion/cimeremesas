@extends('layouts.app-dash')
@section('css')
<link  href="{{asset('newstyle/node_modules/dropzone-master/dist/dropzone.css')}}" rel="stylesheet">
@stop
@section('title', 'ITAC Mensajeria')
@section('page-title', 'ITAC Mensajeria')
@section('breadcrumb')
    <ol class="breadcrumb">
        {{--<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>--}}
        {{--<li class="breadcrumb-item active">Starter Page</li>--}}
    </ol>

@stop
@section('content')
    <!-- ============================================================== -->
    <!-- Info box -->
    <!-- ============================================================== -->
    {{--<div class="card-group">--}}
        {{--<div class="card">--}}
            {{--<div class="card-body">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-12">--}}
                        {{--<div class="d-flex no-block align-items-center">--}}
                            {{--<div>--}}
                                {{--<h3><i class="icon-bag"></i></h3>--}}
                                {{--<p class="text-muted">CANTIDAD TOTAL DE DOCUMENTOS</p>--}}
                            {{--</div>--}}
                            {{--<div class="ml-auto">--}}
                                {{--<h2 class="counter text-primary">23</h2>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-12">--}}
                        {{--<div class="progress">--}}
                            {{--<div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- Column -->--}}
        {{--<!-- Column -->--}}
        {{--<div class="card">--}}
            {{--<div class="card-body">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-12">--}}
                        {{--<div class="d-flex no-block align-items-center">--}}
                            {{--<div>--}}
                                {{--<h3><i class="icon-basket "></i></h3>--}}
                                {{--<p class="text-muted">--}}
                                    {{--<a href="">--}}
                                        {{--STOCK DE DOCUMENTOS EN CERO--}}
                                    {{--</a>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                            {{--<div class="ml-auto">--}}
                                {{--<h2 class="counter text-cyan">169</h2>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-12">--}}
                        {{--<div class="progress">--}}
                            {{--<div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- Column -->--}}
        {{--<!-- Column -->--}}
        {{--<div class="card">--}}
            {{--<div class="card-body">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-12">--}}
                        {{--<div class="d-flex no-block align-items-center">--}}
                            {{--<div>--}}
                                {{--<h3><i class="icon-basket-loaded"></i></h3>--}}
                                {{--<p class="text-muted"> DOCUMENTOS FIRMADOS  EN TOTAL</p>--}}
                            {{--</div>--}}
                            {{--<div class="ml-auto">--}}
                                {{--<h2 class="counter text-purple">157</h2>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{-- <div class="col-12">--}}
                        {{--<div class="progress">--}}
                            {{--<div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>--}}
                        {{--</div>--}}
                    {{--</div> --}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- Column -->--}}
        {{--<!-- Column -->--}}
        {{--<div class="card">--}}
            {{--<div class="card-body">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-12">--}}
                        {{--<div class="d-flex no-block align-items-center">--}}
                            {{--<div>--}}
                                {{--<h3><i class="icon-note"></i></h3>--}}
                                {{--<p class="text-muted">DOCUMENTOS  SOLICTUD DE FIRMA</p>--}}
                            {{--</div>--}}
                            {{--<div class="ml-auto">--}}
                                {{--<h2 class="counter text-success">31</h2>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{-- <div class="col-12">--}}
                        {{--<div class="progress">--}}
                            {{--<div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>--}}
                        {{--</div>--}}
                    {{--</div> --}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <form method="POST" action="{{ route('imports.store') }}" enctype="multipart/form-data"    >
        @csrf
        <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Prepara un documento  para subirlo
                    </h4>
                    <div class="dropzone dropzone-default dropzone-success dz-clickable mb-5" id="kt_dropzone_3">
                        <div class="dropzone-msg dz-message needsclick">
                            <h3 class="dropzone-msg-title">Drop Photos or Videos.</h3>
                            <span class="dropzone-msg-desc">Upload up to 10 files 100MB each maximum</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <input type="submit" value="Enviar">
        </div>
        <input type="hidden" name="folder" id="folder">
    </form>

    <!-- ============================================================== -->
    <!-- End Info box -->
    <!-- ============================================================== -->
@stop
@section('js')

    <!-- ============================================================== -->
    <!-- Plugins for this page -->
    <!-- ============================================================== -->
    <!-- jQuery file upload -->
    <script src="{{asset('newstyle/node_modules/dropify/dist/js/dropify.min.js')}}"></script>
    <script src="{{asset('newstyle/node_modules/dropzone-master/dist/dropzone.js')}}"></script>

    <script>
Dropzone.autoDiscover = false;
$('#kt_dropzone_3').dropzone({
    url: "{{route('uploadFiles')}}", // Set the url for your upload script location
    paramName: "file", // The name that will be used to transfer the file
    maxFiles: 1,
    maxFilesize: 100, // MB
    addRemoveLinks: true,
    acceptedFiles: "text/csv,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
    timeout: 300000,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    init: function() {  
        this.on('addedfile', function(file) {
            if (this.files.length > 1) {
                this.removeFile(file);
            }
        });
        this.on("success", function(file, response) {
            $('#folder').val(response);
        })
    },
    removedfile: function(file) {
        if(!file.hasOwnProperty("isMock")) {
            $.ajax({
                type:'post',
                url: "{{route('removeFiles')}}",
                data:{dir: $('#folder').val()},
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                },
                error:function(data){
                }
            });
        }
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    }
});
        $(document).ready(function() {
            /*// Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })*/
        });
    </script>
@stop

