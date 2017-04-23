<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
                <div class="navbar-header">
                        <a href="{{ route('home') }}" class="navbar-brand">Task List</a> 
                </div>
               
                <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                                @if(Auth::check())
                                <li><a href="{{ route('profile.index', ['username' => Auth::user()->username]) }}">{{ Auth::user()->getNameOrUsername() }}</a></li>
                                <li><a href="">Update profile</a></li>
                                <li><a href="{{ route('auth.signout') }}">Sign out</a></li>
                                @else
                                <li><a href="{{ route('auth.signup') }}">Sign up</a></li>
                                <li><a href="{{ route('auth.signin') }}">Sign in</a></li>
                                @endif
                        </ul>
                </div>
        </div>
</nav>