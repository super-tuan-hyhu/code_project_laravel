@extends('dashboard.layout.master')
@section('title', 'Color')
@section('body')
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">{{ $user->name }}</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="../dashboard/user" class="text-slate-400 dark:text-zink-200">User</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Address
                    </li>
                </ul>
            </div>
            @if(session('message'))
                <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                    <span class="font-bold">{{ session('message') }}</span>
                </div>
            @endif
            <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
                <div class="xl:col-span-3">
                    <div class="card sticky top-[calc(theme('spacing.header')_*_1.3)]">
                        <div class="card-body">
                            <h6 class="mb-4 text-15">Product Card Preview</h6>

                            <div class="px-5 py-8 rounded-md bg-sky-50 dark:bg-zink-600" style="width: 251.8px; height: 340px">
                                <img src="{{ Storage::url($user->avatar) }}" alt="" class="block mx-auto h-44" style="width: 100%; height: 100%">
                            </div>

                            <div class="mt-3">
                                <h6 class="mb-1 text-15">{{ $user->name }}</h6>
                                <p class="text-slate-500 dark:text-zink-200">{{ $user->email }}</p>
                            </div>
                            <h6 class="mt-3 mb-2 text-15">Role : @if($user->role == 1) Super Admin @else User @endif</h6>

                            <div class="mt-3" style="display: flex">
                                <h6 class="text-15">Phone</h6>
                                <p class="text-slate-500 dark:text-zink-200" style="line-height: 25px">: {{ $user->phone }}</p>
                            </div>

                            <div class="flex gap-2 mt-4">
                                <a href="../dashboard/user" class="w-full text-white bg-purple-500 border-purple-500 btn hover:text-white hover:bg-purple-600 hover:border-purple-600 focus:text-white focus:bg-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-100 active:text-white active:bg-purple-600 active:border-purple-600 active:ring active:ring-purple-100 dark:ring-purple-400/10">List User</a>
                            </div>
                        </div>
                    </div><!--end card-->
                </div>
                <div class="xl:col-span-9">
                    <div class="card" >
                        <div class="card-body" id="usersTable">
                            <div style="display: flex ;justify-content: space-between;">
                                <h6 class="mb-4 text-15">List Address & Create Address</h6>
                                <div class="shrink-0">
                                    <button data-modal-target="addressModal" type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i data-lucide="plus" class="inline-block size-4"></i> <span class="align-middle">Add User</span></button>
                                </div>
                            </div>
                            <div class="!pt-1 card-body mt-4">
                                <div class="overflow-x-auto">
                                    @foreach($address as $key => $list)
                                        <span class="mt-4 status px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-orange-100 border-transparent text-orange-500 dark:bg-orange-500/20 dark:border-transparent">Address :  {{ $key + 1 }}</span>
                                        <table class="w-full whitespace-nowrap mt-5" id="productTable">
                                        <thead class="ltr:text-left rtl:text-right bg-slate-100 dark:bg-zink-600">
                                            <tr>
                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort product_name" data-sort="product_name">Coupon Name</th>
                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort category" data-sort="category">Phone</th>
                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort price" data-sort="price">City</th>
                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort revenue" data-sort="revenue">District</th>
                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort stock" data-sort="stock">Wards</th>
                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 action">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <tr>
                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 product_name">
                                                    <a href="" class="flex items-center gap-2">
                                                        <h6 class="product_name">{{ $list->full_name }}</h6>
                                                    </a>
                                                </td>
                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 category">
                                                    <span class="category px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-slate-100 border-slate-200 text-slate-500 dark:bg-slate-500/20 dark:border-slate-500/20 dark:text-zink-200">
                                                        {{ $list->phone }}
                                                    </span>
                                                </td>
                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 price">{{ $list->city }}</td>
                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 revenue">{{ $list->district }}</td>
                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 stock"> {{ $list->wards }} </td>
                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 action">
                                                    <div class=" dropdown">
                                                        <button class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20" id="productAction1" data-bs-toggle="dropdown"><i data-lucide="more-horizontal" class="size-3"></i></button>
                                                        <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600" aria-labelledby="productAction1">
                                                            <li>
                                                                <a data-modal-target="updateAddress{{ $key }}" style="cursor: pointer" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" ><i data-lucide="file-edit" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Edit</span></a>
                                                            </li>
                                                            <li>
                                                                <form action="../dashboard/user/{{ $user->id }}/address/delete/{{ $list->id_address }}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button onclick="return confirm('Do you want to delete address')" data-modal-target="deleteModal" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" ><i data-lucide="trash-2" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Delete</span></button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    {{-- Update Address client --}}
                                    <div id="updateAddress{{ $key }}" modal-center="" class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
                                            <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
                                                <div class="flex items-center justify-between p-4 border-b dark:border-zink-300/20">
                                                    <h5 class="text-16">Add User</h5>
                                                    <button data-modal-close="updateAddress{{ $key }}" class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x" class="size-5"></i></button>
                                                </div>
                                                <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                                                    <form action="../dashboard/user/{{ $user->id }}/address/update/{{ $list->id_address }}" method="post" >
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                                                            <div class="xl:col-span-6">
                                                                <label for="productNameInput{{ $key }}" class="inline-block mb-2 text-base font-medium">Product Title</label>
                                                                <input type="text" id="productNameInput{{ $key }}" name="full_name" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $list->full_name }}" required="">
                                                            </div><!--end col-->
                                                            <div class="xl:col-span-6">
                                                                <label for="qualityInput" class="inline-block mb-2 text-base font-medium">Phone</label>
                                                                <input type="number" id="qualityInput" name="phone" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $list->phone }}" required="">
                                                            </div><!--end col-->
                                                            <div class="xl:col-span-6">
                                                                <label for="phoneAddress" class="inline-block mb-2 text-base font-medium">City</label>
                                                                <input type="text" id="phoneAddress{{ $key }}" name="city" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $list->city }}" required="">
                                                            </div><!--end col-->
                                                            <div class="xl:col-span-6">
                                                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Districts</label>
                                                                <input type="text" id="productNameInput" name="district" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $list->district }}" required="">
                                                            </div><!--end col-->
                                                            <div class="xl:col-span-12">
                                                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Wards</label>
                                                                <input type="text" id="productNameInput" name="wards" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $list->wards }}" required="">
                                                            </div><!--end col-->
                                                            <div class="lg:col-span-2 xl:col-span-12">
                                                                <div>
                                                                    <label for="productDescription" class="inline-block mb-2 text-base font-medium">Specific Address</label>
                                                                    <textarea name="specific_address" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productDescription" rows="5">{{ $list->specific_address }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="xl:col-span-12">
                                                                <label for="Checkbox1" class="inline-block mb-2 text-base font-medium">Default</label>
                                                                <input id="Checkbox1" name="is_default" class="size-4 bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800 cursor-pointer" type="checkbox" value="1" {{ $list->is_default == 1 ? 'checked' : ''}}>
                                                            </div>
                                                        </div>
                                                        <div class="flex justify-end gap-2 mt-4">
                                                            <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Reset</button>
                                                            <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Create Address</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!--end add user-->
                                    {{-- End Update Address client --}}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="addressModal" modal-center="" class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="flex items-center justify-between p-4 border-b dark:border-zink-300/20">
                <h5 class="text-16">Add User</h5>
                <button data-modal-close="addressModal" class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x" class="size-5"></i></button>
            </div>
            <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                <form action="../dashboard/user/{{ $user->id }}/address/create" method="post" >
                    @csrf
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                        <div class="xl:col-span-6">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Product Title</label>
                            <input type="text" id="productNameInput" name="full_name" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Name Order" required="">
                        </div><!--end col-->
                        <div class="xl:col-span-6">
                            <label for="qualityInput" class="inline-block mb-2 text-base font-medium">Phone</label>
                            <input type="number" id="qualityInput" name="phone" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Phone" required="">
                        </div><!--end col-->
                        <div class="xl:col-span-6">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">City</label>
                            <input type="text" id="productNameInput" name="city" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="City" required="">
                        </div><!--end col-->
                        <div class="xl:col-span-6">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Districts</label>
                            <input type="text" id="productNameInput" name="district" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="District" required="">
                        </div><!--end col-->
                        <div class="xl:col-span-12">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Wards</label>
                            <input type="text" id="productNameInput" name="wards" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Wards" required="">
                        </div><!--end col-->
                        <div class="lg:col-span-2 xl:col-span-12">
                            <div>
                                <label for="productDescription" class="inline-block mb-2 text-base font-medium">Specific Address</label>
                                <textarea name="specific_address" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productDescription" placeholder="Enter Specific Address" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="xl:col-span-12">
                            <label for="Checkbox1" class="inline-block mb-2 text-base font-medium">Default</label>
                            <input id="Checkbox1" name="is_default" class="size-4 bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800 cursor-pointer" type="checkbox">
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <input type="hidden" name="id_user" value="{{ $user->id }}">
                        <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Reset</button>
                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Create Address</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!--end add user-->

@endsection
