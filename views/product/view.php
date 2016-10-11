<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT . '/views/layouts/slider_top.php'; ?>

<!-- Main -->
<div id="main" class="shell">
    <!-- Sidebar -->
    <div id="sidebar">
        <ul class="categories">
            <li>
                <h4>Categories</h4>
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
    <?php include ROOT.'/views/layouts/slider_bot.php'; ?>

    <!-- End Content -->
    <div class="cl">&nbsp;</div>
</div>
<!-- End Main -->
<!--Footer-->
<?php include ROOT.'/views/layouts/footer.php'; ?>
<!--End Footer-->
</body>
</html>