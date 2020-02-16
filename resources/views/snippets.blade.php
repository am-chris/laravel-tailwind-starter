@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="flex flex-row justify-between mb-8">
        <div>
            <input type="text" class="bg-white text-gray-800 w-64 shadow text-sm py-3 px-3 rounded" placeholder="Search Components">
        </div>

        <div>
            <a href="{{ route('snippets.create') }}" class="bg-indigo-600 text-white py-2 px-3 rounded text-sm">
                Add Snippet
            </a>
        </div>
    </div>

    <div class="flex flex-row">
        @foreach ($snippets as $snippet)
            <a href="{{ route('snippets.show', $snippet->id) }}" class="block bg-white w-64 shadow rounded">
                <div class="px-4 pt-4 pb-3">
                    <span class="font-semibold">{{ $snippet->name }}</span>
                </div>
                <div class="px-4 py-1">
                    <img src="https://placehold.it/300x150" />
                </div>
                <div class="px-4 pt-4 pb-5">
                    <span class="bg-gray-200 text-gray-600 px-2 py-1 rounded text-xs">{{ $snippet->type }}</span>
                    
                    @if ($snippet->html)
                        <span class="bg-gray-200 text-gray-600 px-2 py-1 rounded text-xs">html</span>
                    @endif

                    @if ($snippet->css)
                        <span class="bg-gray-200 text-gray-600 px-2 py-1 rounded text-xs">css</span>
                    @endif

                    @if ($snippet->scss)
                        <span class="bg-gray-200 text-gray-600 px-2 py-1 rounded text-xs">scss</span>
                    @endif

                    @if ($snippet->vue)
                        <span class="bg-gray-200 text-gray-600 px-2 py-1 rounded text-xs">vue</span>
                    @endif

                    @if ($snippet->react)
                        <span class="bg-gray-200 text-gray-600 px-2 py-1 rounded text-xs">react</span>
                    @endif
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection