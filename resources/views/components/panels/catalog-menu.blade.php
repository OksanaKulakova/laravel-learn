@props(['categories'])

<nav class="order-1">
    <ul class="block lg:flex">
        @foreach ($categories as $category)
            <li class="group">
                <a class="inline-block p-4 text-black font-bold @if ($category->children) border-l border-r border-transparent group-hover:text-orange group-hover:bg-gray-100 group-hover:border-l group-hover:border-r group-hover:border-gray-200 group-hover:shadow @else hover:text-orange @endif @if(request()->is('*/' . $category->slug)) text-orange @endif @if($category->descendants()->pluck('slug')->contains(request()->slug)) text-orange @endif" href="{{route('category', $category)}}">
                    {{ $category->name  }}

                    @if ($category->children)
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    @endif
                </a>

                @if ($category->children)
                    <ul class="dropdown-navigation-submenu absolute hidden group-hover:block bg-white shadow-lg">
                        @foreach ($category->children as $childCategory)
                            <li><a class="block py-2 px-4 text-black hover:text-orange hover:bg-gray-100 @if(request()->is('*/' . $childCategory->slug)) text-orange @endif" href="{{route('category', $childCategory)}}">{{$childCategory->name}}</a></li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</nav>
