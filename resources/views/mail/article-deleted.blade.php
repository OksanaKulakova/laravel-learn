@component('mail::message')
# Удалена новость {{ $article->title}}

{{ $article->description }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
