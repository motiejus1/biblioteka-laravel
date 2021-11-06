<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function authorBooks() {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }
}
