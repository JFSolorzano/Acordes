<div class = "menu col-md-12" >
    <div class = "row" >
        <div class = "col-md-8 col-md-offset-2" >
            <header class = "section-title" >
                    <h2 ><span>{{ $menu->nombre }}</span></h2 >
            </header >
        </div >
        <!-- /col-md-8 -->
        @unless($menu->opciones->isEmpty())

            @foreach($menu->opciones->chunk(ceil($menu->opciones->count() / 2))  as $chunk)
                <div class = "col-md-6" >
                    @foreach($chunk as $opcion)
                        @include('Club.menu.opcion',[
                        'opcion' => $opcion
                        ])
                    @endforeach
                </div >
            <!-- /col-md-6 -->
            @endforeach

        @endunless
    </div >
    <!-- /row -->
</div ><!-- menu -->