<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'orders';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $appends = ['status', 'products', 'total'];
    protected $fillable = ['code', 'instructions', 'created', 'status_id', 'user_id'];
    protected $hidden = ["created_at", "updated_at"];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function total()
    {
        $total = 0;
        $products = $this->products()->get();
        foreach ($products as $product) {
            $total += $product->price - ($product->price * $product->discount / 100);
        }
        return $total;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function status()
    {
        return $this->hasOne('App\Models\Status', 'id', 'status_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->where('active', true);
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
    public function getStatusAttribute()
    {
        return $this->status()->get()->first();
    }

    public function getProductsAttribute()
    {
        return $this->products()->get();
    }

    public function getTotalAttribute()
    {
        return $this->total();
    }

}
