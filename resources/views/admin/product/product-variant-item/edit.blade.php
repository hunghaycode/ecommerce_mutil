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

                            <h4>Update Variant Item Product</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products-variant-item.update',$variantItem->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Variant Name</label>
                                    <input type="text" class="form-control" name="variant_name"
                                        value="{{ $variantItem->productVariant->name }} " readonly id="">
                                </div>

                                <div class="form-group">
                                    <label for="">Item Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $variantItem->name }}"
                                        id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Price <code>Nhap 0 cho Free</code></label>
                                    <input type="text" class="form-control" name="price" value="{{ $variantItem->price }}"
                                        id="">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Is Default</label>
                                    <select id="inputState" class="form-control select2" name="is_default">
                                        <option value="">Select</option>

                                        <option {{$variantItem->is_default==1 ?'selected':''}} value="1">Yes</option>
                                        <option {{$variantItem->is_default==0 ?'selected':''}} value="0">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control select2" name="status">
                                        <option {{$variantItem->status==1 ?'selected':''}} value="1">Active</option>
                                        <option {{$variantItem->status==0 ?'selected':''}} value="0">Inactive</option>
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
