<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="brighton, motorbike bays, parking bays, motorbike parking">
        <meta name="description" content="Brighton and Hove City motorcycle parking bay locations">

        <title>Brighton Motorbike Bays</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.css') }}" />
    </head>
    <body>

      <div id="map"></div>
      <div class="link">Brighton & Hove Motorcyle Parking Bays | <small>Contribute at <a href="https://github.com/NetStorm84/BrightonMotorbikeBays">GitHub</a></small></div>
      <script>

        var bays = [];
        var bounds = {
          north: {{$bounds['maxLat']}},
          east: {{$bounds['maxLng']}},
          south: {{$bounds['minLat']}},
          west: {{$bounds['minLng']}},
        }

        @foreach ($bays as $bay)
          bay = {
            streetname:"{{ $bay->street_name }}",
            latitude:"{{ $bay->latitude }}",
            longitude:"{{ $bay->longitude }}",
            image:"{{ empty($bay->image_path) ? "https://maps.googleapis.com/maps/api/streetview?size=400x200&location=" . $bay->latitude . "," . $bay->longitude . "&fov=200&pitch=-12&key=AIzaSyBXc6JH3MWTaI7mLHU_lZjJmhxPgKokmp8" : '/images/' . $bay->image_path }}",
            secure: Boolean({{ $bay->secure }})
          };
          bays.push(bay);
        @endforeach

      </script>
      <script async defe
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBN6WsRsmwEByiOdHOgQY0u9nW75KqPrOc&callback=initMap">
      </script>
      <script type="text/javascript" src="{{ URL::asset('js/map.js') }}"></script>
    </body>
</html>
