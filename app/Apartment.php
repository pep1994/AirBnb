<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
  // collegamento alla tabella apartments
    protected $table = 'apartments';

    // collegamento molti a uno con tabella user
    public function user(){
      return $this -> belongsTo(User::class);
    }

    // collegamento uno a molti con la tabella message
    public function messages(){
      return $this -> hasMany(Message::class);
    }

    // collegamento uno a molti con la tabella preferences
    public function preferences(){
      return $this ->hasMany(Preference::class);
    }

    // collegamento molti a molti con la tabella sponsor
    public function sponsors(){
      return $this -> belongsToMany(Sponsor::class);
    }

    // collegamento molti a molti con la tabella sponsor
    public function optionals(){
      return $this -> belongsToMany(Optional::class);
    }

    // collegamento uno a molti con la tabella message
    public function photos(){
      return $this ->hasMany(Photo::class);
    }

    // collegamento uno a molti con la tabella message
    public function views() {
      return $this->hasMany(View::class);
    }
}
