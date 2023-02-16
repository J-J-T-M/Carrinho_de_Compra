<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang='en' class=''>

<head>
    <script
        src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'>
    </script>
    <script
        src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'>
    </script>
    <script
        src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'>
    </script>
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" type="image/x-icon"
        href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
    <link rel="mask-icon" type=""
        href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg"
        color="#111" />
    <link rel="canonical" href="https://codepen.io/frytyler/pen/EGdtg" />

    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js'></script>
    <style class="cp-pen-styles">
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);
    </style>
    <link rel="stylesheet" href="/css/styleLogin.css">
</head>

<body>
    <div class="container pt-3 text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <img src="/img/LOGO2.png" alt="">
            </div>
            <div class="col-12">
                <h1 class="text-white">TECHNOLOGY</h1>
            </div>
        </div>
    </div>
    <div class="login pt-3">
        <h1>Login</h1>
        <form action="{{ route('login.auth') }}" method="post">
            @csrf
            <input type="text" name="email" placeholder="Email" required="required" />
            <input type="password" name="password" placeholder="Senha" required="required" min="8" />

            <div class="form-check form-check-inline m-0 d-flex justify-content-end">
                <label class="form-check-label text-white" for="lembrar">
                    Lembrar-me
                </label>
                <input class="form-check-input m-0" type="checkbox" style="width: 3vh; height: 1.6vh" value=""
                    id="lembrar" name="remember">
            </div>

            @if ($message = Session::get('erro'))
                <p class="text-danger">{{ $message }}</p>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach

            @endif

            <button type="submit" class="btn btn-primary btn-block btn-large mt-3">Entrar</button>
        </form>
        <a href="{{ route('login.create') }}" class="btn btn-primary btn-block btn-large">Registre-se</a>
    </div>
    <script
        src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'>
    </script>
</body>

</html>
