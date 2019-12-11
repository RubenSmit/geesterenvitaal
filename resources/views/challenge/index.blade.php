@extends('layouts.public')

@section('title', 'Uitdagingen')

@section('content')
    <main class="challenge-index">
        <header class="header-map">
            <div id="challenge-map">
                <h1 class="header-title"><span class="fa fa-route"></span> uitdagingen</h1>
            </div>
        </header>

        <div class="link-bar">
            <div class="container">
                <a href="{{url('/uitdaging')}}" class="{{$current_category == null ? "active" : "" }}">alles</a>
                @foreach($categories as $category)
                    <a href="{{url('/uitdaging/categorie/'.$category->name)}}"
                       class="{{$current_category == $category->name ? "active" : "" }}">{{$category->name}}</a>
                @endforeach
            </div>
        </div>

        <div class="container challenges">
            @foreach ($challenges as $challenge)
                <div class="challenge">
                    <a href="/uitdaging/{{$challenge->id}}">
                        <div class="challenge-image" style="background-image: url('{{$challenge->image_path}}')">
                            <div class="challenge-overlay">
                                <h2 class="challenge-title">{{$challenge->title}}</h2>
                                <small class="challenge-subtitle">{{$challenge->category->name}}</small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
        <script>
            map = new OpenLayers.Map("challenge-map");
            map.addLayer(new OpenLayers.Layer.OSM({opague: true}));

            var lonLat = new OpenLayers.LonLat(6.735821, 52.421073)
                .transform(
                    new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
                    map.getProjectionObject() // to Spherical Mercator Projection
                );

            var zoom = 12;

            var markers = new OpenLayers.Layer.Markers("Markers");
            map.addLayer(markers);

            var challenges = JSON.parse('{!! $challenges->toJson() !!}');

            challenges.forEach(challenge => {
                var lonLat = new OpenLayers.LonLat(challenge.longitude, challenge.latitude)
                    .transform(
                        new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
                        map.getProjectionObject() // to Spherical Mercator Projection
                    );
                var marker = new OpenLayers.Marker(lonLat);
                markers.addMarker(marker);
                marker.events.register( 'click', markers, function (event) {
                    window.open("{{url('uitdaging')}}/" + challenge.id);
                    OpenLayers.Event.stop(event);
                });
            });

            map.setCenter(lonLat, zoom);
        </script>
    </main>
@endsection
