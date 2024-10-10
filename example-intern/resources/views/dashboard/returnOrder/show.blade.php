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
                            <div class="xl:col-span-9 products-list">
                                    <div class="flex items-center gap-3 mb-5">
                                        <h5 class="underline text-16 grow">Shopping Cart ({{ Cart::count()}})</h5>
                                        <div style="cursor: pointer">
                                            <a onclick="confirm('Do you want to delete all this products to counter') === true ? destroy() : ''" class="text-red-500 transition-all duration-300 ease-linear hover:text-red-600"><i data-lucide="trash-2" class="inline-block mr-1 align-middle size-4"></i> <span class="align-middle">Delete All</span></a>
                                        </div>
                                    </div>
                                    <div class="counter">
                                        @foreach($orderDetail as $key => $detail)
                                            <div class="counterCart card products" id="product1">
                                                <div  class="card-body">


                                                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-12">

                                                        <div class="p-4 rounded-md lg:col-span-2 bg-slate-100 dark:bg-zink-600">
                                                            <img src="{{ Storage::url($detail->products->image) }}" alt="" style="max-width: 100%; height: 141px; margin-left: 29px">
                                                        </div><!--end col-->
                                                        <div class="flex flex-col lg:col-span-4">
                                                            <div>
                                                                <h5 class="mb-1 text-16"><a href="">{{ $detail->name_product }}</a></h5>
                                                                <p class="mb-2 text-slate-500 dark:text-zink-200"><a >Category : {{ $detail->category->name_cate }}</a></p>
                                                                <p class="mb-2 text-slate-500 dark:text-zink-200"><a >Brand : {{ $detail->brand->name_brand}}</a></p>
                                                                <p class="mb-1 text-slate-500 dark:text-zink-200">Color: <span class="text-slate-800 dark:text-zink-50">{{ $detail->color }}</span></p>
                                                                <p class="mb-3 text-slate-500 dark:text-zink-200">Size: <span class="text-slate-800 dark:text-zink-50">{{ $detail->size }}</span></p>
                                                            </div>
                                                            <div class="flex items-center gap-2 mt-auto">
                                                                <div class="inline-flex p-2 text-center border rounded input-step border-slate-200 dark:border-zink-500">
                                                                    <input type="number" class="text-center ltr:pl-2 rtl:pr-2 w-15 h-7 products-quantity dark:bg-zink-700 focus:shadow-none" value="{{ $detail->number_product }}" min="1" max="{{ $detail->number_product }}" readonly>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="flex justify-between w-full lg:flex-col lg:col-end-13 lg:col-span-2">
                                                            <div class="mb-auto ltr:lg:text-right rtl:lg:text-left">
                                                                <h6 class="text-16 products-price">$<span>{{ $detail->price_product }}</span> <small class="font-normal line-through text-slate-500 dark:text-zink-200"></small></h6>
                                                            </div>
                                                            <div class="flex">
                                                            <h6 class="mt-auto text-16 ltr:lg:text-right rtl:lg:text-left">$<span class="products-line-price">{{ $detail->price_product * $detail->number_product }}</span></h6>
                                                            <button data-modal-target="defaultModal" type="button" style="margin-left: 34px;" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Select</button>
                                                            </div>
                                                        </div><!--end col-->
                                                    </div>

                                                </div>
                                            </div><!--end card-->

                                            {{-- default modal --}}
                                            <div id="defaultModal" modal-center="" class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
                                                <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600 flex flex-col h-full">
                                                    <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
                                                        <h5 class="text-16">{{ $detail->name_product }}</h5>
                                                        <button data-modal-close="defaultModal" class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500 dark:text-zink-200 dark:hover:text-red-500"><i data-lucide="x" class="size-5"></i></button>
                                                    </div>
                                                    <form action="../dashboard/cancel_order/return-order/{{ $order->id_order }}" method="post">
                                                        @csrf
                                                        <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                                                            <h5 class="mb-3 text-16">Modal Content</h5>
                                                            <input type="hidden" value="{{ $detail->product_id }}" name="products[]">
                                                            <div class="inline-flex p-2 text-center border rounded input-step border-slate-200 dark:border-zink-500">
                                                                <input type="number" name="quantities[]" class="text-center ltr:pl-2 rtl:pr-2 w-15 h-7 products-quantity dark:bg-zink-700 focus:shadow-none" value="{{ $detail->number_product }}" min="1" max="{{ $detail->number_product }}">
                                                            </div>
                                                            <p class="text-slate-500 dark:text-zink-200">
                                                                <textarea name="reason" class="mt-4 form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productDescription" placeholder="Reason for Cancellation" rows="5" style="height: 80px;"></textarea>
                                                            </p>
                                                        </div>
                                                        <div class="flex items-center justify-between p-4 mt-auto border-t border-slate-200 dark:border-zink-500">
                                                            <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Cancel Order</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            {{-- end modal default --}}
                                        @endforeach
                                    </div>
                                </div>
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
                                                            $0
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

                                                        </td>
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
@endsection
