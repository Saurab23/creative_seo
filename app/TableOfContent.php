<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TableOfContent extends Model
{
    use SoftDeletes;

    protected $table_name = 'table_of_contents';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'question',
        'answer',
        'biography_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

}
