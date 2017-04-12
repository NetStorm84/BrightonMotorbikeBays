<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bay;
use DB;

class MapController extends Controller
{
    function listMarkers(){

      $bays = Bay::all();
      $bounds = $this->getBounds($bays);

      return view('maps', compact('bays', 'bounds'));
    }

    function getBounds($bays){

      $maxLng = -181;
      $maxLat = -91;
      $minLng = 181;
      $minLat = 91;

      foreach ($bays as $bay) {
        $maxLng = $bay->longitude != "" ? $bay->longitude > $maxLng? $bay->longitude: $maxLng: $maxLng;
        $maxLat = $bay->latitude != "" ? $bay->latitude > $maxLat? $bay->latitude: $maxLat: $maxLat;
        $minLng = $bay->longitude != "" ? $bay->longitude < $minLng? $bay->longitude: $minLng: $maxLng;
        $minLat = $bay->latitude != "" ? $bay->latitude < $minLat? $bay->latitude: $minLat : $maxLat;
      }

      return compact("maxLat", "maxLng", "minLat", "minLng");
    }
}
