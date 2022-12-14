<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Article;

class Category extends Model
{
    use SoftDeletes;

    protected $table_name = 'categories';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'category_name',
        'slug',
        'meta_title',
        'meta_description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function catArt(){

        return $this->belongsToMany(Article::class)->orderBy('updated_at', 'desc');
    }

}
