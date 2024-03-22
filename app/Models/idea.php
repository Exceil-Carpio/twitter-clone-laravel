<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class idea extends Model
{
    use HasFactory;

    protected $table = 'ideas';

    protected $fillable = [
        'user_id',
        'content',
        'likes'
    ];

    public function comments(){
        return $this->hasMany(comments::class)->orderBy('updated_at', 'DESC');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
