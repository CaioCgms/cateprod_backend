<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Rota de listagem de produtos
     * @return Response
    */
    function index(Request $request): Response
    {
        $search = $request->validate(
            [
                'name' => 'string|max:128|min:3'
            ],
            [
                'name' => 'É necessário fornecer um parâmetro de busca válido, com 3 a 128 caracteres.'
            ]
        );

        $productQuery = ProductModel::query();

        // Filtrar produtos pelo nome passado na requisicao
        if (isset($search['name'])) {
            $productQuery->where('name', 'like', "%$search[name]%");
        }

        $productQuery->orderBy('name', 'ASC');

        return response($productQuery->get('id', 'name', 'created', 'updated'));
    }

    /**
     * Rota de armazenar de produto
     * @return Response
    */
    function store(Request $request): Response
    {
        $params = $request->validate(
            [
                'name' => 'required|string|max:128|min:3',
                'category_id' => 'required|exists:categories,id'
            ],
            [
                'name.required' => 'É preciso fornecer um nome para o produto.',
                'name.string' => 'Formato do nome deve ser uma string.',
                'name.max' => 'O Nome precisa ter um tamanho máximo de 128 caracteres.',
                'name.min' => 'O Nome precisa ter um tamanho míninmo de 3 caracteres.',
                'category_id.required' => 'É necessário fornecer uma categoria válida.',
                'category_id.exists' => 'Categoria não existe.'
            ]
        );

        $product = ProductModel::create([
            'name' => $params['name'],
            'category_id' => $params['category_id']
        ]);

        return response($product, 201);
    }

    /**
     * Rota de mostrar de produto
     * @return Response
    */
    function show(int $id): Response
    {
        if (is_int($id)) {

            $product = ProductModel::find($id);
            
            if ($product) {

                $product->load('category');

                return response($product, 200);
            } else {
                return response('Produto não existe', 400);
            }
        } else {
            return response('É necessário informar um id válido de produto.', 422);
        }
    }

    /**
     * Rota de remover de produto
     * @return Response
    */
    function delete(int $id)
    {
        if (is_int($id)) {

            $product = ProductModel::find($id);

            if ($product) {

                $status = $product->delete();

                if ($status) {
                    return response('Sucesso ao remover produto', 200);
                } else {
                    return response('Falha ao remover produto', 400);
                }

            } else {
                return response('Produto não existe', 400);
            }
        } else {
            return response('É necessário informar um id válido de produto.', 422);
        }
    }

    /**
     * Rota de atualizar de produto
     * @return Response
    */
    function update(int $id, Request $request)
    {
        $params = $request->validate(
            [
                'name' => 'required|string|max:128|min:3',
                'category_id' => 'required|exists:categories,id'
            ],
            [
                'name.required' => 'É preciso fornecer um nome para o produto.',
                'name.string' => 'Formato do nome deve ser uma string.',
                'name.max' => 'O Nome precisa ter um tamanho máximo de 128 caracteres.',
                'name.min' => 'O Nome precisa ter um tamanho míninmo de 3 caracteres.',
                'category_id.required' => 'É necessário fornecer uma categoria válida.',
                'category_id.exists' => 'Categoria não existe.'
            ]
        );
        
        if (is_int($id)) {

            $product = ProductModel::find($id);

            if ($product) {

                $product = $product->update([
                    'name' => $params['name'],
                    'category_id' => $params['category_id']
                ]);

                $product = ProductModel::find($id);

                return response($product, 200);

            } else {
                return response('Produto não existe', 400);
            }
        } else {
            return response('É necessário informar um id válido de produto.', 422);
        }
    }
}
