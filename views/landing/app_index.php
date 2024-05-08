

<!-- hero index -->
<section class="hero">
    <div class="hero__content">
        <h1 class="hero__title">comida... ¡rápida!</h1>
        <h2 class="hero__text">burger jin quita el hambre de una</h2>

        <div class="hero__buttons">
            <a href="#" class="hero__button">Pedidos</a>
            <a href="#featured" class="hero__button">Destacados</a>
        </div>
    </div>

    <div class="hero__down-arrow">
        <i class="bi bi-arrow-down-short"></i>
    </div>
</section>

<!-- featured content -->
<section class="featured" id="featured">
    <div class="featured-content">
        <h2 class="featured-content__title">Destacados</h2>

        <div class="featured-products">
            <article class="featured-card">

                <div class="featured-texts">
                    <h3 class="featured-card__title">Hamburguesa doble</h3>
                    <p class="featured-card__text">2 carnes de 50gr...</p>
                </div>

                <div class="featured-product">
                    <img class="featured-product__img" src="assets/img/products/hdoble.jpg" alt="imagen">

                    <a href="#">
                        <div class="featured-product__add">
                            <i class="bi-plus-lg"></i>
                        </div>
                    </a>
                </div>
            </article>

            <article class="featured-card">
                <div class="featured-texts">
                    <h3 class="featured-card__title">Hamburguesa con papas</h3>
                    <p class="featured-card__text">Acompañada con papas...</p>
                </div>

                <div class="featured-product">
                    <img class="featured-product__img" src="assets/img/products/hpapas.jpg" alt="imagen">

                    <a href="#">
                        <div class="featured-product__add">
                            <i class="bi-plus-lg"></i>
                        </div>
                    </a>
                </div>
            </article>

            <article class="featured-card">
                <div class="featured-texts">
                    <h3 class="featured-card__title">Hamburguesa carnívora</h3>
                    <p class="featured-card__text">2 carnes de 50gr...</p>
                </div>

                <div class="featured-product">
                    <img class="featured-product__img" src="assets/img/products/carnivora.jpg" alt="imagen">

                    <a href="#">
                        <div class="featured-product__add">
                            <i class="bi-plus-lg"></i>
                        </div>
                    </a>
                </div>
            </article>
        </div>

        <a href="menu.php" class="featured-content__button">¡Haz tu pedido!</a>
    </div>
</section>

<?php include_once 'views/layout/footer.php' ?>