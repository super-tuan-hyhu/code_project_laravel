
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
                    <span class="absolute flex items-center justify-center w-[16px] h-[16px] text-xs text-white bg-red-400 border-white rounded-full -top-1 -right-1"></span>
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



