@extends('layouts.app')

@section('content')
<div class="w-full">

    <h4>Avatars</h4>
    <div class="flex mb-16">
        <div class="">
            <p class="text-gray-600 text-sm"><i>With photo</i></p>
            <div class="flex">
                <div>
                    <avatar
                        :user="{{ json_encode(auth()->user()) }}"
                        large
                        color="light"
                        class="mr-4"
                    ></avatar>
                </div>
                <div>
                    <avatar
                        :user="{{ json_encode(auth()->user()) }}"
                        medium
                        color="light"
                        class="mr-4"
                    ></avatar>
                </div>
                <div>
                    <avatar
                        :user="{{ json_encode(auth()->user()) }}"
                        small
                        color="light"
                    ></avatar>
                </div>
            </div>
        </div>

        <div class="ml-16">
            <p class="text-gray-600 text-sm"><i>No photo - Light</i></p>
            <div class="flex">
                <div>
                    <avatar
                        large
                        color="light"
                        class="mr-4"
                    ></avatar>
                </div>
                <div>
                    <avatar
                        medium
                        color="light"
                        class="mr-4"
                    ></avatar>
                </div>
                <div>
                    <avatar
                        small
                        color="light"
                    ></avatar>
                </div>
            </div>
        </div>

    </div>

    <h4>Avatars with Text</h4>
    <div class="mt-6 mb-16">
        <div class="flex">
            <div class="mr-8 w-48">
                <p class="text-gray-600 text-sm"><i>Large</i></p>
                <avatar 
                    :user="{{ json_encode(auth()->user()) }}"
                    large
                    with-name
                    subtext="Feb. 29, 2020"
                    color="dark"
                ></avatar>
            </div>

            <div class="mr-8 w-48">
                <p class="text-gray-600 text-sm"><i>Medium</i></p>
                <avatar 
                    :user="{{ json_encode(auth()->user()) }}"
                    medium
                    with-name
                    subtext="Feb. 29, 2020"
                    color="dark"
                    class="mr-8 w-48"
                ></avatar>
            </div>

            <div class="mr-8 w-48">
                <p class="text-gray-600 text-sm"><i>Small</i></p>
                <avatar 
                    :user="{{ json_encode(auth()->user()) }}"
                    small
                    with-name
                    subtext="Feb. 29, 2020"
                    color="dark"
                    class="w-48"
                ></avatar>
            </div>

        </div>

        <div class="flex mt-8">
            <avatar 
                :user="{{ json_encode(\App\User::where('id', 2)->first()) }}"
                large
                with-name
                subtext="Feb. 29, 2020"
                color="dark"
                class="mr-8 w-48"
            ></avatar>

            <avatar 
                :user="{{ json_encode(\App\User::where('id', 2)->first()) }}"
                medium
                with-name
                subtext="Feb. 29, 2020"
                color="dark"
                class="mr-8 w-48"
            ></avatar>

            <avatar 
                :user="{{ json_encode(\App\User::where('id', 2)->first()) }}"
                small
                with-name
                subtext="Feb. 29, 2020"
                color="dark"
                class="w-48"
            ></avatar>
        </div>
    </div>

    <h4>Dropdowns</h4>
    <div class="flex mb-48">
        <div class="mr-48">
            <p class="text-sm text-gray-600"><i>Left Dropdown</i></p>
            <dropdown position="left" always-visible>
                <avatar 
                    :user="{{ json_encode(auth()->user()) }}"
                    small
                    with-name
                    subtext="Feb. 29, 2020"
                    color="dark"
                ></avatar>
                
                <template v-slot:dropdown-items>
                    <li class="pt-1">
                        <a href="#" class="text-gray-800 py-3 px-4 block hover:bg-gray-200 hover:rounded">
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-800 py-3 px-4 block hover:bg-gray-200 hover:rounded">
                            Settings
                        </a>
                    </li>
                    <li class="pb-1">
                        <a href="#" class="text-gray-800 py-3 px-4 block hover:bg-gray-200 hover:rounded">
                            Logout
                        </a>
                    </li>
                </template>
            </dropdown>
        </div>
        <div>
            <p class="text-sm text-gray-600"><i>Right Dropdown</i></p>
            <dropdown position="right" always-visible>
                <avatar 
                    :user="{{ json_encode(auth()->user()) }}"
                    small
                ></avatar>
                
                <template v-slot:dropdown-items>
                    <li class="pt-1">
                        <a href="#" class="text-gray-800 py-3 px-4 block hover:bg-gray-200 hover:rounded">
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-800 py-3 px-4 block hover:bg-gray-200 hover:rounded">
                            Settings
                        </a>
                    </li>
                    <li class="pb-1">
                        <a href="#" class="text-gray-800 py-3 px-4 block hover:bg-gray-200 hover:rounded">
                            Logout
                        </a>
                    </li>
                </template>
            </dropdown>
        </div>
    </div>

    <h4>Buttons</h4>
    <div class="mb-8">
        
        <div class="flex items-center mb-5">
            <p class="text-gray-700 mr-5 mb-0 font-semibold w-24">Primary</p>
            <div class="mr-5">
                <button type="button" class="btn btn-lg btn-primary">large</button>
            </div>
            <div class="mr-5">
                <button type="button" class="btn btn-primary">medium</button>
            </div>
            <div class="mr-5">
                <button type="button" class="btn btn-sm btn-primary">small</button>
            </div>
            <div class="mr-5">
                <button type="button" class="btn btn-xs btn-primary">x-small</button>
            </div>
        </div>

        <div class="flex items-center mb-5">
            <p class="text-gray-700 mr-5 mb-0 font-semibold w-24">Success</p>
            <div class="mr-5">
                <button type="button" class="btn btn-lg btn-success">large</button>
            </div>
            <div class="mr-5">
                <button type="button" class="btn btn-success">medium</button>
            </div>
            <div class="mr-5">
                <button type="button" class="btn btn-sm btn-success">small</button>
            </div>
            <div class="mr-5">
                <button type="button" class="btn btn-xs btn-success">x-small</button>
            </div>
        </div>

        <div class="flex items-center mb-5">
            <p class="text-gray-700 mr-5 mb-0 font-semibold w-24">Warning</p>
            <div class="mr-5">
                <button type="button" class="btn btn-lg btn-warning">large</button>
            </div>
            <div class="mr-5">
                <button type="button" class="btn btn-warning">medium</button>
            </div>
            <div class="mr-5">
                <button type="button" class="btn btn-sm btn-warning">small</button>
            </div>
            <div class="mr-5">
                <button type="button" class="btn btn-xs btn-warning">x-small</button>
            </div>
        </div>

        <div class="flex items-center mb-5">
            <p class="text-gray-700 mr-5 mb-0 font-semibold w-24">Danger</p>
            <div class="mr-5">
                <button type="button" class="btn btn-lg btn-danger">large</button>
            </div>
            <div class="mr-5">
                <button type="button" class="btn btn-danger">medium</button>
            </div>
            <div class="mr-5">
                <button type="button" class="btn btn-sm btn-danger">small</button>
            </div>
            <div class="mr-5">
                <button type="button" class="btn btn-xs btn-danger">x-small</button>
            </div>
        </div>
        
    </div>

    
</div>
@endsection