<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdicionarCarrinhoFormRequest;
use App\Models\Carrinho;
use App\Models\Produto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function index() {
        $produtos = Produto::all();
        
        $produtosComImagem = $produtos->map(function ($produto){
            return [
                'nome' => $produto->nome,
                'preco' =>$produto->preco,
                'ingredientes' => $produto->ingredientes,
                'imagem' => asset('storage/' . $produto->imagem),
            ];
        });


        return response()->json($produtosComImagem);
    }    
    public function store(Request $request){
        $produtoData = $request->all();

        if($request->hasFile('imagem')){
            $imagem = $request->file('imagem');
            $nomeImagem = time(). '.' . $imagem->getClientOriginalExtension();
            $caminhoImagem = $imagem->storeAs('imagem/produtos', $nomeImagem, 'public');
            $produtoData['imagem'] = $caminhoImagem;
        }
        $produto = Produto::create($produtoData);
        return response ()->json (['produto' => $produto], 201);
    }


    /*public function adicionarCarrinho(AdicionarCarrinhoFormRequest $request)
{
    $carrinho = Carrinho::updateOrCreate(
        ['produto_id' => $request->produto_id],
        ['quantidade' => DB::raw('quantidade + ' . $request->quantidade)]
    );

    return response()->json([
        'message' => 'Item adicionado ao carrinho com sucesso',
        'carrinho' => $carrinho,
    ], 201);
}*/


}

