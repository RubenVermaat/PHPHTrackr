<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Package extends Model
{
    use Sortable;
    protected $fillable = [
        'id',
        'webshopName',
        'email',
        'firstname',
        'surname',
        'homeDelivery',
        'city',
        'street',
        'housenumber'
    ];
    public $sortable = [
        'id',
        'webshopName',
        'email',
        'firstname',
        'surname'
    ];
}
