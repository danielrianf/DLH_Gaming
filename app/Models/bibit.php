<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Http\Controllers\bibitController;

class bibit extends Model
{
    use HasFactory;
    use Sortable;

    protected $primaryKey = 'id';
    protected $fillable = [
        'kode',
        'nama_bibit',
        'modal',
        'harga',
        'satuan',
        'stok',
    ];

    public $sortable = [
        'kode','nama_bibit','modal','harga','satuan','stok',
    ];

    public function suratjln(){
        return $this->hasMany(suratjln::class);
    }
}

