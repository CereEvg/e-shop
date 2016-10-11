<?php include ROOT.'/views/layouts/header.php'; ?>

<section>
    <div align="center">
        <div>

            <div>

                <?php if ($result): ?>
                    <p><font color="white" style="font-size: 30pt">Данные отредактированы!</font></p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <font color="white">
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo $error; ?> </li>
                                <?php endforeach; ?>
                            </font>
                        </ul>
                    <?php endif; ?>

                    <div>
                        <h2><font color="white" style="font-size: 30pt">Редактирование данных</font></h2>
                        <form action="#" method="post">
                            <p style="color: white;">Имя:</p>
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>" />
                            <br>
                            <br>
                            <p style="color: white">Пароль:</p>
                            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>" />
                            <br>
                            <br>

                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить" />
                        </form>
                    </div>
                <?php endif;?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT.'/views/layouts/footer.php'; ?>




