<nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{Auth::check() ? route('statuses_path') : route('home')}}">Larabook</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class='nav navbar-nav navbar-left'>
        <li>{{link_to_route('users_path', 'all users')}}</li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      
        <ul class="nav navbar-nav navbar-right">
          @if($current_user)
            <li class="dropdown">
              <img class="nav-gravatar" src="{{$current_user->present()->gravatar()}}" alt="{{$current_user->name}}">
              <a href="#" class="dropdown-toggle nav-profile" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$current_user->name}}<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li>{{link_to_route('logout_path', 'Log Out')}}</li>
              </ul>
            </li>
          @else
            <li>{{link_to_route('login_path', 'Login')}}</li>
            <li>{{link_to_route('register_path', 'Register')}}</li>
          @endif
        </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>