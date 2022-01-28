<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOptionItem extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'product_option_items';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    // protected $appends = [];
    protected $fillable = ['name', 'price', 'image', 'active', 'product_option_id'];
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

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

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
}
