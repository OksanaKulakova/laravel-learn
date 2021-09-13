@props(['products'])

@if($products)
    <section class="pb-4 px-6">
        <p class="inline-block text-3xl text-black font-bold mb-4">Модели недели</p>
        <x-products.loop :products="$products"/>
    </section>
@endif 
