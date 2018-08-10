<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('article.index') }}">Home</a>
            {{--@auth<a class="navbar-brand" href="{{ url('add_article') }}">Add_Article</a>--}}
            {{--@endauth--}}
            @guest<a class="navbar-brand" href="{{ url('/login') }}">Login/Register</a>
                @else
                <a class="navbar-brand" href="{{ route('article.create') }}">Add_Article</a>
                <a class="navbar-brand" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
                @if(Auth::user()->user_admin == 1)
                    <a class="navbar-brand" href="{{ route('admin.index') }}">Admin_panel</a>
                @endif
            {{--<li class="nav-user">--}}
                {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                {{--</a>--}}

                {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                    {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                       {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                        {{--{{ __('Logout') }}--}}
                    {{--</a>--}}

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                {{--</div>--}}
            {{--</li>--}}

            @endguest
        </div>
    </div>
</nav>