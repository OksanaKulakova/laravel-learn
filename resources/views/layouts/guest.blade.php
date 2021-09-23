@extends('layouts.app')

@section('content')

    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>
        {{ $slot }}
    </div>
    
@endsection
