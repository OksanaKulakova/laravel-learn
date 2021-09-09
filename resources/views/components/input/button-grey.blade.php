@props([
    'type' => 'button',
    'text' => 'Отменить',
])
<button type="{{ $type }}"
        class="inline-block bg-gray-400 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
    {{ $text }}
</button>
