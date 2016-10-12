<?php include ROOT.'/views/layouts/header.php'; ?>

<section>
    <div>
        <div>
            <div>
                <div  align="center">
                    <h2 style="font-size: 30pt">Корзина</h2>

                    <?php if ($productsInCart): ?>
                    <font color="white">
                        <p>Вы выбрали такие товары:</p>
                        <table >
                            <tr>
                                <th>Название</th>
                                <th>Стомость, $</th>
                                <th>Количество, шт</th>
                                <th>Удаление</th>
                            </tr>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td>
                                        <a href="/product/<?php echo $product['id'];?>">
                                            <?php echo $product['title'];?>
                                        </a>
                                    </td>
                                    <td><?php echo $product['price'];?></td>
                                    <td><?php echo $productsInCart[$product['id']];?></td>
                                    <td>
                                        <a href="/cart/delete/<?php echo $product['id'];?>">
                                            <button>Удалить<i class="fa fa-times"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4">Общая стоимость, $:</td>
                                <td><?php echo $totalPrice;?></td>
                            </tr>

                        </table>

                        <a href="/cart/checkout"> Оформить заказ</a>
                    <?php else: ?>
                        <font color="white">
                            <br>
                            <p style="font-size: 25pt">Корзина пуста</p>
                            <br>
                        <a href="/">Вернуться к покупкам</a>
                        <br>
                        <br>
                    <?php endif; ?>

                </div>



            </div>
        </div>
    </div>
</section>

<?php include ROOT.'/views/layouts/footer.php'; ?>

