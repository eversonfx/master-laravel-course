<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /*
    Função e par da outra chamada 'comments' na model
    BlogPost, serve para estabelecer a relação'

    Irá procurar por: Snake case + id
    blog_post_id
    */

    public function blogPost()
    {
    //    return $this->belongsTo('App\BlogPost','post_id', 'blog_post_id'); 
       return $this->belongsTo('App\BlogPost'); 
    }
}
