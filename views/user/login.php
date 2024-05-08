<section class="form">
    <form action="<?=base_url?>user/user_login" class="login-form" autocomplete="off" method="POST">
        <h2 class="login-form__title">Iniciar sesión</h2>

        <div class="login-form-group">
            <input class="login-form-group__input" type="text" name="email" required>
            <label class="login-form-group__label" for=""><i class="login-form-group__icon bi bi-envelope-fill"></i>Correo electrónico</label>
            <p class="login-form-group__error"><i class="login-form-group__icon-error bi bi-info-circle-fill"></i>Texto de prueba</p>
        </div>

        <div class="login-form-group">
            <input class="login-form-group__input" type="password" name="password" required>
            <label class="login-form-group__label" for=""><i class="login-form-group__icon bi bi-person-fill-lock"></i>Contraseña</label>
        </div>

        <div class="form-check">
            <input class="form-check__input" type="checkbox" name="chk_remember" id="remember">
            <label class="form-check__label" for="remember">Recordar usuario</label>
        </div>

        <div class="login-form-controls">
            <input class="login-form__submit" type="submit" value="Iniciar sesión">

            <div class="login-form-controls-text">
                <div class="login-form-controls-text__value">o ingresar con</div>
            </div>

            <div class="form-alternative">
                <a href="" class="form-alternative__option form-alternative__option--facebook"><i class="bi bi-facebook"></i> Facebook</a>
                <a href="" class="form-alternative__option form-alternative__option--google"><i class="bi bi-google"></i> Google</a>
            </div>

            <a class="login-form-controls__anchor" href="#">¿Olvidó su contraseña?</a>
            <p class="login-form-controls__paragraph">¿No tiene cuenta?, <a class="login-form-controls__anchor" href="<?=base_url?>user/register">Regístrese</a></p>
        </div>

    </form>
</section>