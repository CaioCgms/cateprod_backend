<?php

namespace Tests\Feature;

use App\Models\CategoryModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Teste de listagem de categorias
     * @return void
     */
    public function test_list_route(): void
    {
        // Checar se rota de listagem de categorias é válida
        $response = $this->get('/api/categories');
        $response->assertStatus(200);
    }

    /**
     * Teste de criar de categoria
     * @return void
     */
    public function test_create_route(): void
    {
        // Cria um nome aleatório para a categoria a ser criado
        $str = rand();
        $categoryName = md5($str);

        // Tentar criar uma nova categoria com novo nome
        $response = $this->post('/api/categories', ['name' => $categoryName]);
        $response->assertStatus(201);

        // Se houver um id, significa que a categoria foi criada
        $this->assertIsInt($response['id']);

        // Remover categoria após teste
        $category = CategoryModel::find($response['id']);
        $category->delete();
    }

    /**
     * Teste de mostrar de categoria
     * @return void
     */
    public function test_show_route(): void
    {
        // Cria um nome aleatório para a categoria a ser criado
        $str = rand();
        $categoryName = md5($str);

        $category = CategoryModel::create([
            'name' => $categoryName
        ]);

        // Tentar capturar categoria pelo seu id
        $response = $this->get('/api/categories/' . $category['id']);
        $response->assertStatus(200);

        // Compara-se os ids para validar se são os mesmos dados criados
        $this->assertSame($category['id'], $response['id']);

        // Remover a categoria após o teste
        $category->delete();
    }

    /**
     * Teste de atualização de categoria
     * @return void
     */
    public function test_update_route(): void
    {
        // Cria um nome aleatório para a categoria a ser criado
        $str = rand();
        $categoryName = md5($str);
        $categoryNewName = md5($str) .  'New';

        $category = CategoryModel::create([
            'name' => $categoryName
        ]);

        $response = $this->put('/api/categories/' . $category['id'], ['name' => $categoryNewName]);
        $response->assertStatus(200);

        // Compara-se os nomes para validar se são os mesmos dados atualizados
        $this->assertSame($categoryNewName, $response['name']);

        // Remover a categoria após o teste
        $category->delete();
    }

    /**
     * Teste de remoção de categoria
     * @return void
     */
    public function test_delete_route(): void
    {
        // Cria um nome aleatório para a categoria a ser criado
        $str = rand();
        $categoryName = md5($str);

        $category = CategoryModel::create([
            'name' => $categoryName
        ]);
        
        $response = $this->delete('/api/categories/' . $category['id']);
        $response->assertStatus(200);

        $category = CategoryModel::find($category['id']);

        // A categoria deve ser nula caso tenha sido removida com sucesso.
        $this->assertNull($category);

        // Apaga categoria após o teste
        if ($category) {
            $category->delete();
        }
    }
}
