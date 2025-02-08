<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Método status.
     */
    public function status()
    {
        // return response()->json(['status' => 'OK']);
        return "Status OK dentro do método status.\nQuebra de linha no retorno de status.";
    }

    /**
     * Retorna todos os clientes cadastrados.
     */
    public function clients()
    {
        // return response()->json(['clients' => []]);
        return "Todos os clientes cadastrados. Retorno do método clients.\nRetorno de clients.";
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
