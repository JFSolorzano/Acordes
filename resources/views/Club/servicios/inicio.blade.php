<section class="services" id="services">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 wow fadeInDown">
                <header class="section-title">
                    <h1><span>Nuestros</span> Servicios</h1>
                    <p>Todo lo que necesitas para disfrutar con tus amigos y en familia lo tenemos aqui.</p>
                </header>
            </div><!-- /col-md-8 -->
            <div class="col-md-12">
                <div class="row">
                    <?php $delay = 0 ?>
                    @foreach($servicios as $servicio)
                        @include('Club.servicios.servicio',[
                            'delay' => $delay,
                            'servicio' => $servicio
                        ])
                        <?php $delay += 0.2;  ?>
                    @endforeach
                </div><!-- /row -->
            </div><!-- /services-container -->
        </div><!-- /row -->
    </div><!-- /container -->
</section><!-- /services -->