<footer class="main-footer dark-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-3 align-center">
                <div class="logo-container wow fadeInLeft">
                    <a href="#">
                        <img src="{{ asset('club/img/logo/logo-light-blue.png') }}" alt="Acordes Logo">
                    </a>
                </div><!-- /logo-container -->
                <div class="socials-container">
                    <ul>
                        <li class="wow fadeInLeft"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="wow fadeInLeft" data-wow-delay="0.1s"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="wow fadeInLeft" data-wow-delay="0.2s"><a href="#"><i class="fa fa-skype"></i></a></li>
                        <li class="wow fadeInLeft" data-wow-delay="0.3s"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li class="wow fadeInLeft" data-wow-delay="0.4s"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li class="wow fadeInLeft" data-wow-delay="0.5s"><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div><!-- /socials-container -->
            </div><!-- /col-md-3 -->
            <div class="col-md-6 wow fadeInDown">
                <div class="contact-form-contaienr">
                    <div class="section-title">
                        <h1><span>Contactanos</span></h1>
                    </div>
                    <form id="contact-form" method="post">
                        <input type="text" id="name" name="name" placeholder="Nombre*" required>
                        <input type="email" id="email" name="email" placeholder="Email*" required>
                        <textarea id="message" name="message" rows="6" placeholder="Mensaje" required></textarea>
                        <button type="submit">Enviar Mensaje</button>
                    </form>
                    <div id="form-messages"></div>
                </div><!-- /contact-form-container -->
            </div><!-- /col-md-6 -->
            <div class="col-md-3 wow fadeInRight">
                <div class="address-container">
                    <address>
                        <img src="{{ asset('club/img/template-assets/map-pin.png') }}" alt="Acordes Direccion">
                        <p>
                            <p>Acordes.</p>
                            <p>Primera calle oriente y primera avenida norte </p>
                            <p>Frente a Plaza de la Cultura</p>
                            <p>Paseo El Carmen, Santa Tecla</p>
                        </p>
                        <img src="{{ asset('club/img/template-assets/phone-icon.png') }}" alt="Acordes Telefono">
                        <p>
                            <span>Telefono: (503) 7733 2332</span>
                        </p>
                        <img src="{{ asset('club/img/template-assets/mail-icon2.png') }}" alt="Acordes Email">
                        <p>
                            <span>contacto@restauranteacordes.com</span>
                        </p>
                    </address>
                </div><!-- /address-container -->
            </div><!-- /col-md-3 -->
            <div class="copyright col-md-12 wow fadeInUp" data-wow-delay="0.7s">
                <p>&copy; 2015 Acordes. Todos los derechos reservados.</p>
            </div><!-- /copyright -->
        </div><!-- /row -->
    </div><!-- /container -->
</footer>