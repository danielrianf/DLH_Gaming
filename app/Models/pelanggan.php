<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class pelanggan extends Model
{
    use HasFactory;
    use Sortable;

    protected $table ="pelanggans";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_pelanggan',
        'alamat',
        'email',
        'no_telp',
    ];

    public $sortable = [
        'nama_pelanggan','alamat','email','no_telp',
    ];

    public function transaksi(){
        return $this->hasMany(transaksi::class);
    }

    public function suratjln(){
        return $this->hasMany(suratjln::class);
    }
}
