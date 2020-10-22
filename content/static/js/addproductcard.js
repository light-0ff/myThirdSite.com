(function () {
    var $buyButton = $('.icon-cart');
    var Prod = {
        name: '',
        price: '',
        imgSrc: '',
        count:1
    };
    var clientCard = clientCard = window.sessionStorage.getItem('clientCard');
    if(clientCard != null) {$('.icon-cat .num').text(JSON.parse(clientCard).length);}
    $buyButton.each(function (index) {
        $oneButton = $(this);
        $oneButton.on('click', function () {
            $domCard = $(this).closest('.featureCol');
            Prod.name = $domCard.find('.title ').text();
            Prod.price = $domCard.find('.price').text();
            Prod.imgSrc = $domCard.find('.img-fluid').attr('src');
            //console.dir(Prod);
            clientCard = window.sessionStorage.getItem('clientCard');
            if (clientCard == null) {
                clientCard = [];
                clientCard.push(Prod);
                window.sessionStorage.setItem('clientCard', JSON.stringify(clientCard));
            } else {
                clientCard = JSON.parse(clientCard);
                clientCard.push(Prod);
                $('.icon-cat .num').text(clientCard.length);
                window.sessionStorage.setItem('clientCard', JSON.stringify(clientCard));
            }
        });
    });
    // $buyButton.on('click', function () {



    //     if (clientCard == null) {
    //         clientCard = [];

    //         console.log($domCard);
    //         // Prod.name = ;
    //         // Prod.price = ;
    //         // Prod.imgSrc = ;

    //         clientCard.push(Prod);
    //     }

    // });
})();