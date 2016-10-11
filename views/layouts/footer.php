<!-- Footer -->
<div id="footer" class="shell">
    <div class="top">
        <div class="cnt">
            <div class="col about">
                <h4>Об онлайн-магазине BestSellers</h4>
                <p>Сайт запущен первого сентября 2016-го года. Коммерческих целей не преследует. Создан исключительно для заполнения CV.</p>
            </div>

            

            <div class="cl">&nbsp;</div>
            <div class="copy">
                <p>&copy; <a href="#">Copyright Cere 2016</a></p>
            </div>
            
        </div>
    </div>
</div>


<!--Для асинхронного запроса-->
<script src="/template/js/jquery.js"></script>
<script src="/template/js/jquery.cycle2.min.js"></script>
<script src="/template/js/jquery.cycle2.carousel.min.js"></script>
<script src="/template/bootstrap/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<script src="/template/js/price-range.js"></script>
<script src="/template/js/jquery.prettyPhoto.js"></script>
<script src="/template/js/main.js"></script>
<script>
    $(document).ready(function () {
        $(".buy-btn").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>
<!-- End Footer -->

