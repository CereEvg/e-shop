<?php

//Хранит маршруты
return array(

    // Жанры
    'category/([0-9]+)' => 'catalog/category/$1',

    // Действия пользователя
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    // Поиск
    'search' => 'search/result',

    // Действия с корзиной покупок
    'cart/checkout' => 'cart/checkout',
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'cart' => 'cart/index',

    // Действия в личном кабинете
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    // Связь с администрацией
    'contacts' => 'site/contact',

    // Управление товарами
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',

    // Управление категориями
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',

    // Управление заказами
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',

    // Админпанель
    'admin' => 'admin/index',

    // Главаня страница
    '' => 'site/index',

);