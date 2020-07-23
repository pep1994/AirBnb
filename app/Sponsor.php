<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
  // collegamento alla tabella sponsors
  protected $table = 'sponsors';

  // collegamento molti a molti con la tabella apartment
  public function apartments(){
    return $this -> belongsToMany(Apartment::class);

  }
}
