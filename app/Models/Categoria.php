<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    /**
     * Get all of the subcategorias for the Categoria
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subcategorias(): HasMany
    {
        return $this->hasMany(Subcategoria::class);
    }
}
