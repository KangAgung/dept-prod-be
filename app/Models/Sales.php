<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 't_sales';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tgl','subtotal','diskon', 'ongkir', 'total_bayar', 'jumlah_barang'
    ];

    public function barang()
    {
        return $this->belongsToMany(Barang::class,'t_sales_det','sales_id','barang_id')
            ->withPivot('harga_bandrol', 'qty', 'diskon_pct', 'diskon_nilai', 'harga_diskon', 'total');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'cust_id');
    }
}
