@extends('template')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <!-- Shopping Cart -->
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart" id="cartTable">
                            <thead>
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Total</th>
                                    <th class="column-6">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Cart items will be dynamically added here -->
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">

                    <img src="{{ asset('qr.jpg') }}" style="border-radius: 15px" alt="QR Code" class="img-fluid" />



                    <p class="stext-111 cl6 p-t-2">
                        Realiza el pago al Yape de la imagen, y te saldrá tu código de compra o comunícate al
                        siguiente número para terminar la compra. Dale al botón comprar para generar tu código de
                        compra.
                    </p>



                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2" id="totalAmount">
                            </span>
                        </div>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"
                        onclick="confirmPurchase()">
                        Comprar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_content')
    <script>
        function confirmPurchase() {
            swal({
                    title: "¿Estás seguro?",
                    text: "Una vez confirmado, se generará tu código de compra.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willBuy) => {
                    if (willBuy) {
                        // Generar un número de compra aleatorio
                        var purchaseCode = Math.floor(Math.random() * 1000000);

                        swal("Compra confirmada. Tu código de compra es " + purchaseCode + ".", {
                                icon: "success",
                            })
                            .then(() => {
                                // Vaciar el array cartHistory
                                cartHistory = [];

                                // Convertir el array cartHistory a JSON
                                var cartHistoryJSON = JSON.stringify(cartHistory);

                                // Guardar el JSON en el almacenamiento local
                                localStorage.setItem('cartHistory', cartHistoryJSON);

                                // Redirigir al usuario a la página de inicio después de 2 segundos
                                setTimeout(() => {
                                    window.location.href = '/';
                                }, 2000);
                            });
                    } else {
                        swal("Tu compra ha sido cancelada.");
                    }
                });
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            updateCartView();
            updateTotalAmount();
        });

        function updateCartView() {
            // Obtener el historial del carrito desde el almacenamiento local
            var cartHistory = JSON.parse(localStorage.getItem('cartHistory')) || [];

            // Limpiar la tabla antes de actualizarla
            $('#cartTable tbody').empty();

            // Actualizar la vista de la tabla con los elementos del carrito
            cartHistory.forEach(function(item) {
                // Ensure item.price is a number before using it
                var price = parseFloat(item.price);

                var row = `<tr class="table_row">
                    <td class="column-1">
                        <div class="how-itemcart1">
                            <img src="${item.image}" alt="IMG">
                        </div>
                    </td>
                    <td class="column-2">${item.name}</td>
                    <td class="column-3">S/ ${price.toFixed(2)}</td>
                    <td class="column-4">
                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m"
                                onclick="updateQuantity(${item.id}, -1)">
                                <i class="fs-16 zmdi zmdi-minus"></i>
                            </div>
                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1"
                                value="${item.quantity}" data-product-id="${item.id}"
                                data-product-name="${item.name}" data-product-price="${price}">
                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m"
                                onclick="updateQuantity(${item.id}, 1)">
                                <i class="fs-16 zmdi zmdi-plus"></i>
                            </div>
                        </div>
                    </td>
                    <td class="column-5 total-column" data-product-id="${item.id}">S/ ${(price * item.quantity).toFixed(2)}</td>
                    <td class="column-6">
                        <button class="btn btn-danger btn-sm" onclick="removeItem(${item.id})">Remove</button>
                    </td>
                </tr>`;
                $('#cartTable tbody').append(row);
            });
        }

        function updateQuantity(productId, amount) {
            // Obtener la cantidad actual del producto
            var input = $(`.num-product[data-product-id="${productId}"]`);
            var currentQuantity = parseInt(input.val());
            var cartHistory = JSON.parse(localStorage.getItem('cartHistory')) || [];
            console.log(cartHistory);

            var productIdString = productId.toString();

            // Encontrar el índice del producto en el historial del carrito
            var index = cartHistory.findIndex(function(item) {
                return item.id === productIdString;
            });

            console.log(index);
            // Verificar si el producto existe en el historial del carrito
            if (index !== -1) {
                // Obtener el producto específico del historial del carrito
                var product = cartHistory[index];

                // Actualizar la cantidad
                var newQuantity = currentQuantity + amount;

                if (newQuantity > 0) {
                    // Actualizar la cantidad en el historial del carrito
                    product.quantity = newQuantity;

                    // Actualizar el historial del carrito en el almacenamiento local
                    localStorage.setItem('cartHistory', JSON.stringify(cartHistory));

                    input.val(newQuantity);

                    // Actualizar el total
                    var price = parseFloat(input.data('product-price'));
                    var total = price * newQuantity;
                    $(`.total-column[data-product-id="${productId}"]`).text(`S/ ${total.toFixed(2)}`);

                    // Implementa lógica para actualizar el carrito localmente
                    // Puedes utilizar la función updateCartView() si es necesario
                    updateTotalAmount();
                    console.log(`Updated quantity for product ${productId} to ${newQuantity}`);
                }
            } else {
                console.error(`Product with ID ${productId} not found in cart history`);
            }
        }


        function removeItem(productId) {
            // Obtener el historial del carrito desde el almacenamiento local
            var cartHistory = JSON.parse(localStorage.getItem('cartHistory')) || [];

            // Filtrar el historial para excluir el producto que se va a eliminar
            var updatedCart = cartHistory.filter(function(item) {
                return item.id !== productId.toString();
            });

            // Verificar si el producto existe en el historial del carrito
            if (cartHistory.length !== updatedCart.length) {
                // Actualizar el historial en el almacenamiento local
                localStorage.setItem('cartHistory', JSON.stringify(updatedCart));

                // Actualizar la vista de la tabla y el total
                updateCartView();
                updateTotalAmount();

                console.log(`Removed product ${productId} from the cart`);
            } else {
                console.error(`Product with ID ${productId} not found in cart history`);
            }
        }





        function updateTotalAmount() {
            // Obtener el historial del carrito desde el almacenamiento local
            var cartHistory = JSON.parse(localStorage.getItem('cartHistory')) || [];

            // Calcular el total de totales
            var totalAmount = cartHistory.reduce(function(total, item) {
                return total + item.price * item.quantity;
            }, 0);

            // Actualizar el texto del total
            $('#totalAmount').text(`S/ ${totalAmount.toFixed(2)}`);
        }
    </script>
@endsection
