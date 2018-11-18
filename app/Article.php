<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    /**
     * Mass assigned
     */

    protected $fillable = array('title', 'slug', 'description_short', 'description', 'image', 'image_show', 'meta_title',
                                'meta_description', 'meta_keyword', 'published', 'created_by', 'modified_by');

    /**
     * Mutators
     */

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    /**
     * polimorphic relation with Categories
     */

    public function getCategories()
    {
        return $this->morphToMany('App\Category', 'categoryable');
    }

    public function scopeLastArticles($query, $count)
    {
        return $query -> orderBy('created_at', 'desc') -> take($count) -> get();
    }
}
