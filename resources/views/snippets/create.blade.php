@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('snippets.store') }}" method="POST">
                @csrf

                <div class="form-group mb-4">
                    <label for="name" class="block mb-2">Name <span class="required">*</span></label>
                    <input type="text" name="name" class="form-control w-full h-8 px-2 border" required>
                </div>

                <div class="form-group mb-4">
                    <label for="type" class="block mb-2">Type <span class="required">*</span></label>

                    <select name="type" class="form-control bg-white border py-2 px-3">
                        <option value="">Select a Value</option>
                        <option value="sidebars">Sidebar</option>
                        <option value="dropdowns">Dropdown</option>
                        <option value="menus">Menu</option>
                        <option value="avatars">Avatar</option>
                        <option value="comments">Comment</option>
                        <option value="alerts">Alert</option>
                        <option value="badges">Badge</option>
                        <option value="cards">Card</option>
                        <option value="progress_bars">Progress Bar</option>
                    </select>
                </div>

                <div class="form-group mb-4">
                    <label for="html" class="block mb-2">HTML</label>
                    <textarea name="html" rows="8" class="w-full border"></textarea>
                </div>

                <div class="form-group mb-4">
                    <label for="css" class="block mb-2">CSS</label>
                    <textarea name="css" rows="8" class="w-full border"></textarea>
                </div>

                <div class="form-group mb-4">
                    <label for="scss" class="block mb-2">SCSS</label>
                    <textarea name="scss" rows="8" class="w-full border"></textarea>
                </div>

                <div class="form-group mb-4">
                    <label for="vue" class="block mb-2">Vue</label>
                    <textarea name="vue" rows="4" class="w-full border"></textarea>
                </div>

                <div class="form-group mb-4">
                    <label for="react" class="block mb-2">React</label>
                    <textarea name="react" rows="4" class="w-full border"></textarea>
                </div>

                <button type="submit" class="bg-indigo-600 text-white py-2 px-3 rounded text-sm">
                    Save Snippet
                </button>


            </form>
        </div>
    </div>
</div>
@endsection