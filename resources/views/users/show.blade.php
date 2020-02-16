@extends('layouts.app')

@section('content')
<div class="mx-auto w-2/3">

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-header">
                <div class="card-title">Profile</div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
    </form>

    <form action="{{ route('users.avatars.store', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="card">
            <div class="card-header">
                <div class="card-title">Photo</div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    @if ($user->avatar_path)
                        <label for="avatar">
                            <img src="{{ asset($user->avatar_path) }}" class="h-16 w-16 mb-6 rounded-full border-gray-500 border shadow">
                        </label>
                    @endif

                    <label>Select an Image</label>
                    <input type="file" id="avatar" name="avatar" class="form-control" accept=".png,.jpg,.jpeg" required>
                </div>

                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </div>

    </form>

    <form action="{{ route('users.update_password', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-header">
                <div class="card-title">Change Password</div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Current Password</label>
                    <input type="password" name="current_password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>

        </div>
    </form>


</div>
@endsection