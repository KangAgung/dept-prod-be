<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'm_barang';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama','harga','stok'
    ];

    public function sales()
    {
        return $this->belongsToMany(Sales::class,'t_sales_det','barang_id','sales_id')
            ->withPivot('harga_bandrol', 'qty', 'diskon_pct', 'diskon_nilai', 'harga_diskon', 'total');
    }
}
