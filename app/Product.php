<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    const UNAVAILABLE_PRODUCT = 0;
    const AVAILABLE_PRODUCT = 1;
    use SoftDeletes;
}
