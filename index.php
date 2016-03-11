<?php
require_once 'pdo.php';

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Интернет магазин</title>
    <meta charset="UTF-8">
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link href='css/main.css' rel='stylesheet'>

    <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    <!--<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>-->
    <script src='js/jquery-2.2.1.min.js'></script>
    <script src='js/mustache.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/script.js'></script>

    <script>
//        ajax добавил ради инетереса, реализация никакая
        $(document).ready(function(){
            console.log('sdf');
            $(".category-button").click(function(){
                $.ajax({url: "ajax_upload.php", success: function(result){
                    $("#goods-list").html(result);
                }});
            });
        });
    </script>

</head>
<body>

<div class='navbar navbar-default navbar-static-top'>
    <div class='container'>
        <a href='/' class='navbar-brand'>Интернет магазин дот ком
        <i class="glyphicon glyphicon-shopping-cart"></i>
        </a>

        <ul class='nav navbar-nav navbar-right'>
            <li><a href='#'>Жалобы</a></li>
            <li><a href='#'>Убитые клиенты</a></li>
            <li><a href='#'>О милых нас <i class="glyphicon glyphicon-heart-empty"></i></a></li>

        </ul>
    </div>
</div>

<div class="crumbs container">
    <ol class="breadcrumb">
        <li><a href="#">Главная</a></li>
        <li><a href="#">Еще какая нибудь</a></li>
        <li class="active">Текущая</li>
    </ol>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="col-md-12 well">
                <div class="list-group button-categories">

                    <!--ajax просто слушает клик на этих кнопках и перезаписывает выдачу товара-->

                    <button type="button" class="list-group-item category-button">Категория один</button>
                    <button type="button" class="list-group-item category-button">Категория два</button>
                    <button type="button" class="list-group-item category-button">Категория три</button>
                    <button type="button" class="list-group-item category-button">Категория четыре</button>
                    <button type="button" class="list-group-item category-button">Категория пять</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="col-md-12 well">
                <table class="table table-hover goods-categories">
                    <thead>

                    </thead>
                    <tbody id="goods-list">

                    <?php foreach ($data as $stuff): ?>
                        <tr class="good-sell goods-information" product-code="<?= $stuff['price'] ?>" product-name="<?= $stuff['title'] ?>" price="<?= $stuff['price'] ?>">
                            <td class="col-md-4">
                                <div class="media">
                                    <img class="image-responsive good-image" src="http://placehold.it/500x500">
                                </div></td>
                            <td class="vert-align col-md-4"><?= $stuff['description'] ?></td>
                            <td class="vert-align col-md-2"><?= $stuff['price'] ?></td>
                            <td class="vert-align col-md-2"><button type="button" class="btn btn-default btn-md">Купить</button></td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 well">
                <div class="col-md-3 col-md-offset-7">
                    <h4 class="cart-total-sum">Итого: </h4>
                </div>

                <div class="col-md-2 ">
                   <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">Открыть корзину</button>

                   <div id="myModal" class="modal">
                       <div class="modal-dialog">

                           <div class="modal-content">
                               <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                   <h4 class="modal-title">Я корзина</h4>
                               </div>
                               <div class="modal-body">
                                   <table class="table table-hover goods-categories">
                                   <thead>
                                   <tr>
                                       <th>#</th>
                                       <th></th>
                                       <th>Название</th>
                                       <th>Цена</th>
                                   </tr>
                                   </thead>
                                   <tbody class="cart-body">
                                   </tbody>
                                   </table>

                               </div>

                               <div class="modal-footer">
                                   <div class="col-md-3 col-md-offset-7 cart-total-sum">Итого: </div>
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class='col-md-3'>
                <h4>Конечно же у нас есть клевый футер</h4>
                <p>В общем и целом, в нем нет необходимости но мы его добавили <a href='https://goo.gl/v8TpPt'>Здесь больше о футерах!</a></p>
                <p><a href='http://capybara.site/'>А здесь больше о капибирах<i class='glyphicon glyphicon-arrow-right'></i></a></p>
            </div>
            <div class="col-md-4 col-md-offset-5">
                <h4>Обращайтесь к нам, но мы не уверены что сможем помочь</h4>
                <a href="https://ru.wikipedia.org/wiki/Cogito_ergo_sum">Потому что нас нет... или есть <i class="glyphicon glyphicon-eye-open glph"></i></a>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<script>
    $(function() {
        $('.nav-tabs a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });
</script>
