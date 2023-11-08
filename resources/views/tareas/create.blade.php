@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('tareas.store') }}" method="POST">
                    @csrf
                    <div class="card h-100">
                        <h4 class="card-header">Nueva tarea</h4>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="nombre" id="nombre" class="form-control"
                                               placeholder="Tarea" value="{{ old('nombre') }}">
                                        <label for="nombre">Nombre</label>
                                        @error('nombre')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-floating mb-3">
                                        <input type="date" value="" name="fecha_limite" id="fecha_limite"
                                               class="form-control" value="{{ old('fecha_limite') }}">
                                        <label for="fecha_limite">Fecha Límite</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="descripcion" id="descripcion" class="form-control"
                                          placeholder="descripcion">{{ old('descripcion') }}</textarea>
                                <label for="descripcion">Descripción</label>
                                @error('descripcion')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('tareas.index') }}" class="btn-danger btn">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
