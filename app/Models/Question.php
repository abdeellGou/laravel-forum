<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Question extends Model
{
    use HasFactory;
    
    protected $fillable = ['title','body'];

    //set relation between Model Question And User
    public function user() : BelongsTo
    { 
        return $this->belongsTo(
            \App\Models\User::class,
            'by_user_id'
        );
    } 
    
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
