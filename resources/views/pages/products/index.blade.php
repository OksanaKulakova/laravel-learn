@extends('layouts.app')

@section('title', 'Каталог')

@section('content') 
    
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Каталог</h1>

        @if($products)
            <x-products.loop :products="$products"/>
        @endif 

    </div>
     
@endsection
