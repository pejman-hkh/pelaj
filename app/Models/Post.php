<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Route;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'user_id',
        'note',
    ];

    public static $listExceptColumns = [
        'note',
        'shortnote',
    ];

    public static $formExceptColumns = [
        'user_id',
    ];

    public static $formEditorColumns = [
        'note',
        'shortnote',
    ];

    function getListTitleAttribute() {
        return $this->title;
    }

    function getEnableCommentsTitleAttribute() {
        return $this->enableCommentsArray[ $this->enableComments ];
    }

    function getStatusTitleAttribute() {
        return $this->statusArray[ $this->status ];
    }

    function getEnableCommentsArrayAttribute() {
        return [
            __('Active'),
            __('Deactive'),
        ];
    }

    function getStatusArrayAttribute() {
        return [
            __('Hidden'),
            __('Published'),
        ];
    }

    function getCatidArrayAttribute() {
        $cats = Cat::all();
        $ret = [];
        foreach( $cats as $cat ) {
            $ret[ $cat->id ] = $cat->title;
        }

        return $ret;
    }

    function getCommentsAttribute() {
        return Comment::where('post_id', $this->id)->paginate(5);

        //return $this->hasMany(Comment::class, 'post_id','id');
    }

    function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    function cat(): BelongsTo {
        return $this->belongsTo(Cat::class);
    }

    function getDateAttribute() {
        return new \Carbon\Carbon( $this->created_at );
    }

    function getLinkAttribute() {
        if( Route::has( $this->url ) ){
            return url('/').'/post/'.$this->id;
        }

        return $this->url?url('/').'/'.$this->url:url('/').'/post/'.$this->id;
    }
}
