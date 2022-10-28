<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'm_customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','telp'
    ];

    public function sales()
    {
        return $this->hasMany(Sales::class, 'cust_id');
    }
}
