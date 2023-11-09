<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/team/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/team/img/favicon.png') }}">
    <title>
        Proyecto Web
    </title>

    <!--     Fonts and icons     -->
    <link href="{{ asset('assets/team/fonts.googleapis.css?family=Open+Sans:300,400,600,700') }}"rel="stylesheet" />
    <link href="{{ asset('assets/team/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/team/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="{{ asset('assets/team/42d5adcbca.js') }}" crossorigin="anonymous"></script>

    <link href="{{ asset('assets/team/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/team/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
    <script src="{{ asset('assets/team/js/jquery.min.js') }}"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <style>
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
        }

        .container {
            padding-top: 50px;
            margin: auto;
        }
    </style>
    <div class="container">
        <main class="main-content  mt-0">
            <section>
                <div class="page-header h-100vh">
                    <div class="container pt-3">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-8 d-flex flex-column mx-auto">
                                <div class="card card-plain mt-2">
                                    <div class="pb-0 text-left bg-transparent">
                                        <h4 class="font-weight-bolder text-info text-gradient text-center">Agricola
                                            Santa Cruz</h4>

                                    </div>                                   
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                {{ Form::label('USUARIO:') }}
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 input-div">
                                                {{ Form::label('CONTRASEÑA:') }}
                                                <input id="password-field" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password">
                                                <span toggle="#password-field"
                                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror


                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="rememberMe"
                                                    checked="">
                                                <label class="form-check-label" for="rememberMe">Recuerdame</label>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit"
                                                    class="btn bg-gradient-info w-100 mt-4 mb-0">Ingresar al
                                                    sistema</button>
                                            </div>
                                        </form>
                                    
                                    <div class="card-footer text-center d-flex flex-column px-lg-2 px-1">

                                        <span class="text-muted">RESTABLECER CONTRASEÑA
                                            <a href="{{ route('forgot.password') }}"
                                                class="text-info text-gradient font-weight-bold">AQUI</a>
                                        </span>
                                        <span class="text-muted">
                                            <a href="{{ route('user.create') }}"
                                                class="text-info text-gradient font-weight-bold">REGISTRESE AQUI</a>
                                        </span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                    <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n7"
                                        style="background-image:url('assets/team/img/curved-images/curved5.jpg')">


                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script>
        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>

    <script src="{{ asset('assets/team/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/team/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/team/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/team/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/team/js/plugins/chartjs.min.js') }}"></script>
    <script async defer src="{{ asset('assets/team/buttons.github.io.js') }}"></script>
    <script src="{{ asset('assets/team/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
    <script src="{{ asset('assets/team/js/plugins/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/team/js/plugins/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/team/js/plugins/animate.min.js') }}"></script>
    <script src="{{ asset('assets/team/js/plugins/bootstrap-notify.js') }}"></script>


    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <x-notify.status-notify></x-notify.status-notify>


</body>

</html>
