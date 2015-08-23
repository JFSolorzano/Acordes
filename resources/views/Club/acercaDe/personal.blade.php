<section class="team" id="about">
    <div class="row">
        <div class="col-md-6 wow fadeInLeft">
            <div class="col-md-8 pull-right">
                <header class="section-title wow fadeInLeft">
                    <h1><span>Sobre</span> Nuestro Equipo</h1>
                </header>
                <div class="members-details-container">
                    @foreach($empleados as $empleado)
                        @include('Club.acercaDe.miembro',['empleado'=>$empleado])
                    @endforeach
                </div><!-- /members-details-container -->
                <div class="team-carousel-nav"></div>
            </div><!-- /col-md-8 -->
        </div><!-- /col-md-6 -->
        <div class="members-images-container col-md-6 pull-right wow fadeInRight">
            <div class="member">
                <div  class="member-image">
                    <figure>
                        <img src="{{ asset('club/img/team/member1.jpg') }}" alt="Marine Food Member">
                    </figure>
                </div>
            </div><!-- /member -->
        </div><!-- /members-images-con -->
    </div><!-- /row -->
</section><!-- /team -->