<?php

namespace Backpack\NewsCRUD\app\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Article extends Model implements SluggableInterface
{
	use CrudTrait;
	use SluggableTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'articles';
	protected $primaryKey = 'id';
	public $timestamps = true;
	// protected $guarded = ['id'];
	protected $fillable = ['slug', 'title', 'content', 'image', 'status', 'category_id', 'featured', 'date'];
	// protected $hidden = [];
    // protected $dates = [];
    protected $sluggable = [
        'build_from' => 'slug_or_title',
        'save_to'    => 'slug',
        'on_update'  => true,
        'unique'	 => true
    ];

	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/

    public function getFeaturedColumn() {
        if ($this->featured)
            return 'Featured';
        else
            return '-';
    }

	/*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/

    public function category()
    {
        return $this->belongsTo('Backpack\NewsCRUD\app\Models\Category', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany('Backpack\NewsCRUD\app\Models\Tag', 'article_tag');
    }

	/*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| ACCESORS
	|--------------------------------------------------------------------------
	*/

	// The slug is created automatically from the "title" field if no slug exists.
    public function getSlugOrTitleAttribute() {
    	if ($this->slug!='') return $this->slug;
    	return $this->title;
    }

	/*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/

	/**
	 * Featured attribute mutator.
	 *
	 * When setting an Article as featured, remove the featured attribute from all other Articles.
	 *
	 * @param [type] $value [description]
	 */
    public function setFeaturedAttribute($value)
    {
        $this->attributes['featured'] = $value;

        if ($value == 1) {
            $all_other_articles = Article::where('id', '<>', $this->id)->get();
            foreach ($all_other_articles as $key => $article) {
                $article->featured=0;
                $article->save();
            }
        }
    }
}
