<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuickFact extends Model
{
    use SoftDeletes;

    protected $table_name = 'quick_facts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'content',
        'seq_no',
        'biography_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

}
