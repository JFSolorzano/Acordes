<section class = "gallery dark-bg" id = "gallery" >
    <div class = "container" >
        <div class = "row" >
            <div class = "col-md-8 col-md-offset-2 wow fadeInDown" >
                <header class = "section-title" >
                    <h1 ><span >Que</span > Buscas?</h1 >

                    <p >Mira los platillos, las bebidas, y las promociones que tenemos para ti!</p >

                    <p >Somos el mejor lugar para festejar con tus amigos.</p >
                </header >
            </div >
            <!-- /col-md-8 -->
            <div class = "col-md-12 wow fadeInDown" >
                <div class = "gallery-filter-container" >
                    <ul class = "gallery-filter" >
                        @foreach($filtros as $filtro)
                            <li class = "filter" data-filter = ".{{ preg_replace('/\s+/', '', $filtro->nombre) }}" >
                                <span >{{ $filtro->nombre }}</span ></li >
                        @endforeach
                        <li class = "filter" data-filter = ".promocion" ><span >Promociones</span ></li >
                    </ul >
                </div >
                <!-- /gellery-filter-container -->
            </div >
            <!-- /col-md-12 -->
        </div >
        <!-- /row -->
    </div >
    <!-- /container -->
    <div class = "gallery-items-container wow fadeInDown" >
        <ul class = "clearfix" >
            @foreach($galeria as $item)
                <li class = "overlay-container mix
                {{ (array_key_exists('menu', $item) ? preg_replace('/\s+/', '', $item['menu']['nombre']) : 'promocion' ) }}" >
                    <img src = "{{ asset('img/menus/'.$item['imagen']) }}" alt = "{{ $item['nombre'] }}" >

                    <div class = "overlay" >
                        <div class = "overlay-details" >
                            <h3 >{{ $item['nombre'] }}</h3 >

                            <p >{{ (array_key_exists('extra', $item) ? $item['extra'] : $item['inicio']) }}</p >
                        </div >
                        <!-- /overlay-details -->
                        <div class = "buttons-container" >
                            <a href = "{{ route('publicMenuOpcion', ['slug' => $item['slug']]) }}" class = "button-link" ></a >
                            <a href = "{{ asset('img/menus/'.$item['imagen']) }}" alt = "{{ $item['nombre'] }}"
                               class = "button-zoom popup-trigger" ></a >
                        </div >
                        <!-- /buttons-container -->
                    </div >
                    <!-- /overlay -->
                </li >
            @endforeach
        </ul >
    </div >
    <!-- /gallery-items-container -->
</section ><!-- /gallery -->