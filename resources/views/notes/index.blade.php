@extends('layout.app')

@section('content')

<h1 class="text-3xl font-bold mb-5">My Notes</h1>

<!-- SEARCH -->
<form method="GET" action="/notes" class="mb-6 flex gap-4">
    <input 
        type="text" 
        name="search" 
        placeholder="Search notes..."
        class="border p-2 rounded w-1/3"
        value="{{ request('search') }}"
    >

    <input type="hidden" name="view" value="{{ request('view', 'grid') }}">
</form>

<!-- VIEW TOGGLE -->
<div class="flex gap-3 mb-6">

    <a href="/notes?view=grid{{ request('search') ? '&search='.request('search') : '' }}"
       class="px-4 py-2 rounded 
       {{ request('view','grid')=='grid' ? 'bg-blue-600 text-white' : 'bg-gray-300' }}">
        Grid View
    </a>

    <a href="/notes?view=list{{ request('search') ? '&search='.request('search') : '' }}"
       class="px-4 py-2 rounded 
       {{ request('view')=='list' ? 'bg-blue-600 text-white' : 'bg-gray-300' }}">
        List View
    </a>

</div>


@php
    $viewType = request('view', 'grid');
@endphp


@if($viewType === 'grid')

    <!-- ⭐⭐⭐ GOOGLE KEEP MASONRY GRID ⭐⭐⭐ -->

    <style>
        .note-column-layout {
            column-count: 4;        /* 4 columns like your screenshot */
            column-gap: 1.5rem;     /* space between columns */
        }

        @media (max-width: 1200px) {
            .note-column-layout {
                column-count: 3;
            }
        }

        @media (max-width: 900px) {
            .note-column-layout {
                column-count: 2;
            }
        }

        @media (max-width: 600px) {
            .note-column-layout {
                column-count: 1;
            }
        }

        .note-item {
            break-inside: avoid;
            -webkit-column-break-inside: avoid;
            margin-bottom: 1.5rem; /* spacing between cards vertically */
        }
    </style>

    <div class="note-column-layout">

        @foreach($notes as $note)
        <div class="note-item p-4 rounded-xl shadow-md hover:shadow-xl transition bg-white"
             style="background: {{ $note->color }}">

            <h2 class="font-bold text-lg mb-2">{{ $note->title }}</h2>

            <p class="whitespace-pre-line break-words">{{ $note->content }}</p>

            <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="mt-4">
                @csrf
                @method('DELETE')
                <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                    Delete
                </button>
            </form>

        </div>
        @endforeach

    </div>


@else

    <!-- ⭐⭐⭐ LIST VIEW ⭐⭐⭐ -->

    <div class="space-y-4">

        @foreach($notes as $note)
            <div class="p-5 rounded-xl shadow-md hover:shadow-lg transition bg-white"
                style="background: {{ $note->color }}">

                <h2 class="font-bold text-xl mb-1">{{ $note->title }}</h2>

                <p class="whitespace-pre-line break-words">{{ $note->content }}</p>

                <form action="{{ route('notes.destroy', $note->id) }}"
                      method="POST" class="mt-4">
                    @csrf
                    @method('DELETE')

                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                        Delete
                    </button>
                </form>
            </div>
        @endforeach

    </div>

@endif

@endsection
