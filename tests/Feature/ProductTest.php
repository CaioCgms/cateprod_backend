<?php

namespace Tests\Feature;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Teste de Listagem de Produto
     * @return void
     */
    public function test_list_products(): void
    {
        // Checar se rota de listagem de produtos é válida
        $response = $this->get('/api/products');
        $response->assertStatus(200);
    }

    /**
     * Teste de Criação de Produto
     * @return void
     */
    public function test_create_product(): void
    {
        $str = rand();
        $categoryName = md5($str); // Cria um nome aleatório para a categoria a ser criado
        $productName = md5($str); // Cria um nome aleatório para o produto a ser criado

        // Cria categoria
        $category = CategoryModel::create([
            'name' => $categoryName
        ]);

        $this->assertIsInt($category['id']); // Checa o id da categoria

        // Faz uma requisição de criação de produto
        $response = $this->post('/api/products',[
            'name' => $productName,
            'category_id' => $category['id']
        ]);

        $response->assertStatus(201); //Status de item criado

        $this->assertSame($productName, $response['name']); //Checa se possui o mesmo nome
        $this->assertSame($category['id'], $response['category_id']); //Checa se possui a mesma categoria

       // Após o teste apagamos a categoria e os produtos a ele associados
        $category->delete(); 
    }

    /**
     * Teste de Atualização de Produto
     * @return void
     */
    public function test_update_product(): void
    {
        $str = rand();
        $categoryName = md5($str); // Cria um nome aleatório para a categoria a ser criado
        $productName = md5($str); // Cria um nome aleatório para o produto a ser criado
        $productNewName = $productName .  'New';

        // Cria categoria
        $category = CategoryModel::create([
            'name' => $categoryName
        ]);

        // Criar um produto
        $product = ProductModel::create([
            'name' => $productName,
            'category_id' => $category['id']
        ]);

        // Faz uma requisição de atualização de produto
        $response = $this->put('/api/products/' . $product['id'],[
            'name' => $productNewName,
            'category_id' => $category['id']
        ]);

        $response->assertStatus(200); //Status de item atualizado

        $this->assertSame($productNewName, $response['name']); // Valores se correspondem

        // Após o teste apagamos a categoria e os produtos a ele associados
        $category->delete(); 
    }

    /**
     * Teste de Visualização de Produto
     * @return void
     */
    public function test_show_product(): void
    {
        $str = rand();
        $categoryName = md5($str); // Cria um nome aleatório para a categoria a ser criado
        $productName = md5($str); // Cria um nome aleatório para o produto a ser criado

        // Cria categoria
        $category = CategoryModel::create([
            'name' => $categoryName
        ]);

        // Criar um produto
        $product = ProductModel::create([
            'name' => $productName,
            'category_id' => $category['id']
        ]);

        // Faz uma requisição para consumir produto
        $response = $this->get('/api/products/' . $product['id']);
        $response -> assertStatus(200);

        $this->assertSame($response['id'], $product['id']); // Valores se correspondem

        // Remover categoria após o teste
        $category->delete();
    }

    /**
     * Teste de Remoção de Produto
     * @return void
     */
    public function test_remove_product(): void
    {
        
        $str = rand();
        $categoryName = md5($str); // Cria um nome aleatório para a categoria a ser criado
        $productName = md5($str); // Cria um nome aleatório para o produto a ser criado

        // Cria categoria
        $category = CategoryModel::create([
            'name' => $categoryName
        ]);

        // Criar um produto
        $product = ProductModel::create([
            'name' => $productName,
            'category_id' => $category['id']
        ]);
    
        $response = $this->delete('/api/products/' . $product['id']);
        $response->assertStatus(200);

        $product = ProductModel::find($product['id']);

        // Ao realizar uma requisição de remoção, o produto não deverá mais existir
        $this->assertNull($product);

        // Remover categoria após o teste
        $category->delete();
    }
}
