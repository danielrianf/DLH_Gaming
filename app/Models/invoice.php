<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class invoice extends Model
{
    use HasFactory;
    use Sortable;

    protected $primaryKey = 'id';
    protected $fillable = [
    ];
}
