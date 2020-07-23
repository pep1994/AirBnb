<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Preference;
use DB;

class FilterController extends Controller {

    protected function findNearestHouse($latitude, $longitude, $radius = 20) {
        $apartments = DB::table('apartments') -> selectRaw("id, title, description, price, room_number, bath_number, beds, address, image, latitude, longitude, user_id ,
                         ( 6371 * acos( cos( radians(?) ) *
                           cos( radians( latitude ) )
                           * cos( radians( longitude ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( latitude ) ) )
                         ) AS distance", [$latitude, $longitude, $latitude])
        ->having("distance", "<", $radius)
        ->orderBy("distance",'asc')
        ->get();

        return $apartments;
    }

    public function filterCheckbox(Request $request) {

    $preferences = Preference::all();
    $apartments = Apartment::all();
    $latitude = $request -> latitude;
    $longitude = $request -> longitude;
    $radius = $request -> distance;
    $optionals_request = $request -> optionals;
    $beds_request = $request -> beds;
    $rooms_request = $request -> rooms;
    $filter_apartments = [];
    $id_optionals = [];
    $apartments_radius_filter = [];
    $apartments_complete_filter = [];
    $apartments_final_filter = [];


    if (isset($optionals_request)) {
        //  filtro checkbox
        foreach ($apartments as $apartment) {
            $id_optionals = [];
            foreach ($apartment -> optionals as $optional) {
                $id_optionals[] = $optional -> id;
            }

            $comune_array = array_intersect($optionals_request, $id_optionals);

            if ($comune_array == $optionals_request) {
                $filter_apartments[] = $apartment;
            }
        }
    }

    // filtro distanza
    $apartments_radius = $this -> findNearestHouse($latitude, $longitude, $radius);


        // filtro distanza con filtro checkbox
        foreach ($apartments_radius as $apartment_radius) {
            if (!isset($optionals_request)) {
                $apartments_radius_filter[] = $apartment_radius;
            }
            foreach ($filter_apartments as $filter_apartment) {

                if ($apartment_radius -> id === $filter_apartment -> id) {
                    $apartments_radius_filter[] = $apartment_radius;
                }

            }
          }


        // filtro appartamneti per numero letti
       if ($beds_request) {
           $apartments_beds = Apartment::where('beds', '>=', $beds_request)->get();
       } else {
           $apartments_beds = [];
       }

        foreach ($apartments_radius_filter as $apartment_filter) {
            if (!$beds_request) {
                $apartments_complete_filter[] = $apartment_filter;
            }
            foreach ($apartments_beds as $apartment_beds) {

                if ($apartment_filter -> id === $apartment_beds -> id) {

                    $apartments_complete_filter[] = $apartment_filter;
                }
            }
        }

        // filtro appartamneti per numero stanze
       if ($rooms_request) {
            $apartments_rooms = Apartment::where('room_number', '>=', $rooms_request)->get();
        } else {
            $apartments_rooms = [];
        }

        foreach ($apartments_complete_filter as $apartment_complete) {
            if (!$rooms_request) {
                $apartments_final_filter[] = $apartment_complete;
            }
            foreach ($apartments_rooms as $apartment_rooms) {

                if ($apartment_complete -> id === $apartment_rooms -> id) {

                    $apartments_final_filter[] = $apartment_complete;
                }
            }
        }

     return response()->json([
         'data' => $apartments_final_filter,
         'preferences' => $preferences
     ], 200);

    }
}
