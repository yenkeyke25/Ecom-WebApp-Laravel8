<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $fillable = [
        'brand_name', 'brand_logo'
    ];
}
