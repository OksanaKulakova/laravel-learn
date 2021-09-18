@extends('layouts.app')

@section('title', 'Рога и сила - главная страница')

@section('content')

    <x-panels.banners :banners="$banners"/>
    <x-panels.week :products="$products"/>
    <x-panels.home-articles :articles="$articles"/>

@endsection