<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 11.03.16
 * Time: 1:09
 */

require_once 'pdo.php';
?>

<?php foreach ($data as $stuff): ?>
    <tr class="good-sell goods-information" product-code="<?= $stuff['price'] ?>" product-name="<?= $stuff['title'] ?>" price="<?= $stuff['price'] ?>">
        <td class="col-md-4">
            <div class="media">
                <img class="image-responsive good-image" src="http://latintour.ru/wp-content/uploads/2014/04/Hydrochoerus-hydrochaeris1-300x300.jpg">
            </div></td>
        <td class="vert-align col-md-4"><?= $stuff['description'] ?></td>
        <td class="vert-align col-md-2"><?= $stuff['price'] ?></td>
        <td class="vert-align col-md-2"><button type="button" class="btn btn-default btn-md">Купить1</button></td>
    </tr>
<?php endforeach; ?>