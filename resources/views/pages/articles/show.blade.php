@extends('layouts.inner')

@section('title', $article['title'])

@section('breadcrumbs')
    {{ Breadcrumbs::render('articles.show', $article['title']) }}
@endsection

@section('content-page')
    @if($article)
        @admin
            <a class="hover:text-orange" href="{{ route('articles.edit', $article) }}">Редактировать</a>
        @endadmin

        <div class="space-y-4">

            @if($article->image)
                <img src="{{ Storage::url($article->image->image) }}" alt="{{$article->title}}" title="{{$article->title}}">
            @else
                <img src="/assets/images/no_image.png" alt="" title="">
            @endif

            @if($article->tags)
                <x-panels.tags :tags="$article->tags"/>
            @endif

            <p>{{ $article->body }}</p>
        </div>

        <div class="mt-4">
            <a class="inline-flex items-center text-orange hover:opacity-75" href="{{ route('articles.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                </svg>
                К списку новостей
            </a>
        </div>

    @endif
@endsection
