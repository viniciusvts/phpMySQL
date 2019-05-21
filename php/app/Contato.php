<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    public function lista()
    {
        return [
            ["nome"=>"Luciano", "tel"=>"7199283928"]
        ];
    }
}
