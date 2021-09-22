@extends('layouts.inner')

@section('title', 'Для клиентов')

@section('content-page')

    {{ $averagePrice }}
    <br>
    {{ $averageDiscountedPrice }}
    <br>
    {{ $expensiveModel }}
    <br>
    {{ $salons->dump() }}
    <br>
    {{ $engines->dump() }}
    <br>
    {{ $classes->dump() }}
    <br>
    {{ $collect1->dump() }}
    <br>
    {{ $collect2->dump() }}

@endsection
