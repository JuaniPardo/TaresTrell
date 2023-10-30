<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ListaRequest;

class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $listas = Lista::get();
        return view('listas.index', compact('listas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('listas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ListaRequest $request): RedirectResponse
    {
        $lista = new Lista($request->all());
        $lista->save();
        return redirect()->route('listas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lista $lista): View
    {
        return view('listas.show', compact('lista'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lista $lista): View
    {
        return view('listas.edit', compact('lista'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ListaRequest $request, Lista $lista): RedirectResponse
    {
        $lista->update($request->all());
        return redirect()->route('listas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lista $lista): RedirectResponse
    {
        $lista->delete();
        return redirect()->route('listas.index');
    }
}
