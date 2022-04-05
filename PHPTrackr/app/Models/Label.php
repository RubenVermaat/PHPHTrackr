<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Label extends Model
{
    use Sortable;

    protected $fillable = [
        'id',
        'packageId',
        'status'
    ];
    public $sortable = [
        'id',
        'packageId',
        'status'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
