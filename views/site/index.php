<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT . '/views/layouts/slider_top.php'; ?>

<!-- Main -->
<div id="main" class="shell">
    <!-- Sidebar -->
    <div id="sidebar">
        <ul class="categories">
            <li>
                <h4>Жанры</h4>

                <?php foreach ($categories as $categoryItem): ?>
                    <ul>
                        <li>
                            <a href="/category/<?php echo $categoryItem['id']; ?>">
                                <?php echo $categoryItem['name_category']; ?>
                            </a>
                        </li>
                    </ul>
                <?php endforeach; ?>

            </li>

        </ul>
    </div>
    <!-- End Sidebar -->
    <!-- Content -->
    <div id="content">

        <div class="products">
            <img style="width: 100%" src="/template/css/images/Welcome1.jpg">
            <div>
                <br>
                <p style="text-indent: 1.5em; font-size: large; color: #1E90FF;"> Администрация BestSellers рада приветствовать Вас на страницах этого сайта!</p>
            </div>
            <br>
            <p style="font-size: larger; font-family: 'Comic Sans MS', cursive;">Ищите и покупайте наши книги, не стестняйтесь консультироваться с нами, если возникают вопросы. Читайте книги и развивайтесь! </p>
        </div>
        <div class="cl">&nbsp;</div>

        <!-- Best-sellers -->
        <?php include ROOT.'/views/layouts/slider_bot.php'; ?>
        <!-- End Best-sellers -->

    </div>
    <!-- End Content -->
    <div class="cl">&nbsp;</div>
</div>
<!-- End Main -->
<!--Footer-->
<?php include ROOT.'/views/layouts/footer.php'; ?>
<!--End Footer-->
</body>
</html>