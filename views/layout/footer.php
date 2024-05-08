<footer class="footer">
        <svg class="footer__wave" id="wave" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 110" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
                    <stop stop-color="rgba(191, 6, 3, 1)" offset="0%"></stop>
                    <stop stop-color="rgba(241, 135, 1, 1)" offset="100%"></stop>
                </linearGradient>
            </defs>
            <path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,55L10,60.5C20,66,40,77,60,73.3C80,70,100,51,120,47.7C140,44,160,55,180,64.2C200,73,220,81,240,71.5C260,62,280,37,300,38.5C320,40,340,70,360,80.7C380,92,400,84,420,73.3C440,62,460,48,480,40.3C500,33,520,33,540,38.5C560,44,580,55,600,62.3C620,70,640,73,660,66C680,59,700,40,720,36.7C740,33,760,44,780,55C800,66,820,77,840,84.3C860,92,880,95,900,86.2C920,77,940,55,960,45.8C980,37,1000,40,1020,40.3C1040,40,1060,37,1080,36.7C1100,37,1120,40,1140,38.5C1160,37,1180,29,1200,23.8C1220,18,1240,15,1260,14.7C1280,15,1300,18,1320,29.3C1340,40,1360,59,1380,66C1400,73,1420,70,1430,67.8L1440,66L1440,110L1430,110C1420,110,1400,110,1380,110C1360,110,1340,110,1320,110C1300,110,1280,110,1260,110C1240,110,1220,110,1200,110C1180,110,1160,110,1140,110C1120,110,1100,110,1080,110C1060,110,1040,110,1020,110C1000,110,980,110,960,110C940,110,920,110,900,110C880,110,860,110,840,110C820,110,800,110,780,110C760,110,740,110,720,110C700,110,680,110,660,110C640,110,620,110,600,110C580,110,560,110,540,110C520,110,500,110,480,110C460,110,440,110,420,110C400,110,380,110,360,110C340,110,320,110,300,110C280,110,260,110,240,110C220,110,200,110,180,110C160,110,140,110,120,110C100,110,80,110,60,110C40,110,20,110,10,110L0,110Z"></path>
        </svg>
        <section class="footer-top">
            <div class="footer-left">
                <div class="footer-left-top">
                    <div class="footer-logo">
                        <img class="footer-logo__img" src="<?=base_url?>assets/img/logo.svg" alt="logo">
                    </div>
                    <div class="footer-texts">
                        <h2 class="footer-left-top__title">Burger Jin</h2>
                        <h3 class="footer-left-top__text">Expertos En Saciar</h3>
                    </div>
                </div>
                <div class="footer-left-bottom">
                    <h3 class="footer-left_botttom__txt">Entérate de todo</h3>
                    <form action="" class="footer-form">
                        <input type="text" name="mail" placeholder="Correo electrónico" class="footer-form__input">
                        <input type="submit" value="Suscribirse" class="footer-form__submit">
                    </form>
                </div>
            </div>

            <div class="footer-right">
                <ul class="footer-list">
                    <li class="footer-list__item"><a href="#" class="footer-list__anchor">Nosotros</a></li>
                    <li class="footer-list__item"><a href="#" class="footer-list__anchor">Politica de privacidad</a></li>
                    <li class="footer-list__item"><a href="#" class="footer-list__anchor">Términos y condiciones</a></li>
                </ul>
            </div>
        </section>

        <div class="footer-bottom">
            <ul class="footer-icons-list">
                <li class="footer-icons__item"><a href="#"><i class="footer-icons__icon bi bi-facebook"></i></a></li>
                <li class="footer-icons__item"><a href="#"><i class="footer-icons__icon bi bi-youtube"></a></i></li>
                <li class="footer-icons__item"><a href="#"><i class="footer-icons__icon bi bi-instagram"></a></i></li>
                <li class="footer-icons__item"><a href="#"><i class="footer-icons__icon bi bi-twitter-x"></a></i></li>
            </ul>

            <h3 class="footer-bottom__text">&copy; Burger Jin <?= date('Y') ?></h3>
        </div>
    </footer>

</body>

</html>