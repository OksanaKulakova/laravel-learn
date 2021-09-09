@extends('layouts.inner')

@section('title', 'Создание новости')

@section('content-page') 

    <x-alerts.error />
    
    <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">
                <x-input.group for="title" label="Название новости">
                    <x-input.text name="title" placeholder="Название новости" value="{{ old('title') }}"/>
                </x-input.group>

                <x-input.group for="description" label="Краткое описание новости">
                    <x-input.text name="description" placeholder="Краткое описание новости" value="{{ old('description') }}"/>
                </x-input.group>

                <x-input.group for="body" label="Детальное описание">
                    <x-input.textarea name="body" placeholder="Детальное описание" value="{{ old('body') }}"/>
                </x-input.group>

                <x-input.checkbox name="published_at" label="Опубликован" value="{{ old('published_at') }}"/>

                <x-input.group>
                    <x-input.button-orange type="submit" text="Сохранить"/>
                </x-input.group>
            </div>
        </div>
    </form>

@endsection
