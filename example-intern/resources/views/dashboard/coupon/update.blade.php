@extends('dashboard.layout.master')
@section('title', 'Coupon')
@section('body')
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Add New</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="#!" class="text-slate-400 dark:text-zink-200">Coupon</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Add New
                    </li>
                </ul>
            </div>
            @if(session()->has('messageDate') || session()->has('message'))
                <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                    <span class="font-bold">{{ session('messageDate') ?? session('message') }}</span>
                </div>
            @endif
            <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
                <div class="xl:col-span-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-4 text-15">Update Coupon</h6>
                            <form action="../dashboard/coupon/update/{{ $coupon->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                                    <div class="xl:col-span-6">
                                        <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Coupon Title</label>
                                        <input type="text" id="productNameInput" name="name_voucher" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $coupon->name_voucher }}" required="">
                                        <p class="mt-1 text-sm text-slate-400 dark:text-zink-200">Do not exceed 20 characters when entering the product name.</p>
                                    </div><!--end col-->
                                    <div class="xl:col-span-6">
                                        <label for="productCodeInput" class="inline-block mb-2 text-base font-medium"><Coupon></Coupon> Code</label>
                                        <input type="text" id="productCodeInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Product Code" value="TWT145015" disabled="" required="">
                                        <p class="mt-1 text-sm text-slate-400 dark:text-zink-200">Code will be generated automatically</p>
                                    </div><!--end col-->
                                    <div class="xl:col-span-4">
                                        <label for="qualityInput" class="inline-block mb-2 text-base font-medium">Promotion</label>
                                        <input type="text" id="qualityInput" name="promotion" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $coupon->promotion }}" required="">
                                    </div><!--end col-->
                                    <div class="xl:col-span-4">
                                        <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Value</label>
                                        <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices="" data-choices-search-false="" name="value" id="categorySelect">
                                            <option value="">Select Value</option>
                                            <option value="1" @if($coupon->value == 1) selected @endif>Phần Trăm</option>
                                            <option value="2" @if($coupon->value == 2) selected @endif>Giá Tiền</option>
                                        </select>
                                    </div><!--end col-->
                                    <div class="xl:col-span-4">
                                        <label for="productPrice" class="inline-block mb-2 text-base font-medium">Condition</label>
                                        <input type="number" name="conditionn" id="productPrice" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $coupon->conditionn }}" required="">
                                    </div><!--end col-->
                                    <div class="xl:col-span-4">
                                        <label for="productDiscounts" class="inline-block mb-2 text-base font-medium">Date Start</label>
                                        <input type="date" name="date_start" id="productDiscounts" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $coupon->date_start }}" required="">
                                    </div><!--end col-->
                                    <div class="xl:col-span-4">
                                        <label for="productPrice" class="inline-block mb-2 text-base font-medium">Date End</label>
                                        <input type="date" name="date_end" id="productPrice" min="1" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $coupon->date_end }}" required="">
                                    </div><!--end col-->
                                    @if($coupon->image != '')
                                        <div class="lg:col-span-2 xl:col-span-12">
                                            <label for="genderSelect" class="inline-block mb-2 text-base font-medium">Coupon Images</label>
                                            <div class="flex items-center justify-center bg-white border border-dashed rounded-md cursor-pointer dropzone border-slate-300 dark:bg-zink-700 dark:border-zink-500">
                                                <div class="w-full py-5 text-lg text-center ">
                                                    <div class="dropzone needsclick p-0 dz-clickable" id="dropzone-basic">
                                                        <div class="dz-message needsclick">
                                                            <p class="h4 needsclick pt-4 mb-2">Drag and drop your image here</p>
                                                            <p class="h6 text-muted d-block fw-normal mb-2">or</p>
                                                            <span class="note needsclick btn btn-sm btn-label-primary" id="btnBrowse">
                                                            Browse image
                                                            <input type="file" name="image" id="fileInput">
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete" id="dzPreview" style="display: none; width: 100px; height: 200px">
                                                    <div class="border rounded border-slate-200 dark:border-zink-500">
                                                        <div class="dz-details">
                                                            <div class="dz-thumbnail">
                                                                <img id="imageThumbnail" data-dz-thumbnail="" alt="Image Preview">
                                                                <span class="dz-nopreview">No preview</span>
                                                                <div class="dz-success-mark"></div>
                                                                <div class="dz-error-mark"></div>
                                                                <div class="dz-error-message">
                                                                    <span data-dz-errormessage=""></span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                                </div>
                                                            </div>
                                                            <div class="dz-filename" id="fileName"></div>
                                                            <div class="dz-size" id="fileSize"><strong>0.8</strong> MB</div>
                                                        </div>
                                                        <a class="dz-remove px-2 py-1.5 text-xs text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20" href="javascript:void(0);" id="removeFile">Remove file</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete" style="width: 100px; height: 200px">
                                                <div class="border rounded border-slate-200 dark:border-zink-500">
                                                    <div class="dz-details">
                                                        <div class="dz-thumbnail">
                                                            <img src="{{ Storage::url($coupon->image) }}" alt="Image Preview">
                                                            <input type="hidden" name="file_old" value="{{ $coupon->image }}">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="dz-size" id="fileSize"><strong>0.8</strong> MB</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex justify-end gap-2 mt-4">
                                    <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Reset</button>
                                    <a href="../dashboard/coupon/" class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10">List Coupon</a>
                                    <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Update Coupon</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
