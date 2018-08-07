<header class="intro-header" style="background-image: url('{{ asset('img/home-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-lg-offset-2">
                <div class="site-heading admin-header">
                    <h1>Admin panel</h1>
                    @auth
                        <li class="nav-user">
                           {{ Auth::user()->name }}
                        </li>
                    @endauth
                    <hr class="small">
                    {{--<span class="subheading">A Clean Blog Theme by Start Bootstrap</span>--}}
                </div>
            </div>
        </div>
    </div>
</header>