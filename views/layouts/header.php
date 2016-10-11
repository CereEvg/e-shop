<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
    <title>CSS Free Templates with jQuery Slider</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/template/css/images/favicon.ico" />
    <link rel="stylesheet" href="/template/css/style.css" type="text/css" media="all" />
    <script type="text/javascript" src="/template/js/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="/template/js/jquery.jcarousel.min.js"></script>
    <!--[if IE 6]>
    <script type="text/javascript" src="/template/js/png-fix.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/template/js/functions.js"></script>
<!---->

    <style type="text/css">
        body {
            margin: 0;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 13px;
            line-height: 18px;
            color: #333333;
            background-color: #ffffff;

            padding: 0 20px;
        }
        a {
            color: #0088cc;
            text-decoration: none;
        }
        a:hover {
            color: #005580;
            text-decoration: underline;
        }

        h2 { padding-top: 20px; }
        h2:first-of-type { padding-top: 0; }
        ul { padding: 0; }

        .pagination {
            height: 36px;
            margin: 18px 0;
        }
        .pagination ul {
            display: inline-block;
            *display: inline;
            /* IE7 inline-block hack */

            *zoom: 1;
            margin-left: 0;
            margin-bottom: 0;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        .pagination li {
            display: inline;
        }
        .pagination a {
            float: left;
            padding: 0 14px;
            line-height: 34px;
            text-decoration: none;
            border: 1px solid #ddd;
            border-left-width: 0;
        }
        .pagination a:hover,
        .pagination .active a {
            background-color: #f5f5f5;
        }
        .pagination .active a {
            color: #999999;
            cursor: default;
        }
        .pagination .disabled span,
        .pagination .disabled a,
        .pagination .disabled a:hover {
            color: #999999;
            background-color: transparent;
            cursor: default;
        }
        .pagination li:first-child a {
            border-left-width: 1px;
            -webkit-border-radius: 3px 0 0 3px;
            -moz-border-radius: 3px 0 0 3px;
            border-radius: 3px 0 0 3px;
        }
        .pagination li:last-child a {
            -webkit-border-radius: 0 3px 3px 0;
            -moz-border-radius: 0 3px 3px 0;
            border-radius: 0 3px 3px 0;
        }
        .pagination-centered {
            text-align: center;
        }
        .pagination-right {
            text-align: right;
        }
        .pager {
            margin-left: 0;
            margin-bottom: 18px;
            list-style: none;
            text-align: center;
            *zoom: 1;
        }
        .pager:before,
        .pager:after {
            display: table;
            content: "";
        }
        .pager:after {
            clear: both;
        }
        .pager li {
            display: inline;
        }
        .pager a {
            display: inline-block;
            padding: 5px 14px;
            background-color: #fff;
            border: 1px solid #ddd;
            -webkit-border-radius: 15px;
            -moz-border-radius: 15px;
            border-radius: 15px;
        }
        .pager a:hover {
            text-decoration: none;
            background-color: #f5f5f5;
        }
        .pager .next a {
            float: right;
        }
        .pager .previous a {
            float: left;
        }
        .pager .disabled a,
        .pager .disabled a:hover {
            color: #999999;
            background-color: #fff;
            cursor: default;
        }
    </style>
    
</head>
<body>
<!-- Header -->
<div id="header" class="shell">
    <div id="logo"><h1><a href="/">BestSeller</a></h1></div>
    <!-- Navigation -->
    <div id="navigation">
        <ul>

                <li><a href="/" class="active">Главная</a></li>
            <?php if (User::isGuest()): ?>
                <li><a href="/user/register">Регистрация</a></li>
                <li><a href="/user/login">Войти</a></li>
            <?php else: ?>
                <li><a href="/user/logout">Выйти</a></li>
                <li><a href="/cabinet">Кабинет</a></li>
                <?php if (AdminPanel::checkAdmin()): ?>
                    <li><a href="/admin/">Админпанель</a></li>
                <?php endif; ?>
            <?php endif; ?>
                <li>
                    <a href="/cart/index">Корзина
                        (<span id="cart-count"><?php echo Cart::countItems(); ?></span>)
                    </a>
                </li>
                <li><a href="/contacts/">Контакты</a></li>
                <li><a href="/search/">Поиск</a></li>


        </ul>
    </div>
    <!-- End Navigation -->
    <div class="cl">&nbsp;</div>
    <!-- Login-details -->
    <!-- End Login-details -->
</div>
<!-- End Header -->
