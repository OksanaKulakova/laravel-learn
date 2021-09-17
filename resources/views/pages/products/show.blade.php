@extends('layouts.app')

@section('title', $product->name)

@push('scripts')
    <script src="/assets/js/products.js"></script>
@endpush

@section('content')
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">{{ $product->name }}</h1>
        <div class="flex-1 grid grid-cols-1 lg:grid-cols-5 border-b w-full">
            <div class="col-span-3 border-r-0 sm:border-r pb-4 px-4 text-center catalog-detail-slick-preview" data-slick-carousel-detail>
                <div class="mb-4 border rounded" data-slick-carousel-detail-items>
                    @if($product->image)
                        <img class="w-full" src="{{ asset('storage/' . $product->image->image) }}" alt="{{ $product->name }}" title="{{ $product->name }}">
                    @else
                        <img class="w-full" src="/assets/images/no_image.png" alt="no-image" title="no-image">
                    @endif

                    @if($product->pictures)
                        @foreach ($product->pictures as $picture)
                            <img class="w-full" src="{{ asset('storage/' . $picture->image) }}" alt="{{ $product->name }}" title="{{ $product->name }}">
                        @endforeach
                    @endif

                </div>
                <div class="flex space-x-4 justify-center items-center" data-slick-carousel-detail-pager>
                </div>
            </div>
            <div class="col-span-1 lg:col-span-2">
                <div class="space-y-4 w-full">
                    <div class="block px-4">

                        @if($product->old_price)
                            <p class="text-base line-through text-gray-400">{{ number_format($product->old_price, 0, '.', ' ') }} ₽</p>
                        @endif

                        <p class="font-bold text-2xl text-orange">{{ number_format($product->price, 0, '.', ' ') }} ₽</p>
                        
                        <div class="mt-4 block">
                            <form>
                                <button class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Купить
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="block border-t clear-both w-full" data-accordion data-active>
                        <div class="text-black text-2xl font-bold flex items-center justify-between hover:bg-gray-50 p-4 cursor-pointer" data-accordion-toggle>
                            <span>Параметры</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-not-active style="display: none">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-active>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                        
                        <div class="my-4 px-4" data-accordion-details>
                            <table class="w-full">
                                @if($product->salon)
                                    <tr>
                                        <td class="py-2 text-gray-600 w-1/2">Салон:</td>
                                        <td class="py-2 text-black font-bold w-1/2">{{ $product->salon}}</td>
                                    </tr>
                                @endif
                                @if($product->carClass)
                                    <tr>
                                        <td class="py-2 text-gray-600 w-1/2">Класс:</td>
                                        <td class="py-2 text-black font-bold w-1/2">{{ $product->carClass->name }}</td>
                                    </tr>
                                @endif
                                @if($product->kpp)
                                    <tr>
                                        <td class="py-2 text-gray-600 w-1/2">КПП:</td>
                                        <td class="py-2 text-black font-bold w-1/2">{{ $product->kpp }}</td>
                                    </tr>
                                @endif
                                @if($product->year)
                                    <tr>
                                        <td class="py-2 text-gray-600 w-1/2">Год выпуска:</td>
                                        <td class="py-2 text-black font-bold w-1/2">{{ $product->year }}</td>
                                    </tr>
                                @endif
                                @if($product->color)
                                    <tr>
                                        <td class="py-2 text-gray-600 w-1/2">Цвет:</td>
                                        <td class="py-2 text-black font-bold w-1/2">{{ $product->color }}</td>
                                    </tr>
                                @endif
                                @if($product->carBody)
                                    <tr>
                                        <td class="py-2 text-gray-600 w-1/2">Кузов:</td>
                                        <td class="py-2 text-black font-bold w-1/2">{{ $product->carBody->name}}</td>
                                    </tr>
                                @endif
                                @if($product->carEngine)
                                    <tr>
                                        <td class="py-2 text-gray-600 w-1/2">Двигатель:</td>
                                        <td class="py-2 text-black font-bold w-1/2">{{ $product->carEngine->name }}</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                    <div class="block border-t clear-both w-full" data-accordion>
                        <div class="text-black text-2xl font-bold flex items-center justify-between hover:bg-gray-50 p-4 cursor-pointer" data-accordion-toggle>
                            <span>Описание</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-not-active>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-active style="display: none">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                        <div class="my-4 px-4 space-y-4" data-accordion-details style="display: none">
                            <p>Весеннее половодье точно отражает крестьянский коралловый риф, кроме этого, здесь есть ценнейшие коллекции мексиканских масок, бронзовые и каменные статуи из Индии и Цейлона, бронзовые барельефы и изваяния, созданные мастерами Экваториальной Африки пять-шесть веков назад. Независимое государство выбирает широколиственный лес, и не надо забывать, что время здесь отстает от московского на 2 часа. Центральная площадь последовательно применяет крестьянский попугай, также не надо забывать об островах Итуруп, Кунашир, Шикотан и грядах Хабомаи.</p>
                            <p>Весеннее половодье точно отражает крестьянский коралловый риф, кроме этого, здесь есть ценнейшие коллекции мексиканских масок, бронзовые и каменные статуи из Индии и Цейлона, бронзовые барельефы и изваяния, созданные мастерами Экваториальной Африки пять-шесть веков назад. Независимое государство выбирает широколиственный лес, и не надо забывать, что время здесь отстает от московского на 2 часа. Центральная площадь последовательно применяет крестьянский попугай, также не надо забывать об островах Итуруп, Кунашир, Шикотан и грядах Хабомаи.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
