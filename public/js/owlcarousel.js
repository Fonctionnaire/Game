$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        'items': 10,
        'nav': true,
        'margin': 5,
        'responsive': {
            0:{
                'items': 1
            },
            600:{
                'items': 3
            },
            900:{
                'items': 6
            },
            1200:{
                'items': 10
            }
        }
    });
});