<nav>
    <ul class="list-inside  bullet-list-item">
        <li><a class="@if (request()->routeIs('about')) text-orange cursor-default @else text-gray-600 hover:text-orange @endif" href="/about">О компании</a></li>
        <li><a class="@if (request()->routeIs('contacts')) text-orange cursor-default @else text-gray-600 hover:text-orange @endif" href="/contacts">Контактная информация</a></li>
        <li><a class="@if (request()->routeIs('sales')) text-orange cursor-default @else text-gray-600 hover:text-orange @endif" href="/sales">Условия продаж</a></li>
        <li><a class="@if (request()->routeIs('financial')) text-orange cursor-default @else text-gray-600 hover:text-orange @endif" href="/financial">Финансовый отдел</a></li>
        <li><a class="@if (request()->routeIs('clients')) text-orange cursor-default @else text-gray-600 hover:text-orange @endif" href="/clients">Для клиентов</a></li>
    </ul>
</nav>
