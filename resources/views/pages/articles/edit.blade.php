@extends('layouts.inner')

@section('title', 'Редактирование новости')

@section('breadcrumbs')
    {{ Breadcrumbs::render('articles.edit', $article['title']) }}
@endsection

@section('content-page') 

    <x-alerts.error />
    
    <form action="{{ route('articles.update', $article) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        @include('pages.articles.form')
    </form>

    <br>

    <form action="{{ route('articles.destroy', $article) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('DELETE')

        <x-input.group>
            <x-input.button-grey type="submit" text="Удалить"/>
        </x-input.group>
    </form>

@endsection
