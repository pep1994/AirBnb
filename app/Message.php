<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // collegamento alla tabella messages
    protected $table = 'messages';

    // collegamento molti a uno con tabella Apartment
    public function apartment(){
      return $this -> belongsTo(Apartment::class);

    }
}
