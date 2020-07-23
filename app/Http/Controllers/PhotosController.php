<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Apartment;
use Storage;
use DB;

class PhotosController extends Controller
{
    // funzione per cancellare la foto selezionata
  public function delete($id) {
    $this->checkSponsor();
    $photo = Photo::findOrFail($id);
    $photo -> delete();
    Storage::disk('public') -> delete($photo -> img_path);

    return redirect() -> route('edit', $photo -> apartment -> id);
  }

  public function checkSponsor() {
    DB::table('apartment_sponsor')->where('expire_data', '<=', date('Y-m-d H:i:s'))->delete();
  }
}
