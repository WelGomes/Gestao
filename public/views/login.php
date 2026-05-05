<?php require_once __DIR__ . "/../views/templates/header.php"; ?>

<title>Login</title>

<div class="d-flex flex-column align-items-center justify-content-center px-3 pt-5 mt-5">

    <div class="mb-3 text-center">
            <img src="/image/logo.png" alt="Logo" class="img-fluid d-inline-block" style="max-width: 140px; height: auto;">
    </div>
    <form class="d-flex flex-column w-100 gap-3 mx-auto" style="max-width: 520px;">
            
            <input type="hidden" name="csrf" id="csrf" value="<?php echo $_SESSION["csrf_token"] ?>">

            <div class="input-group has-validation">
                <span class="input-group-text py-2 border-primary" id="spanEmail"><i class="fa-solid fa-at" id="iconEmail"></i></span>
                <div class="form-floating is-invalid">
                    <input type="email" class="form-control border-primary" name="email" id="email" placeholder="email">
                    <label for="email">E-mail</label>
                </div>
                <div class="invalid-feedback d-none" id="msgErrorEmail">
                    Please choose a username.
                </div>
            </div>

            <div class="input-group has-validation">
                <span class="input-group-text border-primary" id="spanPassword" role="button"><i class="fa-solid fa-eye" id="iconVisiblePassword"></i> <i class="fa-solid fa-eye-slash d-none" id="iconInvisiblePassword"></i></span>
                <div class="form-floating is-invalid">
                    <input type="password" class="form-control border-primary" name="password" id="password" placeholder="password">
                    <label for="password">Password</label>
                </div>
                <div class="invalid-feedback d-none" id="msgErrorPassword">
                    Please choose a username.
                </div>
            </div>

            <div class="d-flex flex-row ms-2 pe-3 justify-content-between">
                <div>
                    <label for="save" class="d-flex flex-row gap-2 text-dark" role="button">
                        <input type="checkbox" name="save" id="save">
                        Permanecer conectado
                    </label>
                </div>
                <div>
                    <a href="">Esqueceu a senha?</a>
                </div>
            </div>
            
            <div class="">
                <button class="btn btn-primary w-100" id="btnLogin" type="submit">Login</button>
            </div>

    </form>

</div>
<?php require_once __DIR__ . "/../views/templates/footer.php"; ?>
