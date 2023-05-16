@extends('layouts.argon.app')

@section('title')
    {{ 'Pedidos' }}
@endsection

@section('breadcrumb')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Paginas</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Usuarios</li>
    </ol>
    <h6 class="font-weight-bolder text-white mb-0">Usuarios</h6>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 ps-3 pe-3 pt-2">
                    <div class="card-header pb-0">
                        <h6>Tabla de Pedidos</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="users-table" class="table display table-stripped align-items-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">Código</th>
                                        <th class="text-center">Fecha Pedido</th>
                                        <th class="text-center">Estado Entregado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td class="text-center">{{ $order->codigo }}</td>
                                            <td class="text-center">{{ $order->created_at }}</td>
                                            <td class="text-center">
                                                @if ($order->estado==0)
                                                    No entregado
                                                @else
                                                    Entregado
                                                @endif
                                            </td>
                                            <td class="text-center pt-3">
                                                <a href="{{ route('orders-store', $order->id) }}" class="btn btn-sm btn-outline-primary"><i
                                                        class="fa fa-edit"></i> Ver Pedido</a>
                                                @if(!$order->estado)
                                                <a href="{{ route('orders-edit', $order->id) }}" class="btn btn-sm btn-outline-primary"><i
                                                        class="fa fa-edit"></i> Entregar</a>
                                                @endif

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


    </div>
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                dom: 'lfrtip',

                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                },


            });
        });
    </script>
@endsection
