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
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> profile</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <h4>basic information</h4>


                                <form action="{{ route('vendor.shop-profile.store') }}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf
                                    <div class="col-md-2">
                                      <div class="wsus__dash_pro_img">
                                          <img src="{{asset($profile->banner) }}"
                                              alt="img" class="img-fluid w-100">
                                          <input type="file" name="banner">
                                      </div>
                                  </div>
                                     
                                  <div class="col-md-12 mt-5">
                                    <div class="wsus__dash_pro_single">
                                        <i class="fas fa-user-tie"></i>
                                        <input type="text" placeholder="Name" name="shop_name"
                                            value="{{ $profile->shop_name }}">
                                    </div>
                                </div>

                                    <div class="col-md-12 mt-5">
                                        <div class="wsus__dash_pro_single">
                                            <i class="fas fa-user-tie"></i>
                                            <input type="text" placeholder="Phone" name="phone"
                                                value="{{ $profile->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <div class="wsus__dash_pro_single">
                                            <i class="fas fa-user-tie"></i>
                                            <input type="text" placeholder="Email" name="email"
                                                value="{{ $profile->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <div class="wsus__dash_pro_single">
                                            <i class="fas fa-user-tie"></i>
                                            <input type="text" placeholder="address" name="address"
                                                value="{{ $profile->address }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="wsus__dash_pro_single">
                                            <i class="fal fa-envelope-open"></i>
                                            <textarea class="summernote" name="description" id="" cols="30" rows="10">{{ $profile->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="wsus__dash_pro_single">
                                            <i class="fal fa-envelope-open"></i>
                                            <input type="text" name="fb_link" id="" cols="30"
                                                rows="10" value="{{ $profile->fb_link }}"></input>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="wsus__dash_pro_single">
                                            <i class="fal fa-envelope-open"></i>
                                            <input type="text" name="tw_link" id="" cols="30"
                                                rows="10" value="{{ $profile->tw_link }}"></input>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="wsus__dash_pro_single">
                                            <i class="fal fa-envelope-open"></i>
                                            <input type="text" name="insta_link" id="" cols="30"
                                                rows="10" value="{{ $profile->insta_link }}"></input>
                                        </div>
                                    </div>

                            </div>
                            <div class="col-xl-12">
                                <button class="common_btn mb-4 mt-2" type="submit">upload</button>
                            </div>
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
