<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'categories'; 
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'created',
        'updated'
    ];

    // Produtos relacionados com a categoria
    public function products(): HasMany
    {
        return $this->hasMany(ProductModel::class, 'category_id');
    }

    public function delete()
    {
        // Remover Produtos
        $this->products()->delete();
        // Remover Categoria
        return parent::delete();
    }
}
