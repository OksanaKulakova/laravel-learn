<?php

function isCurrentUrl($url)
{
    return $url == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
}

function getMenu()
{
    $menu = [
        [
            'title' => 'О компании',
            'path' => '/about/',
            'sort' => 0,
            'hidden' => false,
        ],
        [
            'title' => 'Контактная информация',
            'path' => '/contacts/',
            'sort' => 1,
            'hidden' => false,
        ],
        [
            'title' => 'Условия продаж',
            'path' => '/sales/',
            'sort' => 2,
            'hidden' => false,
        ],
        [
            'title' => 'Финансовый отдел',
            'path' => '/financial/',
            'sort' => 3,
            'hidden' => false,
        ],
        [
            'title' => 'Для клиентов',
            'path' => '/clients/',
            'sort' => 4,
            'hidden' => true,
        ],
    ];

    foreach ($menu as $key => $menuItem) {
        $menu[$key]['title'] = $menuItem['title'];
        $menu[$key]['active'] = isCurrentUrl($menuItem['path']);
    }

    return $menu;
}

$menu = getMenu();
?>

<nav>
    <ul class="text-sm">
        <li>
            <p class="text-xl text-black font-bold mb-4">Информация</p>
            <ul class="space-y-2">
                @foreach ($menu as $menuItem)
                    <li>
                        <a class="<?=$menuItem['active'] ? 'text-orange cursor-default' : 'hover:text-orange'?>" href="<?=$menuItem['path']?>">
                            <?=$menuItem['title']?>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
</nav>

