<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div align="center">
            <div>
            <font color="white">
                <div>

                    <?php if ($result): ?>
                        <br>
                        <p>Сообщение отправлено! Мы ответим Вам на указанный email.</p>
                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <div>
                            <h2 style="font-size: 30pt">Обратная связь</h2>
                            <h5>Есть вопрос? Напишите нам</h5>
                            <br/>
                            <form action="#" method="post" id="tArea">
                                <p>Ваша почта</p>
                                <input type="email" name="userEmail" placeholder="E-mail" value="<?php echo $userEmail; ?>"/>
                                <p>Сообщение</p>
<!--                                <input type="text" name="userText" placeholder="Сообщение" style="width: 250px;" value="--><?php //echo $userText; ?><!--"/>-->
                                <textarea name="userText" style="resize: none"><?php echo $userText; ?></textarea>
                                <br/>
                                <input type="submit" name="submit" value="Отправить" />

                            </form>
                        </div>
                    <?php endif; ?>
            </font>

                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>