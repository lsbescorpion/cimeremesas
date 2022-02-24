@extends('layouts.app-dash')
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
    <div class="card-group">
    <div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
    <div class="d-flex no-block align-items-center">
    <div>
    <h3><i class="icon-bag"></i></h3>
    <p class="text-muted">CANTIDAD TOTAL DE DOCUMENTOS</p>
    </div>
    <div class="ml-auto">
    <h2 class="counter text-primary">23</h2>
    </div>
    </div>
    </div>
    <div class="col-12">
    <div class="progress">
    <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
    <div class="d-flex no-block align-items-center">
    <div>
    <h3><i class="icon-note "></i></h3>
    <p class="text-muted">
    <a href="">
    Total
    </a>
    </p>
    </div>
    <div class="ml-auto">
    <h2 class="counter text-cyan">169</h2>
    </div>
    </div>
    </div>
    <div class="col-12">
    <div class="progress">
    <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
    <div class="d-flex no-block align-items-center">
    <div>
    <h3><i class="icon-folder"></i></h3>
    <p class="text-muted"> Sin Verificar</p>
    </div>
    <div class="ml-auto">
    <h2 class="counter text-purple">157</h2>
    </div>
    </div>
    </div>
     <div class="col-12">
    <div class="progress">
    <div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
    <div class="d-flex no-block align-items-center">
    <div>
    <h3><i class="icon-check"></i></h3>
    <p class="text-muted">Verificados</p>
    </div>
    <div class="ml-auto">
    <h2 class="counter text-success">31</h2>
    </div>
    </div>
    </div>
     <div class="col-12">
    <div class="progress">
    <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <form method="POST" action="{{ route('imports.verify') }}" enctype="multipart/form-data"    >
        @csrf
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Prepara un documento .xls para subirlo
                        </h4>
                        <label for="input-file-now"></label>
                        <input type="file" id="input-file-now" name="excel_file" class="dropify" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <input type="submit" value="Enviar">
        </div>
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

    <script>
        $(document).ready(function() {
            // Basic
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
            })
        });
    </script>
@stop

