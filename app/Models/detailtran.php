<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class detailtran extends Model
{
    use HasFactory;
    protected $table ="detailtrans";
    protected $primaryKey = 'id';
    protected $fillable = [
       'bibit_id',
       'transaksi_id',
       'harga_jual',
       'jumlah',
       'diskon',
       'sub_total',
    ];
    public function bibit(){
        return $this->belongsTo(bibit::class);
    }

    public function transaksi(){
        return $this->belongsTo(transaksi::class);
    }

}
