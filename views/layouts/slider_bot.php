
<div id="best-sellers">

    <h3>Топы продаж</h3>

    <ul>
        <?php foreach ($topSales as $sliderItem): ?>

        <li>

            <div class="product">

                <a href="#">

                    <img src="<?php echo Product::getImage($sliderItem['id']); ?>" alt="" />
                    <span class="book-name"><?php echo $sliderItem['title']; ?></span>
                    <span class="author">by <?php echo $sliderItem['author']; ?></span>
                    <span class="price"><span class="low">$</span><span class="low"><?php echo $sliderItem['price']; ?></span>
                </a>


            </div>

        </li>
        <?php endforeach; ?>

    </ul>

</div>

