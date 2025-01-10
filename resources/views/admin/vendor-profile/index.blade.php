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
                            <form action="{{route('admin.vendor-profile.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label for="">Preview</label> <br>
                                  <img width="100px" src="{{asset($profile->banner)}}" alt="">
                              </div>
                                <div class="form-group">
                                    <label for="">Banner</label>
                                    <input type="file" class="form-control" name="banner"  id="">
                                </div>
                                <div class="form-group">
                                    <label>Shop Name</label>
                                    <input type="text" class="form-control" name="shop_name" value="{{$profile->shop_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{$profile->phone}}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$profile->email}}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{$profile->address}}" id="">
                                </div>

                                <div class="form-group">
                                    <label for="">Description </label>
                                  <textarea class="summernote" name="description" id="" cols="30" rows="10">{{$profile->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Fb_link</label>
                                    <input type="text" class="form-control" name="fb_link" value="{{$profile->fb_link}}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Tw_link</label>
                                    <input type="text" class="form-control" name="tw_link" value="{{$profile->tw_link}}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Insta_link</label>
                                    <input type="text" class="form-control" name="insta_link" value="{{$profile->insta_link}}" id="">
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
