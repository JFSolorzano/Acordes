<!DOCTYPE html>
<html lang = "en" >
<head >
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title >Servicios</title >
    {{--<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>--}}
</head >
<body >
<style type = "text/css" >

    .circular {
        width: 70px;
        height: 70px;
        border-radius: 35px;
        box-shadow: 0 0 8px rgba(0, 0, 0, .8);
    }

    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }

    .page-break {
        page-break-after: always;
    }

    a {
        color: #0087C3;
        text-decoration: none;
    }

    body {
        position: relative;
        width: 18cm;
        height: auto;
        margin: 0 auto;
        color: #555555;
        background: #FFFFFF;
        /*font-family: 'Source Sans Pro';*/
        font-size: 14px;
    }

    header {
        padding: 10px 0;
        margin-bottom: 0px;
        border-bottom: 1px solid #AAAAAA;
    }
    .right{
        display:inline;
    }
    #logo img {
        height: 150px;
        width: 10cm;
    }

    #company {
        text-align: right;
        height: auto;
    }

    #details {
        margin-bottom: 50px;
    }

    #client {
        padding-left: 6px;
        border-left: 6px solid #0087C3;
        float: left;
        display:inline-block
    }

    #client .to {
        color: #777777;
    }

    h2.name {
        font-size: 1.4em;
        font-weight: normal;
        margin: 0;
    }
    #parent{
        display:inline-block;
    }
    #invoice {
        /*float: right;*/
        width: 50%;
        display:inline-block;
    }

    #align {
        display:inline-block;
    }

    .right-align {
        float: right;
    }

    .left-align {
        float: left;
    }

    #invoice h1 {
        color: #0087C3;
        font-size: 2.4em;
        line-height: 1em;
        font-weight: normal;
        margin: 0 0 10px 0;
    }

    #invoice .date {
        font-size: 1.1em;
        color: #777777;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
    }

    table th,
    table td {
        padding: 20px;
        background: #EEEEEE;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

    table th {
        white-space: nowrap;
        font-weight: normal;
        font-size: 20px;
        color: #fe6700;
    }

    table td {
        text-align: right;
    }

    table td h3 {
        color: #57B223;
        font-size: 1.2em;
        font-weight: normal;
        margin: 0 0 0.2em 0;
    }

    table .no {
        color: #FFFFFF;
        font-size: 1.6em;
        background: #57B223;
    }

    table .desc {
        text-align: left;
    }

    table .unit {
        background: #DDDDDD;
    }

    table .qty {
    }

    table .total {
        background: #57B223;
        color: #FFFFFF;
    }

    table td.unit,
    table td.qty,
    table td.total {
        font-size: 1.2em;
    }

    table tbody tr:last-child td {
        border: none;
    }

    table tfoot td {
        padding: 10px 20px;
        background: #FFFFFF;
        border-bottom: none;
        font-size: 1.2em;
        white-space: nowrap;
        border-top: 1px solid #AAAAAA;
    }

    table tfoot tr:first-child td {
        border-top: none;
    }

    table tfoot tr:last-child td {
        color: #57B223;
        font-size: 1.4em;
        border-top: 1px solid #57B223;

    }

    table tfoot tr td:first-child {
        border: none;
    }

    #thanks {
        font-size: 2em;
        margin-bottom: 50px;
    }

    #notices {
        padding-left: 6px;
        border-left: 6px solid #0087C3;
    }

    #notices .notice {
        font-size: 1.2em;
    }

    footer {
        color: #777777;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #AAAAAA;
        padding: 8px 0;
        text-align: center;
    }


</style >
<header id="parent" >
    <div id = "invoice" style="text-align: left">
        <h1 >Servicios</h1 >

        <div class = "date" >Fecha de generacion: {{ Carbon\Carbon::now()->toDateString() }}</div >
        <div class = "date" >Hora: {{ Carbon\Carbon::now()->toTimeString() }}</div >
    </div >
    <div id="invoice" style="text-align: right">
        <div id="align" class="left-align" style="width: 75%;">
            <h2 class = "name" >Restaurante Acordes</h2 >

            <div >Primera calle oriente y primera avenida norte</div >
            <div >(503) 7733 2332</div >
            <div ><a href = "mailto:contacto@restauranteacordes.com" >contacto@restauranteacordes.com</a ></div >
        </div>
        <img id="align" class="circular right-align" src = "https://scontent-mia1-1.xx.fbcdn.net/hphotos-xfp1/v/t1.0-9/388893_284916864942453_1180261429_n.jpg?oh=012edb436606371871be545758397022&oe=566CA087"/>
    </div >

</header >
<main >
    <?php $contador = 0 ?>
    @foreach($servicios->chunk(8) as $chunk)
        <table border = "0" cellspacing = "0" cellpadding = "0" >
            <thead >
            <tr >
                <th class = "desc" >Servicio</th >
            </tr >
            </thead >
            <tbody >

            @foreach($chunk as $servicio)
                {{--@if($contador < 4 )--}}
                <tr >
                    <td class = "desc" ><h3 >{{ $servicio->nombre }}</h3 >{{ $servicio->descripcion }}</td >
                </tr >
                {{--@endif--}}
            @endforeach
            </tbody >
        </table >
        @unless($contador > 0)
            <div class="page-break"></div>
        @endunless
        <?php $contador++ ?>
    @endforeach
    <div >
        <p class = "desc" >Este es el listado de servicios que ofrece el Restaurante Acordes, si hay algo que el cliente necesite y no aparezca en la lista, lo invitamos a preguntar.</p >
    </div >
    <div id = "details" class = "clearfix" >
        <div id = "client" >
            <div class = "to" >Generado por:</div >
            <h2 class = "name" >{{ Auth::user()->name }}</h2 >

            <div class = "email" ><a href = "mailto:{{ Auth::user()->email }}" >{{ Auth::user()->email }}</a ></div >
        </div >
    </div >
</main >
<footer >
    Restaurante Acordes
</footer >
</body >
</html >