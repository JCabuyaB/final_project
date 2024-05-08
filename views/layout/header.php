<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger Jin</title>
    <link rel="stylesheet" href="<?= base_url ?>assets/css/general.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/layout/header.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/layout/footer.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/index/index.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/menu-product/menu.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/menu-product/product.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/forms/login.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/forms/register.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/forms/update.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/errors/errors.css">
    <link rel="shortcut icon" href="<?= base_url ?>assets/img/logo.ico " type="image/x-icon">

    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="body">
    <!-- header -->
    <header class="header">
        <div class="logo">
            <img src="<?= base_url ?>assets/img/logo.svg" alt="logo" class="logo__img">
            <a href="<?= base_url ?>" class="logo__anchor">Burger Jin</a>
        </div>

        <nav class="nav">
            <a href="<?= base_url ?>" class="nav__item">Inicio</a>
            <a href="<?= base_url ?>product/index" class="nav__item">Menú</a>
            <a href="" class="nav__item">Promociones</a>
            <a href="" class="nav__item">Pedidos</a>
            <?php if (isset($_SESSION['user'])) : ?>
                <ul class="user-menu">
                    <li class="user-menu__item">
                        <a href="<?= base_url ?>user/profile" class="nav__item nav__item--emphasis">
                            <?= $_SESSION['user']->nombre . ' ' . $_SESSION['user']->apellidos ?>
                        </a>
                        <ul class="user-submenu">
                            <li class="user-submenu__item user-submenu__item--first"><a class="nav__item" href="#">Actualizar datos</a></li>
                            <li class="user-submenu__item"><a class="nav__item" href="#">Actualizar datos</a></li>
                            <li class="user-submenu__item"><a class="nav__item" href="#">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            <?php else : ?>
                <a href="<?= base_url ?>user/login" class="nav__item nav__item--emphasis">Iniciar sesión</a>
            <?php endif; ?>
        </nav>
    </header>