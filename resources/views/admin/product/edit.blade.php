@extends('admin.layout.master')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Product</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">

                            <h4>Edit Product</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary"> Update</button>

                                <div class="form-group">
                                    <label for="">Preview</label> <br>
                                    <img width="100px" src="{{ asset($product->thumb_image) }}" alt="">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $product->name }}"
                                        id="">
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <select id="inputState" class="form-control main-category select2"
                                                name="category" value="">
                                                <option value="">Select</option>
                                                @foreach ($categories as $category)
                                                    <option {{ $category->id == $product->category_id ? 'selected' : '' }}
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Sub Category</label>
                                            <select id="inputState" class="form-control sub-category select2"
                                                name="sub_category" value="">
                                                @foreach ($subCategories as $subCategory)
                                                    <option {{ $subCategory->id == $product->sub_category_id ? 'selected' : '' }}
                                                        value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Child Category </label>
                                            <select id="inputState" class="form-control child-category select2"
                                                name="child_category" value="">
                                                @foreach ($childCategories as $childCategory)
                                                    <option {{ $childCategory->id == $product->child_category_id }}
                                                        value="{{ $childCategory->id }}">{{ $childCategory->name }}
                                                    </option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Brand</label>
                                    <select id="inputState" class="form-control  select2" name="brand"
                                        value="{{ $product->brand_id }}">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">SKU</label>
                                    <input type="text" class="form-control" name="sku" value="{{ $product->sku }}"
                                        id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="text" class="form-control" name="price" value="{{ $product->price }}"
                                        id="">
                                </div>

                                <div class="form-group">
                                    <label for="">Offer Price</label>
                                    <input type="text" class="form-control" name="offer_price"
                                        value="{{ $product->offer_price }}" id="">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Offer start date</label>
                                            <input type="text" name="offer_start_date"
                                                value="{{ $product->offer_start_date }}" class="form-control datepicker">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Offer end date</label>
                                            <input type="text" name="offer_end_date"
                                                value="{{ $product->offer_end_date }}" class="form-control datepicker">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="">Stock Quantity</label>
                                    <input type="number" min="0" class="form-control" name="qty"
                                        value="{{ $product->qty }}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Video Link</label>
                                    <input type="text" class="form-control" name="video_link"
                                        value="{{ $product->video_link }}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Short Description</label>
                                    <input type="text" class="form-control" name="short_description"
                                        value="{{ $product->short_description }}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Long Description</label>
                                    <textarea name="long_description" id="" class="summernote" cols="30" rows="10">{!! $product->long_description !!}</textarea>
                                </div>



                                <div class="form-group">
                                    <label for="">Product Type</label>
                                    <select id="inputState" class="form-control select2" name="product_type"
                                        value="">
                                        <option value="">Select</option>
                                        <option {{ $product->product_type == 'new_arrival' ? 'selected' : '' }}
                                            value="new_arrival">New Arrival</option>
                                        <option {{ $product->product_type == 'featured_product' ? 'selected' : '' }}
                                            value="featured_product">Featured</option>
                                        <option {{ $product->product_type == 'top_product' ? 'selected' : '' }}
                                            value="top_product">Top Product</option>
                                        <option {{ $product->product_type == 'best_product' ? 'selected' : '' }}
                                            value="best_product">Best Product</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="">Seo Title</label>
                                    <input type="text" class="form-control" name="seo_title"
                                        value="{{$product->seo_title}}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Seo Description</label>
                                    <textarea name="seo_description" id="" class="summernote" cols="30" rows="10">{!!$product->seo_description!!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control select2" name="status"
                                        value="{{ old('status') }}">
                                        <option {{$product->status == 1 ? 'selected':''}} value="1">Active</option>
                                        <option {{$product->status == 0 ? 'selected':''}} value="0">Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary"> Update</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
@push('scripts')
    {{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }} --}}
    <script>
        $(document).ready(function() {
            $('body').on('change', '.main-category', function(e) {
                $('.child-category').html('<option value="">Select</option>')
                let id = $(this).val();
                $.ajax({
                    url: "{{ route('admin.product.get-subcategories') }}",
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {

                        $('.sub-category').html('<option value="">Select</option>')
                        $.each(data, function(i, item) {
                            $('.sub-category').append(
                                ` <option value="${item.id}">${item.name}</option>`)

                        })

                    },
                    error: function(xhr, status, error) {
                        console.log(error);

                    }

                })
            })

            $('body').on('change', '.sub-category', function(e) {
                let id = $(this).val();

                $.ajax({
                    url: "{{ route('admin.product.get-child-categories') }}",
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {

                        $('.child-category').html('<option value="">Select</option>')
                        $.each(data, function(i, item) {
                            $('.child-category').append(
                                ` <option value="${item.id}">${item.name}</option>`)

                        })

                    },
                    error: function(xhr, status, error) {
                        console.log(error);

                    }

                })
            })
        })
    </script>
@endpush
