<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

    /**
     * Cadastrar novo cliente.
     */
    public function addClient(Request $request)
    {
    //     $client = new Client();
    //     $client->name = $request->name;
    //     $client->email = $request->email;
    //     $client->phone = $request->phone;
    // $client->save();

    $client = Client::create($request->only([
        'name',
        'email'
    ]));

    return response()->json([
        'client' => $client,
        'message' => 'Cliente adicionado com sucesso.',
        'client' => $client,
    ],
    201,
    ['Content-Type' => 'application/json']);
    }

    /**
     * Atualizar cliente.
     */
    public function updateClient(Request $request)
    {
        if(! $request->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Cliente não encontrado.',
            ],
            404,
            ['Content-Type' => 'application/json']);

        }

        // Update client.
        $client = CLient::find($request->id);
        $client->name = $request->name;
        $client->email = $request->email;
        $client->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Cliente atualizado com sucesso.',
            'client' => $client,
        ],
        200,
        ['Content-Type' => 'application/json']);
    }

    /**
     * Deletar cliente.
     */
    public function deleteClient(Request $request)
    {
        if(! $request->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Cliente não encontrado.',
            ],
            404,
            ['Content-Type' => 'application/json']);
        }

        // Delete client.
        $client = Client::find($request->id);
        $client->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Cliente deletado com sucesso.',
        ],
        200,
        ['Content-Type' => 'application/json']);
    }
}
