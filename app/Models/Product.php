<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'products';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    // protected $appends = [];
    protected $fillable = ['name', 'slug', 'code', 'image', 'price', 'discount', 'active', 'description', 'brand_id'];
    // protected $hidden = [];
    // protected $dates = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function getAll()
    {
        return $this->where('active', true)->paginate(env('PAGINATION_COUNT'));
    }

    public function show(int $id)
    {
        return $this->where('id', $id)->where('active', true)->firstOrFail();
    }

    public function getByBrandId(int $brand)
    {
        return $this->where('brand_id', $brand)->where('active', true);
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function votes()
    {
        return $this->hasMany('App\Models\ProductVote');
    }

    public function options()
    {
        return $this->hasMany('App\Models\ProductOption')->where('active', true);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand')->where('active', true);
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment')->where('active', true);
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

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function getBrandAttribute()
    {
        return $this->brand()->get()->first();
    }

    public function getTagsAttribute()
    {
        return $this->tags()->get();
    }

    public function getVotesAttribute()
    {
        return [
            "likes" => $this->votes()->where('vote', true)->count(),
            "dislikes" => $this->votes()->where('vote', false)->count(),
        ];
    }

    public function getOptionsAttribute()
    {
        return $this->options()->get(['id', 'name', 'required', 'multiple', 'min_count', 'max_count', 'options', 'active']);
    }

    public function getCommentsAttribute()
    {
        return $this->comments()->get();
    }
}
