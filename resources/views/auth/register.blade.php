<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dahboard-Sign Up</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">

    <!-- Font Icon -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/Auth/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">

</head>
<body>

<div class="main">

    <section class="signup">
        <!-- <img src="images/signup-bg.jpg" alt=""> -->
        <div class="container">
            <div class="signup-content">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h2 class="form-title">Create account</h2>
                    <div class="form-group">
                        <input type="text" class="form-input  @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="First Name"/>
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input  @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Last Name"/>
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-input  @error('email') is-invalid @enderror" name="email" id="email" placeholder="Your Email"required autocomplete="new-password" value="{{ old('email') }}"/>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-input @error('password') is-invalid @enderror"  placeholder="Your Password" name="password" required autocomplete="new-password">

                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-input" name="password_confirmation" placeholder="Repeat Your Password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                    </div>
                </form>
                <p class="loginhere">
                    Have already an account ? <a href="{{route('login')}}" class="loginhere-link">Login here</a>
                </p>
            </div>
        </div>
    </section>

</div>

<!-- JS -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
