<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Http\Controllers\projectController;

class project extends Model
{
    use HasFactory;
    use Sortable;

    protected $primaryKey = 'id';
    protected $fillable = [
        'kode',
        'nama_project',
        'sub_project',
        // 'harga',
        // 'satuan',
        // 'stok',
    ];

    public $sortable = [
        'kode','nama_project','sub_project',
        // 'harga','satuan','stok',
    ];

    public function suratjln(){
        return $this->hasMany(suratjln::class);
    }
}

