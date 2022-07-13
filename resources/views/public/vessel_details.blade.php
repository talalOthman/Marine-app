@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 table-container">
            <div class="table-responsive table-position">
                <table id="datatablesSimple" class="display table table-striped table-hover" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Vessel MMSI</th>
                            <th>Vessel Channel</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vessels as $vessel)
                        <tr>
                            <td>{{$vessel->MMSI}} </td>
                            <td>{{$vessel->ais_channel}} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection