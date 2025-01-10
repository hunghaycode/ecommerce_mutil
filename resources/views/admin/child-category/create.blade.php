@extends('admin.layout.master')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Sub Category</h1>
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

                            <h4>Create Sub Category</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.child-category.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Category</label>

                                    <select id="inputState" class="form-control main-category select2" name="category" value="" >
                                        <option value="">Select</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="">Sub Category</label>

                                    <select id="inputState" class="form-control sub-category select2" name="sub_category" value="">
                                        <option value="">Select</option>                          
                                          
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="" id="">
                                </div>


                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control select2" name="status" value="">
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
                    url: "{{ route('admin.get-subcategories') }}",
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {

                       $('.sub-category').html('<option value="">Select</option>')
                       $.each(data, function(i,item){
                        $('.sub-category').append(` <option value="${item.id}">${item.name}</option>`)

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
