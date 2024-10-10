@extends('dashboard.layout.master')
@section('title', 'Order')
@section('body')

    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

        <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

                <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                    <div class="grow">
                        <h5 class="text-16">Order Lists</h5>
                    </div>
                    <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                        <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                            <a href="#!" class="text-slate-400 dark:text-zink-200">Ecommerce</a>
                        </li>
                        <li class="text-slate-700 dark:text-zink-100">
                            Order Lists
                        </li>
                    </ul>
                </div>
                <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 2xl:grid-cols-12">
                    <div class="2xl:col-span-2 2xl:row-span-1">
                        <div class="card">
                            <div class="flex items-center gap-3 card-body">
                                <div class="flex items-center justify-center rounded-md size-12 text-15 bg-custom-50 text-custom-500 dark:bg-custom-500/20 shrink-0"><i data-lucide="boxes"></i></div>
                                <div class="grow">
                                    <h5 class="mb-1 text-16 counter-value" data-target="15101">0</h5>
                                    <p class="text-slate-500 dark:text-zink-200">Total Orders</p>
                                </div>
                            </div>Pills TabsOrder Lists
                        </div>
                    </div><!--end col-->
                    <div class="2xl:col-span-2 2xl:row-span-1">
                        <div class="card">
                            <div class="flex items-center gap-3 card-body">
                                <div class="flex items-center justify-center rounded-md size-12 text-15 bg-sky-50 text-sky-500 dark:bg-sky-500/20 shrink-0"><i data-lucide="package-plus"></i></div>
                                <div class="grow">
                                    <h5 class="mb-1 text-16 counter-value" data-target="3874"></h5>
                                    <p class="text-slate-500 dark:text-zink-200">New Orders</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="order-last md:col-span-2 2xl:col-span-8 2xl:row-span-3 card 2xl:order-none">
                        <div class="card-body">
                            <h6 class="mb-4 text-gray-800 text-15 dark:text-zink-50">Orders Overview</h6>
                            <div id="ordersOverview" class="apex-charts" data-chart-colors='["bg-custom-500"]' dir="ltr"></div>
                        </div>
                    </div><!--end col-->
                    <div class="2xl:col-span-2 2xl:row-span-1">
                        <div class="card">
                            <div class="flex items-center gap-3 card-body">
                                <div class="flex items-center justify-center text-yellow-500 rounded-md size-12 text-15 bg-yellow-50 dark:bg-yellow-500/20 shrink-0"><i data-lucide="loader"></i></div>
                                <div class="grow">
                                    <h5 class="mb-1 text-16 counter-value" data-target="1548">0</h5>
                                    <p class="text-slate-500 dark:text-zink-200">Pending Orders</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="2xl:col-span-2 2xl:row-span-1">
                        <div class="card">
                            <div class="flex items-center gap-3 card-body">
                                <div class="flex items-center justify-center text-purple-500 rounded-md size-12 text-15 bg-purple-50 dark:bg-purple-500/20 shrink-0"><i data-lucide="truck"></i></div>
                                <div class="grow">
                                    <h5 class="mb-1 text-16 counter-value" data-target="9543">0</h5>
                                    <p class="text-slate-500 dark:text-zink-200">Shipping Orders</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="2xl:col-span-2 2xl:row-span-1">
                        <div class="card">
                            <div class="flex items-center gap-3 card-body">
                                <div class="flex items-center justify-center text-green-500 rounded-md size-12 text-15 bg-green-50 dark:bg-green-500/20 shrink-0"><i data-lucide="package-check"></i></div>
                                <div class="grow">
                                    <h5 class="mb-1 text-16 counter-value" data-target="30914">0</h5>
                                    <p class="text-slate-500 dark:text-zink-200">Delivered Orders</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="2xl:col-span-2 2xl:row-span-1">
                        <div class="card">
                            <div class="flex items-center gap-3 card-body">
                                <div class="flex items-center justify-center text-red-500 rounded-md size-12 text-15 bg-red-50 dark:bg-red-500/20 shrink-0"><i data-lucide="package-x"></i></div>
                                <div class="grow">
                                    <h5 class="mb-1 text-16 counter-value" data-target="3863">0</h5>
                                    <p class="text-slate-500 dark:text-zink-200">Cancelled Orders</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end grid-->

                <div class="card" id="ordersTable">
                    <div class="card-body">
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-12">
                            <div class="lg:col-span-3">
                                <div class="relative">
                                    <form action="../dashboard/order/" method="get">
                                        <input type="text" name="search" class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Search for ..." autocomplete="off">
                                        <i data-lucide="search" class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                                    </form>
                                    </div>
                            </div><!--end col-->
                            <div class="lg:col-span-2 lg:col-start-11">
                                <div class="ltr:lg:text-right rtl:lg:text-left">
                                    <a href="#!" data-modal-target="addOrderModal" type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i data-lucide="plus" class="inline-block size-4"></i> <span class="align-middle">Add Order</span></a>
                                </div>
                            </div>
                        </div><!--col grid-->

                        <ul class="flex flex-wrap w-full mt-5 text-sm font-medium text-center text-gray-500 nav-tabs">
                            <li class="group active">
                                <a href="javascript:void(0);" data-tab-toggle="" data-target="allOrders" class="inline-block px-4 py-1.5 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white dark:group-[.active]:text-white hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]"><i data-lucide="boxes" class="inline-block size-4 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">All Orders</span></a>
                            </li>
                            <li class="group">
                                <a href="javascript:void(0);" data-tab-toggle="" data-target="pendingOrder" class="inline-block px-4 py-1.5 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white dark:group-[.active]:text-white hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]"><i data-lucide="loader" class="inline-block size-4 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Pending</span></a>
                            </li>
                            <li class="group">
                                <a href="javascript:void(0);" data-tab-toggle="" data-target="deliveredOrder" class="inline-block px-4 py-1.5 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white dark:group-[.active]:text-white hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]"><i data-lucide="package-check" class="inline-block size-4 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Delivered</span></a>
                            </li>
                            <li class="group">
                                <a href="javascript:void(0);" data-tab-toggle="" data-target="returnsOrders" class="inline-block px-4 py-1.5 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white dark:group-[.active]:text-white hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]"><i data-lucide="refresh-ccw" class="inline-block size-4 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Returns</span></a>
                            </li>
                            <li class="group">
                                <a href="javascript:void(0);" data-tab-toggle="" data-target="cancelledOrders" class="inline-block px-4 py-1.5 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white dark:group-[.active]:text-white hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]"><i data-lucide="package-x" class="inline-block size-4 ltr:mr-1 rtl:ml-1 "></i> <span class="align-middle">Cancelled</span></a>
                            </li>
                        </ul>

                        <div class="mt-5 overflow-x-auto">
                            {{-- list all order  --}}
                                <div class="block tab-pane" id="allOrders">
                                    <table class="w-full whitespace-nowrap">
                                        <thead class="ltr:text-left rtl:text-right bg-slate-100 dark:bg-zink-600">
                                            <tr>
                                            <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200">
                                                <div class="flex items-center h-full">
                                                    <input id="CheckboxAll" class="size-4 cursor-pointer bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800" type="checkbox">
                                                </div>
                                            </th>
                                            <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="order_id">Order ID</th>
                                            <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="order_date">Customer Name</th>
                                            <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="delivery_date">Email Order</th>
                                            <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="customer_name">Delivery Status</th>
                                            <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="payment_method">Payment Method</th>
                                            <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="amount">Amount</th>
                                            <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="delivery_status">Delivery Status</th>
                                            <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200">Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($order as $key => $list)
                                               <tr>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                <div class="flex items-center h-full">
                                                    <input id="Checkbox1" class="size-4 cursor-pointer bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800" type="checkbox">
                                                </div>
                                            </td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500"><a href="#!" class="transition-all duration-150 ease-linear order_id text-custom-500 hover:text-custom-600">#TWT{{ $list->barCode }}</a></td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 order_date">{{ $list->accepted }}</td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 delivery_date">{{ $list->email }}</td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 customer_name">{{ $list->shippingDelivery }}</td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 payment_method">{{ $list->payment_methods }}</td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 amount">${{ $list->total }}</td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                <span class="delivery_status px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-green-100 border-green-200 text-green-500 dark:bg-green-500/20 dark:border-green-500/20">{{ $list->status }} </span>
                                            </td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 action">
                                                       <div class=" dropdown">
                                                           <button class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20" id="productAction1" data-bs-toggle="dropdown"><i data-lucide="more-horizontal" class="size-3"></i></button>
                                                           <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600" aria-labelledby="productAction1">
                                                               <li>
                                                                   <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="../dashboard/order/orderDetail/{{ $list->id_order }}"><i data-lucide="eye" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Overview</span></a>
                                                               </li>
                                                               <li>
                                                                   <form action="../dashboard/products/delete/{{ $list->id }}" method="post">
                                                                       @csrf
                                                                       @method('DELETE')
                                                                       <button onclick="return confirm('Do you want to delete this product')" data-modal-target="deleteModal" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" ><i data-lucide="trash-2" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Delete</span></button>
                                                                   </form>
                                                               </li>
                                                           </ul>
                                                       </div>
                                                   </td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            {{-- End List all order  --}}
                                <div class="hidden tab-pane" id="pendingOrder">
                                    <table class="w-full whitespace-nowrap">
                                        <thead class="ltr:text-left rtl:text-right bg-slate-100 dark:bg-zink-600">
                                        <tr>
                                            <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200">
                                                <div class="flex items-center h-full">
                                                    <input id="CheckboxAll" class="size-4 cursor-pointer bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800" type="checkbox">
                                                </div>
                                            </th>
                                            <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="order_id">Order ID</th>
                                            <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="order_date">Order Date</th>
                                            <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="delivery_date">Delivery Date</th>
                                            <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="customer_name">Customer Name</th>
                                            <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="payment_method">Payment Method</th>
                                            <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="amount">Amount</th>
                                            <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="delivery_status">Delivery Status</th>
                                            <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                <div class="flex items-center h-full">
                                                    <input id="Checkbox1" class="size-4 cursor-pointer bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800" type="checkbox">
                                                </div>
                                            </td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500"><a href="#!" class="transition-all duration-150 ease-linear order_id text-custom-500 hover:text-custom-600">#TWT5015100365</a></td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 order_date">08 Jun, 2023</td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 delivery_date">15 Jun, 2023</td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 customer_name">Marie Prohaska</td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 payment_method">Credit Card</td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 amount">$541.32</td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                <span class="delivery_status px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-green-100 border-green-200 text-green-500 dark:bg-green-500/20 dark:border-green-500/20">Delivered</span>
                                            </td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                <div class="relative dropdown">
                                                    <button id="orderAction1" data-bs-toggle="dropdown" class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20"><i data-lucide="more-horizontal" class="size-3"></i></button>
                                                    <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600" aria-labelledby="orderAction1">
                                                        <li>
                                                            <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="apps-ecommerce-order-overview.html"><i data-lucide="eye" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Overview</span></a>
                                                        </li>
                                                        <li>
                                                            <a data-modal-target="addOrderModal" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"><i data-lucide="file-edit" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Edit</span></a>
                                                        </li>
                                                        <li>
                                                            <a data-modal-target="deleteModal" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"><i data-lucide="trash-2" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Delete</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                        </div>

                        <div class="flex flex-col items-center mt-5 md:flex-row">
                            <div class="mb-4 grow md:mb-0">
                                <p class="text-slate-500 dark:text-zink-200">Showing <b>10</b> of <b>18</b> Results</p>
                            </div>
                            <ul class="flex flex-wrap items-center gap-2 shrink-0">
                                <li>
                                    <a href="#!" class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto"><i class="mr-1 size-4 rtl:rotate-180" data-lucide="chevron-left"></i> Prev</a>
                                </li>
                                <li>
                                    <a href="#!" class="inline-flex items-center justify-center bg-white dark:bg-zink-700 size-8 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">1</a>
                                </li>
                                <li>
                                    <a href="#!" class="inline-flex items-center justify-center bg-white dark:bg-zink-700 size-8 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto active">2</a>
                                </li>
                                <li>
                                    <a href="#!" class="inline-flex items-center justify-center bg-white dark:bg-zink-700 size-8 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">3</a>
                                </li>
                                <li>
                                    <a href="#!" class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">Next <i class="ml-1 size-4 rtl:rotate-180" data-lucide="chevron-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!--end card-->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="ltr:md:left-vertical-menu rtl:md:right-vertical-menu group-data-[sidebar-size=md]:ltr:md:left-vertical-menu-md group-data-[sidebar-size=md]:rtl:md:right-vertical-menu-md group-data-[sidebar-size=sm]:ltr:md:left-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:md:right-vertical-menu-sm absolute right-0 bottom-0 px-4 h-14 group-data-[layout=horizontal]:ltr:left-0  group-data-[layout=horizontal]:rtl:right-0 left-0 border-t py-3 flex items-center dark:border-zink-600">
            <div class="group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl w-full">
                <div class="grid items-center grid-cols-1 text-center lg:grid-cols-2 text-slate-400 dark:text-zink-200 ltr:lg:text-left rtl:lg:text-right">
                    <div>
                        <script>document.write(new Date().getFullYear())</script> StarCode Kh
                    </div>
                    <div class="hidden lg:block">
                        <div class="ltr:text-right rtl:text-left">
                            Design & Develop by StarCode Kh
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

@endsection
