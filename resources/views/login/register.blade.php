@extends('layouts.layouts')

@section('title', 'Home')

@section('content')
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Inscrever-se</p>

                                    <form action="{{ route('users.store') }}" method="post"
                                        class="mx-1 mx-md-4">
                                        @csrf

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="" class="form-control" required
                                                    name="firstName" />
                                                <label class="form-label" for="">Seu primeiro nome</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="" class="form-control" required
                                                    name="lastName" />
                                                <label class="form-label" for="">Seu ultimo nome</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="" class="form-control" required
                                                    name="email" />
                                                <label class="form-label" for="">Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="password" name="password" onkeyup="verificarSenhas()">
                                                <label class="form-label" for="">Sua senha</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="confirm-password" name="confirm-password" onkeyup="verificarSenhas()">
                                                <label class="form-label" for="">
                                                    Repita sua senha</label>
                                            </div>

                                        </div>
                                        <p id="senha-aviso"></p>

                                        <div class="form-check d-flex justify-content-center mb-5">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="" />
                                            <label class="form-check-label" for="">
                                                Eu concordo com todas as declarações em <a href="#!">Termos de
                                                    serviço</a>
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="button" class="btn btn-primary btn-lg">Register</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function verificarSenhas() {
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirm-password").value;
  const aviso = document.getElementById("senha-aviso");
            console.log("password "+password)
            console.log("----")
            console.log("Confirmpassword "+confirmPassword)

  if (password != confirmPassword) {
    aviso.innerHTML = "As senhas não correspondem!";
    aviso.style.color = "red";
  } else {
    // aviso.innerHTML = "As senhas se correspondem!";
    aviso.innerHTML = "As senhas se correspondem!";
    aviso.style.color = "green";
  }
}

    </script>
@endsection
