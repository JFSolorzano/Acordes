<!-- Start main-header -->
<header class="main-header slider-on" id="top">
    <div class="main-slider-container">
        <div class="main-slider" >
            <ul class="scrollme">
                <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                    <img class="rs-parallaxlevel-1" src="{{ asset('club/img/slider-images/slider-bg1.jpg') }}" alt="Restaurante Acordes"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                    @include('Club.inicio.header-animation')
                </li>
                <li data-transition="fade" data-slotamount="7" data-masterspeed="1000" >
                    <img class="rs-parallaxlevel-1" src="{{ asset('club/img/slider-images/slider-bg2.jpg') }}" alt="Restaurante Acordes"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                    @include('Club.inicio.header-animation')
                </li>
                <li data-transition="fade" data-slotamount="7" data-masterspeed="1000">
                    <img class="rs-parallaxlevel-1" src="{{ asset('club/img/slider-images/slider-bg3.jpg') }}" alt="Restaurante Acordes"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                    @include('Club.inicio.header-animation')
                </li>
            </ul>
        </div><!-- /main-slider -->
    </div><!-- /main-slider-container -->
</header>
<!-- End main-header -->