<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>AlumniConnect</title>
	<meta name="viewport" content="width=device-width">
	{{ Asset::container('bootstrapper')->styles();}}  
	{{ HTML::style('css/font-awesome.min.css') }}
	{{ HTML::style('css/style.css') }}
</head>
<!-- Navbar -->
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="{{ URL::to('/') }}">
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="183.247px" height="18.629px" viewBox="0 0 183.247 18.629" enable-background="new 0 0 183.247 18.629"
            xml:space="preserve">
              <g>
                <path fill="#FFFFFF" d="M1.097,5.138L18.003,0l16.25,5.593l-3.685,1.614c0,0,1.752,1.295,0.282,5.474
                  c0.278,0.33,0.684,1.071-0.277,1.639c0.019,0.528,0.241,2.374,1.494,3.538c-0.667,0.403-1.69,1.35-2.374,0.277
                  c-0.46-1.156-0.999-2.421-0.077-4.082c0,0-0.533-1.077,0.317-1.564c0.17-0.535,1.207-3.147-0.409-4.864
                  c-0.744,0.331-11.1,4.616-11.1,4.616L1.097,5.138z"/>
                <path fill="#FFFFFF" d="M8.887,9.044c0,0-0.756,2.071-0.706,4.377c0.754-0.066,5.945-0.867,9.366,4.603
                  c0,0,3.149-4.809,9.816-3.546c0.227-1.03,0.427-3.724-0.19-5.062c-1.569,0.514-8.719,3.545-8.719,3.545L8.887,9.044z"/>
              </g>
            <rect x="38.923" y="4.997" fill="none" width="141.927" height="15.383"/>
            <text transform="matrix(1 0 0 1 38.9233 16.4922)" fill="#FFFFFF" font-family="'Helvetica'" font-size="18.3923">Alumni Connect</text>
          </svg>
        </a>
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li class="{{ URI::is('/') ? 'active' : '' }}"><a href="/"><i class="icon-home"></i>Home</a></li>
            <li class=""><a href=""><i class="icon-search"></i>Search</a></li>
            <li class=""><a href=""><i class="icon-user"></i>Profile</a></li>
          </ul>
          <div class="pull-right">
            <ul class="nav pull-right">
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, {{ Auth::user()->fname }} <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/user/preferences"><i class="icon-cogs"></i> Preferences</a></li>
                  <li><a href="#support-form" data-toggle="modal"><i class="icon-envelope"></i> Contact Support</a></li>
                  <li class="divider"></li>
                  <li><a href="logout"><i class="icon-off"></i> Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
<body>
	<div class="container">  
      <div class="row-fluid">
        <div class="span2">
          <div class="sidebar-nav">
            <div class="well" style="width: 185px; padding: 15px 0;">
                <ul class="nav nav-list"> 
                  <li class="nav-header">Control Panel</li>
                  <li><a href="#"><i class="icon-user"></i>Search Users</a></li>
                  <li><a href="#"><i class="icon-list"></i>Find Job Postings</a></li>
                  <li class="divider"></li>       
                  <li class="{{ URI::is('/') ? 'active' : '' }}"><a href="index"><i class="icon-home"></i> Dashboard</a></li>
                  <li><a href="#"><i class="icon-envelope"></i> Messages </a></li>
                  <li><a href="#"><i class="icon-comment"></i> Comments </a></li>
                  <li><a href="#"><i class="icon-user"></i> Members</a></li>
                  <li><a href="{{ URL::to('files') }}"><i class="icon-file-alt"></i> Manage Files</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="icon-cogs"></i> Profile Settings</a></li>
                  <li><a href="#support-form" data-toggle="modal"><i class="icon-envelope"></i> Contact Support</a></li>
                  <li><a href="#"><i class="icon-off"></i> Logout</a></li>
                </ul>
            </div>
          </div>
        </div><!--/span-->
        <div class="span9">
          @yield('content')
        </div>	
      </div>
      <hr>
      <footer>
        <p>&copy; AlumniConnect 2013</p>
      </footer>
	</div>

  <!-- Modal -->
  <div class="container">
    <div id="support-form" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
        <h3>Contact Us</h3>
      </div>
      <div class="modal-body">
        <div class="input-prepend contact-content">
          <span class="add-on"><i class="icon-user"></i></span>
          <input class="input-xlarge" id="contact-name" name="name" type="text" placeholder="Name">
        </div>
        <div class="input-prepend contact-content">
          <span class="add-on"><i class="icon-envelope"></i></span>
          <input class="input-xlarge" id="contact-email" name="email" type="text" placeholder="Email address">
        </div>
        <div class="input-prepend contact-content">
          <span class="add-on"><i class="icon-pencil"></i></span>
          <textarea class="input-xlarge" id="contact-message" name="message" placeholder="Write message here.." rows="10"></textarea>
        </div>          
      </div>
      <div class="modal-footer">
        <button class="btn" id="modal-close" data-dismiss="modal" aria-hidden="true">Close</button>
        <button   id="contact-send" class="btn btn-primary">Send</button>
      </div> 
      <div id="alert" >
      </div>               
    </div>
  </div>
  <!-- Modal --> 
{{ Asset::container('bootstrapper')->scripts();}}
{{ HTML::script('js/main.js') }}	
</body>
</html>