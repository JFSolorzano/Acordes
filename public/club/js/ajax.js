(function () {
    'use strict';

    /*-----------------------------------------
     comidas carousel
     ------------------------------------------*/

    $(document).ready(function () {

        $("#comidas").owlCarousel({
            items: 10
        });

        $("#bebidas").owlCarousel({
            items: 10
        });

        $("#menuseleccionado").owlCarousel({
            items: 10
        });

        $('.opcion').on('click', function (event) {
            var $this = $(this);
            if ($this.hasClass('clicked')) {
                $this.removeAttr('style').removeClass('clicked');
                $this.children('img').removeClass('selected-option');
            } else {
                $this.addClass('clicked');
                $this.children('img').addClass('selected-option');
            }
        });

        $("#siguiente").hover(function (event) {
            //event.preventDefault();
            console.log('Accion post');
            var bebidas = $('.clicked.bebida').map(function () {
                var $this = $(this);
                var bebida = {};
                bebida.id = $this.find('p.hidden').text();
                return {bebida: bebida};
            }).get();

            var comidas = $('.clicked.comida').map(function () {
                var $this = $(this);
                var comida = {};
                comida.id = $this.find('p.hidden').text();
                return {comida: comida};
            }).get();

            var bebidas_json = JSON.stringify(bebidas);
            var comidas_json = JSON.stringify(comidas);

            console.log(bebidas_json, comidas_json)

            $('input[name="json_comidas"]').val(comidas_json);
            $('input[name="json_bebidas"]').val(bebidas_json);

            console.log('Valores');
            console.log($('#json_comidas').val());


            //var request = $.ajax({
            //    url: '/reservacion/paso-uno/enviar',
            //    method: 'post',
            //    data: { 'bebidas': bebidas_json, 'comidas': comidas_json, '_token': $('input[name=_token]').val()},
            //    success: function(data){
            //        console.log(data);
            //    }
            //});

            //var form = $('#reservacion-paso-uno');
            //var url = form.attr('action').replace(':opciones',bebidas_json);
            //var data = form.serialize();
            //
            //$.post(url,data,function(result){
            //    alert(result);
            //});

            //$.ajax({
            //    method: form.attr('method'),
            //    url: form.attr('action'),
            //    data: {nombre: 'JOHN'},
            //    dataType: "json"
            //})
            //    .done(function(data,statusText,xhr){
            //        if(xhr.status == 301){
            //            window.location = data;
            //        }
            //    })
            //    .fail(function(data){
            //        console.log('Fallo');
            //        console.log(data);
            //    });

        });

    });
    //
    //$(document).on('submit','#reservacion-paso-uno',function(e){
    //
    //    e.preventDefault();
    //
    //    console.log("entrooooo");
    //
    //    var form = $(this);
    //
    //    console.log(form.attr('action'), form.attr('method'));
    //
    //    $.ajax({
    //        method: form.attr('method'),
    //        url: form.attr('action'),
    //        data: {nombre: 'JOHN'},
    //        dataType: "json"
    //    })
    //        .done(function(data,statusText,xhr){
    //            if(xhr.status == 301){
    //                window.location = data;
    //            }
    //        })
    //        .fail(function(data){
    //            console.log('Fallo');
    //            console.log(data);
    //        });
    //
    //});

}());