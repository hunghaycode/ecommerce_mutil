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

                            <h4>Edit Slider</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Preview</label> <br>
                                    <img width="100px" src="{{asset($slider->banner)}}" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="">Banner</label>
                                    <input type="file" class="form-control" name="banner" value="{{$slider->banner}}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Type</label>
                                    <input type="text" class="form-control" name="type" value="{{$slider->type}}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{$slider->title}}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Starting Price</label>
                                    <input type="text" class="form-control" name="starting_price" value="{{$slider->starting_price}}" id="">
                                </div>

                                <div class="form-group">
                                    <label for="">Button Url</label>
                                    <input type="text" class="form-control" name="btn_url" value="{{$slider->btn_url}}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Serial</label>
                                    <input type="text" class="form-control" name="serial"value="{{$slider->serial}}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">State</label>
                                    <select id="inputState" class="form-control select2" name="status" value="{{old('status')}}">
                                      <option {{$slider->status==1?'selected':''}} value="1">Active</option>
                                      <option {{$slider->status==0?'selected':''}} value="0">Inactive</option>
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
