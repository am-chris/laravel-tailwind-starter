@extends('layouts.app')

@section('content')
<div class="mx-auto md:w-2/3 sm:w-full">

    <h1>Settings</h1>

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
                            <avatar
                                :user="{{ json_encode(auth()->user()) }}"
                                large
                                class="mb-6"
                            ></avatar>
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

    <div class="card">
        <div class="card-header">
            <div class="card-title">Login History</div>
        </div>

        <div class="card-body">
            <div class="overflow-y-auto h-64 max-h-full mb-8">
                <table class="table w-full text-left">
                    <thead class="font-semibold text-gray-700 uppercase text-xs">
                        <th class="py-4 px-4">Operating System</th>
                        <th class="py-4 px-4">Browser</th>
                        <th class="py-4 px-4">IP Address</th>
                    </thead>
                    <tbody>
                        @foreach ($user->loginHistory as $loginHistory)
                            <tr>
                                <td class="py-4 px-4 text-sm">
                                    {{ $loginHistory->operating_system }}
                                </td>
                                <td class="py-4 px-4 text-sm">
                                    {{ $loginHistory->browser }}
                                </td>
                                <td class="py-4 px-4 text-sm">
                                    {{ $loginHistory->ip_address }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <form action="{{ route('users.logout_other_devices', $user->id) }}" method="POST">
                @csrf

                <p>If you notice a suspicious login, log your account out from all other devices by completing the form below. After you do that, you should change your password.</p>

                <div class="form-group">
                    <label for="password">Current Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-warning">Logout Other Devices</button>
            </form>
            
        </div>
    </div>


</div>
@endsection