<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('global.site_title') }}</title>
    <link href="{{ asset('css/adminCss/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="{{ asset('css/adminCss/jquery.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/adminCss/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/adminCss/buttons.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/adminCss/select.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/adminCss/coreui.min.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="{{ asset('css/adminCss/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/adminCss/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/adminCss/dropzone.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.11/dist/summernote-bs4.min.css" rel="stylesheet">
    
    @yield('styles')
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed pace-done sidebar-lg-show">
    <header class="app-header navbar">
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <span class="navbar-brand-full">Project</span>
            <span class="navbar-brand-minimized">P</span>
        </a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="nav navbar-nav ml-auto">
            @if(count(config('panel.available_languages', [])) > 1)
                <li class="nav-item dropdown d-md-down-none">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach(config('panel.available_languages') as $langLocale => $langName)
                            <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                        @endforeach
                    </div>
                </li>
            @endif
        </ul>
    </header>

    <div class="app-body">
        @include('partials.menu')
        <main class="main">


            <div style="padding-top: 20px" class="container-fluid">

                @yield('content')

            </div>


        </main>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    <script src="{{ asset('js/adminJs/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/adminJs/popper.min.js') }}"></script>
    <script src="{{ asset('/js/adminJs/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/adminJs/coreui.min.js') }}"></script>
    <script src="{{ asset('/js/adminJs/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/adminJs/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/js/adminJs/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/js/adminJs/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('/js/adminJs/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/js/adminJs/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/js/adminJs/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('/js/adminJs/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/js/adminJs/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/js/adminJs/jszip.min.js') }}"></script>
    <script src="{{ asset('/js/adminJs/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('/js/adminJs/ckeditor.js') }}"></script>
    <script src="{{ asset('/js/adminJs/moment.min.js') }}"></script>
    <script src="{{ asset('/js/adminJs/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/js/adminJs/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/adminJs/dropzone.min.js') }}"></script>
    <script src="{{ asset('/js/adminJs/summernote-bs4.min.js') }}"></script>
    

    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(function() {
  let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
  let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
  let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
  let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
  let printButtonTrans = '{{ trans('global.datatables.print') }}'
  let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'

  let languages = {
    'en': '/js/adminJs/English.json'
  };

  $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
  $.extend(true, $.fn.dataTable.defaults, {
    language: {
      url: languages.{{ app()->getLocale() }}
    },
    columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
    }, {
        orderable: false,
        searchable: false,
        targets: -1
    }],
    select: {
      style:    'multi+shift',
      selector: 'td:first-child'
    },
    order: [],
    scrollX: true,
    pageLength: 100,
    dom: 'lBfrtip<"actions">',
    buttons: [
      {
        extend: 'copy',
        className: 'btn-default',
        text: copyButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'csv',
        className: 'btn-default',
        text: csvButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'excel',
        className: 'btn-default',
        text: excelButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'pdf',
        className: 'btn-default',
        text: pdfButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'print',
        className: 'btn-default',
        text: printButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'colvis',
        className: 'btn-default',
        text: colvisButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      }
    ]
  });

  $.fn.dataTable.ext.classes.sPageButton = '';
});
$(document).ready(function() {

    $('.summernote').summernote({
        height: 300,
    });

});

    </script>
    @yield('scripts')
</body>

</html>