<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden scroll-smooth group" data-mode="light" dir="ltr">

<head>

    <base href="{{ asset('/') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <title>Product Landing Page | StarCode & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="StarCode Kh" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <link href="../css2?family=Tourney:wght@100&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../aos%403.0.0-beta.6/dist/aos.css">

    <!-- Swiper Slider css-->


    <!-- Layout config Js -->
    <script src="../assets/js/layout.js"></script>
    <!-- Icons CSS -->

    <!-- StarCode CSS -->

    <link rel="stylesheet" href="../assets/css/starcode2.css">
    <link rel="stylesheet" href="../assets/css/check.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
</head>

<body class="text-base bg-white text-body font-public dark:text-zink-50 dark:bg-zinc-900">

{{-- header --}}
@include('client.layout.header')
{{-- end header --}}


@yield('body')

{{-- footer --}}
@include('client.layout.footer')
{{-- end footer --}}

<button id="back-to-top" class="fixed flex items-center justify-center text-white bg-purple-500 rounded-md size-10 bottom-10 right-10">
    <i data-lucide="chevron-up" class="animate animate-icons"></i>
</button>

<script src="../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="../assets/libs/%40popperjs/core/umd/popper.min.js"></script>
<script src="../assets/libs/tippy.js/tippy-bundle.umd.min.js"></script>
<script src="../assets/libs/simplebar/simplebar.min.js"></script>
<script src="../assets/libs/prismjs/prism.js"></script>
<script src="../assets/libs/lucide/umd/lucide.js"></script>
<script src="../assets/js/starcode.bundle.js"></script>
<script src="../assets/libs/swiper/swiper-bundle.min.js"></script>
<script src="assets/js/pages/swiper.init.js"></script>

<script src="../assets/js/pages/landing-product.init.js"></script>
<script src="../assets/js/app.js"></script>

<script src="../assets/js/counterUpdate/updateCounter.js"></script>
<script src="../assets/js/clientCoupon/orderCoupon.js"></script>
<script src="../cartJs/cart.js"></script>


<script>
    function increase(cartDetail){
        let input = document.getElementById('quantityInput-' + cartDetail);
        if (input){
            let currentValue = parseInt(input.value);
            input.value = currentValue + 1;
            updateCart(cartDetail, currentValue + 1);
        }else {
            console.error('fail');
        }
    }

    function reduce(cartDetail){
        let input = document.getElementById('quantityInput-' + cartDetail);
        if (input){
            let currentValue = parseInt(input.value);
            if (currentValue > 1){
                input.value = currentValue - 1;
            }
            updateCart(cartDetail, currentValue - 1);
        }else {
            console.error('fail');
        }
    }
</script>

</body>

</html>
