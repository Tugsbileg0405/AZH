 <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    АЗХ админ
                </a>
            </div>

            <ul class="nav">
                <li class="{{ Request::is('admin') ? 'active' : '' }}">
                    <a href="{{ url('admin') }}">
                        <i class="ti-panel"></i>
                        <p>Мэдээ</p>
                    </a>
                </li>
                <li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
                    <a href="{{ url('admin/category') }}">
                        <i class="ti-view-list-alt"></i>
                        <p>Мэдээний ангилал</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/addnews*') ? 'active' : '' }}">
                    <a href="{{ url('admin/addnews') }}">
                        <i class="ti-view-list-alt"></i>
                        <p>Мэдээ оруулах</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/programname*') ? 'active' : '' }}">
                    <a href="{{ url('admin/programname') }}">
                        <i class="ti-location-arrow"></i>
                        <p>Хөтөлбөрийн ангилал</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/programs*') ? 'active' : '' }}">
                    <a href="{{ url('admin/programs') }}">
                        <i class="ti-location-arrow"></i>
                        <p>Хөтөлбөр оруулах</p>
                    </a>
                </li>
                <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
                    <a href="{{ url('admin/users') }}">
                        <i class="ti-user"></i>
                        <p>Хэрэглэгчид</p>
                    </a>
                </li>
                <li class="{{ Request::is('admin/presidents*') ? 'active' : '' }}">
                    <a href="{{ url('admin/presidents') }}">
                        <i class="ti-location-arrow"></i>
                        <p>Eрөнхийлөгчид</p>
                    </a>
                </li>
                 <li  class="{{ Request::is('admin/location*') ? 'active' : '' }}">
                    <a href="{{ url('admin/location') }}">
                        <i class="ti-location-arrow"></i>
                        <p>Салбаруудын байрлал</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/sector*') ? 'active' : '' }}">
                    <a href="{{ url('admin/sector') }}">
                        <i class="ti-location-arrow"></i>
                        <p>Салбаруудын мэдээлэл</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/faq*') ? 'active' : '' }}">
                    <a href="{{ url('admin/faq') }}">
                        <i class="ti-location-arrow"></i>
                        <p>Түгээмэл асуулт хариултууд</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/contacts*') ? 'active' : '' }}">
                    <a href="{{ url('admin/contacts') }}">
                        <i class="ti-location-arrow"></i>
                        <p>Санал хүсэлтүүд</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/intro*') ? 'active' : '' }}">
                    <a href="{{ url('admin/intro') }}">
                        <i class="ti-location-arrow"></i>
                        <p>Танилцуулга</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/history*') ? 'active' : '' }}">
                    <a href="{{ url('admin/history') }}">
                        <i class="ti-location-arrow"></i>
                        <p>Түүх</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/structure*') ? 'active' : '' }}">
                    <a href="{{ url('admin/structure') }}">
                        <i class="ti-location-arrow"></i>
                        <p>Бүтэц</p>
                    </a>
                </li>
                <li  class="{{ Request::is('admin/slide*') ? 'active' : '' }}">
                    <a href="{{ url('admin/slide') }}">
                        <i class="ti-location-arrow"></i>
                        <p>Слайд</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>