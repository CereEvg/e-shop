<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div align="center">
            <div>
                <font color="white">
                    <div>

                        <?php if (isset($_POST['submit'])): ?>
                        <?php if ($isFound): ?>
                                <?php foreach ($searchItem as $item): ?>
                                            <div>
                                                <div>
                                                    <div>
                                                        <div style="padding-top: 30px">
                                                            <img src="<?php echo Product::getImage($item['id']); ?>" alt="" />
                                                        </div>
                                                        <span><?php echo $item['title']; ?></span>
                                                        <span><font color="white">by <?php echo $item['author']; ?> </font></span>
                                                        <span><?php echo $item['description']; ?></span>

                                                    </div>
                                                </div>
                                                <div style="display: block; padding-top: 25px">
                                                <a style="position: relative; padding: 9px 0px 2px 10px;" href="#" data-id="<?php echo $item['id'];?>" ><span style="padding: 0 10px 0 10px">BUY NOW</span> <span style="position: relative" ><span>$</span><span><?php echo round($item['price'],2); ?></span></a>
                                                </div>
                                            </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <h2>Такой книги нет!</h2>
                        <?php endif; ?>

                        <?php endif; ?>

                        <div>
                            <h2 style="font-size: 30pt">Форма поиска</h2>
                            <br>
                            <form action="#" method="post">
                                <p>Введите название книги</p>
                                <br>
                                <input type="text" name="title" placeholder="Название" value=""/>
                                <br>
                                <input type="submit" name="submit" class="btn btn-default" value="Поиск" />
                            </form>
                        </div>

                </font>

                <br/>
                <br/>
            </div>
        </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>