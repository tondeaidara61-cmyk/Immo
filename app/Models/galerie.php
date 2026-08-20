<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class galerie extends Model
{
    protected $fillable = [
        'chemin',
        'article_id',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
