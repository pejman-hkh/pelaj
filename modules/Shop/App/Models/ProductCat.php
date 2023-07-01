<?php

namespace Modules\Shop\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCat extends Model
{
    use HasFactory;

    public static $formExceptColumns = [
        'user_id',
    ];
}
