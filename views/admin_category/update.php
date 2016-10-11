<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li><a href="/admin/category">Управление категориями</a></li>
                        <li class="active">Редактировать категорию</li>
                    </ol>
                </div>


                <h4>Редактировать категорию "<?php echo $category['name_category']; ?>"</h4>

                <br/>

                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post">

                            <p>Название категории</p>
                            <input type="text" name="name" placeholder="" value="<?php echo $category['name_category']; ?>">

                            <p>Порядковый номер</p>
                            <input type="text" name="sort_order" placeholder="" value="<?php echo $category['sort_order']; ?>">

                            <br><br>

                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>