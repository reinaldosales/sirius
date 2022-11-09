<?php

//Alter para uma pasta posteriormente
if (isset($_GET['success']))
    $userCreatedSuccess = "<p class='center-align green-text'> <i class='material-icons tiny'>done</i> Usuário adicionado com sucesso! </p>";

if (isset($_GET['logout']) || isset($_GET['deletedUser'])) {
    session_unset();
    session_destroy();
}

?>

<body>
    <div class="row w-100 page-login">
        <div class="card-left col col-lg-6">
            <img class="img-fluid w-100" src="assets/images/background-left-login.jpg" alt="Imagem esquerda da tela de Login">
        </div>
        <div class="card-right col col-lg-6 text-center m-auto">
            <div class="login m-auto">
                <div class="img-logo-128">
                    <img src="assets/images/logo/sirius-128.svg" alt="Logo 128px">
                </div>
                <div class="card-login">
                    <div class="text-login mb-4 mt-4">
                        <h1 class="h3 mb-3 fw-normal sirius-font-blue">Realize o login </h1>
                    </div>
                    <form method="POST" class="needs-validation" novalidate>
                        <input class="form-control form-control-lg" type="text" placeholder="E-mail" required>
                        <input class="form-control form-control-lg mt-2 mb-3" type="password" placeholder="Senha" required>
                        <a href="#" class="sirius-font-blue"> Esqueci minha senha </a>
                        <button class="w-100 btn btn-lg btn-primary btn-login mt-3 mb-2" type="submit" id="btn-login"> Entrar </button>
                        <p class="text-muted"> OU </p>
                    </form>
                    <button class="w-100 btn btn-lg btn-primary btn-signin" type="submit" id="btn-signin"> Cadastre-se </button>
                    <p class="mt-5 mb-3 text-muted">&copy 2021 - Sirius</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row w-100 page-signin">
        <div class="card-left col col-lg-6">
            <img class="img-fluid w-100" src="assets/images/background-left-signin.jpg" alt="Imagem esquerda da tela de Login">
        </div>
        <div class="card-right col col-lg-6 text-center m-auto">
            <div class="login m-auto">
                <div class="img-logo-128">
                    <img src="assets/images/logo/sirius-128.svg" alt="Logo 128px">
                </div>
                <div class="card-login">
                    <div class="text-login mb-4 mt-4">
                        <h1 class="h3 mb-3 fw-normal sirius-font-blue"> Realize seu cadastro </h1>
                    </div>
                    <form method="POST" class="needs-validation" novalidate>
                        <input class="form-control form-control-lg mb-2" type="text" placeholder="Nome" aria-label=".form-control-lg example" required>
                        <input class="form-control form-control-lg mb-2" type="text" placeholder="E-mail" aria-label=".form-control-lg example" required>
                        <input class="form-control form-control-lg mb-2" type="text" placeholder="Telefone" aria-label=".form-control-lg example" required>
                        <input class="form-control form-control-lg mb-2" type="password" placeholder="Senha" aria-label=".form-control-lg example" required>
                        <input class="form-control form-control-lg mb-2" type="password" placeholder="Confirmar Senha" aria-label=".form-control-lg example" required>
                        <button class="w-100 btn btn-lg btn-primary btn-login mt-3 mb-2" type="submit"> Cadastrar </button>
                        <p class="text-muted"> OU </p>
                    </form>
                    <button class="w-100 btn btn-lg btn-primary btn-signin" type="submit" id="btn-backLogin"> Voltar </button>
                    <p class="mt-5 mb-3 text-muted">&copy 2021 - Sirius</p>
                </div>
            </div>
        </div>
    </div>
