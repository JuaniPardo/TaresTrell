@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h4 class="card-header">Tareas de {{ Auth::user()->name }}</h4>
                    <div class="caard-body p-3">
                        <a href="{{ route('tareas.create') }}" class="btn btn-primary">Crear Tarea</a>
                    </div>

                    @forelse($tareas as $tarea)
                        @if(!$tarea->completada)
                            <a href="{{ route('tareas.show',$tarea) }}" class="text-decoration-none">
                                @if($tarea->porVencer)
                                    <div class="alert alert-warning mx-3 p-1 d-flex">
                                        @elseif($tarea->vencida)
                                            <div class="alert alert-danger mx-3 p-1 d-flex">
                                                @else
                                                    <div class="alert alert-primary mx-3 p-1 d-flex">
                                                        @endif
                                    <span class="position-absolute top-0 start-0 ps-1">
                                        <span
                                            class="badge bg-secondary text-white">{{ \Carbon\Carbon::parse($tarea->fecha_limite)->format('d-m-Y') }}
                                        </span>
                                    </span>
                                                            <h5 class="ps-2 pt-4">{{ $tarea->nombre }}
                                                            </h5>
                                                            <form
                                                                action="{{ route('tareas.destroy', ['tarea' => $tarea->id]) }}"
                                                                method="POST"
                                                                class="ms-auto">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-success m-2">
                                                                    <i class="fas fa-check"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                            </a>
                        @else
                            <a href="{{ route('tareas.show',$tarea) }}" class="text-decoration-none">
                                <div class="alert alert-dark mx-3 p-1 d-flex">
                                    <span class="position-absolute top-0 start-0 ps-1">
                                        <span
                                            class="badge bg-secondary text-white">{{ \Carbon\Carbon::parse($tarea->fecha_limite)->format('d-m-Y') }}
                                        </span>
                                    </span>
                                    <h5 class="ps-2 pt-4">{{ $tarea->nombre }}
                                    </h5>
                                    <form action="{{ route('tareas.destroy', ['tarea' => $tarea->id]) }}" method="POST"
                                          class="ms-auto">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-dark m-2">
                                            <i class="fas fa-close"></i>
                                        </button>
                                    </form>
                                </div>
                            </a>
                        @endif

                    @empty
                        <p class="text-muted text-center">No hay tareas</p>
                    @endforelse


                </div>
            </div>
        </div>
    </div>
@endsection
