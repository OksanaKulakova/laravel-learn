@extends('layouts.inner')

@section('title', 'Для клиентов')

@section('content-page')

    {{ $products->avg('price') }}

    {{ $products->whereNotNull('old_price')->avg('price') }}

    {{ dump($products->sortByDesc('price')->first()) }}

    {{ dump($products->map(function ($item) { return $item->carClass;})->unique()) }}

    {{ dump($products->map(function ($item) { return $item->carEngine->name;})->unique()->sort()->values()) }}

    {{ dump($products->map(function ($item) {
        return [Str::slug($item->carClass->name) => $item->carClass->name];
        })->unique()->collapse()->sort()) }}

    {{ dump($products->whereNotNull('old_price')->filter(function ($item) {
        return stripos($item->name, 5) || stripos($item->name, 6) || stripos($item->carEngine->name, 5) || stripos($item->carEngine->name, 6) || stripos($item->kpp, 5) || stripos($item->kpp, 6);
        })) }}

    {{ dump($products->whereNull('old_price')->map(function ($item) {
        return $item->carBody;
        })->unique()->map(function ($item) use ($products) {
            return [$item->name => $products->where('car_body_id', $item->id)->avg('price')];
        })->collapse()->sort()) }}

@endsection
