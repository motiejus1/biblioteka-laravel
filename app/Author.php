<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Author extends Model
{


    protected $table = 'authors';

    use Sortable;

    protected $fillable = ['name', 'surname'];

    public $sortable = ['id', 'name', 'surname'];

    public function authorBooks() {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }
}
