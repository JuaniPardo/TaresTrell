<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\View\View;
use App\Http\Requests\TareaRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Lista;

class TareaController extends Controller
{

    public function index(): View
    {
        $listas = Lista::get();
        $tareas = Tarea::where('user_id', auth()->user()->id)
            ->orderBy('fecha_limite')
            ->get();
        foreach ($tareas as $tarea) {
            $tarea->porVencer = $tarea->porVencer();
            $tarea->vencida = $tarea->vencida();
        }
        return view('tareas.index', compact('tareas'), compact('listas'));
    }

    public function create(): View
    {
        return view('tareas.create');
    }

    public function store(TareaRequest $request): RedirectResponse
    {
        $tarea = new Tarea($request->all());
        $tarea->user_id = auth()->user()->id;
        $tarea->lista_id = $request->input('lista_id', 1);
        $tarea->save();
        return redirect()->route('tareas.index');
    }

    public function show(Tarea $tarea): View
    {
        if ($tarea->user_id !== auth()->user()->id) {
            abort(403, 'No tienes permisos para ver esta tarea.');
        }
        return view('tareas.show', compact('tarea'));
    }

    public function edit(Tarea $tarea): View
    {
        return view('tareas.edit', compact('tarea'));
    }

    public function update(TareaRequest $request, Tarea $tarea): RedirectResponse
    {
        $tarea->update($request->all());
        return redirect()->route('tareas.index');
    }

    public function destroy(Tarea $tarea): RedirectResponse
    {
        $tarea->delete();
        return redirect()->route('tareas.index');
    }
    /*public function destroy(Tarea $tarea): RedirectResponse
    {
        if (!$tarea->completada) {
            $tarea->update(['completada' => true]);
            $tarea->save();
        } else {
            $tarea->update(['completada' => false]);
            $tarea->save();
        }
        return redirect()->route('tareas.index');
    }*/
    public function avanzar(Tarea $tarea): RedirectResponse
    {
        $tarea->lista_id = $tarea->lista_id + 1;
        $tarea->lista()->associate($tarea->lista_id)->save();
        return redirect()->route('tareas.index');
    }
    public function retroceder(Tarea $tarea): RedirectResponse
    {
        $tarea->lista_id = $tarea->lista_id - 1;
        $tarea->lista()->associate($tarea->lista_id)->save();
        return redirect()->route('tareas.index');
    }
}
