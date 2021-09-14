@php
    $tags = isset($article) ? $article->tags->pluck('name')->implode(', ') : null;
@endphp

<div class="mt-8 max-w-md">
    <div class="grid grid-cols-1 gap-6">
        <x-input.group for="title" label="Название новости">
            <x-input.text name="title" placeholder="Название новости" value="{{ old('title', $article->title) }}"/>
        </x-input.group>

        <x-input.group for="description" label="Краткое описание новости">
            <x-input.text name="description" placeholder="Краткое описание новости" value="{{ old('description', $article->description) }}"/>
        </x-input.group>

        <x-input.group for="body" label="Детальное описание">
            <x-input.textarea name="body" placeholder="Детальное описание" value="{{ old('body', $article->body) }}"/>
        </x-input.group>

        <x-input.group for="tags" label="Названия тегов (через запятую)">
            <x-input.text name="tags" placeholder="Названия тегов" value="{{ old('tags', $tags) }}"/>
        </x-input.group>

        <x-input.checkbox name="published_at" label="Опубликован" value="{{ old('published_at', $article->published_at) }}"/>

        <x-input.group>
            <x-input.button-orange type="submit" text="Сохранить"/>
        </x-input.group>
    </div>
</div>
