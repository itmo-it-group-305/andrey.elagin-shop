/**
 * Created by daddyingrave on 08.03.16.
 */
jQuery(document).ready(
    function() {
        var basket = {
            price: 0,
            counter: 0,
            positionNumber: 1,
            totalPrice: 0,

            init: function () {
                jQuery('.good-sell').on('click', 'button', basket.addToCart);
                jQuery('.basket').on('click', '.basket-delete', basket.delFromCart);
                jQuery('.basket-delete').on('click', basket.priceUpdate);
            },
            addToCart: function (e) {
                var elem = jQuery(e.toElement);
                var newElem = elem.closest('tr.goods-information');
                var productName = newElem.attr('product-name');
                var productCode = newElem.attr('product-code');
                var price = newElem.attr('price');

                var tempStr = '<tr><td class="vert-align">{{positionNumber}}</td>' +
                    '<td class="goods-picture"><img class="img-responsive" alt=""></td>' +
                    '<td class="vert-align" product-code="{{{productCode}}}" ' +
                    'product-name="{{{productName}}}" price="{{{price}}}">{{productName}}</td>' +
                    '<td class="vert-align">{{price}}</td></tr>';

                var dataTemp = {
                    "positionNumber": function() {
                        return basket.positionNumber;
                    },
                    "productCode": function() {
                        return productCode;
                    },
                    "productName": function() {
                        return productName;
                    },
                    "price": function() {
                        return price;
                    }

                };

                var content = Mustache.render(tempStr, dataTemp);
                jQuery('.cart-body').append(content);

                basket.positionNumber++;
                basket.totalPrice += +price;
                jQuery('.cart-total-sum').html('Итого: ' + basket.totalPrice);
            },
            //не стал допиливать это
            delFromCart: function (e) {
                var elem = jQuery(e.toElement);
                var currentElem = elem.parent('div.basket-empty').prev();
                var priceNode = currentElem.children();
                var currentPrice = priceNode.attr('price');

                basket.positionNumber--;
                basket.totalPrice -= +currentPrice;

                jQuery('.total-sum').html('Итого: ' + basket.totalPrice);

            }
        };
        basket.init();
    }
);