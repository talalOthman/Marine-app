@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 table-container">
            <div class="table-responsive table-position">
                <table id="datatablesSimple" class="display table table-striped table-hover" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            <th>Username</th>
                            <th>Usertype</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>

                            @if($user->has_image == false)
                            <td><img class="admin-img" src="{{ asset('images/default.jpeg') }}" alt="{{ $user->name}}" onerror="this.src='/images/default.jpeg';" class="profile-pic"></td>
                            @else
                            <td><img class="admin-img" src="{{ asset('images/avatars/'.$user->avatar) }}" alt="{{ $user->name}}" onerror="this.src='/images/default.jpeg';" class="profile-pic"></td>
                            @endif
                            <td>{{$user->userName}} </td>
                            <td>{{$user->userType}} </td>
                            <td> <a href="#deleteModal_{{$user->id}}" id="trigger-btn" class="trigger-btn" data-toggle="modal"><i class="fas fa-times-circle fa-lg action"></i></a>
                                <a href="{{route('admin.update-specific-account', $user->id)}}"><i class="fas fa-user-edit fa-lg action"></i></a>
                            </td>
                        </tr>
                        <!-- Delete Modal -->
                        <div id="deleteModal_{{$user->id}}" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header flex-column">
                                        <div class="icon-box">
                                            <i class="material-icons theme-color">&#xE5CD;</i>
                                        </div>
                                        <h4 class="modal-title w-100">Are you sure?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you really want to delete this user? This process cannot be undone.</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <a href="{{route('admin.delete-user', $user->id)}}"class="btn btn-danger button" id="delete-button">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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