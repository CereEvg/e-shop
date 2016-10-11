<?php include ROOT.'/views/layouts/header.php'; ?>

<section>
    <div align="center">
        <div>
            <div>
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
                        <h2><font color="white" style="font-size: 30pt">Авторизация на сайте</font></h2>
                        <form action="#" method="post">
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>" />
                            <br>
                            <br>

                            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>" />
                            <br>
                            <br>

                            <input type="submit" name="submit" class="btn btn-default" value="Авторизация" />
                        </form>
                    </div>

                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT.'/views/layouts/footer.php'; ?>



