@extends('admin.layout.master')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Table</h1>
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

                            <h4>Create Slider</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.brand.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Logo</label>
                                    <input type="file" class="form-control" name="logo"  id="">
                                </div>
                            

                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="" id="">
                                </div>

                                <div class="form-group">
                                    <label for="inputState">Is_Featured</label>
                                    <select id="inputState" class="form-control select2" name="is_featured" value="">
                                      <option value="1">Active</option>
                                      <option value="0">Inactive</option>
                                    </select>
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
