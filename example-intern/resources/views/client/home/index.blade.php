@extends('client.layout.master')
@section('title', 'Home')
@section('body')


<nav class="fixed inset-x-0 top-0 z-50 flex items-center justify-center h-20 py-3 [&.is-sticky]:bg-white dark:[&.is-sticky]:bg-zinc-900 border-b border-slate-200 dark:border-zinc-800 [&.is-sticky]:shadow-lg [&.is-sticky]:shadow-slate-200/25 dark:[&.is-sticky]:shadow-zinc-700/30 navbar" id="navbar">
        <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto flex items-center self-center w-full">
            <div class="shrink-0">
                <a href="../client/home">
                    <img src="assets/images/logo-dark.png" alt="" class="block h-6 dark:hidden">
                    <img src="assets/images/logo-light.png" alt="" class="hidden h-6 dark:block">
                </a>
            </div>
            <div class="mx-auto">
                <ul id="navbar7" class="absolute inset-x-0 z-20 items-center hidden py-3 mt-px bg-white shadow-lg md:mt-0 dark:bg-zinc-800 dark:md:bg-transparent md:z-0 navbar-menu rounded-b-md md:shadow-none md:flex top-full ltr:ml-auto rtl:mr-auto md:relative md:bg-transparent md:rounded-none md:top-auto md:py-0">
                    <li>
                        <a href="#home" class="block md:inline-block px-4 md:px-3 py-2.5 md:py-0.5 text-15 font-medium text-slate-800 transition-all duration-300 ease-linear hover:text-custom-500 [&.active]:text-custom-500 dark:text-zinc-200 dark:hover:text-custom-500 dark:[&.active]:text-custom-500 active">Home</a>
                    </li>
                    <li>
                        <a href="#product" class="block md:inline-block px-4 md:px-3 py-2.5 md:py-0.5 text-15 font-medium text-slate-800 transition-all duration-300 ease-linear hover:text-custom-500 [&.active]:text-custom-500 dark:text-zinc-200 dark:hover:text-custom-500 dark:[&.active]:text-custom-500">Shop</a>
                    </li>
                    <li>
                        @php
                            $listcate = \App\Models\Category::all();
                        @endphp
                        <div class="dropdown">
                            <button type="button" class="inline-block p-0 transition-all duration-200 ease-linear bg-topbar rounded-full text-topbar-item dropdown-toggle btn hover:bg-topbar-item-bg-hover hover:text-topbar-item-hover group-data-[topbar=dark]:text-topbar-item-dark group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:hover:bg-topbar-item-bg-hover-dark group-data-[topbar=dark]:hover:text-topbar-item-hover-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:hover:bg-topbar-item-bg-hover-brand group-data-[topbar=brand]:hover:text-topbar-item-hover-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:hover:bg-zink-600 group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:hover:text-zink-50 group-data-[topbar=dark]:dark:text-zink-200" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                <a class="block md:inline-block px-4 md:px-3 py-2.5 md:py-0.5 text-15 font-medium text-slate-800 transition-all duration-300 ease-linear hover:text-custom-500 [&.active]:text-custom-500 dark:text-zinc-200 dark:hover:text-custom-500 dark:[&.active]:text-custom-500">Categories</a>
                            </button>
                            <div class="absolute z-50 hidden p-4 ltr:text-left rtl:text-right bg-white rounded-md shadow-md !top-4 dropdown-menu min-w-[14rem] dark:bg-zink-600" aria-labelledby="dropdownMenuButton">
                                <ul>
                                    @foreach($listcate as $list)
                                        <li>
                                            <a class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500" href="pages-account.html">{{ $list->name_cate }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="ms-3">
                        @php
                            $listBrand = \App\Models\Brand::all();
                        @endphp
                        <div class="dropdown">
                            <button type="button" class="inline-block p-0 transition-all duration-200 ease-linear bg-topbar rounded-full text-topbar-item dropdown-toggle btn hover:bg-topbar-item-bg-hover hover:text-topbar-item-hover group-data-[topbar=dark]:text-topbar-item-dark group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:hover:bg-topbar-item-bg-hover-dark group-data-[topbar=dark]:hover:text-topbar-item-hover-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:hover:bg-topbar-item-bg-hover-brand group-data-[topbar=brand]:hover:text-topbar-item-hover-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:hover:bg-zink-600 group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:hover:text-zink-50 group-data-[topbar=dark]:dark:text-zink-200" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                <a class="block md:inline-block px-4 md:px-3 py-2.5 md:py-0.5 text-15 font-medium text-slate-800 transition-all duration-300 ease-linear hover:text-custom-500 [&.active]:text-custom-500 dark:text-zinc-200 dark:hover:text-custom-500 dark:[&.active]:text-custom-500">Brands</a>
                            </button>
                            <div class="absolute z-50 hidden p-4 ltr:text-left rtl:text-right bg-white rounded-md shadow-md !top-4 dropdown-menu min-w-[14rem] dark:bg-zink-600" aria-labelledby="dropdownMenuButton">
                                <ul>
                                    @foreach($listBrand as $list)
                                        <li>
                                            <a class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500" href="pages-account.html">{{ $list->name_brand }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#feedback" class="block md:inline-block px-4 md:px-3 py-2.5 md:py-0.5 text-15 font-medium text-slate-800 transition-all duration-300 ease-linear hover:text-custom-500 [&.active]:text-custom-500 dark:text-zinc-200 dark:hover:text-custom-500 dark:[&.active]:text-custom-500">Cart</a>
                    </li>
                </ul>
            </div>
            <div class="flex gap-2">
                <button type="button" data-drawer-target="cartSidePenal" style="line-height: 10px" class="me-3 inline-flex relative justify-center items-center p-0 text-topbar-item transition-all w-[37.5px] h-[37.5px] duration-200 ease-linear bg-topbar rounded-md btn hover:bg-topbar-item-bg-hover hover:text-topbar-item-hover group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:hover:bg-topbar-item-bg-hover-dark group-data-[topbar=dark]:hover:text-topbar-item-hover-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:hover:bg-topbar-item-bg-hover-brand group-data-[topbar=brand]:hover:text-topbar-item-hover-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:hover:bg-zink-600 group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:hover:text-zink-50 group-data-[topbar=dark]:dark:text-zink-200 group-data-[topbar=dark]:text-topbar-item-dark">
                    <i data-lucide="shopping-cart" class="inline-block w-5 h-5 stroke-1 fill-slate-100 group-data-[topbar=dark]:fill-topbar-item-bg-hover-dark group-data-[topbar=brand]:fill-topbar-item-bg-hover-brand"></i>
                    @if(Auth::check())
                        <span class="absolute flex items-center justify-center w-[16px] h-[16px] text-xs text-white bg-red-400 border-white rounded-full -top-1 -right-1">@if($cart && $cart->cartDetail->count() > 0) {{ $cart->cartDetail->sum('quantity') }} @endif </span>
                    @else
                        <span class="absolute flex items-center justify-center w-[16px] h-[16px] text-xs text-white bg-red-400 border-white rounded-full -top-1 -right-1">0</span>

                    @endif
                </button>
                {{--            <button type="button" class="text-slate-500 dark:text-zinc-300 hover:text-custom-500 dark:hover:text-custom-500 border-0 btn bg-gradient-to-r w-[36.39px] p-0 flex items-center justify-center"><i data-lucide="shopping-bag" class="inline-block size-4"></i></button>--}}
                @if(Auth::check())
                    <div class="dropdown">
                        <button type="button" class="inline-block p-0 transition-all duration-200 ease-linear bg-topbar rounded-full text-topbar-item dropdown-toggle btn hover:bg-topbar-item-bg-hover hover:text-topbar-item-hover group-data-[topbar=dark]:text-topbar-item-dark group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:hover:bg-topbar-item-bg-hover-dark group-data-[topbar=dark]:hover:text-topbar-item-hover-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:hover:bg-topbar-item-bg-hover-brand group-data-[topbar=brand]:hover:text-topbar-item-hover-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:hover:bg-zink-600 group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:hover:text-zink-50 group-data-[topbar=dark]:dark:text-zink-200" id="dropdownMenuButton" data-bs-toggle="dropdown">
                            <div class="bg-pink-100 rounded-full">
                                <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="" class="w-[37.5px] h-[37.5px] rounded-full">
                            </div>
                        </button>
                        <div class="absolute z-50 hidden p-4 ltr:text-left rtl:text-right bg-white rounded-md shadow-md !top-4 dropdown-menu min-w-[14rem] dark:bg-zink-600" aria-labelledby="dropdownMenuButton">
                            <h6 class="mb-2 text-sm font-normal text-slate-500 dark:text-zink-300">Welcome to starcode</h6>
                            <a href="#!" class="flex gap-3 mb-3">
                                <div class="relative inline-block shrink-0">
                                    <div class="rounded bg-slate-100 dark:bg-zink-500">
                                        <img src="assets/images/profile.png" alt="" class="w-12 h-12 rounded">
                                    </div>
                                    <span class="-top-1 ltr:-right-1 rtl:-left-1 absolute w-2.5 h-2.5 bg-green-400 border-2 border-white rounded-full dark:border-zink-600"></span>
                                </div>
                                <div>
                                    @if(Auth::check())
                                        <h6 class="mb-1 text-15">{{ Auth::user()->name }}</h6>
                                        <p class="text-slate-500 dark:text-zink-300">{{ Auth::user()->email }}</p>
                                    @else
                                        <h6 class="mb-1 text-15">Test</h6>
                                        <p class="text-slate-500 dark:text-zink-300">Web Developer</p>
                                    @endif
                                </div>
                            </a>
                            <ul>
                                <li>
                                    <a class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500" href="../client/profile/"><i data-lucide="user-2" class="inline-block size-4 ltr:mr-2 rtl:ml-2"></i> Profile</a>
                                </li>
                                <li>
                                    <a class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500" href="apps-mailbox.html"><i data-lucide="mail" class="inline-block size-4 ltr:mr-2 rtl:ml-2"></i> Inbox <span class="inline-flex items-center justify-center w-5 h-5 ltr:ml-2 rtl:mr-2 text-[11px] font-medium border rounded-full text-white bg-red-500 border-red-500">15</span></a>
                                </li>
                                <li>
                                    <a class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500" href="apps-chat.html"><i data-lucide="messages-square" class="inline-block size-4 ltr:mr-2 rtl:ml-2"></i> Chat</a>
                                </li>
                                <li>
                                    <a class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500" href="pages-pricing.html"><i data-lucide="gem" class="inline-block size-4 ltr:mr-2 rtl:ml-2"></i> Upgrade <span class="inline-flex items-center justify-center w-auto h-5 ltr:ml-2 rtl:mr-2 px-1 text-[12px] font-medium border rounded text-white bg-sky-500 border-sky-500">Pro</span></a>
                                </li>
                                <li>
                                    <a  class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500" href="../login"> Sign In </a>
                                </li>
                                <li class="pt-2 mt-2 border-t border-slate-200 dark:border-zink-500">
                                    <a class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500" href="../client/logout"><i data-lucide="log-out" class="inline-block size-4 ltr:mr-2 rtl:ml-2"></i> Sign Out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <a href="../client/login" class="text-white border-0 btn bg-gradient-to-r from-custom-500 to-purple-500 hover:text-white hover:from-purple-500 hover:to-custom-500"><span class="align-middle">Sign In</span> <i data-lucide="log-in" class="inline-block size-4 ltr:ml-1 rtl:mr-1"></i></a>
                @endif

            </div>
        </div>
    </nav>
    {{--  slide show  --}}
<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
        <div class="card">
            <div class="card-body">
{{--                <h6 class="mb-4 text-15">Pagination progress</h6>--}}
                <!-- Swiper -->
                <div class="swiper pagination-progress">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="display: flex">
                            <img src="../assets/images/img-4.jpg" alt="">
                            <img src="../assets/images/img-4.jpg" alt="">
                        </div>
                        <div class="swiper-slide" style="display: flex">
                            <img src="../assets/images/img-5.jpg" alt="">
                            <img src="../assets/images/img-5.jpg" alt="">
                        </div>
                        <div class="swiper-slide" style="display: flex">
                            <img src="../assets/images/img-6.jpg" alt="">
                            <img src="../assets/images/img-6.jpg" alt="">
                        </div>
                    </div>
                    <div class="swiper-button-next after:hidden text-custom-500"><i data-lucide="chevron-right"></i></div>
                    <div class="swiper-button-prev after:hidden text-custom-500"><i data-lucide="chevron-left"></i></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div><!--end card-->
    </div>
</div>
{{--  end slide show  --}}

<section class="relative pb-28 xl:pb-36 pt-44 xl:pt-52" id="home">

    @foreach($brand as $key => $list)
    <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
        <div class="grid items-center grid-cols-12 gap-5 2xl:grid-cols-12">
            <div class="col-span-12 xl:col-span-5 2xl:col-span-5">
                <h1 class="mb-4 !leading-normal lg:text-5xl 2xl:text-6xl dark:text-zinc-100" data-aos="fade-right" data-aos-delay="300">Exclusive Collections 2024</h1>
                <p class="text-lg mb-7 text-slate-500 dark:text-zinc-400" data-aos="fade-right" data-aos-delay="600">In 2024, metallics will be taking over the sneaker world. I love this trend because there are so many different ways to wear it. You can wear sequined sneakers, white sneakers with metallic accents, or all-over silver.</p>
                <div class="flex items-center gap-2" data-aos="fade-right" data-aos-delay="800">
                    <button type="button" class="px-8 py-3 text-white border-0 text-15 btn bg-gradient-to-r from-custom-500 to-purple-500 hover:text-white hover:from-purple-500 hover:to-custom-500">Shop Now <i data-lucide="shopping-cart" class="inline-block align-middle size-4 rtl:mr-1 ltr:ml-1"></i></button>
                </div>
            </div>
            <div class="col-span-12 xl:col-span-7 2xl:col-start-8 2xl:col-span-6">
                <div class="relative mt-10 xl:mt-0">
{{--                    <div class="absolute text-center -top-20 xl:-right-40 lg:text-[10rem] 2xl:text-[14rem] text-slate-100 dark:text-zinc-800/60 font-tourney" data-aos="zoom-in-down" data-aos-delay="1400">--}}
{{--                        Unique Fashion--}}
{{--                    </div>--}}
                    <img src="assets/images/offer.png" alt="" class="absolute h-40 left-10 xl:-left-10 top-32" data-aos="fade-down-right" data-aos-delay="900" data-aos-easing="linear">
                    <div class="relative" data-aos="zoom-in" data-aos-delay="500">
                        <button data-tooltip="default" data-tooltip-content="{{ $list->name_brand }}" class="absolute items-center justify-center hidden bg-white rounded-full size-8 xl:flex bottom-20 text-slate-800 left-20"><i data-lucide="plus"></i></button>
                        <img src="{{ Storage::url($list->image_brand) }}" alt="" class="mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section><!--end -->

<section class="relative py-24 xl:py-32" id="product">
    <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
        <div class="mx-auto text-center xl:max-w-3xl">
            <h1 class="mb-0 leading-normal capitalize">Our Latest Product</h1>
        </div>
        <div class="grid grid-cols-1 gap-5 mt-12 md:grid-cols-2 xl:grid-cols-4">
            @foreach($product as $key => $list)
                <div class="p-5 rounded-md bg-gradient-to-b from-slate-100 to-white dark:from-zinc-800 dark:to-zinc-900" data-aos="fade-up" data-aos-easing="linear">
                <img src="{{ Storage::url($list->image) }}" alt="" style="width: 100%; height: auto" class="rounded-md bg-gradient-to-b from-slate-100 to-white dark:from-zinc-800 dark:to-zinc-900">
                <div class="mt-3">
                    <p class="mb-3"><i data-lucide="star" class="inline-block text-yellow-500 align-middle size-4 ltr:mr-1 rtl:ml-1"></i> (4.8)</p>
                    <h5><a href="../client/detail/product-detail/{{ $list->id }}/color/{{ $list->firstColorId }}">{{ $list->name }}</a></h5>

                    <div class="flex items-center gap-3 mt-3">
                        <h6 class="text-16 ">${{ $list->discount }}</h6>
                        <h6 class="text-16 grow line-through" style="color: #606060">${{ $list->price }}</h6>
                        <div class="shrink-0">
                            <button type="button" class="px-2 py-1.5 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div><!--end-->
            @endforeach
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end -->

<section class="relative py-24 xl:py-32" id="features">
    <div class="absolute top-0 left-0 size-64 bg-purple-500/10 blur-3xl"></div>
    <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
        @foreach($brandDesc as $key => $list)
            <div class="grid items-center grid-cols-1 gap-6 mt-20 lg:grid-cols-12">
            <div class="lg:col-span-5">
                <h1 class="mb-3 leading-normal capitalize" data-aos="fade-right" data-aos-delay="400">Explore our flagship product and discover its unique features</h1>
                <p class="mb-5 text-lg text-slate-500 dark:text-zinc-400" data-aos="fade-right" data-aos-delay="500">Whatever your running gait, a good pair of running shoes will provide flexibility, durability, and support.</p>
                <ul class="flex flex-col gap-2 mb-6 list-disc list-inside text-15" data-aos="fade-right" data-aos-delay="500">
                    <li>Matches Your Foot Shape & Type</li>
                    <li>Easy to Wear</li>
                    <li>Heels That You Can Wear</li>
                    <li>Good Quality & Condition</li>
                    <li>Segments of Solid Rubber</li>
                </ul>
                <a href="#!" class="text-custom-500 text-16" data-aos="fade-right" data-aos-delay="600">Shopping Now <i data-lucide="move-right" class="inline-block align-middle size-4 ltr:ml-1 rtl:mr-1 rtl:rotate-180"></i></a>
            </div><!--end col-->
            <div class="relative lg:col-start-8 lg:col-span-7">
                <div class="absolute right-0 bg-center bg-cover bottom-40 w-52 h-96  rounded-md" data-aos="fade-left" data-aos-delay="400">
                    <div class="absolute inset-0 bg-gradient-to-b from-purple-500/30 to-white dark:to-zinc-900 from-30%"></div>
                </div>
                <div class="mr-16">
                    <img src="{{ Storage::url($list->image_brand) }}" alt="" class="relative inline-block" data-aos="fade-up-right">
                </div>
            </div><!--end col-->
        </div><!--end grid-->
        @endforeach
    </div><!--end container-->
</section><!--end -->

<section class="relative py-24 xl:py-32" id="about">
    <div class="absolute bottom-0 right-0 size-64 bg-custom-500/10 blur-3xl"></div>
    <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
        <div class="grid items-center grid-cols-1 gap-6 mt-20 lg:grid-cols-12">
            <div class="relative lg:col-span-5">
                <div class="relative before:absolute before:h-full before:w-full before:border-[15px] before:border-double before:border-green-500/10 before:-top-16 lg:before:-right-16" data-aos="zoom-out-up">
                    <img src="assets/images/about.jpg" alt="" class="relative inline-block rounded-md" data-aos="zoom-out-up" data-aos-delay="500">
                </div>
            </div><!--end col-->
            <div class="ml-auto lg:col-span-5 lg:col-start-8">
                <p class="mb-2 text-purple-500 text-15" data-aos="fade-left" data-aos-delay="300">About Us</p>
                <h1 class="mb-3 leading-normal capitalize" data-aos="fade-left" data-aos-delay="400">We Provide high Quality shoes</h1>
                <p class="mb-5 text-lg text-slate-500 dark:text-zinc-400" data-aos="fade-left" data-aos-delay="500">Look for a shoe with solid construction that will give your feet the support they need. Next, look for quality materials that will make your feet comfortable and keep them healthy.</p>
                <p class="mb-5 text-lg text-slate-500 dark:text-zinc-400" data-aos="fade-left" data-aos-delay="500">Low-quality shoes may skimp on stitching, or use low quality glue that's prone to coming apart. A higher-quality shoe will use advanced construction to ensure that the shoe holds up over time, and also eliminate any spots.</p>
                <button type="button" class="px-8 py-3 text-white border-0 text-15 btn bg-gradient-to-r from-custom-500 to-purple-500 hover:text-white hover:from-purple-500 hover:to-custom-500" data-aos="fade-left" data-aos-delay="600">Explore Now <i data-lucide="move-right" class="inline-block align-middle size-4 rtl:mr-1 ltr:ml-1"></i></button>
            </div><!--end col-->
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end -->

<section class="relative py-24 xl:py-32" id="feedback">
    <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
        <div class="mx-auto mb-8 text-center xl:max-w-3xl">
            <h1 class="mb-0 leading-normal capitalize">What Our Customer Says</h1>
        </div>
        <!-- Swiper -->
        <div class="pb-6 swiper feedback-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="p-5 text-center" data-aos="fade-up" data-aos-easing="linear">
                        <div class="mx-auto rounded-full size-20 bg-custom-500/10">
                            <img src="assets/images/avatar-2.png" alt="" class="rounded-full size-20">
                        </div>
                        <p class="mt-6 text-16">" The best templates which is supported multiple programming languages with beautiful templates. thank you for the valuable template. "</p>
                        <h6 class="mt-4 mb-1 text-15">Angela Ulligan</h6>
                        <div class="text-yellow-500">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="p-5 text-center" data-aos="fade-up" data-aos-easing="linear">
                        <div class="mx-auto rounded-full size-20 bg-yellow-500/10">
                            <img src="assets/images/avatar-4.png" alt="" class="rounded-full size-20">
                        </div>
                        <p class="mt-6 text-16">" I encountered a few errors in the design of the product detail page in Angular. I contacted the support team and they established. "</p>
                        <h6 class="mt-4 mb-1 text-15"><a href="#!">muratoztrkk01</a></h6>
                        <div class="text-yellow-500">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="p-5 text-center" data-aos="fade-up" data-aos-easing="linear">
                        <div class="mx-auto rounded-full size-20 bg-red-500/10">
                            <img src="assets/images/avatar-7.png" alt="" class="rounded-full size-20">
                        </div>
                        <p class="mt-6 text-16">" This theme is very good. I really recommend it. It's very good optimized, elegant, well documented, etc. "</p>
                        <h6 class="mt-4 mb-1 text-15"><a href="#!">Christine Marbury</a></h6>
                        <div class="text-yellow-500">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-slide">
                        <div class="p-5 text-center" data-aos="fade-up" data-aos-easing="linear">
                            <div class="mx-auto rounded-full size-20 bg-purple-500/10">
                                <img src="assets/images/avatar-9.png" alt="" class="rounded-full size-20">
                            </div>
                            <p class="mt-6 text-16">" StarCode Kh used Anydesk to fix the bug in Flask and django version. I highly recommend this product! "</p>
                            <h6 class="mt-4 mb-1 text-15"><a href="#!">Anthony Hobbs</a></h6>
                            <div class="text-yellow-500">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div><!--end container-->
</section><!--end -->

<section class="relative py-20 border-t border-slate-200 dark:border-zinc-800">
    <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
        <div class="grid items-center grid-cols-1 gap-5 lg:grid-cols-12">
            <div class="lg:col-span-8" data-aos="fade-right">
                <h1 class="mb-4 leading-normal capitalize">Sign up for update & newsletter</h1>
                <p class="text-lg text-slate-500 dark:text-zinc-400">Tell us which describes you, and we'll get in touch with next steps.</p>
            </div>
            <div class="ltr:lg:text-right rtl:lg:text-left lg:col-span-4">
                <form action="#!" class="relative" data-aos="fade-left">
                    <input type="email" id="subscribeInput" class="py-3 ltr:pr-40 rtl:pl-40 bg-slate-100 dark:bg-zinc-800/40 form-input text-slate-200 border-slate-200 dark:border-zinc-800 focus:outline-none focus:border-custom-500 dark:focus:border-custom-500 placeholder:text-slate-500 dark:placeholder:text-zinc-400 backdrop-blur-md" autocomplete="off" placeholder="starcode@starcodekh.com" required="">
                    <button type="submit" class="absolute px-6 py-2 text-base transition-all duration-200 ease-linear border-0 ltr:right-1 rtl:left-1 text-custom-50 btn top-1 bottom-1 bg-gradient-to-r from-custom-500 to-purple-500 hover:text-white hover:from-purple-500 hover:to-custom-500">Subscribe Now</button>
                </form>
            </div>
        </div>

    </div><!--end container-->

</section>

<div id="cartSidePenal" drawer-end="" class="fixed inset-y-0 flex flex-col w-full transition-transform duration-300 ease-in-out transform bg-white shadow dark:bg-zink-600 ltr:right-0 rtl:left-0 md:w-96 z-drawer show">
    <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
        <div class="grow">
            @if(Auth::check())
                <h5 class="mb-0 text-16">Shopping Cart <span class="inline-flex items-center justify-center w-5 h-5 ml-1 text-[11px] font-medium border rounded-full text-white bg-custom-500 border-custom-500"> @if($cart && $cart->cartDetail->count() > 0) {{ $cart->cartDetail->sum('quantity') }}@else 0 @endif</span></h5>
            @endif
        </div>
        <div class="shrink-0">
            <button data-drawer-close="cartSidePenal" class="transition-all duration-150 ease-linear text-slate-500 hover:text-slate-800"><i data-lucide="x" class="size-4"></i></button>
        </div>
    </div>
    <div>
        @if($cart && $cart->cartDetail->count() > 0)
            <div class="h-[calc(100vh_-_370px)] p-4 overflow-y-auto product-list">
                <div class="flex flex-col gap-4">
                    @foreach($cart->cartDetail as $list)
                            <div class="flex gap-2 product">
                                <div class="flex items-center justify-center w-12 h-12 rounded-md bg-slate-100 shrink-0 dark:bg-zink-500">
                                    <img src="{{ Storage::url($list->productDetail->image) }}" alt="" style="margin-top: 40px">
                                </div>
                                <div class="overflow-hidden grow">
                                    <div class="ltr:float-right rtl:float-left">
                                        <button class="transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-red-500 dark:hover:text-red-500"><i data-lucide="x" class="size-4"></i></button>
                                    </div>
                                    <a href="#!" class="transition-all duration-200 ease-linear hover:text-custom-500">
                                        <h6 class="mb-1 text-15">{{ $list->productDetail->name }}</h6>
                                    </a>
                                    <div class="flex items-center mb-3">
                                        <h5 class="text-base product-price"> $<span>{{ $list->productDetail->discount }}</span></h5>
                                        <div class="font-normal rtl:mr-1 ltr:ml-1 text-slate-500 dark:text-zink-200">({{ $list->productDetail->category->name_cate }}, {{ $list->color->name_color }}, {{ $list->size->name_size }})</div>
                                    </div>
                                    <div class="flex items-center justify-between gap-3">
                                        <div class="inline-flex text-center input-step">
                                            <button type="button" class="border w-9 h-9 leading-[15px] minus bg-white dark:bg-zink-700 dark:border-zink-500 ltr:rounded-l rtl:rounded-r transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="minus" class="inline-block size-4"></i></button>
                                            <input type="number" class="w-12 text-center h-9 border-y product-quantity dark:bg-zink-700 focus:shadow-none dark:border-zink-500" value="{{ $list->quantity }}" min="0" max="{{ $list->productDetail->quantity }}" readonly="">
                                            <button type="button" class="transition-all duration-200 ease-linear bg-white border dark:bg-zink-700 dark:border-zink-500 ltr:rounded-r rtl:rounded-l w-9 h-9 border-slate-200 plus text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="plus" class="inline-block size-4"></i></button>
                                        </div>
                                        <h6 class="product">{{ number_format($list->productDetail->discount * $list->quantity) }}</h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
            <div class="p-4 border-t border-slate-200 dark:border-zink-500">
                <table class="w-full mb-3 ">
                    <tbody class="table-total">
                    <tr>
                        <td class="py-2">Sub Total :</td>
                        <td class="text-right cart-subtotal">${{ $cart->total_amount }}</td>
                    </tr>
                    <tr class="font-semibold">
                        <td class="py-2">Total : </td>
                        <td class="text-right">${{ $cart->total_amount }}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="flex items-center justify-between gap-3">
                    <a href="apps-ecommerce-product-grid.html" class="w-full text-white btn bg-slate-500 border-slate-500 hover:text-white hover:bg-slate-600 hover:border-slate-600 focus:text-white focus:bg-slate-600 focus:border-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:border-slate-600 active:ring active:ring-slate-100 dark:ring-slate-400/10">Continue Shopping</a>
                    <a href="../client/cart/cart-Detail" class="w-full text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Checkout</a>
                </div>
            </div>
        @else
            <div class="h-[calc(100vh_-_370px)] p-4 overflow-y-auto product-list">
                <div class="flex flex-col gap-4">
                    @foreach($cartFacades as $key => $list)
                        <div class="flex gap-2 product">
                            <div class="flex items-center justify-center w-12 h-12 rounded-md bg-slate-100 shrink-0 dark:bg-zink-500">
                                <img src="{{ Storage::url($list->options->image) }}" alt="" style="margin-top: 40px">
                            </div>
                            <div class="overflow-hidden grow">
                                <div class="ltr:float-right rtl:float-left">
                                    <button class="transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-red-500 dark:hover:text-red-500"><i data-lucide="x" class="size-4"></i></button>
                                </div>
                                <a href="#!" class="transition-all duration-200 ease-linear hover:text-custom-500">
                                    <h6 class="mb-1 text-15">{{ $list->name }}</h6>
                                </a>
                                <div class="flex items-center mb-3">
                                    <h5 class="text-base product-price"> $<span>{{ $list->price }}</span></h5>
                                    <div class="font-normal rtl:mr-1 ltr:ml-1 text-slate-500 dark:text-zink-200">({{ $list->options->cate }}, {{ $list->options->color }}, {{ $list->options->size }})</div>
                                </div>
                                <div class="flex items-center justify-between gap-3">
                                    <div class="inline-flex text-center input-step">
                                        <button type="button" class="border w-9 h-9 leading-[15px] minus bg-white dark:bg-zink-700 dark:border-zink-500 ltr:rounded-l rtl:rounded-r transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="minus" class="inline-block size-4"></i></button>
                                        <input type="number" class="w-12 text-center h-9 border-y product-quantity dark:bg-zink-700 focus:shadow-none dark:border-zink-500" value="{{ $list->qty }}" min="0" max="12" readonly="">
                                        <button type="button" class="transition-all duration-200 ease-linear bg-white border dark:bg-zink-700 dark:border-zink-500 ltr:rounded-r rtl:rounded-l w-9 h-9 border-slate-200 plus text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="plus" class="inline-block size-4"></i></button>
                                    </div>
                                    <h6 class="product">{{ number_format($list->price * $list->qty) }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="p-4 border-t border-slate-200 dark:border-zink-500">
                <table class="w-full mb-3 ">
                    <tbody class="table-total">
                    <tr>
                        <td class="py-2">Sub Total :</td>
                        <td class="text-right cart-subtotal">${{ $subFacades }}</td>
                    </tr>
                    <tr class="font-semibold">
                        <td class="py-2">Total : </td>
                        <td class="text-right">${{ $totalFacades }}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="flex items-center justify-between gap-3">
                    <a href="apps-ecommerce-product-grid.html" class="w-full text-white btn bg-slate-500 border-slate-500 hover:text-white hover:bg-slate-600 hover:border-slate-600 focus:text-white focus:bg-slate-600 focus:border-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:border-slate-600 active:ring active:ring-slate-100 dark:ring-slate-400/10">Continue Shopping</a>
                    <a href="../client/cart/cart-Detail" class="w-full text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Checkout</a>
                </div>
            </div>
       @endif
    </div>
</div>

@endsection
