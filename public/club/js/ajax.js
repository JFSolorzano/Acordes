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
                bebida.id = $this.find('p.hidden.id').text();
                bebida.imagen = $this.find('p.hidden.imagen').text();
                bebida.nombre = $this.find('p.hidden.nombre').text();
                bebida.costo = $this.find('p.hidden.costo').text();
                return {bebida: bebida};
            }).get();

            var comidas = $('.clicked.comida').map(function () {
                var $this = $(this);
                var comida = {};
                comida.id = $this.find('p.hidden.id').text();
                comida.imagen = $this.find('p.hidden.imagen').text();
                comida.nombre = $this.find('p.hidden.nombre').text();
                comida.costo = $this.find('p.hidden.costo').text();
                return {comida: comida};
            }).get();

            var bebidas_json = JSON.stringify(bebidas);
            var comidas_json = JSON.stringify(comidas);

            $('input[name="json_comidas"]').val(comidas_json);
            $('input[name="json_bebidas"]').val(bebidas_json);

        });

        $(".precio-comida").bind('keyup mouseup', function () {
            var $this = $(this);
            var costo_actual = parseFloat($('#cuenta-total').text().replace('$',''));
            var agregar = parseFloat($this.parents('.comida-seleccionada').find('p.comida-costo').text());
            var nuevo_costo = costo_actual + agregar;
            $('#cuenta-total').text('$'+nuevo_costo);
            $('#cuenta-total-input').val('$'+nuevo_costo);
        });

        $(".precio-bebida").bind('keyup mouseup', function () {
            var $this = $(this);
            var costo_actual = parseFloat($('#cuenta-total').text().replace('$',''));
            var agregar = parseFloat($this.parents('.bebida-seleccionada').find('p.bebida-costo').text());
            var nuevo_costo = costo_actual + agregar;
            $('#cuenta-total').text('$'+nuevo_costo);
            $('#cuenta-total-input').val('$'+nuevo_costo);
        });
    });

    $(document).on("ready", function() {
        $.each(['xs', 'sm', 'md', 'lg'], function(idx, gridSize) {
            $('.col-' + gridSize + '-auto:first').parent().each(function() {
                //we count the number of childrens with class col-md-6
                var numberOfCols = $(this).children('.col-' + gridSize + '-auto').length;
                if (numberOfCols > 0 && numberOfCols < 13) {
                    var minSpan = Math.floor(12 / numberOfCols);
                    var remainder = (12 % numberOfCols);
                    $(this).children('.col-' + gridSize + '-auto').each(function(idx, col) {
                        var width = minSpan;
                        if (remainder > 0) {
                            width += 1;
                            remainder--;
                        }
                        $(this).addClass('col-' + gridSize + '-' + width);
                    });
                }
            });
        });
    });

}());