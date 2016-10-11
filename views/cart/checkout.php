<?php include ROOT. '/views/layouts/header.php'; ?>

    <section>
        <div align="center">
            <div>
                <div>
                    <div>
                        <h2 style="font-size: 30pt">Корзина</h2>

                        <?php if ($result): ?>
                        <font color="white">
                            <p>Заказ оформлен. Мы Вам перезвоним.</p>
                        </font>
                        <?php else: ?>
                        <font color="white">
                            <p>Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?>, $</p><br/>
                        </font>
                            <?php if (!$result): ?>

                                <div>
                                    <?php if (isset($errors) && is_array($errors)): ?>
                                        <ul>
                                            <?php foreach ($errors as $error): ?>
                                                <li> - <?php echo $error; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                    <font color="white">
                                    <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

                                    <div>
                                        <form action="#" method="post">

                                            <p>Ваша имя</p>
                                            <input type="text" name="userName" placeholder="" value="<?php echo $userName; ?>"/>

                                            <p>Номер телефона</p>
                                            <input type="text" name="userPhone" placeholder="" value="<?php echo $userPhone; ?>"/>

                                            <p>Комментарий к заказу</p>
                                            <input type="text" name="userComment" placeholder="Сообщение" value="<?php echo $userComment; ?>"/>

                                            <br/>
                                            <br/>
                                            <input type="submit" name="submit" value="Оформить" />
                                        </form>
                                    </div>
                                    </font>
                                </div>

                            <?php endif; ?>

                        <?php endif; ?>

                    </div>

                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>