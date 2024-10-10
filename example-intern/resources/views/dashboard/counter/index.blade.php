@extends('dashboard.layout.master')
@section('title', 'Coupons')
@section('body')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
                <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                    <div class="grow">
                        <h5 class="text-16">Create Counter</h5>
                        @if(session()->has('message') || session()->has('error'))
                            <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                <span class="font-bold">{{ session('message') ?? session('error')}}</span>
                            </div>
                        @endif
                    </div>
                    <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                        <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                            <a href="#!" class="text-slate-400 dark:text-zink-200">Counter</a>
                        </li>
                        <li class="text-slate-700 dark:text-zink-100">
                            Create Counter
                        </li>
                    </ul>
                </div>

                <div class="card" id="productListTable">
                    <div class="card-body">
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 xl:grid-cols-12">
                            <div class="xl:col-span-3">
                                <div class="relative">
                                    <input type="text" class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Search for ..." autocomplete="off">
                                    <i data-lucide="search" class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                                </div>
                            </div><!--end col-->
                            <div class="xl:col-span-2">
                                <div>
                                    <input type="text" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" readonly="readonly" placeholder="Select Date">
                                </div>
                            </div><!--end col-->
                            <div class="lg:col-span-2 ltr:lg:text-right rtl:lg:text-left xl:col-span-2 xl:col-start-11">
                                <button data-modal-target="addProductsCart" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                    <span>
                                    <i data-lucide="plus" class="inline-block size-4"></i>
                                    Add Product
                                    </span>
                                </button>
                            </div>
                        </div><!--end grid-->
                    </div>

                    <div class="!pt-1 card-body">
                        <div class="overflow-x-auto">
                            @if(Cart::count() <= 0)
                                <div class="!px-10 !py-12 card-body">
                                    <div class="mt-10">
                                        <img src="assets/images/error-404.png" alt="" class="h-64 mx-auto">
                                    </div>
                                    <div class="mt-8 text-center">
                                        <h4 class="mb-2 text-purple-500">OPPS, YOU HAVE DON'T ORDER IN YOUR CART!! </h4>
                                        {{--                                        <p class="mb-6 text-slate-500 dark:text-zink-200">It will be as straightforward as Occidental; in fact, it will be just like Occidental to an English speaker.</p>--}}
                                        <button data-modal-target="addProductsCart" class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i  class="ri-shopping-cart-2-fill inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Add Products Cart</span></button>
                                    </div>
                                </div>
                            @else
                                <div class="xl:col-span-9 products-list">
                                    <div class="flex items-center gap-3 mb-5">
                                        <h5 class="underline text-16 grow">Shopping Cart ({{ Cart::count()}})</h5>
                                        <div style="cursor: pointer">
                                            <a onclick="confirm('Do you want to delete all this products to counter') === true ? destroy() : ''" class="text-red-500 transition-all duration-300 ease-linear hover:text-red-600"><i data-lucide="trash-2" class="inline-block mr-1 align-middle size-4"></i> <span class="align-middle">Delete All</span></a>
                                        </div>
                                    </div>
                                    <div class="counter">
                                        @foreach($cart as $key => $listCart)
                                            <div class="counterCart card products" id="product1">
                                                <div data-rowId="{{ $listCart->rowId }}"  class="card-body">
                                                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-12">
                                                        <div class="p-4 rounded-md lg:col-span-2 bg-slate-100 dark:bg-zink-600">
                                                            <img src="{{ Storage::url($listCart->options->image) }}" alt="" style="max-width: 100%; height: 141px; margin-left: 29px">
                                                        </div><!--end col-->
                                                        <div class="flex flex-col lg:col-span-4">
                                                            <div>
                                                                <h5 class="mb-1 text-16"><a href="">{{ $listCart->name }}</a></h5>
                                                                <p class="mb-2 text-slate-500 dark:text-zink-200"><a href="#!">Men's Fashion</a></p>
                                                                <p class="mb-1 text-slate-500 dark:text-zink-200">Color: <span class="text-slate-800 dark:text-zink-50">{{ $listCart->options->color }}</span></p>
                                                                <p class="mb-3 text-slate-500 dark:text-zink-200">Size: <span class="text-slate-800 dark:text-zink-50">{{ $listCart->options->size }}</span></p>
                                                            </div>
                                                            <div class="flex items-center gap-2 mt-auto">
                                                                <div class="inline-flex p-2 text-center border rounded input-step border-slate-200 dark:border-zink-500">
                                                                    <button type="button" onclick="decrease('{{ $listCart->rowId }}')" class="border w-7 leading-[15px] minus-value bg-slate-200 dark:bg-zink-600 dark:border-zink-600 rounded transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="minus" class="inline-block w-4 h-4"></i></button>
                                                                    <input type="number" class="text-center ltr:pl-2 rtl:pr-2 w-15 h-7 products-quantity dark:bg-zink-700 focus:shadow-none" value="{{ $listCart->qty }}" min="1" max="{{ $listCart->max_qty }}" id="quantityCounter-{{ $listCart->rowId }}" readonly="" data-rowId="{{ $listCart->rowId }}">
                                                                    <button type="button" onclick="increase('{{ $listCart->rowId }}')" class="transition-all duration-200 ease-linear border rounded border-slate-200 bg-slate-200 dark:bg-zink-600 dark:border-zink-600 w-7 plus-value text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="plus" class="inline-block w-4 h-4"></i></button>
                                                                </div>
                                                                <button onclick="confirm('Do you want to delete this products to cart') === true ? removeCart('{{ $listCart->rowId }}') : ''" type="button" class="flex items-center justify-center size-[37.5px] p-0 text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20 remove-button"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="flex justify-between w-full lg:flex-col lg:col-end-13 lg:col-span-2">
                                                            <div class="mb-auto ltr:lg:text-right rtl:lg:text-left">
                                                                <h6 class="text-16 products-price">$<span>{{ $listCart->price }}</span> <small class="font-normal line-through text-slate-500 dark:text-zink-200">${{ number_format($listCart->options->discount) }}</small></h6>
                                                            </div>
                                                            <h6 class="mt-auto text-16 ltr:lg:text-right rtl:lg:text-left">$<span class="products-line-price">{{ $listCart->price * $listCart->qty}}</span></h6>
                                                        </div><!--end col-->
                                                    </div><!--end grid-->
                                                </div>
                                            </div><!--end card-->
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button data-modal-target="addUserCounter" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                    <span>
                                    <i data-lucide="plus" class="inline-block size-4"></i>
                                    Add Customers
                                    </span>
                        </button>
                    </div>

                    {{-- order Counter  --}}
                    <div>
                        <form action="../dashboard/order/create" method="post" class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
                            @csrf
                            <div class="xl:col-span-9 products-list">
                                <div class="block items-center gap-3 mb-5">
                                    <h6 id="customerType" style="margin-left: 22px" class="md-3 text-16 grow">Customer Type: Khách Lẻ</h6>
                                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-12" style="margin-left: 22px;margin-top: 23px;">
                                        <div class="xl:col-span-4">
                                            <label for="accepted" class="inline-block mb-2 text-base font-medium">Full Name</label>
                                            <input type="text" name="accepted" id="accepted" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter Full Name" required>
                                        </div><!--end col-->
                                        <div class="xl:col-span-4">
                                            <label for="emailInput" class="inline-block mb-2 text-base font-medium">Email User</label>
                                            <input type="text" name="email" id="emailInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter Email User" required>
                                        </div><!--end col-->
                                        <div class="xl:col-span-4">
                                            <label for="phoneInput" class="inline-block mb-2 text-base font-medium">Phone User</label>
                                            <input type="text" name="phone" id="phoneInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter Last Name" required>
                                        </div><!--end col-->
                                        <div class="xl:col-span-4">
                                            <label for="cityInput" class="inline-block mb-2 text-base font-medium">City User</label>
                                            <input type="text" name="country" id="cityInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter Phone User">
                                        </div><!--end col-->
                                        <div class="xl:col-span-4">
                                            <label for="districtInput" class="inline-block mb-2 text-base font-medium">District User</label>
                                            <input type="text" name="" id="districtInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="(012) 345 678 9010">
                                        </div><!--end col-->
                                        <div class="xl:col-span-4">
                                            <label for="wardsAddressInput" class="inline-block mb-2 text-base font-medium">Wards User</label>
                                            <input type="text" name="address" id="wardsAddressInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Street address">
                                        </div><!--end col-->
                                        <div class="xl:col-span-12">
                                            <label for="specific_addressInput" class="inline-block mb-2 text-base font-medium">Specific Address User</label>
                                            <input type="text" name="order_address" id="specific_addressInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Town/City">
                                        </div><!--end col-->
                                            <input type="hidden" id="idUserCounter" name="account" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="State">
                                        <div class="xl:col-span-4">
                                            <label for="roleInput" class="inline-block mb-2 text-base font-medium">Role User</label>
                                            <input type="text" readonly="" id="roleInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="role">
                                        </div><!--end col-->
                                        <div class="xl:col-span-4">
                                            <label for="zipcodeInput" class="inline-block mb-2 text-base font-medium">ZipCode User</label>
                                            <input type="text" name="zip" id="zipcodeInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="ZipCode">
                                        </div><!--end col-->
                                        <input type="hidden" name="payment_methods" value="Buy At The Counter">
                                    </div><!--end grid-->
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="mb-4 text-15">Delivery</h6>
                                            <div class="grid grid-cols-1 gap-5 xl:grid-cols-2">
                                                <div class="flex items-center gap-3">
                                                    <input id="deliveryOption1" onclick="counterDriver()" class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-purple-500 checked:border-purple-500 dark:checked:bg-purple-500 dark:checked:border-purple-500 checked:disabled:bg-purple-400 checked:disabled:border-purple-400 peer" type="radio" name="shippingDelivery" value="Express delivery" data-shipping-cost="7">
                                                    <label for="deliveryOption1" class="flex flex-col gap-4 p-5 border rounded-md cursor-pointer md:flex-row border-slate-200 dark:border-zink-500 peer-checked:border-purple-500 dark:peer-checked:border-purple-700 grow">
                                                        <span class="shrink-0">
                                                            <img src="assets/images/delivery-1.png" alt="" class="h-12">
                                                        </span>
                                                        <span class="grow">
                                                            <span class="block mb-1 font-semibold text-15">Express Delivery</span>
                                                            <span class="text-slate-500 dark:text-zink-200">Expected delivery: 01 Nov, Wednesday</span>
                                                        </span>
                                                        <span class="shrink-0">
                                                            <span class="block text-lg font-semibold">$7</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="flex items-center gap-3">
                                                    <input id="deliveryOption2" onclick="counterDriver()" class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-purple-500 checked:border-purple-500 dark:checked:bg-purple-500 dark:checked:border-purple-500 checked:disabled:bg-purple-400 checked:disabled:border-purple-400 peer" type="radio" name="shippingDelivery" value="Economical delivery" data-shipping-cost="4">
                                                    <label for="deliveryOption2" class="flex flex-col gap-4 p-5 border rounded-md cursor-pointer md:flex-row border-slate-200 dark:border-zink-500 peer-checked:border-purple-500 dark:peer-checked:border-purple-700 grow">
                                                        <span class="shrink-0">
                                                            <img src="assets/images/delivery-2.png" alt="" class="h-12">
                                                        </span>
                                                        <span class="grow">
                                                            <span class="block mb-1 font-semibold text-15">Economical delivery</span>
                                                            <span class="text-slate-500 dark:text-zink-200">Expected delivery: 06 Nov, Monday</span>
                                                        </span>
                                                        <span class="shrink-0">
                                                            <span class="block text-lg font-semibold">$4</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="flex items-center gap-3">
                                                    <input id="deliveryOption3" onclick="counterDriver()" class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-purple-500 checked:border-purple-500 dark:checked:bg-purple-500 dark:checked:border-purple-500 checked:disabled:bg-purple-400 checked:disabled:border-purple-400 peer" type="radio" name="shippingDelivery" value="Free Shipping" data-shipping-cost="0">
                                                    <label for="deliveryOption3"  class="flex flex-col gap-4 p-5 border rounded-md cursor-pointer md:flex-row border-slate-200 dark:border-zink-500 peer-checked:border-purple-500 dark:peer-checked:border-purple-700 grow">
                                                        <span class="shrink-0">
                                                            <img src="assets/images/delivery-3.png" alt="" class="h-12">
                                                        </span>
                                                        <span class="grow">
                                                            <span class="block mb-1 font-semibold text-15">Buy At The Counter</span>
                                                            <span class="text-slate-500 dark:text-zink-200">Expected delivery: 11 Nov, Saturday</span>
                                                        </span>
                                                        <span class="shrink-0">
                                                            <span class="block text-lg font-semibold">$0</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end card-->
                                </div>
                            </div>

                            <div class="xl:col-span-3" >
                                <div class="sticky top-[calc(theme('spacing.header')_*_1.3)] mb-5">
                                    <div class="card ">
                                        <div class="card-body">
                                            <h6 class="mb-4 text-15">Order Summary</h6>
                                            <div class="overflow-x-auto">
                                                <table class="w-full">
                                                    <tbody class="table-total">
                                                        <tr>
                                                            <td class="py-2 text-slate-500 dark:text-zink-200">
                                                                Coupon
                                                            </td>
                                                            <td>
                                                                <div class="xl:col-span-4">
                                                                    <input type="text" id="coupon_code" name="coupon" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Coupon Order">
                                                                    <a href="javascript:coupon()">
                                                                        <button type="button">apply code</button>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="py-2 text-slate-500 dark:text-zink-200">
                                                                Sub Total
                                                            </td>
                                                            <td class="py-2 text-slate-500 dark:text-zink-200 cart-subtotal">
                                                                ${{ number_format($subtotal, 0) }}
                                                            </td>
                                                        </tr>

    {{--                                                <tr>--}}
    {{--                                                    <td class="py-2 text-slate-500 dark:text-zink-200">--}}
    {{--                                                        Estimated Tax ({{ Cart::tax() }}%)--}}
    {{--                                                    </td>--}}
    {{--                                                    <td class="py-2 text-slate-500 dark:text-zink-200 cart-tax">--}}
    {{--                                                        $167.79--}}
    {{--                                                    </td>--}}
    {{--                                                </tr>--}}
                                                        <tr>
                                                        <td class="discountSubmit py-2 text-slate-500 dark:text-zink-200">
                                                            Item Discounts
                                                        </td>
                                                        <td class="py-2 text-slate-500 dark:text-zink-200 cart-discount">
                                                            -$0
                                                        </td>
                                                    </tr>
                                                        <tr>
                                                        <td class="py-2 text-slate-500 dark:text-zink-200">
                                                            Shipping Counter
                                                        </td>
                                                        <td class="py-2 text-slate-500 dark:text-zink-200 cart-shipping">
                                                            $0
                                                        </td>
                                                    </tr>
                                                        <tr class="font-semibold">
                                                        <td class="pt-2">
                                                            Total Amount (USD)
                                                        </td>
                                                        <td class="pt-2 cart-total">
                                                            @if(isset($discount) && $discount > 0)
                                                                ${{ $total - $discount }}
                                                            @else
                                                                ${{ number_format($total, 0) }}
                                                            @endif
                                                        </td>
                                                            <input type="hidden" name="total" value="{{ number_format($total, 0) }}">
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex gap-2 mt-5 shrink-0">
                                        <a href="!#" class="w-full text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-red-400/20">Continue to Shopping</a>
                                        <button type="submit" class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Checkout</button>
                                    </div>

                                    <div class="flex items-center gap-5 p-4 mt-5 card">
                                        <div class="flex items-center justify-center rounded-md size-12 bg-slate-100 dark:bg-zink-600">
                                            <i data-lucide="truck" class="size-6 text-slate-500 fill-slate-300 dark:text-zink-200 dark:fill-zink-500"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Estimated Delivery</h6>
                                            <p class="text-slate-500">01 - 07 Dec, 2023</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-5 p-4 card">
                                        <div class="flex items-center justify-center rounded-md size-12 bg-slate-100 dark:bg-zink-600">
                                            <i data-lucide="container" class="size-6 text-slate-500 fill-slate-300 dark:text-zink-200 dark:fill-zink-500"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Free Shipping & Returns</h6>
                                            <p class="text-slate-500 dark:text-zink-200">On all orders over $200.00</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- end order counter  --}}
                </div>
            </div>
        </div>
    </div>


    {{-- List Products Cart --}}
    <div id="addProductsCart" modal-center="" class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600" style="width: 70rem">
            <div class="flex items-center justify-between p-4 border-b dark:border-zink-500">
                <h5 class="text-16">Search Products Add To Cart</h5>
                <div class="relative">
                    <input type="text" class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Search for ..." autocomplete="off">
                    <i data-lucide="search" class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                </div>
                <button data-modal-close="addProductsCart" class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x" class="w-5 h-5"></i></button>
            </div>
            <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                <div class="grid grid-cols-1 gap-4 xl:grid-cols-12">
                    <div class="xl:col-span-12">
                        <table class="w-full whitespace-nowrap" id="productTable">
                            <thead class="ltr:text-left rtl:text-right bg-slate-100 dark:bg-zink-600">
                            <tr>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort product_code" data-sort="product_code">Product Code</th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort product_name" data-sort="product_name">Product Name</th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort category" data-sort="category">Category</th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort price" data-sort="price">Price</th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort revenue" data-sort="revenue">Discount</th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort stock" data-sort="stock">Quantity</th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort status" data-sort="status">Status</th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 action">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @foreach($products as $key => $list)
                                <tr>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                        <a href="../dashboard/products/update/{{ $list->id }}" class="transition-all duration-150 ease-linear product_code text-custom-500 hover:text-custom-600">#TAD-2321000{{ $key + 1 }}</a>
                                    </td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 product_name">
                                        <a href="" class="flex items-center gap-2">
                                            <img src="{{ Storage::url($list->image) }}" alt="Product images" class="h-6" style="width: 60px; height: 100%">
                                            <h6 class="product_name">{{ $list->name }}</h6>
                                        </a>
                                    </td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 category">
                                        <span class="category px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-slate-100 border-slate-200 text-slate-500 dark:bg-slate-500/20 dark:border-slate-500/20 dark:text-zink-200">
                                           {{ $list->category->name_cate }}
                                        </span>
                                    </td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 price">${{ $list->price }}</td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 revenue">${{ $list->discount }}</td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 stock"> {{ $list->quantity }} </td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 status">
                                        <span class="status px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-orange-100 border-transparent text-orange-500 dark:bg-orange-500/20 dark:border-transparent">{{ $list->tag }}</span>
                                    </td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 action">
                                        <button data-modal-target="addCart{{ $key }}" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Select</button>
                                    </td>
                                </tr>
                                <div id="addCart{{ $key }}" modal-center="" style="border: 0.1px solid white; border-radius: 10px " class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
                                    <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600" style="border-radius: 10px">
                                        <div class="flex items-center justify-between p-4 border-b dark:border-zink-300/20">
                                            <h5 class="text-16">Add Cart Products</h5>
                                            <button data-modal-close="addCart{{ $key }}" class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x" class="size-5"></i></button>
                                        </div>
                                        <form action="../dashboard/counter/add/{{ $list->id }}" method="post">
                                            @csrf
                                            <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                                                    <div class="xl:col-span-6 flex items-center gap-2">
                                                        <img src="{{ Storage::url($list->image) }}" alt="Product images" class="h-6" style="width: 60px; height: 100%">
                                                        <h6 class="product_name">{{ $list->name }}</h6>
                                                    </div><!--end col-->

                                                    <div class="xl:col-span-6">
                                                        <div class="inline-flex text-center input-step">
                                                            <button type="button" class="border size-9 leading-[15px] minusBtn bg-white dark:bg-zink-700 dark:border-zink-500 ltr:rounded-l rtl:rounded-r transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="minus" class="inline-block size-4"></i></button>
                                                            <input type="number" name="numberCounter" class="w-12 text-center ltr:pl-2 rtl:pr-2 h-9 border-y product-quantity dark:bg-zink-700 focus:shadow-none dark:border-zink-500" value="1" min="1" max="{{ $list->quantity }}" >
                                                            <button type="button" class="transition-all duration-200 ease-linear bg-white border dark:bg-zink-700 dark:border-zink-500 ltr:rounded-r rtl:rounded-l size-9 border-slate-200 plusBtn text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="plus" class="inline-block size-4"></i></button>
                                                        </div>
                                                    </div>
                                                    {{-- color--}}
                                                    <div class="xl:col-span-6">
                                                        <label for="qualityInput" class="inline-block mb-2 text-base font-medium">Colors Variant</label>
                                                        <div class="flex flex-wrap items-center gap-2">
                                                            @php
                                                                $colorClasses = [
                                                                    'Xanh Dương' => 'border-sky-500',
                                                                    'Đỏ' => 'bg-red-500',
                                                                    'Cam' => 'bg-orange-500',
                                                                    'Nâu' => 'bg-green-500',
                                                                    'Xanh Nước Biển' => 'bg-purple-500',
                                                                    'Vàng' => 'bg-yellow-500',
                                                                    'Xám' => 'border-slate-500',
                                                                    'Đen' => 'bg-slate-900',
                                                                    'Trắng' => 'bg-slate-200',
                                                                    'Hồng' => 'bg-pink-500',
                                                                ]
                                                            @endphp
                                                            @foreach($list->color as $keyColor => $color)
                                                                <div>
                                                                    <input id="selectColor{{ $keyColor }}" class="inline-block align-middle {{ $colorClasses[$color->name_color]  ?? '' }} border border-orange-500 rounded-sm appearance-none cursor-pointer size-5  checked:{{ $colorClasses[$color->name_color] ?? '' }} disabled:opacity-75 disabled:cursor-default" type="checkbox" value="{{ $color->name_color }}" name="name_color">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <!--end col-->

                                                    {{-- size --}}
                                                    <div class="xl:col-span-6">
                                                        <div class="inline-block mb-2 text-base font-medium">Size</div>
                                                        <div class="flex flex-wrap items-center gap-2">
                                                            @foreach($list->size as $sizeKey => $size)
                                                                <div>
                                                                    <input id="select{{ $key }}{{ $size->name_size }}" class="size-products" type="checkbox" value="{{ $size->name_size }}" name="nameSizeee">
                                                                    <label for="select{{ $key }}{{ $size->name_size }}" class="selectSize flex items-center justify-center text-xs border rounded-md cursor-pointer size-10 border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/15 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">
                                                                        {{ $size->name_size }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <div class="flex justify-end gap-2 mt-4">
                                                    <button type="submit" onclick="return checkColorSize()" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Add Cart</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!--end add user-->
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="reset" data-modal-close="addProductsCart" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-600 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Cancel</button>
                </div>
            </div>
        </div>
    </div><!--end add holiday-->
    {{-- End List Producst Cart --}}


    {{-- List User Counter --}}
    <div id="addUserCounter" modal-center="" class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600" style="width: 70rem">
            <div class="flex items-center justify-between p-4 border-b dark:border-zink-500">
                <h5 class="text-16">Search Products Add To Cart</h5>
                <div class="relative">
                    <input type="text" class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Search for ..." autocomplete="off">
                    <i data-lucide="search" class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                </div>
                <button data-modal-close="addUserCounter" id="addUserCounter" class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x" class="w-5 h-5"></i></button>
            </div>
            <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                <div class="grid grid-cols-1 gap-4 xl:grid-cols-12">
                    <div class="xl:col-span-12">
                        <table class="w-full whitespace-nowrap" id="productTable">
                            <thead class="ltr:text-left rtl:text-right bg-slate-100 dark:bg-zink-600">
                            <tr>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort product_code" data-sort="product_code">User Code</th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort product_name" data-sort="product_name">User Name</th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort category" data-sort="category">Email</th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort price" data-sort="price">Phone</th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort revenue" data-sort="revenue">Address</th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort stock" data-sort="stock">Zip</th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort status" data-sort="status">role</th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 action">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @foreach($user as $key => $list)
                                <tr>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                        <a href="../dashboard/user/update/{{ $list->id }}" class="transition-all duration-150 ease-linear product_code text-custom-500 hover:text-custom-600">#TAD-2321000{{ $key + 1 }}</a>
                                    </td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 product_name">
                                        <a href="" class="flex items-center gap-2">
                                            <img src="{{ Storage::url($list->avatar) }}" alt="Product images" class="h-6" style="width: 60px; height: 100%">
                                            <h6 class="product_name">{{ $list->name }}</h6>
                                        </a>
                                    </td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 category">
                                        <span class="category px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-slate-100 border-slate-200 text-slate-500 dark:bg-slate-500/20 dark:border-slate-500/20 dark:text-zink-200">
                                           {{ $list->email }}
                                        </span>
                                    </td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 price">{{ $list->phone }}</td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 revenue">{{ $list->address }}</td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 stock"> {{ $list->zip }} </td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 status">
                                        <span class="status px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-orange-100 border-transparent text-orange-500 dark:bg-orange-500/20 dark:border-transparent">{{ $list->role == 1 ? 'Super Admin' : ($list->role == 2 ? 'User' : '')}}</span>
                                    </td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 action">
                                        <button data-id="{{ $list->id }}" id="select-user-btn" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Select</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="reset" data-modal-close="addProductsCart" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-600 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Cancel</button>
                </div>
            </div>
        </div>
    </div><!--end add holiday-->
    {{-- End List User Counter --}}

@endsection
