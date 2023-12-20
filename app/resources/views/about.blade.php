@extends('template')

@section('slider')
    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1" style="background-image: url(img/img02.jpg);">
                    <div class="overlay"></div>
                    <style>
                        .item-slick1 {
                            position: relative;
                        }

                        .item-slick1 .overlay {
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background: rgba(0, 0, 0, 0.5);
                        }
                    </style>
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5"
                            style="display: flex; justify-content: center; align-items: left; color: white;">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-101 cl2 respon2" style="text-align: left; color: white;">
                                    MÁS DE 10 AÑOS
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1" style="text-align: left; color: white;">
                                    CAMBIANDO VIDAS
                                </h2>
                                <h5 class="specialty" style="text-align: left; color: white;">Mi objetivo es que
                                    descubras el camino hacia tu mejor versión.</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">

            <div class="row isotope-grid" id="item-index">
                @foreach ($services as $item)
                    <div class="col-sm-6 col-md-6 col-lg-6 p-b-35 isotope-item women">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="images/product-01.jpg" alt="IMG-PRODUCT">
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    {{ $item->name }}
                                </div>
                            </div>
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    {{ $item->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('js_content')
    <script>
        $(document).ready(function() {
            $('#about').addClass('active-menu');
        });
    </script>
@endsection
