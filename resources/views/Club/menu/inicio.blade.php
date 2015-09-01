<section class = "menus dark-bg custom-bg1 parallax" data-stellar-background-ratio = "0.5"
         data-stellar-vertical-offset = "-150" id = "menu" >
    <div class = "container" >
        <div class = "row" >
            <div class = "menus-container wow fadeInDown" >
                <div class = "menu-carousel-nav" ></div >
                <div class = "menu-carousel" >
                    @foreach( $menus as $menu )
                        @include('Club.menu.categoria',[
                            'menu' => $menu
                        ])
                    @endforeach
                </div >
                <!-- /menu-carousel -->
            </div >
            <!-- /menus-container -->
        </div >
        <!-- /row -->
    </div >
    <!-- /container -->
    <div class = "container" >
        <div class = "row" >
            <div class = "col-md-12 align-center wow fadeInUp" >
                <a href = "{{ route('publicMenu') }}" class = "custom-button button-style1" ><i class = "icon-eye" ></i >Ver Detalles</a >
            </div >
        </div >
    </div >
    <!-- /col-md-12 -->
</section ><!-- /menu -->