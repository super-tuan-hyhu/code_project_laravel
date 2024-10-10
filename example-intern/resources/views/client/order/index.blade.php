@extends('client.layout.master')
@section('title', 'Detail')
@section('body')
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

                <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
                    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

                        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                            <div class="grow">
                                <h5 class="text-16">Checkout</h5>
                            </div>
                            <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                                <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                                    <a href="#!" class="text-slate-400 dark:text-zink-200">Ecommerce</a>
                                </li>
                                <li class="text-slate-700 dark:text-zink-100">
                                    Checkout
                                </li>
                            </ul>
                        </div>
                        <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
                            <div class="xl:col-span-12">
                                <div class="flex gap-1 px-4 py-3 mb-5 text-sm text-green-500 border border-green-200 rounded-md md:items-center bg-green-50 dark:bg-green-400/20 dark:border-green-500/50">
                                    <i data-lucide="shopping-bag" class="h-4 shrink-0"></i> <p>The minimum order requirement is <b>$1,800</b>. To meet this threshold, please add additional products with a combined value of <b>$300</b>.</p>
                                </div>
                            </div><!--end col-->
                            <div class="xl:col-span-8">
                                <div class="flex items-center gap-3 mb-5">
                                    <div class="grow">
                                        <a href="#!" class="transition-all duration-300 ease-linear text-custom-500 hover:text-custom-600"><i data-lucide="chevron-left" class="inline-block align-middle size-4 ltr:mr-1 rtl:ml-1 rtl:rotate-180"></i> <span class="align-middle">Back to Cart</span></a>
                                    </div>
                                    <div class="shrink-0">
                                        <button type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><span class="align-middle">Place Order</span> <i data-lucide="move-right" class="inline-block align-middle size-4 ltr:ml-1 rtl:mr-1 rtl:rotate-180"></i></button>
                                    </div>
                                </div>Orders Summary
                                @if(Auth::check())
                                    <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-4 text-15">Shipping Information</h6>
                                        <form action="../client/order/confirm" method="post">
                                            @csrf
                                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-12">
                                                <div class="xl:col-span-4">
                                                    <label for="firstNameInput" class="inline-block mb-2 text-base font-medium">Full Name Client</label>
                                                    <input type="text" id="firstNameInput" name="accepted" value="{{ Auth::user()->name }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter First Name">
                                                </div><!--end col-->
                                                <div class="xl:col-span-4">
                                                    <label for="middleNameInput" class="inline-block mb-2 text-base font-medium">Email Client</label>
                                                    <input type="text" id="middleNameInput" name="email" value="{{ Auth::user()->email }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter Middle Name">
                                                </div><!--end col-->
                                                <div class="xl:col-span-4">
                                                    <label for="phoneNumberInput" class="inline-block mb-2 text-base font-medium">Phone Number</label>
                                                    <input type="number" id="phoneNumberInput" name="phone" value="{{ $default_address->phone }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                                </div><!--end col-->
                                                <div class="xl:col-span-4">
                                                    <label for="alternativeNumberInput" class="inline-block mb-2 text-base font-medium">City Client</label>
                                                    <input type="text" id="alternativeNumberInput" name="country" value="{{ $default_address->city }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                                </div><!--end col-->
                                                <div class="xl:col-span-4">
                                                    <label for="emailAddressInput" class="inline-block mb-2 text-base font-medium">District Client</label>
                                                    <input type="text" value="{{ $default_address->district }}" id="emailAddressInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter email">
                                                </div><!--end col-->
                                                <div class="xl:col-span-4">
                                                    <label for="streetAddressInput" class="inline-block mb-2 text-base font-medium">Wards Client</label>
                                                    <input type="text" id="streetAddressInput" name="address" value="{{ $default_address->wards }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Street address">
                                                </div><!--end col-->
                                                <div class="xl:col-span-12">
                                                    <label for="specific_addressInput" class="inline-block mb-2 text-base font-medium">Specific Address User</label>
                                                    <input type="text" name="order_address" value="{{ $default_address->specific_address }}" id="specific_addressInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Town/City">
                                                </div><!--end col-->
                                                <input type="hidden" name="account" value="{{ Auth::user()->id }}">
                                                <div class="xl:col-span-4">
                                                    <label for="stateInput" class="inline-block mb-2 text-base font-medium">Role Client</label>
                                                    <input type="text" id="stateInput" name="account" value="@if(Auth::user()->role == 1) Super Admin @else User @endif" disabled class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" >
                                                </div><!--end col-->
{{--                                                <div class="xl:col-span-4">--}}
{{--                                                    <label for="countryInput" class="inline-block mb-2 text-base font-medium">ZipCode Client</label>--}}
{{--                                                    <select id="countryInput" name="countryInput" data-choices="" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">--}}
{{--                                                        <option value="Viet Nam">Viet Nam</option>--}}
{{--                                                    </select>--}}
{{--                                                </div><!--end col-->--}}
                                                <div class="xl:col-span-4">
                                                    <label for="zipcodeInput" class="inline-block mb-2 text-base font-medium">ZipCode Client</label>
                                                    <input type="text" id="zipcodeInput" name="zip" value="{{ Auth::user()->zip }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="ZipCode">
                                                </div><!--end col-->
                                            </div><!--end grid-->
                                    </div>
                                </div><!--end card-->
                                @else
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="mb-4 text-15">Shipping Information</h6>

                                                <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-12">
                                                    <div class="xl:col-span-4">
                                                        <label for="firstNameInput" class="inline-block mb-2 text-base font-medium">First Name</label>
                                                        <input type="text" id="firstNameInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter First Name">
                                                    </div><!--end col-->
                                                    <div class="xl:col-span-4">
                                                        <label for="middleNameInput" class="inline-block mb-2 text-base font-medium">Middle Name</label>
                                                        <input type="text" id="middleNameInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter Middle Name">
                                                    </div><!--end col-->
                                                    <div class="xl:col-span-4">
                                                        <label for="lastNameInput" class="inline-block mb-2 text-base font-medium">Last Name</label>
                                                        <input type="text" id="lastNameInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter Last Name">
                                                    </div><!--end col-->
                                                    <div class="xl:col-span-4">
                                                        <label for="phoneNumberInput" class="inline-block mb-2 text-base font-medium">Phone Number</label>
                                                        <input type="text" id="phoneNumberInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="(012) 345 678 9010">
                                                    </div><!--end col-->
                                                    <div class="xl:col-span-4">
                                                        <label for="alternativeNumberInput" class="inline-block mb-2 text-base font-medium">Alternative Number</label>
                                                        <input type="text" id="alternativeNumberInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="(012) 345 678 9010">
                                                    </div><!--end col-->
                                                    <div class="xl:col-span-4">
                                                        <label for="emailAddressInput" class="inline-block mb-2 text-base font-medium">Email Address</label>
                                                        <input type="email" id="emailAddressInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter email">
                                                    </div><!--end col-->
                                                    <div class="xl:col-span-12">
                                                        <label for="streetAddressInput" class="inline-block mb-2 text-base font-medium">Street Address</label>
                                                        <input type="text" id="streetAddressInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Street address">
                                                    </div><!--end col-->
                                                    <div class="xl:col-span-12">
                                                        <label for="townCityInput" class="inline-block mb-2 text-base font-medium">Town/City</label>
                                                        <input type="text" id="townCityInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Town/City">
                                                    </div><!--end col-->
                                                    <div class="xl:col-span-4">
                                                        <label for="stateInput" class="inline-block mb-2 text-base font-medium">State</label>
                                                        <input type="text" id="stateInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="State">
                                                    </div><!--end col-->
                                                    <div class="xl:col-span-4">
                                                        <label for="countryInput" class="inline-block mb-2 text-base font-medium">Country</label>
                                                        <select id="countryInput" name="countryInput" data-choices="" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                                            <option value="Viet Nam">Viet Nam</option>
                                                        </select>
                                                    </div><!--end col-->
                                                    <div class="xl:col-span-4">
                                                        <label for="zipcodeInput" class="inline-block mb-2 text-base font-medium">ZipCode</label>
                                                        <input type="text" id="zipcodeInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="ZipCode">
                                                    </div><!--end col-->
                                                </div><!--end grid-->
                                        </div>
                                    </div><!--end card-->
                                @endif
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-4 text-15">Delivery</h6>
                                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-2">
                                            <div class="flex items-center gap-3">
                                                <input id="deliveryOption1" class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-purple-500 checked:border-purple-500 dark:checked:bg-purple-500 dark:checked:border-purple-500 checked:disabled:bg-purple-400 checked:disabled:border-purple-400 peer" type="radio" name="shippingDelivery" value="Express delivery" data-shipping-cost="7">
                                                <label for="deliveryOption1" class="flex flex-col gap-4 p-5 border rounded-md cursor-pointer md:flex-row border-slate-200 dark:border-zink-500 peer-checked:border-purple-500 dark:peer-checked:border-purple-700 grow">
                                                        <span class="shrink-0">
                                                            <img src="assets/images/delivery-1.png" alt="" class="h-12">
                                                        </span>
                                                    <span class="grow">
                                                            <span class="block mb-1 font-semibold text-15">Express Delivery</span>
                                                            <span class="text-slate-500 dark:text-zink-200">Expected delivery: 01 Nov, Wednesday</span>
                                                        </span>

                                                </label>
                                            </div>
                                            <div class="flex items-center gap-3">
                                                <input id="deliveryOption2" class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-purple-500 checked:border-purple-500 dark:checked:bg-purple-500 dark:checked:border-purple-500 checked:disabled:bg-purple-400 checked:disabled:border-purple-400 peer" type="radio" name="shippingDelivery" value="Economical delivery" data-shipping-cost="4">
                                                <label for="deliveryOption2" class="flex flex-col gap-4 p-5 border rounded-md cursor-pointer md:flex-row border-slate-200 dark:border-zink-500 peer-checked:border-purple-500 dark:peer-checked:border-purple-700 grow">
                                                        <span class="shrink-0">
                                                            <img src="assets/images/delivery-2.png" alt="" class="h-12">
                                                        </span>
                                                    <span class="grow">
                                                            <span class="block mb-1 font-semibold text-15">Economical delivery</span>
                                                            <span class="text-slate-500 dark:text-zink-200">Expected delivery: 06 Nov, Monday</span>
                                                        </span>

                                                </label>
                                            </div>
                                            <div class="flex items-center gap-3">
                                                <input id="deliveryOption3" class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-purple-500 checked:border-purple-500 dark:checked:bg-purple-500 dark:checked:border-purple-500 checked:disabled:bg-purple-400 checked:disabled:border-purple-400 peer" type="radio" name="shippingDelivery" value="Free Shipping" data-shipping-cost="0">
                                                <label for="deliveryOption3"  class="flex flex-col gap-4 p-5 border rounded-md cursor-pointer md:flex-row border-slate-200 dark:border-zink-500 peer-checked:border-purple-500 dark:peer-checked:border-purple-700 grow">
                                                        <span class="shrink-0">
                                                            <img src="assets/images/delivery-3.png" alt="" class="h-12">
                                                        </span>
                                                    <span class="grow">
                                                            <span class="block mb-1 font-semibold text-15">Buy At The Counter</span>
                                                            <span class="text-slate-500 dark:text-zink-200">Expected delivery: 11 Nov, Saturday</span>
                                                        </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end card-->

                            </div><!--end col-->
                            <div class="xl:col-span-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-4 text-15">Orders Summary</h6>
                                        <div class="px-4 py-3 mb-4 text-sm text-red-500 border border-transparent rounded-md bg-red-50 dark:bg-red-400/20">
                                            These products are limited, checkout within <span class="font-bold">03m 21s</span>
                                        </div>
                                        <div class="overflow-x-auto">
                                            <table class="w-full">
                                                <tbody>
                                                {{-- Cart All product --}}
                                                    @foreach($cart->cartDetail as $key => $list)
                                                        <tr>
                                                            <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500">
                                                                <div class="flex items-center gap-3">
                                                                    <div class="flex items-center justify-center rounded-md size-12 bg-slate-100 shrink-0">
                                                                        <img src="{{ Storage::url($list->productDetail->image) }}" alt="" class="h-8">
                                                                    </div>
                                                                    <div class="grow">
                                                                        <h6 class="mb-1 text-15"><a href="../client/detail/product-detail/{{ $list->productDetail->id }}/color/{{ $list->color->id_color }}" class="transition-all duration-300 ease-linear hover:text-custom-500">{{ $list->productDetail->name }}</a></h6>
                                                                        <p class="text-slate-500 dark:text-zink-200">${{ $list->productDetail->discount }} x 0{{ $list->quantity }}</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500 ltr:text-right rtl:text-left">${{ number_format($list->productDetail->discount * $list->quantity) }}</td>
                                                        </tr>
                                                    @endforeach
                                                {{-- Cart All product --}}
                                                    <tr>
                                                        <td class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                            Sub Total
                                                        </td>
                                                        <td class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">${{$cart->total_amount}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                            <input type="text" name="coupon" id="clientCoupon" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Coupon Client">
                                                        </td>
                                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">
                                                            <a href="javascript:orderCoupon()">
                                                                <button type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><span class="align-middle">Place Order</span> <i data-lucide="move-right" class="inline-block align-middle size-4 ltr:ml-1 rtl:mr-1 rtl:rotate-180"></i></button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                        Payment Method
                                                    </td>
                                                    <td>
                                                        <div class="flex flex-wrap gap-2">
                                                            <div class="flex items-center gap-2">
                                                                <input id="radioInline1" name="payment_methods" class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500" type="radio" value="Cash on Delivery" checked="">
                                                                <label for="radioInline1" class="align-middle">
                                                                    Cash On Delivery
                                                                </label>
                                                            </div>

                                                            <div class="flex items-center gap-2">
                                                                <input id="radioInline2" name="payment_methods" class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-green-500 checked:border-green-500 dark:checked:bg-green-500 dark:checked:border-green-500" type="radio" value="Payment by Credit Card">
                                                                <label for="radioInline2" class="align-middle">
                                                                    Payment By Credit Cart
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                    <tr>
                                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                            Item Discounts
                                                        </td>
                                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left cart-discount">0%</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                            Shipping Charge
                                                        </td>
                                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">
                                                            @if(Auth::check())
                                                                $0
                                                            @else
                                                                $10
                                                                <input type="hidden" name="ship" value="10">
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr class="font-semibold">
                                                        <td class="px-3.5 pt-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                            Total Amount (USD)
                                                        </td>
                                                        <td class="px-3.5 pt-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left cart-discount-amount">${{ $cart->total_amount }}</td>
                                                        <input type="hidden" name="total" value="{{ $cart->total_amount }}">
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="mt-4">
                                            <button type="submit" class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><span class="align-middle">Place Order</span> <i data-lucide="move-right" class="inline-block align-middle size-4 ltr:ml-1 rtl:mr-1 rtl:rotate-180"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="mb-4 underline text-16">Message When Purchasing</h6>
                                <div class="card">
                                    <div class="flex flex-col gap-3 md:items-center card-body md:flex-row">
                                        <div class="grow">
                                            <div>
                                                <textarea name="message" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productDescription" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end card-->
                        </form>
                            </div><!--end col-->
                        </div><!--end grid-->
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
            </div>
        </div>
    </div>
@endsection
