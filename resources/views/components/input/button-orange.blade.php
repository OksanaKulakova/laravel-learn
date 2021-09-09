@props([
    'type' => 'submit',
    'text' => 'Отправить',
])
<button type="{{ $type }}"
        class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
    {{ $text }}
</button>