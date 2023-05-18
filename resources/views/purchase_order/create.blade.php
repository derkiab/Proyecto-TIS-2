@extends('layouts.argon.app')

@section('title')
    {{ 'Orden' }}
@endsection

@section('breadcrumb')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Agregar Orden</li>
    </ol>
    <h6 class="font-weight-bolder text-white mb-0">Agregar Orden</h6>
@endsection

@section('css')
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 ps-3 pe-3 pt-2">
                    <div class="card-header pb-0">
                        <h6>Nueva orden de compra</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <button class="btn btn-sm btn-outline-success ms-4" data-bs-toggle="modal"
                            data-bs-target="#addModal">
                            Agregar nuevo producto
                        </button>
                        <div class="table-responsive p-0">
                            <table id="table" class="table display table-stripped align-items-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Marca</th>
                                        <th class="text-center">Color</th>
                                        <th class="text-center">Talla</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-center">Valor</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                @if (isset($empty))
                                @else
                                    <tbody>
                                        @foreach ($productos as $prod)
                                            <tr>
                                                <td class="text-center">{{ $prod->nombre }}</td>
                                                <td class="text-center pt-3">{{ $prod->marca->nombre }}
                                                </td>
                                                <td class="text-center pt-3">{{ $prod->color }}
                                                </td>
                                                <td class="text-center pt-3">{{ $prod->talla }}
                                                </td>
                                                <td class="text-center pt-3">
                                                    input
                                                </td>
                                                <td class="text-center pt-3">
                                                    input
                                                </td>
                                                <td class="text-center pt-3">
                                                    acciones
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

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Nuevo producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('productos-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-control-label" for="nombre">Nombre</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                                name="nombre" value="{{ old('nombre') }}" required autocomplete='nombre' autofocus>
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="marca">Marca</label>
                            <select class="form-control @error('marca') is-invalid @enderror" id="marca_id"
                                name="marca_id">
                                @foreach ($marcas as $marca)
                                    <option value='{{ $marca->id }}'>{{ $marca->nombre }}</option>
                                @endforeach
                            </select>
                            @error('marca')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="categoria">Categoria</label>
                            <select class="form-control @error('categoria') is-invalid @enderror" id="categoria_id"
                                name="categoria_id">
                                @foreach ($categorias as $categoria)
                                    <option value='{{ $categoria->id }}'>{{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categoria')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="color">Color</label>
                            <input type="text" class="form-control @error('color') is-invalid @enderror" id="color"
                                name="color" value="{{ old('color') }}" required autocomplete="color">
                            @error('color')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="talla">Talla</label>
                            <input type="text" class="form-control @error('talla') is-invalid @enderror" id="talla"
                                name="talla" value="{{ old('talla') }}">
                            @error('talla')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="stock">Stock</label>
                            <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                id="stock" name="stock" value="{{ old('stock') }}">
                            @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="precio">Precio</label>
                            <input type="number" class="form-control @error('precio') is-invalid @enderror"
                                id="precio" name="precio" value="{{ old('precio') }}">
                            @error('precio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="imagen">Subir imagen</label>
                            <img id="imagenSeleccionada" style="max-height: 300px;">
                            <div class="row mb-3">
                                <input name="imagen" id="imagen" type="file" required>
                                @error('imagenSeleccionada')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input name='control-hidden' id="control-hidden" value="0" hidden>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="talla">Hacer visible?</label>
                            <select class="form-control @error('visible') is-invalid @enderror" id="visible"
                                name="visible">
                                <option value='0'>No</option>
                                <option value='1' default>Si</option>
                            </select>
                            @error('talla')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-outline-danger"
                                data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-sm btn-outline-success">Añadir</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                dom: 'lfrtip',
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                },
            });
            $('#addModal').modal({
                show: false
            });

            $('#editModal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget); // Button que triggerea el modal
                const shipmentTypeId = button.data('shipment-type-id');
                const shipmentTypeName = button.data('shipment-type-name');

                const editForm = $('#editForm');
                const nombreInput = editForm.find('#nombre');

                // Actualizar ID de la ruta
                const actionUrl = editForm.attr('action').replace('__ID__', shipmentTypeId);
                editForm.attr('action', actionUrl);

                // Reemplazar el valor del nombre en el input el modal
                nombreInput.val(shipmentTypeName);
            });

            $('#addForm').submit(function(event) {
                var nombre = $('#nombre').val();

                if (nombre.trim() === '') {
                    event.preventDefault();
                    alert('El campo "Nombre del tipo de envío" es obligatorio.');
                }
            });

        });
    </script>
@endsection
