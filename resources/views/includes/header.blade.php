  <?php $user = Auth::user();
    $userImage  = $user->image ? "/storage/".$user->image.'?time='.time()  : 'theme/dist/img/user2-160x160.jpg';
  ?>
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link">Home</a>
      </li>

    </ul>


    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          <img src="{{asset($userImage) }}" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline">{{$user->name}}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="{{asset($userImage) }}" class="img-circle elevation-2" alt="User Image">

            <p>
                {{$user->name}} - Web Developer
              <small>Member since Nov. 2012</small>
            </p>
          </li>

          <li class="user-footer">
            <a href="{{route('profile.edit',['id' => $user->id])}}" class="btn btn-default btn-flat">Profile</a>
            <a class="btn btn-default btn-flat float-right" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
         </a>
     
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>
 
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>



    </ul>
  </nav>
  <!-- /.navbar -->