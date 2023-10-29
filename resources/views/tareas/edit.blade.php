@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('tareas.update',$tarea) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card h-100">
                        <h4 class="card-header">Editar tarea</h4>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="nombre" id="nombre" class="form-control"
                                               placeholder="Tarea" value="{{ $tarea->nombre }}">
                                        <label for="nombre">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-floating mb-3">
                                        <input type="date" value="{{ \Carbon\Carbon::parse($tarea->fecha_limite)->toDateString() }}" name="fecha_limite" id="fecha_limite" class="form-control">
                                        <label for="fecha_limite">Fecha Límite</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="descripcion" id="descripcion" class="form-control"
                                          placeholder="Descripción">{{ $tarea->descripcion }}</textarea>
                                <label for="descripcion">Descripción</label>
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
