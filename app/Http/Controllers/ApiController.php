<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Método status.
     */
    public function status()
    {
        // return response()->json(['status' => 'OK']);
        // return "<pre>Status OK dentro do método status.
        //         \nQuebra de linha no retorno de status.</pre>";

        // Resposta do método em formato JSON.
        return response()->json([
            'status' => 'OK',
            'message' => 'Status OK dentro do método status.',
        ],
        200,
        ['Content-Type' => 'application/json']);
    }

    /**
     * Retorna todos os clientes cadastrados.
     */
    public function clients()
    {
        // $clients = Client::all(); // Retorna todos os clientes cadastrados.
        $clients = Client::paginate(20); // Retorna de 20 em 20 clientes cadastrados.

        return response()->json([
            'clients' => $clients,
            'message' => 'Clientes retornados com sucesso.',
        ],
        200,
        ['Content-Type' => 'application/json']);
    }

    /**
     * Retorna as informações de um cliente específico.
     */
    public function clientById($id)
    {
        $client = Client::find($id);

        if ($client) {
            return response()->json([
                'client' => $client,
                'message' => 'Cliente retornado com sucesso.',
            ],
            200,
            ['Content-Type' => 'application/json']);
        }
    }

    /**
     * Retorna um cliente específico via post.
     */
    public function client(Request $request)
    {
        $client = Client::find($request->id);

        if ($client) {
            return response()->json([
                'client' => $client,
                'message' => 'Cliente retornado com sucesso.',
            ],
            200,
            ['Content-Type' => 'application/json']);
        } else {
            return response()->json([
                'message' => 'Cliente não encontrado.',
            ],
            404,
            ['Content-Type' => 'application/json']);
        }
    }
}
