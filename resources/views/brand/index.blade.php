@extends('layouts.argon.app')

@section('title')
    {{ 'Marcas' }}
@endsection

@section('breadcrumb')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Marcas</li>
    </ol>
    <h6 class="font-weight-bolder text-white mb-0">Marcas</h6>
@endsection

@section('css')
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Tabla de Marcas</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <a href="{{ route('marcas-create') }}" class="btn btn-sm btn-outline-success mb-2"><i
                                class="fa fa-plus"> Agregar marca</i></a>
                        <div class="table-responsive p-0">
                            <table id='tabla' class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nombre</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Logo</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                @if (isset($empty))
                                @else
                                    <tbody>
                                        @foreach ($marcas as $marca)
                                            <tr>
                                                <td>{{ $marca->id }}</td>
                                                <td>{{ $marca->nombre }}</td>
                                                <td>
                                                    <div class="container d-flex justify-content-center">
                                                        <img src="/imagen/{{ $marca->logo }}" width="10%">
                                                    </div>
                                                </td>
                                                <td>
                                                    <a class="btn btn-info"
                                                        href="{{ route('marcas-edit', ['id' => $marca->id]) }}">Editar
                                                        marca</a>
                                                    <form action="{{ route('marcas-destroy', ['id' => $marca->id]) }}"
                                                        class="formulario-eliminar" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        @if (empty($marca->products[0]))
                                                            <button class="btn btn-danger btn-sm">Eliminar marca</button>
                                                        @else
                                                        @endif

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    </div>
@endsection

@section('js')
    <script src='https://code.jquery.com/jquery-3.5.1.js'></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>




    <script>
        $(document).ready(function() {
            $('#tabla').DataTable({
                dom: 'lfrtip',
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                },
            });
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.delete-marca', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            console.log(' kdñsñskd');
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, bórralo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/marcas' + id,
                        data: {
                            id: id,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Exito',
                                text: '¡Usuario eliminado correctamente!',
                                timer: 1000
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 1000); // delay for half a second
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endsection
