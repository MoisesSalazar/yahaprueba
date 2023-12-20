@extends('template')

@section('content')
    <!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                <div class="item-slick3" data-thumb="{{ $product->image_base64 }}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{ $product->image_base64 }}" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                            href="{{ $product->image_base64 }}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $product->title }}
                        </h4>

                        <span class="mtext-106 cl2">
                            S/. {{ $product->price }}
                        </span>

                        <p class="stext-102 cl3 p-t-23">
                            {{ $product->description }}
                        </p>

                        <!--  -->
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                            name="num-product" value="1"
                                            data-product-id="{{ $product->id }}"
                                            data-product-name="{{ $product->title }}"
                                            data-product-price="{{ $product->price }}"
                                            data-product-image="{{ $product->image_base64 }}">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>

                                    <button
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                        Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js_content')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Evitar la duplicación de manejadores de eventos
            var addToCartButtons = document.querySelectorAll('.js-addcart-detail');
            addToCartButtons.forEach(function(button) {
                button.removeEventListener('click', addToCartHandler);
                button.addEventListener('click', addToCartHandler);
            });

            function addToCartHandler(event) {
                // Obtener el input asociado al botón clicado
                var input = event.target.closest('.flex-w').querySelector('.num-product');

                var product = {
                    id: input.getAttribute('data-product-id'),
                    name: input.getAttribute('data-product-name'),
                    price: input.getAttribute('data-product-price'),
                    quantity: parseInt(input.value),
                    image: input.getAttribute('data-product-image')
                };

                var cartHistory = JSON.parse(localStorage.getItem('cartHistory')) || [];
                var existingProduct = cartHistory.find(function(item) {
                    return item.id === product.id;
                });

                if (existingProduct) {
                    existingProduct.quantity += product.quantity;
                } else {
                    cartHistory.push(product);
                }

                localStorage.setItem('cartHistory', JSON.stringify(cartHistory));

                console.log('Producto agregado al carrito:', product);
            }

            // Función para obtener y agrupar el historial del carrito
            function getCartHistory() {
                var cartHistory = JSON.parse(localStorage.getItem('cartHistory')) || [];
                var groupedCart = {};

                cartHistory.forEach(function(item) {
                    if (groupedCart[item.id]) {
                        groupedCart[item.id].quantity += item.quantity;
                    } else {
                        groupedCart[item.id] = {
                            id: item.id,
                            name: item.name,
                            price: item.price,
                            image: item.image,
                            quantity: item.quantity
                        };
                    }
                });

                return Object.values(groupedCart);
            }

            // Ejemplo de uso de la función
            var historico = getCartHistory();
            console.log('Historial del carrito:', historico);
        });
    </script>
    <script>
        $('.js-addwish-b2').on('click', function(e) {
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function() {
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function() {
                showConfirmation(nameProduct);
                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function() {
                showConfirmation(nameProduct);
                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        $('.js-addcart-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function() {
                showConfirmation(nameProduct);
            });
        });

        function showConfirmation(productName) {
            swal({
                    title: "Product Added!",
                    text: productName + " is added to cart!",
                    icon: "success",
                    buttons: {
                        services: {
                            text: "Seguir Comprando",
                            value: "services",
                        },
                        checkout: {
                            text: "Checkout",
                            value: "checkout",
                        },
                    },
                })
                .then((value) => {
                    if (value === "services") {
                        // Redirige a la ruta de servicios
                        window.location.href = "/services";
                    } else if (value === "checkout") {
                        // Redirige al checkout
                        window.location.href = "/checkup";
                    }
                });
        }
    </script>
@endsection
