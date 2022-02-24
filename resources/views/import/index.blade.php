@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('newstyle/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('newstyle/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')  }}">
@stop

@extends('layouts.app-dash')
@section('title', 'Documentos Importados')
@section('page-title', 'Documentos Importados')
@section('breadcrumb')
    {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Usuarios</li>
    </ol> --}}
    <a type="button" href="{{ route('imports.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="icon-action-redo"></i>
        Importar</a>
    <a type="button" href="{{ url('/checks') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="icon-check"></i>
        Verificar</a>
@stop
@section('content')
    <div class="card">
        <div class="card-body">


            <div class="table-responsive">
                <table id="tbProduct" class="table table-sm  table-hover table-striped table-bordered">
                    <thead class="thead">
                    <tr>
                        {{-- <th>Identificación</th> --}}
                        <th>Consecutivo</th>
                        <th>Codigo de Barras</th>
                        <th>Dirección</th>
                        <th>Colonia</th>
                        <th>Código Postal</th>
                        <th>Entidad Federativa</th>
                        <th>Fecha de Emisión</th>
                        <th>Tipo de Carta</th>
                        <th>Evento</th>
                        <th>NSS</th>
                        <th>Orden de Producción</th>
                        <th>Status</th>


                        <th>Acciones</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($documents as $document)
                        <tr>
                            <td class="align-middle"> {{ $document->consecutive }} </td>
                            <td class="align-middle"> {{ $document->bar_code }} </td>
                            <td class="align-middle"> {{ $document->address }} </td>
                            <td class="align-middle"> {{ $document->colony }} </td>
                            <td class="align-middle"> {{ $document->postal_code }} </td>
                            <td class="align-middle"> {{ $document->federal_entity}} </td>
                            <td class="align-middle"> {{ $document->date_issue}} </td>
                            <td class="align-middle"> {{ $document->letter_type}}
                            <td class="align-middle"> {{ $document->event}} </td>
                            <td class="align-middle"> {{ $document->nss}} </td>
                            <td class="align-middle"> {{ $document->production_order}} </td>
                            <td class="align-middle"> {{ $document->name?:'Sin Verificar'}} </td>








                            <td class="align-middle" style="width: 25%">
                                <form action="{{ route('imports.destroy',  $document->id) }}" method="post">
                                    <a href="{{ route('imports.show', $document->id) }}" class="btn waves-effect waves-light btn-info btn-sm"
                                       title="Ver">
                                        <i class="fas fa-eye"></i>Ver </a>
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
