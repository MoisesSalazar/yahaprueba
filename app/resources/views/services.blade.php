@extends('template')

@section('slider')
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
                            style="display: flex; justify-content: center; align-items: center; color: white;">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-101 cl2 respon2" style="text-align: center; color: white;">
                                    YOUR COACH
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1" style="text-align: center; color: white;">
                                    Alberto Hidalgo
                                </h2>
                                <h5 class="specialty" style="text-align: center; color: white;">Especialista en
                                    musculación deportiva</h5>
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
                @foreach ($books as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="images/product-01.jpg" alt="IMG-PRODUCT">

                                <a href="{{ route('product.show', ['id' => $item->id]) }}"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                    Ver Detalle
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $item->title }}
                                    </a>

                                    <span class="stext-105 cl3">
                                        S/. {{ $item->price }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45">
                <a href="{{ route('services') }}"
                    class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    Ver todo
                </a>
            </div>
        </div>
    </section>

    <!-- Sección de opiniones -->
    <section class="bg0 p-t-75 p-b-120">
        <div class="container">
            <h3 class="stext-110 cl0 txt-center p-t-30 text-dark" style="font-size: 1.5em; line-height: 1.6;">
                Opiniones de Lectores
            </h3>

            <div class="row">
                @foreach ($opinions as $opinion)
                    <div class="col-md-6">
                        <div class="opinion p-3 border rounded mt-3">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <img src="{{ $opinion->user->image_base64 }}" alt="{{ $opinion->user->name }}"
                                        class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                </div>
                                <div>
                                    <h4 class="stext-110 cl0 text-dark mb-0">
                                        {{ $opinion->user->name }}
                                    </h4>
                                </div>
                            </div>
                            <p class="stext-110 cl0 text-dark mt-3">
                                {{ $opinion->comment }}
                            </p>
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
            $('#services').addClass('active-menu');
        });
    </script>
@endsection
