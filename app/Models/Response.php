<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    protected $fillable =[
        'responses',
        'id_posts'
    ];

    public function post(){
        return $this->belongsTo(Post::class, 'id_posts');
    }


}
