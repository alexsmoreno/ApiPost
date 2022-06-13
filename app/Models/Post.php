<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable =[
        'posts',
        'id_users'
    ];

    protected $hidden =[
        'id_users'
    ];
    //protected $with = ['responses'];


    public function user(){
        return $this->belongsTo(User::class,'id_users');
    }

    public function responses(){
        return $this->hasMany(Response::class, 'id_posts','id');
    }

}
