(function () {
    $(document).ready(function () {
        var clientCard = window.sessionStorage.getItem('clientCard');
        if (clientCard != null) {
            $('.icon-cart .num').text(clientCard.length);
            clientCard = JSON.parse(clientCard);
            $cartTable = $('.cartTable');
            // $oneProd = '<tr class="align-items-center"><td class="d-flex align-items-center border-top-0 border-bottom px-0 py-6"><div class="imgHolder">' +
            //     '<img src="http://placehold.it/70x80" alt="image description" class="img-fluid"></div>' +
            //     '<span class="title pl-2" ><a href="shop-detail.html" name="nazvanie">Pellentesque aliquet</a></span></td>' +
            //     '<td class="fwEbold border-top-0 border-bottom px-0 py-6">180.00 $</td>' +
            //     '<td class="border-top-0 border-bottom px-0 py-6"><input type="number" placeholder="1"></td>' +
            //     '<td class="fwEbold border-top-0 border-bottom px-0 py-6">180.00 $ <a href="javascript:void(0);" class="fas fa-times float-right"></a></td></tr>';
            var count = 0;
            var $productsCards = [];
            var $tottalPrice = $('.totalPrice');
            clientCard.forEach((element, index) => {
                $productsCards.push($(
                    '<tr class="align-items-center"><td class="d-flex align-items-center border-top-0 border-bottom px-0 py-6"><div class="imgHolder">' +
                    '<img src="' + element.imgSrc + '" alt="image description" class="img-fluid"></div>' +
                    '<span class="title pl-2" id="prod_card_'+index+'"><a href="shop-detail.html" name="nazvanie">' + element.name + '</a></span></td>' +
                    '<td class="fwEbold border-top-0 border-bottom px-0 py-6 price-product">' + element.price + '</td>' +
                    '<td class="border-top-0 border-bottom px-0 py-6"><input type="number" min="1" value="1" placeholder="1" class="count-product"></td>' +
                    '<td class="fwEbold border-top-0 border-bottom px-0 py-6 extra-price"><span>' + element.price + ' </span><a href="javascript:void(0);" class="fas fa-times float-right"></a></td></tr>'
                ));
                $cartTable.append($productsCards[$productsCards.length - 1]);
                // console.log(parseFloat((element.price).replace('$', '')));
                count += parseFloat((element.price).replace('$', '')); // для подсчета
            });

            setTimeout(() => {
                $productsCards.forEach(function (item, index) {
                    item.find('.count-product').each(function (index, elem) {
                        var $card = $(elem).closest('tr');
                        $priceTD = $card.find('.price-product');
                        var price = $priceTD.text().replace('$', '');
                        var $extra_price = $card.find('.extra-price span');
    
                        var $inc = $(item).find('.jcf-btn-inc');
                        var $dec = $(item).find('.jcf-btn-dec');
                        $inc.on('click', function () {
                            $extra_price.text((parseFloat(price) * parseInt($(elem).val())).toFixed(2) + "$");
                            var all = (parseFloat($tottalPrice.text()) + parseFloat(price)).toFixed(2) + "$";
                            $tottalPrice.text(all);
                            clientCard.forEach(function(item, index){
                                $idprod = $card.find('.title').attr('id').split('prod_card_')[1];
                                if(index == $idprod){
                                    clientCard[index].count = $(elem).val();
                                    window.sessionStorage.setItem('clientCard', JSON.stringify(clientCard));
                                    return;
                                }
                            });
                            
                        });
                        $dec.on('click', function () {
                            $extra_price.text((parseFloat(price) * parseInt($(elem).val())).toFixed(2) + "$");
                            var all = (parseFloat($tottalPrice.text()) - parseFloat(price)).toFixed(2) + "$";
                            $tottalPrice.text(all);
                            clientCard.forEach(function(item, index){
                                $idprod = $card.find('.title').attr('id').split('prod_card_')[1];
                                if(index == $idprod){
                                    clientCard[index].count = $(elem).val();
                                    window.sessionStorage.setItem('clientCard', JSON.stringify(clientCard));
                                    return;
                                }
                            });
                            
                        });
    
    
                        $(elem).on('change', function (e) {
    
    
    
    
    
                            /*var old = parseFloat(this.parentNode.parentNode.parentNode.children[1].innerHTML.replace('$', ''));
                            var multiplier = this.parentNode.children[0].value;
                            var newS = (old * multiplier);
            
                            // динамический подсчет цены
                            this.parentNode.parentNode.parentNode.children[3].innerHTML = newS.toFixed(2) + " $";
                            $('.totalPrice').text((parseFloat($('.totalPrice').text().replace('$', '')) - (old * (multiplier - 1) - newS)).toFixed(2) + " $");*/
                        });
                    });
                })
            }, 500);




            // ---------------------------------------------------------------------------------
            // подсчет цены при загрузке
            $tottalPrice.text(count.toFixed(2) + " $");
        }
    });
})();