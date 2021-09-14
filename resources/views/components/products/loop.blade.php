@props(['products'])

@if($products)
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
        @foreach($products as $product)
            <x-products.card :product="$product"/>
        @endforeach
    </div>

    {{ $products->onEachSide(2)->links() }}
@endif 
