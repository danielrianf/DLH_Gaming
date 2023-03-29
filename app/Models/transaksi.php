<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class transaksi extends Model
{
  use HasFactory;
  use Sortable;

  protected $table = "transaksis";
  protected $primaryKey = 'id';
  protected $fillable = [
    'tanggal_transaksi',
    'pelanggan_id',
    'status',
    // 'invoice',
    // 'total_harga',
    // 'diskon',
    // 'ongkir',
    // 'dp',
  ];

  public $sortable = [
    'tanggal_transaksi', 'nama_pelanggan', 'status',
  ];

  public function pelanggan()
  {
    return $this->belongsTo(pelanggan::class, 'pelanggan_id')->withDefault([
      'nama_pelanggan' => 'Guest',
    ]);
  }

  public function detail_transaksi()
  {
    return $this->hasMany(detailtran::class);
  }

  public function hapus_transaksi()
  {
    $this->detail_transaksi()->delete();
    $this->delete();
    return parent::delete();
  }

}
