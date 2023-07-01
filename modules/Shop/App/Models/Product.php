<?php

namespace Modules\Shop\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static $listExceptColumns = [
        'summery',
    ];

    public static $formExceptColumns = [
        'user_id',
    ];

    public static $formEditorColumns = [
        'summery',
    ];

}
