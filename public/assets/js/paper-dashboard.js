/*!
    
 =========================================================
 * Paper Dashboard - v1.1.2
 =========================================================
 
 * Product Page: http://www.creative-tim.com/product/paper-dashboard
 * Copyright 2017 Creative Tim (http://www.creative-tim.com)
 * Licensed under MIT (https://github.com/creativetimofficial/paper-dashboard/blob/master/LICENSE.md)
 
 =========================================================
 
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 
 */


var fixedTop = false;
var transparent = true;
var navbar_initialized = false;

$(document).ready(function() {
    window_width = $(window).width();

    // Init navigation toggle for small screens
    if (window_width <= 991) {
        pd.initRightMenu();
    }

    //  Activate the tooltips
    $('[rel="tooltip"]').tooltip();

});

// activate collapse right menu when the windows is resized
$(window).resize(function() {
    if ($(window).width() <= 991) {
        pd.initRightMenu();
    }
});

pd = {
    misc: {
        navbar_menu_visible: 0
    },
    checkScrollForTransparentNavbar: debounce(function() {
        if ($(document).scrollTop() > 381) {
            if (transparent) {
                transparent = false;
                $('.navbar-color-on-scroll').removeClass('navbar-transparent');
                $('.navbar-title').removeClass('hidden');
            }
        } else {
            if (!transparent) {
                transparent = true;
                $('.navbar-color-on-scroll').addClass('navbar-transparent');
                $('.navbar-title').addClass('hidden');
            }
        }
    }),
    initRightMenu: function() {

        if (!navbar_initialized) {
            $off_canvas_sidebar = $('nav').find('.navbar-collapse').first().clone(true);

            $sidebar = $('.sidebar');
            sidebar_bg_color = $sidebar.data('background-color');
            sidebar_active_color = $sidebar.data('active-color');

            $logo = $sidebar.find('.logo').first();
            logo_content = $logo[0].outerHTML;

            ul_content = '';

            // set the bg color and active color from the default sidebar to the off canvas sidebar;
            $off_canvas_sidebar.attr('data-background-color', sidebar_bg_color);
            $off_canvas_sidebar.attr('data-active-color', sidebar_active_color);

            $off_canvas_sidebar.addClass('off-canvas-sidebar');

            //add the content from the regular header to the right menu
            $off_canvas_sidebar.children('ul').each(function() {
                content_buff = $(this).html();
                ul_content = ul_content + content_buff;
            });

            // add the content from the sidebar to the right menu
            // content_buff = $sidebar.find('.nav').html();
            content_buff = ' <li class="dropdown">\
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">\
                                        Нүүр <span class="caret"></span>\
                                    </a>\
                                    <ul class="dropdown-menu" role="menu">\
                                        <li>\
                                            <a href="'+ defaultData[0].nodes[0].href +'">\
                                                <i class="fa fa-sliders"></i>\
                                                Cлайд\
                                            </a>\
                                            <a href="'+ defaultData[0].nodes[1].href +'">\
                                                <i class="fa fa-info"></i>\
                                                Мэдээлэл\
                                            </a>\
                                            <a href="'+ defaultData[0].nodes[2].href +'">\
                                                <i class="fa fa-user-secret"></i>\
                                                Eрөнхийлөгчид\
                                            </a>\
                                            <a href="'+ defaultData[0].nodes[3].href +'">\
                                                <i class="fa fa-envelope-o"></i>\
                                                И-мэйл илгээх\
                                            </a>\
                                        </li>\
                                    </ul>\
                          </li>\
                          <li class="dropdown">\
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">\
                                        Бидний тухай <span class="caret"></span>\
                                    </a>\
                                    <ul class="dropdown-menu" role="menu">\
                                        <li>\
                                            <a href="'+ defaultData[1].nodes[0].href +'">\
                                                <i class="fa fa-pencil-square-o"></i>\
                                                Танилцуулга\
                                            </a>\
                                            <a href="'+ defaultData[1].nodes[1].href +'">\
                                                <i class="fa fa-history"></i>\
                                                Түүх\
                                            </a>\
                                            <a href="'+ defaultData[1].nodes[2].href +'">\
                                                <i class="fa fa-address-book"></i>\
                                                Андгай\
                                            </a>\
                                            <a href="'+ defaultData[1].nodes[3].href +'">\
                                                <i class="fa fa-book"></i>\
                                                Дүрэм\
                                            </a>\
                                            <a href="'+ defaultData[1].nodes[4].href +'">\
                                                <i class="fa fa-pie-chart"></i>\
                                                Бүтэц\
                                            </a>\
                                            <a href="'+ defaultData[1].nodes[5].href +'">\
                                                <i class="fa fa-question"></i>\
                                                Салбаруудын мэдээлэл\
                                            </a>\
                                        </li>\
                                    </ul>\
                          </li>\
                           <li class="dropdown">\
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">\
                                       Хөтөлбөр <span class="caret"></span>\
                                    </a>\
                                    <ul class="dropdown-menu" role="menu">\
                                        <li>\
                                            <a href="'+ defaultData[2].nodes[0].href +'">\
                                                <i class="fa fa-list"></i>\
                                                Хөтөлбөрийн ангилал\
                                            </a>\
                                            <a href="'+ defaultData[2].nodes[1].href +'">\
                                                <i class="fa fa-tasks"></i>\
                                                Хөтөлбөр\
                                            </a>\
                                            <a href="'+ defaultData[2].nodes[2].href +'">\
                                                <i class="fa fa-comment"></i>\
                                                Хөтөлбөрийн сэтгэгдэл\
                                            </a>\
                                        </li>\
                                    </ul>\
                          </li>\
                            <li class="dropdown">\
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">\
                                       Мэдээ <span class="caret"></span>\
                                    </a>\
                                    <ul class="dropdown-menu" role="menu">\
                                        <li>\
                                            <a href="'+ defaultData[3].nodes[0].href +'">\
                                                <i class="fa fa-newspaper-o"></i>\
                                                Мэдээ\
                                            </a>\
                                            <a href="'+ defaultData[3].nodes[1].href +'">\
                                                <i class="fa fa-list"></i>\
                                                Мэдээний ангилал\
                                            </a>\
                                        </li>\
                                    </ul>\
                          </li>\
                            <li class="dropdown">\
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">\
                                       Холбогдох <span class="caret"></span>\
                                    </a>\
                                    <ul class="dropdown-menu" role="menu">\
                                        <li>\
                                            <a href="'+ defaultData[4].nodes[0].href +'">\
                                                <i class="fa fa-map-marker"></i>\
                                                Салбаруудын байрлал\
                                            </a>\
                                            <a href="'+ defaultData[4].nodes[1].href +'">\
                                                <i class="fa fa-archive"></i>\
                                                Мэдээний ангилал\
                                            </a>\
                                            <a href="'+ defaultData[4].nodes[2].href +'">\
                                                <i class="fa fa-question"></i>\
                                                Мэдээний ангилал\
                                            </a>\
                                        </li>\
                                    </ul>\
                          </li>\
                          <li>\
                          <a href="'+ defaultData[5].href +'">\
                                                <i class="fa fa-user"></i>\
                                                Хэрэглэгчид\
                            </a>\
                          </li>\
                          ';
            ul_content = ul_content + '<li class="divider"></li>' + content_buff;

            ul_content = '<ul class="nav navbar-nav">' + ul_content + '</ul>';

            navbar_content = logo_content + ul_content;
            navbar_content = '<div class="sidebar-wrapper">' + navbar_content + '</div>';

            $off_canvas_sidebar.html(navbar_content);

            $('body').append($off_canvas_sidebar);

            $toggle = $('.navbar-toggle');

            $off_canvas_sidebar.find('a').removeClass('btn btn-round btn-default');
            $off_canvas_sidebar.find('button').removeClass('btn-round btn-fill btn-info btn-primary btn-success btn-danger btn-warning btn-neutral');
            $off_canvas_sidebar.find('button').addClass('btn-simple btn-block');

            $toggle.click(function() {
                if (pd.misc.navbar_menu_visible == 1) {
                    $('html').removeClass('nav-open');
                    pd.misc.navbar_menu_visible = 0;
                    $('#bodyClick').remove();
                    setTimeout(function() {
                        $toggle.removeClass('toggled');
                    }, 400);

                } else {
                    setTimeout(function() {
                        $toggle.addClass('toggled');
                    }, 430);

                    div = '<div id="bodyClick"></div>';
                    $(div).appendTo("body").click(function() {
                        $('html').removeClass('nav-open');
                        pd.misc.navbar_menu_visible = 0;
                        $('#bodyClick').remove();
                        setTimeout(function() {
                            $toggle.removeClass('toggled');
                        }, 400);
                    });

                    $('html').addClass('nav-open');
                    pd.misc.navbar_menu_visible = 1;

                }
            });
            navbar_initialized = true;
        }

    }
}


// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.

function debounce(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this,
            args = arguments;
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        }, wait);
        if (immediate && !timeout) func.apply(context, args);
    };
};