<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //Relacionando Author a perfis, chave estrangeira 1-1
    public function profile() {
        return $this->hasOne('App\Profile');
    }
}
