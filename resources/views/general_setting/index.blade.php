@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('newstyle/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('newstyle/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')  }}">
@stop

@extends('layouts.app-dash')
@section('title', 'General Setting')
@section('page-title', 'General Setting')
@section('breadcrumb')
    {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Usuarios</li>
    </ol> --}}
    <a type="button" href="{{ route('setting.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>
        Agregar</a>
@stop
@section('content')
    <div class="card">
        <div class="card-body">


            <div class="table-responsive">
                <table id="tbProduct" class="table table-sm  table-hover table-striped table-bordered">
                    <thead class="thead">
                    <tr>
                        <th>Map-key</th>
                        <th>Url</th>
                        <th>Acciones</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($settings as $setting)
                        <tr>
                            <td class="align-middle"> {{ $setting->map_key }} </td>
                            <td class="align-middle"> {{ $setting->url }} </td>


                            <td class="align-middle" style="width: 25%">
                                <form action="{{ route('setting.destroy',  $setting->id) }}" method="post">
                                    <a href="{{ route('setting.show', $setting->id) }}" class="btn waves-effect waves-light btn-info btn-sm"
                                       title="Ver">
                                        <i class="fas fa-eye"></i> </a>
                                    <a href="{{ route('setting.edit', $setting->id) }}" class="btn waves-effect waves-light btn-primary btn-sm"
                                       title="Editar">
                                        <i class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button user="submit" class="btn waves-effect waves-light btn-danger btn-sm"> <i class="fa fa-trash-alt"
                                                                                                                     title="Eliminar" aria-hidden="true"></i> Eliminar</button>
                                </form>
                            </td>


                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@stop
@section('js')
    <!-- This is data table -->
    <script src="{{ asset('newstyle/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src=" {{ asset('newstyle/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('#tbProduct').DataTable( {
                language: {
                    url: '{{ asset('newstyle/node_modules/datatables.net/es_es.json') }}'
                },
                pageLength : 5,
                lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
                stateSave: true,
            } );
        } );
    </script>
@stop
