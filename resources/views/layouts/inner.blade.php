@extends('layouts.app')

@section('content')

<div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">
    <aside class="hidden sm:block col-span-1 border-r p-4">
        <x-panels.left-menu />
    </aside>
    
    @yield('content-page')
    
</div>
    
@endsection