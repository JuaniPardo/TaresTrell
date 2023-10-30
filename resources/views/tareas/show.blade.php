@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h4 class="card-header">{{ $tarea->nombre }}</h4>
                    <div class="card-body">
                        <h5 class="card-text">{{ $tarea->descripcion }}</h5>
                        <h4 class="card-text mt-4">Fecha límite: {{ \Carbon\Carbon::parse($tarea->fecha_limite)->format('d-m-Y') }}</h4>
                        <hr>
                        <h5 class="card-text">Creada: {{ $tarea->created_at }}</h5>
                        <h5 class="card-text">Actualizada: {{ $tarea->updated_at }}</h5>
                </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('tareas.index') }}" class="btn btn-danger">Volver</a>
                        <a href="{{ route('tareas.edit',$tarea) }}" class="btn btn-warning">Editar</a>
                    </div>
            </div>
        </div>
    </div>
@endsection
