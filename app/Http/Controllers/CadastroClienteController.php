<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CadastroClienteController extends Controller
{
    public function index () {
        $clientes = Cliente::all();
        
        $clienteComImagem = $clientes->map(function ($cliente) {
            return [
                'imagem' => asset('storage/' . $cliente->imagem),
                'nome' => $cliente->nome,
                'telefone' =>$cliente->telefone,
                'endereco' => $cliente->endereco,
                'email'=> $cliente->email,
                'password'=> Hash::make($cliente->password)
                
            ];
        });

        return response()->json($clienteComImagem);
    }    
    public function store(Request $request){
        $clienteData = $request->all();

        if($request->hasFile('imagem')){
            $imagem = $request->file('imagem');
            $nomeImagem = time(). '.' . $imagem->getClientOriginalExtension();
            $caminhoImagem = $imagem->storeAs('imagem/clientes', $nomeImagem, 'public');
            $produtoData['imagem'] = $caminhoImagem;
        }
        $cliente = Cliente::create($clienteData);
        return response ()->json (['cliente' => $cliente], 201);
    }
}
