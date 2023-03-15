<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class suratjln extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = "suratjlns";
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_suratjln',
        'tanggal_kirim',
        'pelanggan_id',
        'bibit_suratjln',
        'qty',
        'satuan_suratjln',
        'keterangan'
    ];

    public $sortable = [
        'no_suratjln','tanggal_kirim','pelanggan_id', 'bibit_suratjln', 'qty',
        'satuan_suratjln', 'keterangan',
    ];

    public function pelanggan(){
      return $this->belongsTo(pelanggan::class);
  }

//     public function bibit(){
//       return $this->belongsTo(bibit::class);
//   }
}
