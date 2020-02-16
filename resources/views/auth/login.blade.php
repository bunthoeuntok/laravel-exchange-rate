 <!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- Title -->
        <title>LOGIN-SMS</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
        <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Theme Styles -->
        <link href="{{ asset('css/concept.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin2.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    </head>
    <body>
        
        <!-- Page Container -->
        <div class="page-container">
            <div class="login">
                <div class="login-bg"></div>
                <div class="login-content">
                    <div class="login-box">
                        <div class="login-header">
                            <h3>School Systems</h3>
                            <p>Please login to continue.</p>
                        </div>
                        <div class="login-body">
                            <form method="post" action="{{ route('login') }}" id="form-login">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember">Remember password</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">LOGIN</button>
                            </form>
                        </div>
                        <div class="login-footer">
                            <p>Copyright <a href="#">@silentcoder</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /Page Container -->
        
        
        <!-- Javascripts -->
        <script src="{{ asset('plugins/jquery/jquery-3.1.0.min.js') }}"></script>
        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#form-login').validate();
            });
        </script>
    </body>

</html>