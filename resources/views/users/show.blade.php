@extends('layouts.app')

@section('content')
<div class="w-full flex xs:flex-col sm:flex-col md:flex-row">
    <div class="md:w-1/4 mr-8 xs:w-full">
        @if ($user->avatar_path)
            <avatar
                :user="{{ json_encode(auth()->user()) }}"
                with-name
                large
                color="dark"
                class="mb-6"
            ></avatar>
        @endif

        <p>User bio goes here.</p>

        <ul class="list-none text-sm text-gray-600 inline-flex">
            <li class="mr-6">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="comment" class="inline-block mr-1 fill-current h-4 w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M256 32C114.6 32 0 125.1 0 240c0 49.6 21.4 95 57 130.7C44.5 421.1 2.7 466 2.2 466.5c-2.2 2.3-2.8 5.7-1.5 8.7S4.8 480 8 480c66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 141.4 0 256-93.1 256-208S397.4 32 256 32z"></path>
                </svg>
                14
            </li>
            <li>
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-friends" class="inline-block mr-1 fill-current h-4 w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                    <path fill="currentColor" d="M192 256c61.9 0 112-50.1 112-112S253.9 32 192 32 80 82.1 80 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C51.6 288 0 339.6 0 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zM480 256c53 0 96-43 96-96s-43-96-96-96-96 43-96 96 43 96 96 96zm48 32h-3.8c-13.9 4.8-28.6 8-44.2 8s-30.3-3.2-44.2-8H432c-20.4 0-39.2 5.9-55.7 15.4 24.4 26.3 39.7 61.2 39.7 99.8v38.4c0 2.2-.5 4.3-.6 6.4H592c26.5 0 48-21.5 48-48 0-61.9-50.1-112-112-112z"></path>
                </svg>
                4
            </li>
        </ul>
    </div>
    <div class="md:w-3/4 xs:w-full">
        Text
    </div>
</div>
@endsection