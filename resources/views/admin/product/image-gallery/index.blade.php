@extends('admin.layout.master')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Product Image Gallery</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>

        <div class="section-body">
            <div class="mb-3">
                <a class="btn btn-outline-primary" href="{{route('admin.products.index')}}">Back</a>
            </div>
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                     
                        <div class="card-header">
                            <h4>Product: {{$product->name}}</h4>
                           
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products-image-gallery.store') }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                <label for="">Images  <code>(Multiple image suported)</code></label>
                                <input type="file" name="image[]" class="form-control" multiple>
                                <input type="hidden" value="{{$product->id}}" name="product" class="form-control" id="">
                              </div>
                              <button class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-12 ">
              <div class="card">
                  <div class="card-header">
                      <h4>Product Image Gallery</h4>
                      <div class="card-header-action">
                          <a href="" class="btn btn-primary">+ Create</a>
                      </div>
                  </div>
                  <div class="card-body">
                      {{ $dataTable->table() }}
                  </div>
              </div>
          </div>
      </div>
  </div>
    </section>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
