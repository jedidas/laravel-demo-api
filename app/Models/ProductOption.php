<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'product_options';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $appends = ['items'];
    protected $fillable = ['name', 'required', 'multiple', 'min_count', 'max_count', 'options', 'active', 'product_id'];
    // protected $hidden = [];
    // protected $dates = [];

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

    public function getByProductId(int $id)
    {
        return $this->where('product_id', $id)->get();
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function items()
    {
        return $this->hasMany('App\Models\ProductOptionItem');
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
    public function getItemsAttribute()
    {
        return $this->items()->get(['id', 'name', 'price', 'image', 'active']);
    }
}
