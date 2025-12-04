@extends('layout.app')

@section('content')

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">

    <h1 class="text-3xl font-bold mb-6 text-center">Create Note</h1>

    <form method="POST" action="{{ route('notes.store') }}">
        @csrf

        <input 
            type="text" 
            name="title" 
            placeholder="Title"
            class="border p-3 rounded w-full mb-4 focus:border-blue-500 outline-none"
            required>

        <textarea 
            name="content" 
            rows="4" 
            placeholder="Take a note..."
            class="border p-3 rounded w-full mb-4 focus:border-blue-500 outline-none"></textarea>

        <label class="font-bold mb-2 block">Pick Color</label>
        <input 
            type="color" 
            name="color" 
            value="#fff7a3"
            class="mb-6 w-16 h-10 cursor-pointer"
            required>

        <div class="text-center">
            <button class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                Save Note
            </button>
        </div>
    </form>
</div>

@endsection
