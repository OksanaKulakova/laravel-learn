<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use App\Models\Article;
use App\Repositories\CategoryRepository;

// Home
Breadcrumbs::for('index', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('index'));
});

Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('О компании', route('about'));
});

Breadcrumbs::for('contacts', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Контактная информация', route('contacts'));
});

Breadcrumbs::for('sales', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Условия продаж', route('sales'));
});

Breadcrumbs::for('financial', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Финансовый отдел', route('financial'));
});

Breadcrumbs::for('clients', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Для клиентов', route('clients'));
});

// Articles
Breadcrumbs::for('articles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Все новости', route('articles.index'));
});

// Article > Upload Article
Breadcrumbs::for('articles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('articles.index');
    $trail->push('Добавить новость', route('articles.create'));
});

// Articles > [Article Name]
Breadcrumbs::for('articles.show', function (BreadcrumbTrail $trail, $article) {
    $trail->parent('articles.index');
    $trail->push($article, route('articles.show', $article));
});

// Articles > [Article Name] > Edit Article
Breadcrumbs::for('articles.edit', function (BreadcrumbTrail $trail, $article) {
    $trail->parent('articles.show', $article);
    $trail->push('Редактировать новость', route('articles.edit', $article));
});

// Home >  Catalog
Breadcrumbs::for('products.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Каталог', route('products.index'));
});

//Home > Catalog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $slug) {
    $category = app('App\Repositories\CategoryRepository')->findCategoryBySlug($slug);
    $trail->parent('products.index');
    foreach ($category->ancestors as $ancestor) {
        $trail->push($ancestor->name, route('category', $ancestor));
    }
    $trail->push($category->name, route('category', $category));
});

Breadcrumbs::for('account', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Личный кабинет', route('account'));
});
