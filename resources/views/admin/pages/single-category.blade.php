@extends('layouts.dashboard')

@section('content')
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">

              <!--overview start-->
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i> Forum Categories </h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
                <li><i class="fa fa-users"></i>categories</li>
              </ol>
            </div>
          </div>

          <div class="row">

            <div class="col-lg-12 col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h2><i class="fa fa-flag-o red"></i><strong>Registered categories</strong></h2>
                  <div class="panel-actions">
                    <a href="/dashboard/home" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                    <a href="/dashboard/home" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                    <a href="/dashboard/home" class="btn-close"><i class="fa fa-times"></i></a>
                  </div>
                </div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3">
                              <div class="card" style="width:400px">
                                <img class="card-img-top" src="{{asset('storage/images/categories/'.$category->image)}}" alt="Card image" height="300" width="250">
                                <div class="card-body">
                                  <h4 class="card-title">{{$category->title}}</h4>
                                  <p class="card-text">{!!$category->desc!!}</p>
                                  
                                </div>
                              </div>




                              {{-- <h4>{{$category->title}}</h4>
                              <img src="{{asset('storage/images/categories/'.$category->image)}}" alt="category image" height="200" width="200">
                              <p>{!!$category->desc!!}</p> --}}
                            </div>
                        </div>
                    </div>
               

                  {{-- {{ $categories->links() }} --}}
                </div>
  
              </div>
  
            </div>
            
            </div>
            <!--/col-->
  
          </div>
  


        </section>


      </section>
      <!--main content end-->
@endsection