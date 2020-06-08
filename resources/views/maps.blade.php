<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="motorcycle bays, brighton, motorbike bays, parking bays, motorbike parking, brighton cycle hubs, bicycle hubs, bike share">
        <meta name="description" content="Brighton and Hove City motorcycle parking bay & Cycle hub locations">
        
        <meta name="og:title" content="Brighton motorbike bays & cycle hubs">
        <meta name="og:type" content="website">
        <meta name="og:url" content="http://brightonbikebays.maenificent.com">
        <meta name="og:image" content="images/brighton-motorbikes.jpg">

        <title>Brighton Motorbike Bays & Cycle Hubs</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.css') }}" />
    </head>
    <body>

      <div id="map"></div>
      <div class="link">Brighton & Hove Motorcyle Parking Bays | Cycle Hubs | <small>Contribute at <a href="https://github.com/NetStorm84/BrightonMotorbikeBays">GitHub</a></small></div>
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
            image: "https://maps.googleapis.com/maps/api/streetview?size=400x200&location={{$bay->latitude}},{{$bay->longitude}}&fov=200&pitch=-12&key=AIzaSyBXc6JH3MWTaI7mLHU_lZjJmhxPgKokmp8",
            secure: Boolean({{ $bay->secure }}),
            type: {{$bay->bay_type}}
          };
          bays.push(bay);
        @endforeach

      </script>
      <script async defe
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBN6WsRsmwEByiOdHOgQY0u9nW75KqPrOc&callback=initMap">
      </script>
      <script type="text/javascript" src="{{ URL::asset('js/map.js') }}"></script>
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-102512326-1', 'auto');
        ga('send', 'pageview');

      </script>
    </body>
</html>
