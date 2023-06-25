@extends('layouts.argon.app')

@section('title')
    {{ 'Sección' }}
@endsection

@section('breadcrumb')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Páginas</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page" >Secciones</li>
    </ol>
    <h6 class="font-weight-bolder text-white mb-0">Editar Sección</h6>
@endsection
@section('css')
@endsection

@section('content')
    <div class="container-fluid mt--6 w-75">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Editar Sección</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('section.update', $seccion->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label class="form-control-label" for="nombre">Nombre</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    id="nombre" name="nombre" value="{{ $seccion->nombre }}">
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="visible">Visible:</label>
                                <select class="form-select" id="visible" name="visible">
                                    <option value="1" {{ $seccion->visible == 1 ? 'selected' : '' }}>Mostrar
                                    </option>
                                    <option value="0" {{ $seccion->visible == 0 ? 'selected' : '' }}>No mostrar
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <a type="button" class="btn btn-sm btn-outline-danger"
                                    href="{{ route('section.index') }}">{{ __('Cancelar') }}</a>
                                <button type="submit" class="btn btn-primary">Guardar Cambio</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
