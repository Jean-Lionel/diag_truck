<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <style>
            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                width: 100%;
            }


            .card {
                width: 100%;
                padding: 30px;
            }

            body {
                background-image: linear-gradient(135deg, #FAB2FF 10%, #1904E5 100%);
            }

            .card_header {
                text-align: center;
                font-size: 35px;
                font-weight: 800;
            }

            input {
                width: 300px;
                height: 45px;
            }

            button {
                width: 100%;
                height: 45px;
                font-size: 25px;
            }

            label {
                margin-bottom: 12px;

     font-size: 15px;
                font-weight: 700;
            }
        </style>
    </head>

    <body>


        <div class="container">
            <div class="row ">
                <div class="col">
                    <div class="card">
                        <div class="card_header">{{ __('Connexion') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email" class="">{{ __('Email Address') }}</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="">{{ __('Password') }}</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Se connecter') }}
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </body>

</html>
