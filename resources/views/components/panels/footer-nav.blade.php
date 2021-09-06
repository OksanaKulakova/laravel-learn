<?php
$menu = getMenu();
?>

<nav>
    <ul class="list-inside  bullet-list-item">
        @foreach ($menu as $menuItem)
            <li>
                <a class="<?=$menuItem['active'] ? 'text-orange cursor-default' : 'text-gray-600 hover:text-orange'?>" href="<?=$menuItem['path']?>">
                    <?=$menuItem['title']?>
                </a>
            </li>
        @endforeach
    </ul>
</nav>
