{{-- @extends('admin.layout.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Home Page Settings</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">

                    <div class="card-body">
                      <div class="row">
                        <div class="col-2">
                          <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab">Popular Category Section</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab">Product Slider Section One</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab">Product Slider Section Two</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-slider-three" role="tab">Product Slider Section Three</a>
                          </div>
                        </div>
                        <div class="col-10">
                          <div class="tab-content" id="nav-tabContent">

                            @include('admin.home-page-setting.sections.popular-category-section')

                            @include('admin.home-page-setting.sections.product-slider-section-one')
                            
                            @include('admin.home-page-setting.sections.product-slider-section-two')
                            
                            @include('admin.home-page-setting.sections.product-slider-section-three')


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>

          </div>
        </section>

@endsection --}}

@extends('admin.layout.master')
@section('content')
          <!-- Main Content -->
          <section class="section">
            <div class="section-header">
              <h1>Setting</h1>
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
                          <h4>Mutil Table</h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-2">
                              <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab">Popular Category Section</a>
                                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab">Product Slider Section One</a>
                                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab">Product Slider Section Two</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab">Product Slider Section Three</a>
                              </div>
                            </div>
                            <div class="col-10">
                              <div class="tab-content" id="nav-tabContent">
                           
                                @include('admin.home-page-setting.sections.popular-category-section')

                                @include('admin.home-page-setting.sections.product-slider-section-one')
                                
                                @include('admin.home-page-setting.sections.product-slider-section-two')
                                
                                @include('admin.home-page-setting.sections.product-slider-section-three')
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
     
              </div>

            </div>
          </section>   

@endsection