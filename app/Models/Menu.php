<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'position',
        'url',
    ];

    public static $formExceptColumns = [
        'user_id',
    ];

    function getMenuidArrayAttribute() {
        $menus = Menu::all();
        $ret = [];
        foreach( $menus as $menu ) {
            $ret[ $menu->id ] = $menu->title.' ('.$menu->positionTitle.')';
        }

        return $ret;
    }

    function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    function getDateAttribute() {
        return new \Carbon\Carbon( $this->created_at );
    }

    function getLinkAttribute() {
        return url('/').'/'.$this->url;
    }   

    function getPositionTitleAttribute() {
        return @$this->positions[ $this->position ];
    }
    
    function getPositionArrayAttribute() {
        return $this->positions;
    }

    function getPositionsAttribute() {
        $place = 1;
        return [
            $place++ => __('Top'),
            $place++ => __('TopCenter'),
            $place++ => __('Right'),
            $place++ => __('Left'),
            $place++ => __('Bottom'),
            $place++ => __('Footer'),
        ];
    }

}
