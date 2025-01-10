@extends('vendor.layouts.master')


@section('content')
    <!--=============================
        DASHBOARD START
      ==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <a href="{{ route('vendor.products.index') }}" class="btn btn-warning mb-4"><i
                        class="fas fa-long-arrow-left"></i> Back</a>
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i>Create Products</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <form action="{{ route('vendor.products-variant.update',$variant->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{$variant->name }}" id="">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" value="{{ request()->product }}"
                                            name="product" id="">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputState">Status</label>
                                        <select id="inputState" class="form-control select2" name="status">
                                            <option {{$variant->status==1 ?'selected':''}} value="1">Active</option>
                                            <option {{$variant->status==0 ?'selected':''}} value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary"> Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        DASHBOARD START
      ==============================-->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('change', '.main-category', function(e) {
                let id = $(this).val();

                $.ajax({
                    url: "{{ route('vendor.product.get-subcategories') }}",
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
                    url: "{{ route('vendor.product.get-child-categories') }}",
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
