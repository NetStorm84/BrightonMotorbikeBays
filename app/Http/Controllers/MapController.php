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
        $maxLng = $bay->longitude > $maxLng? $bay->longitude: $maxLng;
        $maxLat = $bay->latitude > $maxLat? $bay->latitude: $maxLat;
        $minLng = $bay->longitude < $minLng? $bay->longitude: $minLng;
        $minLat = $bay->latitude < $minLat? $bay->latitude: $minLat;
      }

      return compact("maxLat", "maxLng", "minLat", "minLng");
    }
}
