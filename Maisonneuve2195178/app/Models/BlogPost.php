<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'user_id','categorie_id'];

    public function blogHasUser(){
         return $this->hasOne('App\Models\User','id','user_id');//id appartient User, user
    }

    public function selectBlog($id){
        $query = BlogPost::Select('body','users.name')
        ->JOIN('users', 'blog_posts.user_id', '=', 'users.id')
        ->where('blog_posts.id',$id)
        ->get();
        return $query;

    }

}
