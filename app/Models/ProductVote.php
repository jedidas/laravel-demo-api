<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVote extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'product_votes';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['vote', 'user_id', 'product_id'];
    // protected $hidden = [];
    // protected $dates = [];
    protected $casts = [
        'vote' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function getByProductId(int $id)
    {
        return $this->where('product_id', $id)->get();
    }

    public function show(int $id)
    {
        return $this->where('id', $id)->firstOrFail();
    }

    public function getUserLoggedInVotes($userId, $id)
    {
        return $this->where('user_id', $userId)->where('product_id', $id)->count() >= 1 ? true : false;
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
