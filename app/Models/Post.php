<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'contenido',
        'categoria_id',
        'subcategoria_id',
    ];

    /**
     * Get the categoria that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * Get the categoria that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }

}
