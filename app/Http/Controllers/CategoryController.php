<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use DateTime;
use Hamcrest\Type\IsInteger;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Rota de listagem de categoria
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

        $categoryQuery = CategoryModel::query();

        // Filtrar categorias pelo nome passado na requisicao
        if (isset($search['name'])) {
            $categoryQuery->where('name', 'like', "%$search[name]%");
        }

        $categoryQuery->orderBy('name', 'ASC');

        $categories = $categoryQuery->get(['name', 'id', 'created', 'updated']);

        return response($categories, 200);
    }

    /**
     * Rota de armazenar de categoria
     * @return Response
    */
    function store(Request $request): Response
    {
        $params = $request->validate(
            [
                'name' => 'required|unique:categories|string|max:128|min:3'
            ],
            [
                'name.required' => 'É preciso fornecer um nome a categoria.',
                'name.unique' => 'Nome de categoria já existe, por favor, forneça um novo nome.',
                'name.string' => 'Formato do nome deve ser uma string.',
                'name.max' => 'O Nome precisa ter um tamanho máximo de 128 caracteres.',
                'name.min' => 'O Nome precisa ter um tamanho míninmo de 3 caracteres.'
            ]
        );

        if (isset($params['name'])) {

            $category = CategoryModel::create([
                'name' => $params['name'],
                'created' => new DateTime(),
                'updated' => new DateTime()
            ]);

            return response($category, 201);
        }

        // A categoria não foi salva, pois houve falha na validação dos parâmetros
        return response('', 422);
    }

    /**
     * Rota de mostrar de categoria
     * @return Response
    */
    function show(int $id): Response
    {
        if (is_int($id)) {
            $category = CategoryModel::find($id);

            if ($category) {
                return response($category, 200);
            } else {
                // A categoria não foi encontrada
                return response('A categoria requisitada não existe', 404);
            }
        }

        return response('É necessário fornecer um id de categoria válido.', 422);
    }

    /**
     * Rota de remover categoria
     * @return Response
    */
    function delete(int $id): Response
    {
        if (is_int($id)) {

            $category = CategoryModel::find($id);

            if ($category) {
                $status = $category->delete();

                if ($status) {
                    return response('Sucesso ao remover categoria', 200);
                } else {
                    return response('Falha ao remover categoria', 400);
                }

            } else {
                return response('A categoria requisitada não existe');
            }
        }
        
        return response('É necessário fornecer um id de categoria válido.', 422);
    }

    /**
     * Rota de atualizar categoria
     * @return Response
    */
    function update(int $id, Request $request): Response
    {
        $params = $request->validate(
            [
                'name' => 'required|string|max:128|min:3'
            ],
            [
                'name.unique' => 'Nome de categoria já existe, por favor, forneça um novo nome.',
                'name.string' => 'Formato do nome deve ser uma string.',
                'name.max' => 'O Nome precisa ter um tamanho máximo de 128 caracteres.',
                'name.min' => 'O Nome precisa ter um tamanho míninmo de 3 caracteres.'
            ]
        );

        if (is_int($id)) {

            $hasCategoryName = CategoryModel::query()->where('name', $params['name'])->whereNot('id', $id)->first('id');
            
            $category = CategoryModel::find($id);

            // Ao atualizar, checa se o nome já está em uso por outra categoria
            if ($hasCategoryName) {
                return response('O nome de categoria já está em uso por outra categoria.', 422);
            }

            // Verifica se categoria existe
            if (!$category) {
                return response('A categoria requisitada não existe');
            }

            $category->update([
                'name' => $params['name'],
                'updated' => new DateTime()
            ]);

            return response($category, 200);
        }

        return response('É necessário fornecer um id de categoria válido.', 422);
    }
}
