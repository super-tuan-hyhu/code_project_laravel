@extends('dashboard.layout.master')
@section('title', 'Order')
@section('body')

    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

        <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

                <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                    <div class="grow">
                        <h5 class="text-16">Order Overview</h5>
                    </div>
                    @if($errors->has('cancel_8'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('cancel_8') }}</p>
                    @endif
                    @if(Session::has('messageOrder'))
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                        <script>
                            swal("Message", "{{ Session::get("messageOrder") }}", "success", {
                                button:true,
                                button:"OK",
                            })
                        </script>
                    @endif
                    <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                        <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                            <a href="#!" class="text-slate-400 dark:text-zink-200">Ecommerce</a>
                        </li>
                        <li class="text-slate-700 dark:text-zink-100">
                            Order Overview
                        </li>
                    </ul>
                </div>
                <div class="grid grid-cols-1 2xl:grid-cols-12 gap-x-5">
                    <div class="2xl:col-span-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="flex items-center justify-center bg-purple-100 rounded-md size-12 dark:bg-purple-500/20 ltr:float-right rtl:float-left">
                                    <i data-lucide="truck" class="text-purple-500 fill-purple-200 dark:fill-purple-500/30"></i>
                                </div>
                                <h6 class="mb-4 text-15">Shipping Details</h6>

                                <h6 class="mb-1">{{ $order->country }}</h6>
                                <p class="mb-1 text-slate-500 dark:text-zink-200">{{ $order->address }}</p>
                                <p class="text-slate-500 dark:text-zink-200">{{ $order->order_address }}</p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="2xl:col-span-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="flex items-center justify-center bg-orange-100 rounded-md size-12 dark:bg-orange-500/20 ltr:float-right rtl:float-left">
                                    <i data-lucide="credit-card" class="text-orange-500 fill-orange-200 dark:fill-orange-500/30"></i>
                                </div>
                                <h6 class="mb-4 text-15">Billing Details</h6>

                                <h6 class="mb-1">Pauline Hylton</h6>
                                <p class="mb-1 text-slate-500 dark:text-zink-200">1235 Crossing Meadows Dr, Onalaska</p>
                                <p class="text-slate-500 dark:text-zink-200">West Virginia, USA</p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="2xl:col-span-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="flex items-center justify-center rounded-md size-12 ltr:float-right rtl:float-left bg-sky-100 dark:bg-sky-500/20">
                                    <i data-lucide="circle-dollar-sign" class="text-sky-500 fill-sky-200 dark:fill-sky-500/30"></i>
                                </div>
                                <h6 class="mb-4 text-15">Payment Details</h6>

                                <h6 class="mb-1">ID: #TSD456DF41SD5</h6>
                                <p class="mb-1 text-slate-500 dark:text-zink-200">Payment Method: <b>Credit Card</b></p>
                                <p class="mb-1 text-slate-500 dark:text-zink-200">Card Number: <b>xxxx xxxx xxxx 1501</b></p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="2xl:col-span-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="bg-yellow-100 rounded-md size-12 ltr:float-right rtl:float-left dark:bg-yellow-500/20">
                                    <img src="{{ Storage::url($order->accountCoupon->avatar) }}" alt="" class="h-12 rounded-md" style="width: 100%; height: auto">
                                </div>
                                <h6 class="mb-4 text-15">Customer Info</h6>

                                <h6 class="mb-1">{{ $order->accountCoupon->name }}</h6>
                                <p class="mb-1 text-slate-500 dark:text-zink-200">{{ $order->accountCoupon->email }}</p>
                                <p class="text-slate-500 dark:text-zink-200">{{ $order->accountCoupon->phone }}</p>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end grid-->

                <div class="grid grid-cols-1 2xl:grid-cols-12 gap-x-5">
                    <div class="2xl:col-span-9">
                        <div class="grid grid-cols-1 2xl:grid-cols-5 gap-x-5">
                            <div>
                                <div class="card">
                                    <div class="text-center card-body">
                                        <h6 class="mb-1 underline">#TWT{{ $order->barCode }}</h6>
                                        <p class="uppercase text-slate-500 dark:text-zink-200">Order ID</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div>
                                <div class="card">
                                    <div class="text-center card-body">
                                        <h6 class="mb-1">{{ $order->created_at }}</h6>
                                        <p class="uppercase text-slate-500 dark:text-zink-200">Order Date</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div>
                                <div class="card">
                                    <div class="text-center card-body">
                                        <h6 class="mb-1">{{ $order->updated_at }}</h6>
                                        <p class="uppercase text-slate-500 dark:text-zink-200">Delivery Date</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div>
                                <div class="card">
                                    <div class="text-center card-body">
                                        <h6 class="mb-1">${{ $order->total }}</h6>
                                        <p class="uppercase text-slate-500 dark:text-zink-200">Order Amount</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div>
                                <div class="card">
                                    <div class="text-center card-body">
                                        <span class="delivery_status px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-purple-100 border-purple-200 text-purple-500 dark:bg-purple-500/20 dark:border-purple-500/20">{{ $order->status }}</span>
                                        <p class="uppercase text-slate-500 dark:text-zink-200">Order Status</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end grid-->
                        <div class="card">
                            <div class="card-body">
                                <div class="flex items-center gap-3 mb-4">
                                    <h6 class="text-15 grow">Order Summary</h6>
                                    @if($order->status != 'Giao Hàng Thành Công' && $order->status != 'Đã Hủy Đơn')
                                    <form action="../dashboard/shipment/update/{{ $order->id_order }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i data-lucide="save" class="inline-block size-4 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Update Ship</span></button>
                                    </form>

                                        <button type="submit" data-modal-target="deleteModal" class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Cancelled Order</button>
                                    @endif
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="w-full">
                                        <tbody>
                                            @foreach($orderDetail as $key => $detail)
                                                <tr>
                                            <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500">
                                                <div class="flex items-center gap-3">
                                                    <div class="flex items-center justify-center rounded-md size-12 bg-slate-100 shrink-0" style="width: 85px; height: 99px">
                                                        <img src="{{ Storage::url($detail->products->image) }}" alt="" class="h-8" style="height: 6rem">
                                                    </div>
                                                    <div class="grow">
                                                        <h6 class="mb-1 text-15"><a href="!#" class="transition-all duration-300 ease-linear hover:text-custom-500">{{ $detail->name_product }}</a></h6>
                                                        <p class="text-slate-500 dark:text-zink-200">${{ $detail->price_product }} x 0{{ $detail->number_product }}</p>
                                                        <p class="text-slate-500 dark:text-zink-200">Color : {{ $detail->color }} </p>
                                                        <p class="text-slate-500 dark:text-zink-200">Size : {{ $detail->size }} </p>
                                                    </div>
                                                    <div class="grow">
                                                        <p class="text-slate-500 dark:text-zink-200">Category : {{ $detail->category->name_cate }} </p>
                                                        <p class="text-slate-500 dark:text-zink-200">Brand : {{ $detail->brand->name_brand }} </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500 ltr:text-right rtl:text-left">${{ $detail->price_product * $detail->number_product }}</td>
                                        </tr>
                                            @endforeach
                                            <tr>
                                                <td class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                    Sub Total
                                                </td>
                                                <td class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">${{ $detail->price_product * $detail->number_product }}</td>
                                            </tr>
                                            <tr>
                                                <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                    Coupon Discounts
                                                </td>
                                                @if($detail->coupon != null)
                                                    <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left"> {{ $detail->coupon }}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                    Payment Methods
                                                </td>
                                                <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left"> {{ $order->payment_methods }}</td>
                                            </tr>
                                            <tr class="font-semibold">
                                                <td class="px-3.5 pt-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                    Total Amount (USD)
                                                </td>
                                                <td class="px-3.5 pt-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">${{ $order->total }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!--end card-->
                        <div class="card">
                            <div class="card-body">
                                <div class="flex items-center gap-3 mb-4">
                                    <h6 class="text-15 grow">Order Status</h6>
                                    <div class="shrink-0">
                                        <a href="#!" class="inline-block text-red-500 underline ltr:mr-2 rtl:ml-2">Cancelled Order</a>
                                        <button onclick="window.print()" type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i data-lucide="save" class="inline-block size-4 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Save & Print</span></button>
                                    </div>
                                </div>
                                <div>
                                    @if($shipment->cancel_8 != "Chưa xử lý")
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Cancel Order</h6>
                                                    <p class="text-gray-400 dark:text-zink-200">Reason : {{ $shipment->cancel_8 }}</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $shipment->updated_at->format('Y-m-d') }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($shipment->shipments_7 === "Giao Hàng Thành Công")
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Delivered</h6>
                                                    <p class="text-gray-400 dark:text-zink-200">{{ $shipment->shipments_7 }} "Delivered."</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $shipment->updated_at->format('Y-m-d') }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($shipment->shipments_6 === "Người Dùng Đang Thanh Toán")
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Delivered</h6>
                                                    <p class="text-gray-400 dark:text-zink-200">{{ $shipment->shipments_6 }} "Delivered."</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $shipment->updated_at->format('Y-m-d') }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($shipment->shipments_5 === "Đã Đến Điểm Giao")
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Delivered</h6>
                                                    <p class="text-gray-400 dark:text-zink-200">{{ $shipment->shipments_5 }} "Delivered."</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $shipment->updated_at->format('Y-m-d') }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($shipment->shipments_4 === "Đang Giao Hàng")
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Delivered</h6>
                                                    <p class="text-gray-400 dark:text-zink-200">{{ $shipment->shipments_4 }} "Delivered."</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $shipment->updated_at->format('Y-m-d') }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($shipment->shipments_3 === "Đang Đóng Hàng")
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Delivered</h6>
                                                    <p class="text-gray-400 dark:text-zink-200">{{ $shipment->shipments_3 }} "Delivered."</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $shipment->updated_at->format('Y-m-d') }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($shipment->shipments_2 === "Chuẩn Bị Đơn Hàng")
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                        <div class="flex gap-4">
                                            <div class="grow">
                                                <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Delivered</h6>
                                                <p class="text-gray-400 dark:text-zink-200">{{ $shipment->shipments_2 }} "Delivered."</p>
                                            </div>
                                            <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $shipment->updated_at->format('Y-m-d') }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if($shipment->shipments_1 === "Chờ Xác Nhận")
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Order Placed</h6>
                                                    <p class="text-gray-400 dark:text-zink-200">{{ $shipment->shipments_1 }}.</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $shipment->created_at->format('Y-m-d') }} </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="2xl:col-span-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-3 text-gray-800 text-15 dark:text-white">Documents</h6>
                                <div class="overflow-x-auto">
                                    <table class="w-full">
                                        <tbody>
                                        <tr>
                                            <td class="px-3.5 first:pl-0 last:pr-0 py-2 border-y border-transparent">Invoice No.</td>
                                            <td class="px-3.5 first:pl-0 last:pr-0 py-2 border-y border-transparent"><a href="apps-invoice-overview.html" class="text-custom-500">#TWI154203</a></td>
                                        </tr>
                                        <tr>
                                            <td class="px-3.5 first:pl-0 last:pr-0 py-2 border-y border-transparent">Shipping No</td>
                                            <td class="px-3.5 first:pl-0 last:pr-0 py-2 border-y border-transparent"><a href="#!" class="text-custom-500">#TWS987102301</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="flex items-center gap-3 mb-4">
                                    <h6 class="text-15 grow">Logistics Details</h6>
                                    <a href="#!" class="underline text-custom-500 shrink-0">Track Order</a>
                                </div>
                                @if($order->shippingDelivery == 'Express delivery')
                                    <div class="flex gap-4">
                                        <div class="shrink-0">
                                            <img src="assets/images/delivery-1.png" alt="" class="h-10">
                                        </div>
                                        <div class="grow">
                                            <h6 class="mb-1 text-15">Express Delivery</h6>
                                            <p class="text-slate-500 dark:text-zink-200">ID: EDTW{{ $order->barCode }}</p>
                                        </div>
                                    </div>
                                @elseif($order->shippingDelivery == 'Economical delivery')
                                    <div class="flex gap-4">
                                        <div class="shrink-0">
                                            <img src="assets/images/delivery-2.png" alt="" class="h-10">
                                        </div>
                                        <div class="grow">
                                            <h6 class="mb-1 text-15">Economical delivery</h6>
                                            <p class="text-slate-500 dark:text-zink-200">ID: EDTW{{ $order->barCode }}</p>
                                        </div>
                                    </div>
                                @elseif($order->shippingDelivery == 'Free Shipping')
                                    <div class="flex gap-4">
                                        <div class="shrink-0">
                                            <img src="assets/images/delivery-3.png" alt="" class="h-10">
                                        </div>
                                        <div class="grow">
                                            <h6 class="mb-1 text-15">Buy At The Counter</h6>
                                            <p class="text-slate-500 dark:text-zink-200">ID: EDTW{{ $order->barCode }}</p>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end grid-->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>


    {{-- List User Counter --}}
        <div id="deleteModal" modal-center="" class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
        <div class="w-screen md:w-[25rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto px-6 py-8">
                <div class="float-right">
                    <button data-modal-close="deleteModal" class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500"><i data-lucide="x" class="size-5"></i></button>
                </div>
                <div class="mt-5 text-center">
                    <h5 class="mb-1">Are you sure?</h5>
                    <p class="text-slate-500 dark:text-zink-200">Are you certain you want to cancel this order?</p>
                    <form action="../dashboard/shipment/cancel/{{ $order->id_order }}" method="post">
                        @csrf
                        @method('PUT')
                        <textarea name="cancel_8" class="mt-4 form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productDescription" placeholder="Reason for Cancellation" rows="5" style="height: 80px;"></textarea>
                        <div class="flex justify-center gap-2 mt-6">
                            <button type="reset" data-modal-close="deleteModal" class="bg-white text-slate-500 btn hover:text-slate-500 hover:bg-slate-100 focus:text-slate-500 focus:bg-slate-100 active:text-slate-500 active:bg-slate-100 dark:bg-zink-600 dark:hover:bg-slate-500/10 dark:focus:bg-slate-500/10 dark:active:bg-slate-500/10">Cancel</button>
                            <button type="submit" class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Yes, Delete It!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End List User Counter --}}

@endsection
