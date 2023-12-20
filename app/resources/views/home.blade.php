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
    <!-- Content page -->
    <section class="bg0 p-t-75 p-b-120">
        <div class="container">
            <div class="row">
                <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                    <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                        <h3 class="mtext-111 cl2 p-b-16">
                            Bienvenido a mi página web!
                        </h3>

                        <p class="stext-113 p-b-26" style="font-size: 18px !important; text-align: justify;">
                            Mi nombre es Alberto Hidalgo, soy especialista en musculación deportiva con más de 10 años
                            en el mundo del fitness. A lo largo de mi carrera, he escrito varios libros especializados
                            para atletas, entrenadores y entusiastas del fitness. Aquí encontrarás todo lo que necesitas
                            saber sobre mí, mis servicios, mis libros y más. </p>

                        <div class="flex-c-m flex-w w-full p-t-45">

                            <a href="{{ route('about') }}"
                                class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                                Más sobre mí
                            </a>
                        </div>
                    </div>
                </div>

                <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                    <div class="how-bor2">
                        <div class="hov-img0">
                            <img src="img/perfil.png" alt="IMG">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="bg0 p-t-75 p-b-120" style="background-color: black;">
        <div class="container">
            <h3 class="stext-110 cl0 txt-center p-t-30" style="font-size: 1.5em; line-height: 1.6; color: #f8f9fa;">
                <span class="fa fa-bolt" style="color: #e83e8c;"></span> Sana tu cuerpo, fortalece tu mente
            </h3>
            <h3 class="stext-110 cl0 txt-center p-t-30" style="font-size: 1.5em; line-height: 1.6; color: #f8f9fa;">
                Descubre el camino hacia tu mejor versión con Alberto Hidalgo.
            </h3>
        </div>
    </section>

    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">

            <div class="row isotope-grid" id="item-index">
                @foreach ($services as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
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

    <!-- Content page -->
    <section class="bg0 p-t-104 p-b-116" style="background-color: black;">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form>
                        <h4 class="mtext-105 cl0 txt-center p-b-30">
                            Escríbeme
                        </h4>
                        <p>Ingresa tus datos y me contactaré lo más pronto contigo. ¡Anímate a dar el primer paso!</p>
                        <br>
                        <div class=" m-b-20 how-pos4-parent">
                            <span class="icon-placeholder how-pos4 pointer-none">
                                <i class="fa fa-user"></i>
                            </span>
                            <input style="background: transparent; border: none; border-bottom: 1px solid #ccc;"
                                class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name"
                                placeholder="Tu Nombre">
                        </div>

                        <div class=" m-b-20 how-pos4-parent">
                            <span class="icon-placeholder how-pos4 pointer-none">
                                <i class="fa fa-info"></i>
                            </span>
                            <input style="background: transparent; border: none; border-bottom: 1px solid #ccc;"
                                class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="subject"
                                placeholder="Asunto">
                        </div>

                        <div class=" m-b-20 how-pos4-parent">
                            <span class="icon-placeholder how-pos4 pointer-none">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <input style="background: transparent; border: none; border-bottom: 1px solid #ccc;"
                                class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email"
                                placeholder="Tu Dirección de Correo">
                        </div>

                        <div class=" m-b-20 how-pos4-parent">
                            <span class="icon-placeholder how-pos4 pointer-none">
                                <i class="fa fa-phone"></i>
                            </span>
                            <input style="background: transparent; border: none; border-bottom: 1px solid #ccc;"
                                class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="tel" name="phone"
                                placeholder="Tu Número de Celular">
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Enviar
                        </button>
                    </form>
                </div>


                <div class="size-210  flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <img src="/img/form.png" alt="Descripción de la imagen"
                        style="display: block; margin-left: auto; margin-right: auto; width: 100%;">
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js_content')
    <script>
        $(document).ready(function() {
            $('#home').addClass('active-menu');
        });
    </script>
@endsection
