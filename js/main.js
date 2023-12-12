
(function ($) {
    "use strict";

    /*[ Load page ]
    ===========================================================*/
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div class="loader05"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: ['animation-duration', '-webkit-animation-duration'],
        overlay: false,
        overlayClass: 'animsition-overlay-slide',
        overlayParentElement: 'html',
        transition: function (url) { window.location.href = url; }
    });

    /*[ Back to top ]
    ===========================================================*/
    var windowH = $(window).height() / 2;

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display', 'flex');
        } else {
            $("#myBtn").css('display', 'none');
        }
    });

    $('#myBtn').on("click", function () {
        $('html, body').animate({ scrollTop: 0 }, 300);
    });


    /*==================================================================
    [ Fixed Header ]*/
    var headerDesktop = $('.container-menu-desktop');
    var wrapMenu = $('.wrap-menu-desktop');

    if ($('.top-bar').length > 0) {
        var posWrapHeader = $('.top-bar').height();
    }
    else {
        var posWrapHeader = 0;
    }


    if ($(window).scrollTop() > posWrapHeader) {
        $(headerDesktop).addClass('fix-menu-desktop');
        $(wrapMenu).css('top', 0);
    }
    else {
        $(headerDesktop).removeClass('fix-menu-desktop');
        $(wrapMenu).css('top', posWrapHeader - $(this).scrollTop());
    }

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > posWrapHeader) {
            $(headerDesktop).addClass('fix-menu-desktop');
            $(wrapMenu).css('top', 0);
        }
        else {
            $(headerDesktop).removeClass('fix-menu-desktop');
            $(wrapMenu).css('top', posWrapHeader - $(this).scrollTop());
        }
    });


    /*==================================================================
    [ Menu mobile ]*/
    $('.btn-show-menu-mobile').on('click', function () {
        $(this).toggleClass('is-active');
        $('.menu-mobile').slideToggle();
    });

    var arrowMainMenu = $('.arrow-main-menu-m');

    for (var i = 0; i < arrowMainMenu.length; i++) {
        $(arrowMainMenu[i]).on('click', function () {
            $(this).parent().find('.sub-menu-m').slideToggle();
            $(this).toggleClass('turn-arrow-main-menu-m');
        })
    }

    $(window).resize(function () {
        if ($(window).width() >= 992) {
            if ($('.menu-mobile').css('display') == 'block') {
                $('.menu-mobile').css('display', 'none');
                $('.btn-show-menu-mobile').toggleClass('is-active');
            }

            $('.sub-menu-m').each(function () {
                if ($(this).css('display') == 'block') {
                    console.log('hello');
                    $(this).css('display', 'none');
                    $(arrowMainMenu).removeClass('turn-arrow-main-menu-m');
                }
            });

        }
    });


    /*==================================================================
    [ Show / hide modal search ]*/
    $('.js-show-modal-search').on('click', function () {
        $('.modal-search-header').addClass('show-modal-search');
        $(this).css('opacity', '0');
    });

    $('.js-hide-modal-search').on('click', function () {
        $('.modal-search-header').removeClass('show-modal-search');
        $('.js-show-modal-search').css('opacity', '1');
    });

    $('.container-search-header').on('click', function (e) {
        e.stopPropagation();
    });


    /*==================================================================
    [ Isotope ]*/
    var $topeContainer = $('.isotope-grid');
    var $filter = $('.filter-tope-group');

    // filter items on button click
    $filter.each(function () {
        $filter.on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $topeContainer.isotope({ filter: filterValue });
        });

    });

    // init Isotope
    $(window).on('load', function () {
        var $grid = $topeContainer.each(function () {
            $(this).isotope({
                itemSelector: '.isotope-item',
                layoutMode: 'fitRows',
                percentPosition: true,
                animationEngine: 'best-available',
                masonry: {
                    columnWidth: '.isotope-item'
                }
            });
        });
    });

    var isotopeButton = $('.filter-tope-group button');

    $(isotopeButton).each(function () {
        $(this).on('click', function () {
            for (var i = 0; i < isotopeButton.length; i++) {
                $(isotopeButton[i]).removeClass('how-active1');
            }

            $(this).addClass('how-active1');
        });
    });

    /*==================================================================
    [ Filter / Search product ]*/
    $('.js-show-filter').on('click', function () {
        $(this).toggleClass('show-filter');
        $('.panel-filter').slideToggle(400);

        if ($('.js-show-search').hasClass('show-search')) {
            $('.js-show-search').removeClass('show-search');
            $('.panel-search').slideUp(400);
        }
    });

    $('.js-show-search').on('click', function () {
        $(this).toggleClass('show-search');
        $('.panel-search').slideToggle(400);

        if ($('.js-show-filter').hasClass('show-filter')) {
            $('.js-show-filter').removeClass('show-filter');
            $('.panel-filter').slideUp(400);
        }
    });




    /*==================================================================
    [ Cart ]*/
    $('.js-show-cart').on('click', function () {
        $('.js-panel-cart').addClass('show-header-cart');
    });

    $('.js-hide-cart').on('click', function () {
        $('.js-panel-cart').removeClass('show-header-cart');
    });

    /*==================================================================
    [ Cart ]*/
    $('.js-show-sidebar').on('click', function () {
        $('.js-sidebar').addClass('show-sidebar');
    });

    $('.js-hide-sidebar').on('click', function () {
        $('.js-sidebar').removeClass('show-sidebar');
    });

    /*==================================================================
    [ +/- num product ]*/
    $('.btn-num-product-down').on('click', function () {
        var numProduct = Number($(this).next().val());
        if (numProduct > 0) $(this).next().val(numProduct - 1);
    });

    $('.btn-num-product-up').on('click', function () {
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);
    });

    /*==================================================================
    [ Rating ]*/
    $('.wrap-rating').each(function () {
        var item = $(this).find('.item-rating');
        var rated = -1;
        var input = $(this).find('input');
        $(input).val(0);

        $(item).on('mouseenter', function () {
            var index = item.index(this);
            var i = 0;
            for (i = 0; i <= index; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for (var j = i; j < item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });

        $(item).on('click', function () {
            var index = item.index(this);
            rated = index;
            $(input).val(index + 1);
        });

        $(this).on('mouseleave', function () {
            var i = 0;
            for (i = 0; i <= rated; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for (var j = i; j < item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });
    });

    /*==================================================================
    [ Show modal1 ]*/
    $('.js-show-modal1').on('click', function (e) {
        e.preventDefault();
        $('.js-modal1').addClass('show-modal1');
    });

    $('.js-hide-modal1').on('click', function () {
        $('.js-modal1').removeClass('show-modal1');
    });



})(jQuery);

document.addEventListener("DOMContentLoaded", function () {
    fetch('nav.html')
        .then(response => response.text())
        .then(data => document.getElementById('nav').innerHTML = data);
});

document.addEventListener("DOMContentLoaded", function () {
    fetch('nav_mobile.html')
        .then(response => response.text())
        .then(data => document.getElementById('nav-mobile').innerHTML = data);
});


document.addEventListener("DOMContentLoaded", function () {
    fetch('footer.html')
        .then(response => response.text())
        .then(data => document.getElementById('footer').innerHTML = data);
});

document.addEventListener("DOMContentLoaded", function () {
    fetch('nav.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('nav').innerHTML = data;
            activateMenuItem();
        });
});

function activateMenuItem() {
    var menuItems = document.querySelectorAll('.main-menu a');
    var currentUrl = window.location.href.split('/').pop();

    menuItems.forEach(function (item) {
        if (item.getAttribute('href') === currentUrl) {
            item.parentElement.classList.add('active-menu');
        }
    });
}


// Array de nombres de imágenes
var imageNames = ["libro01.jpg", "libro02.jpg", "libro03.jpg", "libro04.jpg"];

// Obtener el contenedor
var container = document.getElementById("item-index");

if (container === null) {
    console.log("El elemento con el ID 'item-index' no existe");
    imageNames = [];
} else {
    // Aquí puedes trabajar con el elemento 'container'
}

// Bucle para agregar dinámicamente el código con imágenes diferentes
for (var i = 0; i < imageNames.length; i++) {
    // Crear un nuevo elemento div
    var newItem = document.createElement("div");
    newItem.className = "col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women";

    // Código HTML del bloque
    newItem.innerHTML = `
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="img/${imageNames[i]}" alt="IMG-PRODUCT">

                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                        Quick View
                    </a>
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l">
                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            Esprit Ruffle Shirt
                        </a>

                        <span class="stext-105 cl3">
                            $16.64
                        </span>
                    </div>
                </div>
            </div>
        `;

    // Agregar el nuevo elemento al contenedor
    container.appendChild(newItem);
}
// Array de objetos
var items = [
    {
        title: "Servicios",
        description: "Dive into the world of mobile app development. Learn to build native iOS and Android applications using industry- leading frameworks like Swift and Kotlin.",
        image: "servicios.jpg"
    },
    {
        title: "Libros",
        description: "Discover the fundamentals of graphic design, including typography, color theory, layout design, and image manipulation techniques. Create visually stunning designs for print and digital media.",
        image: "libros.jpg"
    },
    {
        title: "Pasiones",
        description: "Desde temprana edad, descubrí mi pasión por la musculación deportiva. Más que una actividad física, la veo como un camino hacia el bienestar integral. Mi enfoque se centra en la conexión entre el cuerpo y la mente, creyendo firmemente que ambos deben trabajar en armonía.",
        image: "pasiciones.jpg"
    },
    {
        title: "Formación y experiencia",
        description: "Tengo una base académica sólida y más de dos décadas de experiencia en musculación deportiva. Así mismo, he participado en diversas disciplinas del fitness que me permiten ofrecer un enfoque integral y actualizado.",
        image: "formarcion.jpg"
    }
];

// Obtener el contenedor
var container = document.getElementById("item-index-2");

// Bucle para agregar dinámicamente el código con imágenes y datos del array de objetos
for (var i = 0; i < items.length; i++) {
    // Crear un nuevo elemento div
    var newItem = document.createElement("div");
    newItem.className = "col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women";

    // Código HTML del bloque con datos dinámicos
    newItem.innerHTML = `
        <div class="block2">
            <div class="block2-pic hov-img0">
                <img src="img/${items[i].image}" alt="IMG-PRODUCT">

                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                    Quick View
                </a>
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
                <div class="block2-txt-child1 flex-col-l">
                    <h4 class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">${items[i].title}</h4>
                    <p class="stext-105 cl3">${items[i].description}</p>
                </div>
            </div>
        </div>
    `;

    // Agregar el nuevo elemento al contenedor
    container.appendChild(newItem);
}


// Array de objetos
var items = [
    {
        title: "Compendio del Ejercicio",
        description: "Dive into the world of mobile app development. Learn to build native iOS and Android applications using industry- leading frameworks like Swift and Kotlin.",
        image: "libro01.jpg"
    },
    {
        title: "Bases del entrenamiento funcional y desarrollo",
        description: "Discover the fundamentals of graphic design, including typography, color theory, layout design, and image manipulation techniques. Create visually stunning designs for print and digital media.",
        image: "libro02.jpg"
    },
    {
        title: "tecnica del movivmiento",
        description: "Desde temprana edad, descubrí mi pasión por la musculación deportiva. Más que una actividad física, la veo como un camino hacia el bienestar integral. Mi enfoque se centra en la conexión entre el cuerpo y la mente, creyendo firmemente que ambos deben trabajar en armonía.",
        image: "libro03.jpg"
    },
    {
        title: "Entrenamiento Avanzado",
        description: "Tengo una base académica sólida y más de dos décadas de experiencia en musculación deportiva. Así mismo, he participado en diversas disciplinas del fitness que me permiten ofrecer un enfoque integral y actualizado.",
        image: "libro04.jpg"
    }
];

// Obtener el contenedor
var container = document.getElementById("item-index-3");

// Bucle para agregar dinámicamente el código con imágenes y datos del array de objetos
for (var i = 0; i < items.length; i++) {
    // Crear un nuevo elemento div
    var newItem = document.createElement("div");
    newItem.className = "col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women";

    // Código HTML del bloque con datos dinámicos
    newItem.innerHTML = `
        <div class="block2">
            <div class="block2-pic hov-img0">
                <img src="img/${items[i].image}" alt="IMG-PRODUCT">

                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                    Quick View
                </a>
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
                <div class="block2-txt-child1 flex-col-l">
                    <h4 class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">${items[i].title}</h4>
                    <p class="stext-105 cl3">${items[i].description}</p>
                </div>
            </div>
        </div>
    `;

    // Agregar el nuevo elemento al contenedor
    container.appendChild(newItem);
}
