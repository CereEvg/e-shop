<!-- Slider -->
<div id="slider">
    <div class="shell">
        <ul>
            <?php foreach ($sliderProducts as $sliderItem): ?>
                <li>
                    <div class="image">
                        <img src="/template/css/images/books.png" alt="" />
                    </div>
                    <div class="details">
                        <h2>Bestsellers</h2>
                        <h3>Лучшее, что могло с вами случиться сегодня!</h3>
                        <p class="title"><?php echo $sliderItem['title']; ?></p>
                        <p class="description"><?php echo $sliderItem['description']; ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<!-- End Slider -->