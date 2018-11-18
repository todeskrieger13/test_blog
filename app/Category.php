<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    /**
     * Mass assigned
     */

    protected $fillable = array('title', 'slug', 'parent_id', 'published', 'created_by', 'modified_by');

    /**
     * Mutators
     */

    public function setSlugAttribute($value)
    {
        $this -> attributes['slug'] = Str ::slug(mb_substr($this -> title, 0, 40) . "-" . \Carbon\Carbon ::now() -> format('dmyHi'), '-');
    }

    /**
     * Get children Category
     */

    public function getChildrenCategory()
    {
        return $this -> hasMany(self::class, 'parent_id');
    }

    /**
     * polimorphic relation with Articles
     */

    public function getArticles()
    {
        return $this -> morphedByMany('App\Article', 'categoryable');
    }

    public function scopeLastCategories($query, $count)
    {
        return $query -> orderBy('created_at', 'desc') -> take($count) -> get();
    }
}
