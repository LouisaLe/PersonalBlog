<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The Simple One</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('lib/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/css/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/css/summernote-bs4.min.css') }}">
    </link>
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"></link> -->
    <link rel="stylesheet" href="{{ asset('../resources/sass/app.css') }}">
    </link>
</head>

<body>
    <div class="admin-dashboard__container">
        <div class="admin-dashboard__wrapper">
            <div class="main-thread__wrapper">
                <h1 class="title">Dashboard</h1>
                <div class="feature__rectangle">
                    <label>Total post</label>
                    <div class="feature__value">2000</div>
                </div>
                <div class="feature__rectangle">
                    <label>Total visitors</label>
                    <div class="feature__value">90000</div>
                </div>
                <div class="feature__rectangle">
                    <label>Total subscriber</label>
                    <div class="feature__value">200</div>

                </div>
                <div class="feature__rectangle">
                    <label>Total comments</label>
                    <div class="feature__value">90</div>
                </div>
            </div>
            <div class="side-menu__wrapper">

                <div class="accordion" id="accordionExample">
                    <div id="category" class="card">
                        <a href="{{ route('admin.categories') }}" class="card-header" id="headingOne">
                            Category
                        </a>
                    </div>
                    <div id="post" class="card">
                        <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo">
                            Post
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <a href="{{ route('posts') }}" class="card-body">
                                All posts
                            </a>
                            <div class="card-body">
                                New Post
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-panel__wrapper">
                @yield('content')
            </div>
        </div>
    </div>

    @include('layout.footer')

    <script src="{{ asset('lib/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('lib/js/popper.min.js') }}"></script>
    <script src="{{ asset('lib/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('lib/js/mdb.min.js') }}"></script>
    <script src="{{ asset('lib/js/datatables.min.js') }}"></script>
    <script src="{{ asset('lib/js/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('lib/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('lib/js/toastr.min.js') }}"></script>
    <script src="{{ asset('lib/js/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('js/main-be.js') }}" defer></script>

    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
</script>
</body>

</html>