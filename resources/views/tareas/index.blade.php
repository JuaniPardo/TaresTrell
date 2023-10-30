@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-header">Tareas de {{ Auth::user()->name }}</h4>
                    <div class="card-body p-3">
                        <a href="{{ route('tareas.create') }}" class="btn btn-primary">Crear Tarea</a>
                    </div>
                    <div class="card-group px-4 pb-3">
                        @foreach($listas as $lista)
                            <div class="card">
                                <h5 class="card-header">
                                    {{ $lista->nombre }}
                                </h5>
                                <div class="card-body">
                                    @forelse($tareas as $tarea)
                                        @if($tarea->lista_id == $lista->id)
                                            <a href="{{ route('tareas.show',$tarea) }}" class="text-decoration-none">
                                                @if($tarea->porVencer)
                                                    <div class="alert alert-warning mx-2 p-1 d-flex">
                                                        @elseif($tarea->vencida)
                                                            <div class="alert alert-danger mx-2 p-1 d-flex">
                                                                @else
                                                                    <div class="alert alert-primary mx-2 p-1 d-flex">
                                                                        @endif
                                                                        <span
                                                                            class="position-absolute top-0 start-0 ps-1">
                                                <span
                                                    class="badge bg-secondary text-white">{{ \Carbon\Carbon::parse($tarea->fecha_limite)->format('d-m-Y') }}
                                                </span>
                                            </span>
                                                                        <h5 class="ps-2 pt-4">
                                                                            {{ $tarea->nombre }}
                                                                        </h5>
                                                                        <form
                                                                            action=""
                                                                            class="ms-auto">
                                                                        </form>
                                                                        @if($tarea->lista->id > 1)
                                                                            <form
                                                                                action="{{ route('tareas.retroceder', ['tarea' => $tarea->id]) }}"
                                                                                method="POST"
                                                                                class="ms-auto">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button type="submit"
                                                                                        class="btn btn-outline-primary m-2">
                                                                                    <i class="fas fa-arrow-left"></i>
                                                                                </button>
                                                                            </form>
                                                                        @endif
                                                                        @if($tarea->lista->id < 3)
                                                                            <form
                                                                                action="{{ route('tareas.avanzar', ['tarea' => $tarea->id]) }}"
                                                                                method="POST"
                                                                                class="">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button type="submit"
                                                                                        class="btn btn-outline-primary m-2">
                                                                                    <i class="fas fa-arrow-right"></i>
                                                                                </button>
                                                                            </form>
                                                                        @endif
                                                                    </div>
                                            </a>
                                        @endif

                                    @empty
                                        <p class="text-muted text-center">No hay tareas</p>
                                    @endforelse
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
