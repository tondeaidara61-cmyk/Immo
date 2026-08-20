<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    protected $fillable = [
        'name',
    ];

    public function article()
    {
        return $this->belongsToMany(Article::class);
    }
}
