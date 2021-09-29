@component('mail::message')
# Изменена новость {{ $article->title}}

{{ $article->description }}

@component('mail::button', ['url' => route('articles.show', $article)])
Посмотреть
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
