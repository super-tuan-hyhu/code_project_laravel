@extends('dashboard.layout.master')
@section('title', 'Products')
@section('body')

    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Add New</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="#!" class="text-slate-400 dark:text-zink-200">Products</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Add New
                    </li>
                </ul>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
                <div class="xl:col-span-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-4 text-15">Create Product</h6>
                            <form action="../dashboard/products/create" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                                    <div class="xl:col-span-6">
                                        <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Product Title</label>
                                        <input type="text" id="productNameInput" name="name" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Product title" required="">
                                        <p class="mt-1 text-sm text-slate-400 dark:text-zink-200">Do not exceed 20 characters when entering the product name.</p>
                                    </div><!--end col-->
                                    <div class="xl:col-span-6">
                                        <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">Product Code</label>
                                        <input type="text" id="productCodeInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Product Code" value="TWT145015" disabled="" required="">
                                        <p class="mt-1 text-sm text-slate-400 dark:text-zink-200">Code will be generated automatically</p>
                                    </div><!--end col-->
                                    <div class="xl:col-span-4">
                                        <label for="qualityInput" class="inline-block mb-2 text-base font-medium">Quantity</label>
                                        <input type="number" id="qualityInput" name="quantity" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Quantity" required="">
                                    </div><!--end col-->
                                    <div class="xl:col-span-4">
                                        <label for="skuInput" class="inline-block mb-2 text-base font-medium">SKU</label>
                                        <input type="text" id="skuInput" name="sku" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="TWT-LP-ALU-08" required="">
                                    </div><!--end col-->
                                    <div class="xl:col-span-4">
                                        <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Brand</label>
                                        <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices="" data-choices-search-false="" name="id_brand" id="categorySelect">
                                            <option value="">Select Brand</option>
                                            @foreach($brand as $list)
                                                <option value="{{ $list->id }}">{{ $list->name_brand }}</option>
                                            @endforeach
                                        </select>
                                    </div><!--end col-->
                                    <div class="xl:col-span-4">
                                        <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Category</label>
                                        <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices="" data-choices-search-false="" name="id_category" id="categorySelect">
                                            <option value="">Select Category</option>
                                            @foreach($category as $list)
                                                <option value="{{ $list->id }}">{{ $list->name_cate }}</option>
                                            @endforeach
                                        </select>
                                    </div><!--end col-->
                                    <div class="xl:col-span-4">
                                        <label for="productPrice" class="inline-block mb-2 text-base font-medium">Price</label>
                                        <input type="number" name="price" id="productPrice" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="$0.00" required="">
                                    </div><!--end col-->
                                    <div class="xl:col-span-4">
                                        <label for="productDiscounts" class="inline-block mb-2 text-base font-medium">Discounts</label>
                                        <input type="number" name="discount" id="productDiscounts" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="0%" required="">
                                    </div><!--end col-->

                                    {{-- color--}}
                                    <div class="xl:col-span-6">
                                        <label for="qualityInput" class="inline-block mb-2 text-base font-medium">Colors Variant</label>
                                        <div class="flex flex-wrap items-center gap-2">
                                            <div>
                                                <input id="selectColor1" class="inline-block align-middle border rounded-sm appearance-none cursor-pointer size-5 bg-sky-500 border-sky-500 checked:bg-sky-500 checked:border-sky-500 disabled:opacity-75 disabled:cursor-default" type="checkbox" value="Xanh Dương" name="name_color[]">
                                            </div>
                                            <div>
                                                <input id="selectColor2" class="inline-block align-middle bg-orange-500 border border-orange-500 rounded-sm appearance-none cursor-pointer size-5 checked:bg-orange-500 checked:border-orange-500 disabled:opacity-75 disabled:cursor-default" type="checkbox" value="Cam" name="name_color[]">
                                            </div>
                                            <div>
                                                <input id="selectColor3" class="inline-block align-middle bg-green-500 border border-green-500 rounded-sm appearance-none cursor-pointer size-5 checked:bg-green-500 checked:border-green-500 disabled:opacity-75 disabled:cursor-default" type="checkbox" value="Nâu" name="name_color[]">
                                            </div>
                                            <div>
                                                <input id="selectColor4" class="inline-block align-middle bg-purple-500 border border-purple-500 rounded-sm appearance-none cursor-pointer size-5 checked:bg-purple-500 checked:border-purple-500 disabled:opacity-75 disabled:cursor-default" type="checkbox" value="Xanh Nước Biển" name="name_color[]">
                                            </div>
                                            <div>
                                                <input id="selectColor5" class="inline-block align-middle bg-yellow-500 border border-yellow-500 rounded-sm appearance-none cursor-pointer size-5 checked:bg-yellow-500 checked:border-yellow-500 disabled:opacity-75 disabled:cursor-default" type="checkbox" value="Vàng" name="name_color[]">
                                            </div>
                                            <div>
                                                <input id="selectColor6" class="inline-block align-middle bg-red-500 border border-red-500 rounded-sm appearance-none cursor-pointer size-5 checked:bg-red-500 checked:border-red-500 disabled:opacity-75 disabled:cursor-default" type="checkbox" value="Đỏ" name="name_color[]">
                                            </div>
                                            <div>
                                                <input id="selectColor7" class="inline-block align-middle border rounded-sm appearance-none cursor-pointer size-5 bg-slate-500 border-slate-500 checked:bg-slate-500 checked:border-slate-500 disabled:opacity-75 disabled:cursor-default" type="checkbox" value="Xám" name="name_color[]">
                                            </div>
                                            <div>
                                                <input id="selectColor8" class="inline-block align-middle border rounded-sm appearance-none cursor-pointer size-5 bg-slate-900 border-slate-900 checked:bg-slate-900 checked:border-slate-900 disabled:opacity-75 disabled:cursor-default" type="checkbox" value="Đen" name="name_color[]">
                                            </div>
                                            <div>
                                                <input id="selectColor9" class="inline-block align-middle border rounded-sm appearance-none cursor-pointer size-5 bg-slate-200 border-slate-200 checked:bg-slate-200 checked:border-slate-200 disabled:opacity-75 disabled:cursor-default" type="checkbox" value="Trắng" name="name_color[]">
                                            </div>
                                            <div>
                                                <input id="selectColor10" class="inline-block align-middle bg-pink-500 border border-white-500 rounded-sm appearance-none cursor-pointer size-5 checked:bg-white-500 checked:border-white-500 disabled:opacity-75 disabled:cursor-default" type="checkbox" value="Hồng" name="name_color[]">
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    {{-- size --}}
                                    <div class="xl:col-span-6">
                                        <div class="inline-block mb-2 text-base font-medium">Size</div>
                                        <div class="flex flex-wrap items-center gap-2">
                                            <div>
                                                <input id="selectSizeXS" class="hidden peer" type="checkbox" value="XS" name="name_size[]">
                                                <label for="selectSizeXS" class="flex items-center justify-center text-xs border rounded-md cursor-pointer size-10 border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/15 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">XS</label>
                                            </div>
                                            <div>
                                                <input id="selectSizeS" class="hidden peer" type="checkbox" value="S" name="name_size[]">
                                                <label for="selectSizeS" class="flex items-center justify-center text-xs border rounded-md cursor-pointer size-10 border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/15 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">S</label>
                                            </div>
                                            <div>
                                                <input id="selectSizeM" class="hidden peer" type="checkbox" value="M" name="name_size[]">
                                                <label for="selectSizeM" class="flex items-center justify-center text-xs border rounded-md cursor-pointer size-10 border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/15 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">M</label>
                                            </div>
                                            <div>
                                                <input id="selectSizeL" class="hidden peer" type="checkbox" value="L" name="name_size[]">
                                                <label for="selectSizeL" class="flex items-center justify-center text-xs border rounded-md cursor-pointer size-10 border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/15 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">L</label>
                                            </div>
                                            <div>
                                                <input id="selectSizeXL" class="hidden peer" type="checkbox" value="XL" name="name_size[]">
                                                <label for="selectSizeXL" class="flex items-center justify-center text-xs border rounded-md cursor-pointer size-10 border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/15 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">XL</label>
                                            </div>
                                            <div>
                                                <input id="selectSize2XL" class="hidden peer" type="checkbox" value="2XL" name="name_size[]">
                                                <label for="selectSize2XL" class="flex items-center justify-center text-xs border rounded-md cursor-pointer size-10 border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/15 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">2XL</label>
                                            </div>
                                            <div>
                                                <input id="selectSize3XL" class="hidden peer" type="checkbox" value="3XL" name="name_size[]">
                                                <label for="selectSize3XL" class="flex items-center justify-center text-xs border rounded-md cursor-pointer size-10 border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/15 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">3XL</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="lg:col-span-2 xl:col-span-12">
                                        <label for="genderSelect" class="inline-block mb-2 text-base font-medium">Product Images</label>
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
                                    <div class="lg:col-span-2 xl:col-span-12">
                                        <div>
                                            <label for="productDescription" class="inline-block mb-2 text-base font-medium">Description</label>
                                            <textarea name="status" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productDescription" placeholder="Enter Description" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="lg:col-span-2 xl:col-span-12">
                                        <label for="productTag" class="inline-block mb-2 text-base font-medium">Product Tag</label>
                                        <input name="tag" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productTag" data-choices="" data-choices-text-unique-true="" type="text">
                                    </div><!--end col-->
                                </div><!--end grid-->
                                <div class="flex justify-end gap-2 mt-4">
                                    <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Reset</button>
                                    <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Create Product</button>
                                    <button type="button" class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10">Draft & Preview</button>
                                </div>
                            </form>
                        </div>
                    </div><!--end card-->
                </div><!--end col-->

            </div><!--end grid-->
        </div>
        <!-- container-fluid -->
    </div>

@endsection
