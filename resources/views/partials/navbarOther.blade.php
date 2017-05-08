   <nav class="navbar navbar-default-2 navbar-transparent navbar-fixed-top" color-on-scroll="200">
        <!-- if you want to keep the navbar hidden you can add this class to the navbar "navbar-burger"-->
        <div class="navbar-header">
            <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/logo/horizontal-mon.svg') }}" alt="">
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right navbar-uppercase">
                <li>
                    <a href="{{ url('/') }}">Нүүр</a>
                </li>
                <li>
                    <a class="{{ Request::is('about*') ? 'active' : '' }}" href="{{ url('about') }}">Тухай</a>
                </li>
                <li>
                    <a class="{{ Request::is('news*') ? 'active' : '' }}" href="{{ url('news') }}">Мэдээ</a>
                </li>
                <li>
                    <a class="{{ Request::is('contact*') ? 'active' : '' }}" href="{{ url('contact') }}">Холбогдох</a>
                </li>
                 @if (Auth::guest())
                <li>
                    <a href="{{ route('login') }}" class="btn-blue">
                            Нэвтрэх
                    </a>
                </li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>