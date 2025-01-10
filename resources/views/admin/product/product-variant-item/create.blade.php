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

                            <h4>Create Variant Item Product</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products-variant-item.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="">Variant Name</label>
                                    <input type="text" class="form-control" name="variant_name" value="{{ $variant->name }} " readonly
                                        id="">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="variant_id" value="{{ $variant->id}}"
                                        id="">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="product_id" value="{{ $product->id}}"
                                        id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value=""
                                        id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Price <code>Nhap 0 cho Free</code></label>
                                    <input type="text" class="form-control" name="price" value=""
                                        id="">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Is Default</label>
                                    <select id="inputState" class="form-control select2" name="is_default">
                                <option value="">Select</option>

                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control select2" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary"> Create</button>
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
