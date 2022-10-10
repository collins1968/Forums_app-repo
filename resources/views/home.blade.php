@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src={{asset('images/th.jpeg')}} alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

                        <p class="text-muted text-center">{{auth()->user()->email}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Topics started</b> <a class="float-right">{{count(auth()->user()->topic)}}</a>
                            {{-- </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="float-right">13,287</a>
                            </li> --}}
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>

                        <p class="text-muted">
                           {{auth()->user()->education}}
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                        <p class="text-muted">{{auth()->user()->country}}</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> skills </strong>

                        <p class="text-muted">
                           {{auth()->user()->skills}}
                        </p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Bio</strong>

                        <p class="text-muted">{{auth()->user()->bio}}</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->






            <div class="col-md-9">






                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> 
                           
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                           
                            <div class="active tab-pane" id="activity">



                                <!-- Post -->
                          @if ($latest_user_post)
                          <div class="post">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" height = "50" widht= "50" src={{asset('images/th.jpeg')}} alt="user image">
                                <span class="username">
                                    <a href="#">You</a>
                                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                </span>
                                <span class="description">started disscussion at - {{$latest_user_post->created_at}}</span>
                            </div>
                            <!-- /.user-block -->
                            @if ($latest_user_post)
                            <p>
                                {{$latest_user_post->desc}}  
                              </p> 
                            @else
                            <p>
                                You have not started any discussions 
                              </p>
                            @endif

                            <p>
                                <a href="#" class="link-black text-sm mr-2"><i class="fas fa-eye mr-1"></i> {{$latest_user_post->views}} views</a>
                                <a href="#" class="link-black text-sm"><i class="fa fa-reply"></i> {{$latest_user_post->replies->count()}} replies</a>
                                <span class="float-right">
                                   
                                    <a href="{{route('topic.delete', $latest_user_post->id)}}" class="link-black text-sm">
                                      <button class="btn btn-danger"> <i class="fa fa-trash"></i> </button> 
                                    </a>
                                </span>
                            </p>

                           
                        </div>
                          @endif
                                <br>
                                <!-- /.post -->
                              




                                <!-- Post -->
                                <div class="post clearfix">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" height = "50" widht= "50" src={{asset('images/profile.jpeg')}} alt="User Image">
                                        <span class="username">
                                            <a href="#">{{$latest->user->name}}</a>
                                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                        </span>
                                        <span class="description">Started this topic at - {{$latest->created_at}}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    @if ($latest)
                                    <p>
                                        {!!$latest->desc!!}  
                                      </p> 
                                    @else
                                    <p>
                                        There are no discussions yet
                                      </p>
                                    @endif

                                    <form class="form-horizontal" action="{{route('topic.reply', $latest->id)}}" method="POST">
                                        @csrf
                                        <div class="input-group input-group-sm mb-0">
                                            <input class="form-control form-control-sm" name="desc" placeholder="Response">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-success">Reply to this topic</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.post -->


                            </div>










                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline"> timeline </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">


                                <form class="form-horizontal" action="{{route('user.update', auth()->id())}}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" placeholder="" value="{{auth()->user()->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="" value="{{auth()->user()->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label">Phone No.</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{auth()->user()->phone}}" placeholder="Phone" value="{{auth()->user()->phone}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Education</label>
                                        <div class="col-sm-10">
                                           <input type="text" class="form-control" name="education" placeholder="Describe your education background" value="{{auth()->user()->education}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="skills" value="{{auth()->user()->skills}}" placeholder="Skills separated by a comma">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Profession</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="proffesion" value="{{auth()->user()->proffesion}}" placeholder="Describe your profession">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Country</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="country" value="{{auth()->user()->country}}" placeholder="country">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Bio</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="bio" value="{{auth()->user()->bio}}" placeholder="Your bio">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">update details</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
