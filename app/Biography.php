<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\QuickFact;
use Carbon\Carbon;

class Biography extends Model
{
    use SoftDeletes;

    protected $table_name = 'biographies';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'slug',
        'title_tag',
        'relationship_status',
        'anniversary_date',
        'birth_date',
        'relationship_fact',
        'more_about_relationship',
        'biography_photo',
        'meta_title',
        'meta_description',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'tiktok_link',
        'youtube_link',
        'imdb_link',
        'website_link',
        'twitch_link',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function quickFacts()
    {
        return $this->belongsToMany(QuickFact::class);
    }

    public function tableOfContent()
    {
        return $this->belongsToMany(TableOfContent::class);
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }
}
