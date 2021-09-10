@props(['products'])

@if($products)
    <section class="pb-4 px-6">
        <p class="inline-block text-3xl text-black font-bold mb-4">Модели недели</p>
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
            @foreach($products as $product)
                <x-products.card :product="$product"/>
            @endforeach
        </div>
    </section>
@endif 
