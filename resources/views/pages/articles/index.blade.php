@extends('layouts.inner')

@section('title', 'Все новости')

@section('content-page') 
    @if($articles)
        <a class="hover:text-orange" href="{{ route('articles.create') }}">Добавить новость</a>
        <section class="news-block-inverse px-6 py-4">
            <div class="grid md:grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach($articles as $article)
                    <div class="w-full flex">
                        <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
                            <a class="block w-full h-full hover:opacity-75" href="{{ route('articles.show', $article) }}"><img src="/assets/pictures/car_ceed.png" class="bg-white bg-opacity-25 w-full h-full object-contain" alt=""></a>
                        </div>
                        <div class="px-4 flex flex-col justify-between leading-normal">
                            <div class="mb-8">
                                <div class="text-white font-bold text-xl mb-2">
                                    <a class="hover:text-orange" href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                                </div>
                                <p class="text-gray-300 text-base">
                                    <a class="hover:text-orange" href="{{ route('articles.show', $article) }}">{{ $article->description }}</a>
                                </p>
                            </div>
                            <div>
                                <span class="text-sm text-white italic rounded bg-orange px-2">Киа Seed</span>
                            </div>
                            <div class="flex items-center">
                                <p class="text-sm text-gray-400 italic">{{ $article->published_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>  
    @endif  
@endsection