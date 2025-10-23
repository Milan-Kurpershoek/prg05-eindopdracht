<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //
    public function book(): Genre|\Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this-> hasMany(book::class);
    }
}
