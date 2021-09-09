@extends('layouts.inner')

@section('title', 'Создание новости')

@section('content-page') 

    <x-alerts.error />
    
    <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        @include('pages.articles.form')
    </form>

@endsection
