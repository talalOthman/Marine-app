@extends('layouts.main')

@section('content')
<div class="container-generate-report">
    <div class="row justify-content-center">
        <div>
            <div class="main-container">
                <i class="fas fa-file-download icon fa-10x"></i>
                <form action="{{ route('generate-report') }}">
                    <button class="btn btn-primary button-item" id="generate-btn">
                        {{ __('Generate Report') }}
                    </button>
                </form>

                <!-- <a class="btn btn-primary button-item button" href="Abnormal/AbnormalVesselList.csv" download="Generated Report">
                    {{ __('Generate Report') }}
                </a> -->
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script> -->


@endsection