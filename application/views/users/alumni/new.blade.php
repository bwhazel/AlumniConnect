@layout('layouts.unauthenticated')

@section('content')
<div class="span12">
  
  <blockquote>
    <p class="lead">Alumni Registration</p>
  </blockquote>

  <ul id="registerTabs" class="nav nav-tabs">
    <li class="active"><a href="#general" data-toggle="tab">General</a></li>
    <li><a href="#education" data-toggle="tab">Education</a></li>
    <li><a href="#profile_pic" data-toggle="tab">Profile Picture</a></li>
  </ul>
  
  {{ Form::horizontal_open_for_files('register/alumni', 'POST') }}
  {{ Form::token() }}

  <div id="appTab" class="tab-content"> 
    <!--General-->       
    <div class="tab-pane fade in active" id="general">
      <div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
        <label class="control-label" for="email">Email address: </label>
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-envelope"></i></span>
            {{ Form::xlarge_text('email', Input::old('email') ,array('placeholder' => 'Email'))}}
          </div>
        {{ $errors->has('email') ? Form::inline_help($errors->first('email','<li>:message</li>')) : '' }}
        </div>
      </div>
      <div class="control-group {{ $errors->has('password') ? 'error' : '' }}">
        <label class="control-label" for="password">Password: </label>
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-lock"></i></span>
            {{ Form::password('password', array('class' => 'input-xlarge', 'placeholder' => 'Password'))}}
          </div>
        {{ $errors->has('email') ? Form::inline_help($errors->first('password','<li>:message</li>')) : '' }}
        </div>
      </div>
      <div class="control-group {{ $errors->has('password_confirmation') ? 'error' : '' }}">
        <label class="control-label" for="password_confirmation">Confirm Password: </label>
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-lock"></i></span>
            {{ Form::password('password_confirmation', array('class' => 'input-xlarge', 'placeholder' => 'Confirm Password'))}}
          </div>
        {{ $errors->has('password_confirmation') ? Form::inline_help($errors->first('password_confirmation', '<li>:message</li>')) : '' }}
        </div>
      </div>
      <div class="control-group {{ $errors->has('fName') ? 'error' : '' }}">
        <label class="control-label" for="fName">First Name: </label>
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-user"></i></span>
            {{ Form::xlarge_text('fName', Input::old('fName') ,array('placeholder' => 'First Name'))}}
          </div>
        {{ $errors->has('fName') ? Form::inline_help($errors->first('fName', '<li>Your first name is required.</li>')) : '' }}
        </div>
      </div>
      <div class="control-group {{ $errors->has('lName') ? 'error' : '' }}">
        <label class="control-label" for="lName">Last Name: </label>
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-user"></i></span>
            {{ Form::xlarge_text('lName', Input::old('lName') ,array('placeholder' => 'Last Name'))}}
          </div>
          {{ $errors->has('lName') ? Form::inline_help($errors->first('lName', '<li>Your last name is required.</li>')) : '' }}
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="bio">About: </label>
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-pencil"></i></span>
            {{ Form::xlarge_textarea('bio', Input::old('bio') ,array('placeholder' => 'Tell us a bit about yourself...', 'cols' => '100'))}}
          </div>
        </div>
      </div>
    </div>
    <!--Education-->
    <div class="tab-pane fade in" id="education">
      <div id="major" class="control-group {{ $errors->has('major') ? 'error' : '' }}">
        <label class="control-label" for="major">Major: </label>
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-file"></i></span>
            {{ Form::xlarge_text('major', Input::old('major') ,array('placeholder' => 'Major'))}} 
          </div>
          &nbsp
          <i class="major icon-plus duplicate"></i>
        {{ $errors->has('major') ? Form::inline_help($errors->first('major','<li>:message</li>')) : '' }}
        </div>
      </div>
      <div id="second_major"></div>
      <div class="control-group {{ $errors->has('minor') ? 'error' : '' }}">
        <label class="control-label" for="minor">Minor: </label>
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-file"></i></span>
            {{ Form::xlarge_text('minor', Input::old('minor') ,array('placeholder' => 'Minor'))}}
          </div>
          &nbsp
          <i class="minor icon-plus duplicate"></i>
        {{ $errors->has('minor') ? Form::inline_help($errors->first('minor','<li>:message</li>')) : '' }}
        </div>
      </div>
      <div id="second_minor"></div>
      <div class="control-group {{ $errors->has('month')||$errors->has('year')? 'error' : '' }}">
        <label class="control-label" for="month">Graduated: </label>
       <div class="controls">
            {{ Form::span2_select('month', array('','January','Feburary','March','April','May','June','July','August','September','October','November','December')) }}
            {{ Form::span1_select('year', array('','2000','2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012')) }}
        {{ $errors->has('month')|| $errors->has('year') ? Form::inline_help($errors->first('month','<li>:message</li>')) : '' }}
        </div>
      </div>
      <input type='hidden' id="graduation" name="graduation" />
    </div> 
    <!--Profile Pic-->
    <div class="tab-pane fade in" id="profile_pic">
      <div id="pic-crop">
      </div>
    </div>
  </div> 
    {{ Form::actions(Button::primary_submit('Register')) }}
    {{ Form::close() }}
</div>
@endsection