@extends('layouts.main')

@section('content')
<div class="map-container">
            <div id="map" class="map-item"></div>
    </div>
</div>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/leaflet-heat.js') }}" defer></script>
<script src="{{ asset('js/density-of-traffic.js') }}" defer></script>
@endsection