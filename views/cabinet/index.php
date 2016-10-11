<?php include ROOT.'/views/layouts/header.php'; ?>

<section>
    <div>
        <div align="center">
            <font color="white">
                <h2 style="font-size: 30pt">Кабинет пользователя</h2>
                <br>
                <h3 style="color: white">Здравствуй, <?php echo $user['name']; ?></h3>

                <br>
                <ul>
                    <li><a href="/cabinet/edit">Изменить данные пользователя</a></li>
                </ul>
                <br>
            </font>
        </div>
    </div>
</section>

<?php include ROOT.'/views/layouts/footer.php'; ?>
