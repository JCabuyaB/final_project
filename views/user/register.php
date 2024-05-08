<section class="form">
    <form action="<?= base_url ?>user/user_register" class="register-form" autocomplete="off" method="POST">
        <h2 class="register-form__title">Registro</h2>

        <div class="form-double-group">
            <div class="inner-form-group">
                <input class="inner-form-group__input" type="text" name="name" required>
                <label class="inner-form-group__label" for=""><i class="register-form-group__icon bi bi-person-fill"></i>Nombres</label>
                <p class="register-form-group__error"><i class="register-form-group__icon-error bi bi-info-circle-fill"></i>Texto de prueba</p>
            </div>
            <div class="inner-form-group">
                <input class="inner-form-group__input" type="text" name="last_name" required>
                <label class="inner-form-group__label" for=""><i class="register-form-group__icon bi bi-person-fill"></i>Apellidos</label>
            </div>
        </div>

        <div class="register-form-group">
            <input class="register-form-group__input" type="text" name="email" required>
            <label class="register-form-group__label"><i class="register-form-group__icon bi bi-envelope-fill"></i>Correo electrónico</label>
            <p class="register-form-group__error"><i class="register-form-group__icon-error bi bi-info-circle-fill"></i>Texto de prueba</p>

        </div>

        <div class="register-form-group">
            <input class="register-form-group__input" type="password" name="pass" required>
            <label class="register-form-group__label"><i class="register-form-group__icon bi bi-person-fill-lock"></i>Contraseña</label>
        </div>

        <div class="register-form-group">
            <input class="register-form-group__input" type="password" name="confirm_pass" required>
            <label class="register-form-group__label"><i class="register-form-group__icon bi bi-person-fill-lock"></i>Confirmar contraseña</label>
        </div>


        <div class="register-form-controls">
            <input class="register-form__submit" type="submit" value="Registrarse">
        </div>

    </form>
</section>