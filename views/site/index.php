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
        <!-- Products -->
        <div class="products">
            <h3>Добро пожаловать!</h3>
            <?php foreach ($latestProducts as $product): ?>
            <ul>
                <li>
                    <div class="product">
                        <a href="#" class="info">
								<span class="holder">
									<img src="<?php echo Product::getImage($product['id']); ?>" alt="" />
									<span class="book-name"><?php echo $product['title']; ?></span>
									<span class="author">by <?php echo $product['author']; ?> </span>
									<span class="description"><?php echo $product['description']; ?></span>
								</span>
                        </a>
                        <a href="#" data-id="<?php echo $product['id'];?>" class="buy-btn">BUY NOW <span class="price"><span class="low">$</span><span class="low"><?php echo $product['price']; ?></span></a>
                    </div>
                </li>
            </ul>
            <?php endforeach; ?>
            <!-- End Products -->
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