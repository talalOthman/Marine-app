@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('SuccessMessage'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('SuccessMessage') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(session()->has('ErrorMessage'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('ErrorMessage') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div id="dropzone">
                <form class="dropzone needsclick dropzone-container" id="demo-upload" action="/upload">
                    <i class="fas fa-cloud-upload-alt icon fa-7x"></i>
                    <div class="dz-message needsclick text-container">
                        <h4 class="text-drag">Drag & Drop to Upload File</h4>
                        <h4 class="text-or">OR</h4>
                        <button class="browse-file-btn btn btn-primary button-item">Browse File</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection