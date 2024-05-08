<section class="form">
    <form action="<?= base_url ?>user/user_update" class="update-form" autocomplete="off" method="POST">
        <h2 class="update-form__title">Actualizando datos de <?= $_SESSION['user']->nombre ?></h2>

        <div class="update-form-inputs-container">
            <div class="update-form-group">
                <input class="update-form-group__input" type="text" name="email" value="<?= isset($_SESSION['current_data']['email']) ? $_SESSION['current_data']['email'] : $_SESSION['user']->correo ?>" required>
                <label class="update-form-group__label"><i class="update-form-group__icon bi bi-envelope-fill"></i>Correo electrónico</label>
                <?php if (isset($_SESSION['user_update_errors']['email'])) : ?>
                    <p class="update-form-group__error"><i class="update-form-group__icon-error bi bi-info-circle-fill"></i><?= $_SESSION['user_update_errors']['email'] ?></p>
                <?php endif; ?>
            </div>

            <div class="update-form-group">
                <input class="update-form-group__input" type="text" name="name" value="<?= isset($_SESSION['current_data']['name']) ? $_SESSION['current_data']['name'] : $_SESSION['user']->nombre ?>" required>
                <label class="update-form-group__label"><i class="update-form-group__icon bi bi-person-fill"></i>Nombre</label>
                <?php if (isset($_SESSION['user_update_errors']['name'])) : ?>
                    <p class="update-form-group__error"><i class="update-form-group__icon-error bi bi-info-circle-fill"></i><?= $_SESSION['user_update_errors']['name'] ?></p>
                <?php endif; ?>
            </div>

            <div class="update-form-group">
                <input class="update-form-group__input" type="text" name="last_name" value="<?= isset($_SESSION['current_data']['last_name']) ? $_SESSION['current_data']['last_name'] : $_SESSION['user']->apellidos ?>" required>
                <label class="update-form-group__label"><i class="update-form-group__icon bi bi-person-fill"></i>Apellido</label>
                <?php if (isset($_SESSION['user_update_errors']['last_name'])) : ?>
                    <p class="update-form-group__error"><i class="update-form-group__icon-error bi bi-info-circle-fill"></i><?= $_SESSION['user_update_errors']['last_name'] ?></p>
                <?php endif; ?>
            </div>

            <div class="update-form-group">
                <input class="update-form-group__input" type="password" name="current_pass" required>
                <label class="update-form-group__label"><i class="update-form-group__icon bi bi-person-fill-lock"></i>Contraseña actual</label>
                <?php if (isset($_SESSION['user_update_errors']['current_pass'])) : ?>
                    <p class="update-form-group__error"><i class="update-form-group__icon-error bi bi-info-circle-fill"></i><?= $_SESSION['user_update_errors']['current_pass'] ?></p>
                <?php endif; ?>
            </div>

            <div class="update-form-group">
                <input class="update-form-group__input" type="password" name="pass" required>
                <label class="update-form-group__label"><i class="update-form-group__icon bi bi-person-fill-lock"></i>Nueva Contraseña</label>
                <?php if (isset($_SESSION['user_update_errors']['pass'])) : ?>
                    <p class="update-form-group__error"><i class="update-form-group__icon-error bi bi-info-circle-fill"></i><?= $_SESSION['user_update_errors']['pass'] ?></p>
                <?php elseif (isset($_SESSION['user_update_errors']['pass_compare'])) : ?>
                    <p class="update-form-group__error"><i class="update-form-group__icon-error bi bi-info-circle-fill"></i><?= $_SESSION['user_update_errors']['pass_compare'] ?></p>
                <?php endif; ?>
            </div>

            <div class="update-form-group">
                <input class="update-form-group__input" type="password" name="confirm_pass" required>
                <label class="update-form-group__label"><i class="update-form-group__icon bi bi-person-fill-lock"></i>Confirmar contraseña</label>
                <?php if (isset($_SESSION['user_update_errors']['confirm_pass'])) : ?>
                    <p class="update-form-group__error"><i class="update-form-group__icon-error bi bi-info-circle-fill"></i><?= $_SESSION['user_update_errors']['confirm_pass'] ?></p>
                <?php elseif (isset($_SESSION['user_update_errors']['pass_compare'])) : ?>
                    <p class="update-form-group__error"><i class="update-form-group__icon-error bi bi-info-circle-fill"></i><?= $_SESSION['user_update_errors']['pass_compare'] ?></p>
                <?php endif; ?>
            </div>
        </div>


        <div class="update-form-controls">
            <input class="update-form__submit" type="submit" value="Actualizar">
        </div>
    </form>
    <?php delete_session('user_update_errors') ?>
    <?php delete_session('current_data') ?>
</section>