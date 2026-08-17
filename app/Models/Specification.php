<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    public $fillable = [
        'name',
    ];

    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
