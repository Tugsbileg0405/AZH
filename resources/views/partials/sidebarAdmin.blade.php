 <div class="sidebar" data-background-color="white" data-active-color="danger">

     	<div class="sidebar-wrapper" >
            <div class="logo">
                <a href="" class="simple-text">
                    АЗХ админ
                </a>
            </div>
           <div id="treeview2" class="sidebar-wrapper"></div>
    	</div>
</div>

    @push('script')
    <script>
         var defaultData = [
            {
            text: 'Нүүр',
            selectable: false,
            state: {
                expanded: {{ Request::is('admin/options*') ? 'true' : 'false' }} || {{ Request::is('admin/president*') ? 'true' : 'false' }} || {{ Request::is('admin/presidents*') ? 'true' : 'false' }} || {{ Request::is('admin/sendmail*') ? 'true' : 'false' }} || {{ Request::is('admin/slide*') ? 'true' : 'false' }},
            },
            nodes: [
                {
                text: 'Слайд',
                icon: 'fa fa-sliders',
                state: {
                        selected:{{ Request::is('admin/slide*') ? 'true' : 'false' }}
                },
                href: "{{ url('admin/slide') }}",
                tags: ['0']
              },
              {
                text: 'Мэдээлэл',
                icon: 'fa fa-info',
                state: {
                        selected:{{ Request::is('admin/options*') ? 'true' : 'false' }}
                },
                href: "{{ url('admin/options') }}",
                tags: ['0']
              },
              {
                text: 'Ерөнхийлөгчид',
                icon: 'fa fa-user-secret',
                state: {
                        selected:{{ Request::is('admin/president*') ? 'true' : 'false' }}
                },
                href: "{{ url('admin/presidents') }}",
                tags: ['0']
              },
              {
                text: 'И-мэйл илгээх',
                icon: 'fa fa-envelope-o',
                state: {
                        selected:{{ Request::is('admin/sendmail*') ? 'true' : 'false' }}
                },
                href: "{{ url('admin/sendmail') }}",
                tags: ['0']
              },
            ]
          },
              {
            text: 'Бидний тухай',
            selectable: false,
            state: {
                expanded: {{ Request::is('admin/vow*') ? 'true' : 'false' }} || {{ Request::is('admin/rule*') ? 'true' : 'false' }} || {{ Request::is('admin/sector*') ? 'true' : 'false' }} || {{ Request::is('admin/intro*') ? 'true' : 'false' }} || {{ Request::is('admin/history*') ? 'true' : 'false' }} || {{ Request::is('admin/structure*') ? 'true' : 'false' }},
            },
             nodes: [
              {
                text: 'Танилцуулга',
                icon: 'fa fa-pencil-square-o',
                state: {
                    selected:{{ Request::is('admin/intro*') ? 'true' : 'false' }}
                },
                href: "{{ url('admin/intro') }}",
                tags: ['0']
              },
              {
                text: 'Түүх',
                icon: 'fa fa-history',
                state: {
                    selected:{{ Request::is('admin/history*') ? 'true' : 'false' }}
                },
                href: "{{ url('admin/history') }}",
                tags: ['0']
              },
               {
                text: 'Андгай',
                icon: 'fa fa-address-book',
                state: {
                    selected:{{ Request::is('admin/vow*') ? 'true' : 'false' }}
                },
                href: "{{ url('admin/vow') }}",
                tags: ['0']
              },
              {
                text: 'Дүрэм',
                icon: 'fa fa-book',
                state: {
                    selected:{{ Request::is('admin/rule*') ? 'true' : 'false' }}
                },
                href: "{{ url('admin/rule') }}",
                tags: ['0']
              },
              {
                text: 'Бүтэц',
                state: {
                    selected:{{ Request::is('admin/structure*') ? 'true' : 'false' }}
                },
                icon: 'fa fa-pie-chart',
                href: "{{ url('admin/structure') }}",
                tags: ['0']
              },
               {
                text: 'Салбаруудын мэдээлэл',
                state: {
                    selected:{{ Request::is('admin/sector*') ? 'true' : 'false' }}
                },
                icon: 'fa fa-question',
                href: "{{ url('admin/sector') }}",
                tags: ['0']
              },
            ]
          },
              {
            text: 'Хөтөлбөр',
            selectable: false,
            state: {
                expanded: {{ Request::is('admin/program*') ? 'true' : 'false' }} || {{ Request::is('admin/programname*') ? 'true' : 'false' }} || {{ Request::is('admin/programs*') ? 'true' : 'false' }} || {{ Request::is('admin/programcomment*') ? 'true' : 'false' }},
            },
             nodes: [
              {
                text: 'Хөтөлбөрийн ангилал',
                state: {
                    selected:{{ Request::is('admin/programname*') ? 'true' : 'false' }}
                },
                icon: 'fa fa-list',
                href: "{{ url('admin/programname') }}",
                tags: ['0']
              },
              {
                text: 'Хөтөлбөр',
                state: {
                    selected:{{ Request::is('admin/programs*') ? 'true' : 'false' }} || {{ Request::is('admin/program') ? 'true' : 'false' }}
                },
                icon: 'fa fa-tasks',
                href: "{{ url('admin/programs') }}",
                tags: ['0']
              },
              {
                text: 'Хөтөлбөрийн сэтгэгдэл',
                state: {
                    selected:{{ Request::is('admin/programcomment*') ? 'true' : 'false' }}
                },
                icon: 'fa fa-comment',
                href: "{{ url('admin/programcomment') }}",
                tags: ['0']
              },
            ]
          },
          {
            text: 'Мэдээ',
            selectable: false,
            state: {
                expanded:  {{ Request::is('admin/news*') ? 'true' : 'false' }} || {{ Request::is('admin') ? 'true' : 'false' }} || {{ Request::is('admin/category*') ? 'true' : 'false' }},
            },
            nodes: [
              {
                text: 'Мэдээ',
                icon: 'fa fa-newspaper-o',
                state: {
                    selected:{{ Request::is('admin') ? 'true' : 'false' }} || {{ Request::is('admin/news*') ? 'true' : 'false' }}
                },
                href: "{{ url('admin') }}",
                tags: ['0']
              },
              {
                text: 'Мэдээний ангилал',
                state: {
                    selected:{{ Request::is('admin/category*') ? 'true' : 'false' }}
                },
                icon: 'fa fa-list',
                href: "{{ url('admin/category') }}",
                tags: ['0']
              },
            ]
          },
            {
            text: 'Холбогдох',
            selectable: false,
            state: {
                expanded: {{ Request::is('admin/location*') ? 'true' : 'false' }} || {{ Request::is('admin/faq*') ? 'true' : 'false' }} || {{ Request::is('admin/contacts*') ? 'true' : 'false' }},
            },
             nodes: [
                  {
                text: 'Салбаруудын байрлал',
                icon: 'fa fa-map-marker',
                state: {
                    selected:{{ Request::is('admin/location*') ? 'true' : 'false' }}
                },
                href: "{{ url('admin/location') }}",
                tags: ['0']
              },
                {
                text: 'Санал хүсэлтүүд',
                icon: 'fa fa-archive',
                state: {
                    selected:{{ Request::is('admin/contacts*') ? 'true' : 'false' }}
                },
                href: "{{ url('admin/contacts') }}",
                tags: ['0']
              },
              {
                text: 'Түгээмэл асуулт хариултууд',
                icon: 'fa fa-question',
                state: {
                    selected:{{ Request::is('admin/faq*') ? 'true' : 'false' }}
                },
                href: "{{ url('admin/faq') }}",
                tags: ['0']
              },
            ]
          },
          {
                text: 'Хэрэглэгчид',
                state: {
                        selected:{{ Request::is('admin/users*') ? 'true' : 'false' }}
                },
                href: "{{ url('admin/users') }}",
                tags: ['0']
           },
        ];
        $('#treeview2').treeview({
          levels: 1,
          data: defaultData,
          enableLinks : true,
          showBorder: false,
        });
     
    </script>
    @endpush