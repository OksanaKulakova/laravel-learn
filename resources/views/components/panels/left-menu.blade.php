<nav>
    <ul class="text-sm">
        <li>
            <p class="text-xl text-black font-bold mb-4">Информация</p>
            <ul class="space-y-2">
                <li><a class="@if (request()->routeIs('about')) text-orange cursor-default @else hover:text-orange @endif" href="/about">О компании</a></li>
                <li><a class="@if (request()->routeIs('contacts')) text-orange cursor-default @else hover:text-orange @endif" href="/contacts">Контактная информация</a></li>
                <li><a class="@if (request()->routeIs('sales')) text-orange cursor-default @else hover:text-orange @endif" href="/sales">Условия продаж</a></li>
                <li><a class="@if (request()->routeIs('financial')) text-orange cursor-default @else hover:text-orange @endif" href="/financial">Финансовый отдел</a></li>
                <li><a class="@if (request()->routeIs('clients')) text-orange cursor-default @else hover:text-orange @endif" href="/clients">Для клиентов</a></li>
            </ul>
        </li>
    </ul>
</nav>

