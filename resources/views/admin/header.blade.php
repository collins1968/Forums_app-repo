<?php 
$notifications = auth()->user()->notifications()->where('read_at', null)->get();
?>


<header class="header twitter-bg">
    <div class="toggle-nav">
      <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>

    <!--logo start-->
    <a href="/dashboard/home" class="logo" style="color:  #fff;">BBIS</span></a>
    <!--logo end-->

    <div class="nav search-row" id="top_menu">
      <!--  search form start -->
      <ul class="nav top-menu">
        <li>
          <form class="navbar-form">
            <input class="form-control" placeholder="Search" type="text">
          </form>
        </li>
      </ul>
      <!--  search form end -->
    </div>

    <div class="top-nav notification-row">
      <!-- notificatoin dropdown start-->
      <ul class="nav pull-right top-menu">

        <!-- task notificatoin start -->
        <li id="task_notificatoin_bar" class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <i class="icon-task-l"></i>
                          <span class="badge bg-important">6</span>
                      </a>
         
        </li>
        <!-- task notificatoin end -->
        <!-- inbox notificatoin start-->
        <li id="mail_notificatoin_bar" class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <i class="icon-envelope-l"></i>
                          <span class="badge bg-important">5</span>
                      </a>
          <ul class="dropdown-menu extended inbox">
            <div class="notify-arrow notify-arrow-blue"></div>
            <li>
              <p class="blue">You have 5 new messages</p>
            </li>
            
          </ul>
        </li>
        <!-- inbox notificatoin end -->
        <!-- alert notification start-->
        <li id="alert_notificatoin_bar" >
          <a href="{{route('notifications')}}">

                          <i class="icon-bell-l"></i>
                          <span class="badge bg-important">{{$notifications->count()}}</span>
                      </a>
         
        </li>
        <!-- alert notification end-->
        <!-- user login dropdown start-->
        <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <span class="profile-ava">
                              <img alt="" src="img/avatar1_small.jpg">
                          </span>
                        @if (auth()->user())
                        <span class="username">{{auth()->user()->name}}</span> 
                        @endif
                          <b class="caret"></b>
                      </a>
          <ul class="dropdown-menu extended logout">
            <div class="log-arrow-up"></div>
            <li class="eborder-top">
              <a href="#"><i class="icon_profile"></i> My Profile</a>
            </li>
            <li>
              <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
            </li>
            <li>
              <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
            </li>
            <li>
              <a href="#"><i class="icon_chat_alt"></i> Chats</a>
            </li>
            <li>
          
            </li>
            <li>
              <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
            </li>
            <li>
              <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
            </li>
          </ul>
        </li>
        <!-- user login dropdown end -->
      </ul>
      <!-- notificatoin dropdown end-->
    </div>
  </header>