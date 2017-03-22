 <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="200">
        <div class="navbar-header">
            <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
            
                <img src="{{ asset('img/logo/horizontal-mon-white.png') }}" alt="">
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right navbar-uppercase">
                <li>
                    <a class="active" href="{{ url('/') }}">Нүүр</a>
                </li>
                <li>
                    <a href="{{ url('about') }}">Тухай</a>
                </li>
                <li>
                    <a href="{{ url('news') }}">Мэдээ</a>
                </li>
                <li>
                    <a href="{{ url('contact') }}">Холбогдох</a>
                </li>
                 @if (Auth::guest())
                <li>
                    <a href="{{ route('login') }}" class="btn-white">
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
    </nav>

    