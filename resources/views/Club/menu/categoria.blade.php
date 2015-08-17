<div class = "menu col-md-12" >
    <div class = "row" >
        <div class = "col-md-8 col-md-offset-2" >
            <header class = "section-title" >
                <?php $titulo = explode(" ", $menu->nombre) ?>
                @if( count($titulo) === 1 )
                    <h1 ><span >{{ $titulo[0] }}</span ></h1 >
                @elseif( count($titulo) === 2 )
                    <h1 ><span >{{ $titulo[0] }}</span > {{ $titulo[1] }} </h1 >
                @else
                    <h1 ><span >{{ $titulo[0] }}</span > {{ $titulo[1].' '.$titulo[2] }} </h1 >
                @endif
            </header >
        </div >
        <!-- /col-md-8 -->
        @unless($menu->opciones->isEmpty())

            @foreach($menu->opciones->chunk(ceil($menu->opciones->count() / 2)) as $chunk)
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