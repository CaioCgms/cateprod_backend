<?php

namespace Database\Seeders;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar categorias
        $categoryCarro = CategoryModel::create([
            'name' => 'Carros',
            'created' => new DateTime(),
            'updated' => new DateTime()
        ]);

        $categoryVideoGame = CategoryModel::create([
            'name' => 'Video Games',
            'created' => new DateTime(),
            'updated' => new DateTime()
        ]);

        $categoryEletronicos= CategoryModel::create([
            'name' => 'Eletrônicos',
            'created' => new DateTime(),
            'updated' => new DateTime()
        ]);

        // Criar Produtos
        ProductModel::create([
            'name' => 'Nissan Sentra',
            'created' => new DateTime(),
            'updated' => new DateTime(),
            'category_id' => $categoryCarro['id']
        ]);

        ProductModel::create([
            'name' => 'VW Gol',
            'created' => new DateTime(),
            'updated' => new DateTime(),
            'category_id' => $categoryCarro['id']
        ]);

        ProductModel::create([
            'name' => 'Chevrolet Celta',
            'created' => new DateTime(),
            'updated' => new DateTime(),
            'category_id' => $categoryCarro['id']
        ]);

        ProductModel::create([
            'name' => 'Toyota Corola',
            'created' => new DateTime(),
            'updated' => new DateTime(),
            'category_id' => $categoryCarro['id']
        ]);

        ProductModel::create([
            'name' => 'Playstation 3',
            'created' => new DateTime(),
            'updated' => new DateTime(),
            'category_id' => $categoryVideoGame['id']
        ]);

        ProductModel::create([
            'name' => 'Playstation 4',
            'created' => new DateTime(),
            'updated' => new DateTime(),
            'category_id' => $categoryVideoGame['id']
        ]);

        ProductModel::create([
            'name' => 'Zelda BTW',
            'created' => new DateTime(),
            'updated' => new DateTime(),
            'category_id' => $categoryVideoGame['id']
        ]);

        ProductModel::create([
            'name' => 'Onimusha',
            'created' => new DateTime(),
            'updated' => new DateTime(),
            'category_id' => $categoryVideoGame['id']
        ]);

        ProductModel::create([
            'name' => 'GTA V',
            'created' => new DateTime(),
            'updated' => new DateTime(),
            'category_id' => $categoryVideoGame['id']
        ]);

        ProductModel::create([
            'name' => 'Super Mario',
            'created' => new DateTime(),
            'updated' => new DateTime(),
            'category_id' => $categoryVideoGame['id']
        ]);

        ProductModel::create([
            'name' => 'Notebooks',
            'created' => new DateTime(),
            'updated' => new DateTime(),
            'category_id' => $categoryEletronicos['id']
        ]);

        ProductModel::create([
            'name' => 'Celular Android',
            'created' => new DateTime(),
            'updated' => new DateTime(),
            'category_id' => $categoryEletronicos['id']
        ]);

        ProductModel::create([
            'name' => 'iPhone XR',
            'created' => new DateTime(),
            'updated' => new DateTime(),
            'category_id' => $categoryEletronicos['id']
        ]);

        ProductModel::create([
            'name' => 'Samsung Galaxy Y',
            'created' => new DateTime(),
            'updated' => new DateTime(),
            'category_id' => $categoryEletronicos['id']
        ]);

        ProductModel::create([
            'name' => 'Mouse Gamer',
            'created' => new DateTime(),
            'updated' => new DateTime(),
            'category_id' => $categoryEletronicos['id']
        ]);

        ProductModel::create([
            'name' => 'Desktop',
            'created' => new DateTime(),
            'updated' => new DateTime(),
            'category_id' => $categoryEletronicos['id']
        ]);
    }
}
