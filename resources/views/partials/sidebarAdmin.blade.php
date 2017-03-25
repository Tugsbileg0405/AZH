 <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper" >
            <div class="logo">
                <a href="" class="simple-text">
                    АЗХ админ
                </a>
            </div>

            <ul class="nav">
                <li class="{{ Request::is('admin') ? 'active' : '' }}">
                    <a href="{{ url('admin') }}">
                        <i class="fa fa-newspaper-o"></i>
                        <p>Мэдээ</p>
                    </a>
                </li>
                <li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
                    <a href="{{ url('admin/category') }}">
                        <i class="fa fa-list"></i>
                        <p>Мэдээний ангилал</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/addnews*') ? 'active' : '' }}">
                    <a href="{{ url('admin/addnews') }}">
                        <i class="fa fa-plus"></i>
                        <p>Мэдээ оруулах</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/programname*') ? 'active' : '' }}">
                    <a href="{{ url('admin/programname') }}">
                        <i class="fa fa-list"></i>
                        <p>Хөтөлбөрийн ангилал</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/programs*') ? 'active' : '' }}">
                    <a href="{{ url('admin/programs') }}">
                        <i class="fa fa-tasks"></i>
                        <p>Хөтөлбөр оруулах</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/programcomment*') ? 'active' : '' }}">
                    <a href="{{ url('admin/programcomment') }}">
                        <i class="fa fa-comment"></i>
                        <p>Cэтгэгдэл</p>
                    </a>
                </li>
                <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
                    <a href="{{ url('admin/users') }}">
                        <i class="fa fa-user"></i>
                        <p>Хэрэглэгчид</p>
                    </a>
                </li>
                <li class="{{ Request::is('admin/presidents*') ? 'active' : '' }}">
                    <a href="{{ url('admin/presidents') }}">
                        <i class="fa fa-user-secret"></i>
                        <p>Eрөнхийлөгчид</p>
                    </a>
                </li>
                 <li  class="{{ Request::is('admin/location*') ? 'active' : '' }}">
                    <a href="{{ url('admin/location') }}">
                        <i class="fa fa-map-marker"></i>
                        <p>Салбаруудын байрлал</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/sector*') ? 'active' : '' }}">
                    <a href="{{ url('admin/sector') }}">
                        <i class="fa fa-thumb-tack"></i>
                        <p>Салбарын мэдээлэл</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/faq*') ? 'active' : '' }}">
                    <a href="{{ url('admin/faq') }}">
                        <i class="fa fa-question"></i>
                        <p>Асуулт хариултууд</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/contacts*') ? 'active' : '' }}">
                    <a href="{{ url('admin/contacts') }}">
                        <i class="fa fa-archive"></i>
                        <p>Санал хүсэлтүүд</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/intro*') ? 'active' : '' }}">
                    <a href="{{ url('admin/intro') }}">
                        <i class="fa fa-pencil-square-o"></i>
                        <p>Танилцуулга</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/history*') ? 'active' : '' }}">
                    <a href="{{ url('admin/history') }}">
                        <i class="fa fa-history"></i>
                        <p>Түүх</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/structure*') ? 'active' : '' }}">
                    <a href="{{ url('admin/structure') }}">
                        <i class="fa fa-pie-chart"></i>
                        <p>Бүтэц</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/slide*') ? 'active' : '' }}">
                    <a href="{{ url('admin/slide') }}">
                        <i class="fa fa-sliders"></i>
                        <p>Слайд</p>
                    </a>
                </li>
                 <li  class="{{ Request::is('admin/sendmail*') ? 'active' : '' }}">
                    <a href="{{ url('admin/sendmail') }}">
                        <i class="fa fa-sliders"></i>
                        <p>И-мэйл илгээх</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>