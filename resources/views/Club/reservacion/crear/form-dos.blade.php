<section class = "store-cart" >
    <div class = "container" >
        <?php $costo_total = 0.0; ?>
        {!! Form::open(array('route'=>'publicPostReservacionPasoDos','method'=>'POST', 'id'=>'completar', 'class' => 'cart-items wow fadeInDown')) !!}
        <table >
            <thead >
            <tr >
                <th class = "item-thumb" >Opcion</th >
                <th class = "item-desc" >Nombre</th >
                <th >Precio Unitario</th >
                <th >Cantidad</th >
                <th >Subtotal</th >
            </tr >
            </thead >
            <tbody >
            @if($comidas)
            @foreach($comidas as $comida)
            @foreach($comida as $datos)
            <?php $costo_total += $datos->costo; ?>
            <tr >
                <td class = "item-thumb" >
                    <figure >
                        <img src = "{{ asset('img/menus/'.$datos -> imagen) }}"
                             alt = "{{ $datos->nombre }}" >
                    </figure >
                </td >
                <td class = "item-desc" >{{ $datos->nombre }}</td >
                <td ><strong >${{ $datos->costo }}</strong ></td >
                <td >
                    {!! Form::number('opciones[]', $datos->id, ['class'=>'hidden']) !!}
                    {!! Form::number('cantidades[]',1,['class' => 'precio-comida cart-item-count']) !!}
                </td >
                <td ><strong >${{ $datos->costo }}</strong ></td >
            </tr >
            @endforeach
            @endforeach
            @endif
            @if($bebidas)
            @foreach($bebidas as $bebida)
            @foreach($bebida as $datos)
            <?php $costo_total += $datos->costo; ?>
            <tr >
                <td class = "item-thumb" >
                    <figure >
                        <img src = "{{ asset('img/menus/'.$datos -> imagen) }}"
                             alt = "{{ $datos->nombre }}" >
                    </figure >
                </td >
                <td class = "item-desc" >{{ $datos->nombre }}</td >
                <td ><strong >${{ $datos->costo }}</strong ></td >
                <td >
                    {!! Form::number('opciones[]', $datos->id, ['class'=>'hidden']) !!}
                    {!! Form::number('cantidades[]',1,['class' => 'precio-comida cart-item-count']) !!}
                </td >
                <td ><strong >${{ $datos->costo }}</strong ></td >
            </tr >
            @endforeach
            @endforeach
            @endif

            </tbody >
        </table >
        </form>
        <div class = "estimate-shopping wow fadeInDown" >
            <div class = "row" >
                <div class = "col-md-3 col-md-offset-6" >
                    <h6 >Comida preparada a tiempo</h6 >
                    {!! Form::checkbox('precocinado', 1, ['class' => 'checkbox', 'id' => 'precocinado', 'style' => 'display: inline-block']) !!}
                    <select name = "state" id = "state" >
                        <option value = "" >State / Region</option >
                        <option value = "1" >State / Region 1</option >
                        <option value = "2" >State / Region 2</option >
                        <option value = "3" >State / Region 3</option >
                        <option value = "4" >State / Region 4</option >
                        <option value = "5" >State / Region 5</option >
                        <option value = "6" >State / Region 6</option >
                    </select >
                    <input type = "text" name = "post-code" id = "post-code" placeholder = "Post Code" >

                    <div class = "button-container" >
                        <a href = "#" class = "custom-button button-style3 small block-button" >Update Totals</a >
                    </div >
                    <!-- /button-container -->
                </div >
                <div class = "cart-subtotal-container col-md-3" >
                    <h6 >Cart Subtotal</h6 >

                    <div class = "subtotals" >
                        <div class = "subtotal" >
                            <h6 >Subtotal:</h6 >
                            <span ><strong >$125</strong ></span >
                        </div >
                        <!-- /subtotal -->
                        <div class = "subtotal" >
                            <h6 >Shipping:</h6 >
                            <span ><strong >$5</strong ></span >
                        </div >
                        <!-- /subtotal -->
                        <div class = "subtotal total" >
                            <h6 >Total:</h6 >
                            <span ><strong >$130</strong ></span >
                        </div >
                        <!-- /subtotal -->
                    </div >
                    <!-- /subtotal -->
                </div >
                <div class = "col-md-12 align-right" >
                    <a href = "#" class = "custom-button button-style3 large" >Continue Shopping</a >
                    <a href = "#" class = "custom-button button-style3 large filled" >Checkout</a >
                </div >
            </div >
            <!-- /row -->
        </div >
        <!-- /estimate-shopping -->
        <div class = "related-items-container" >
            <header class = "section-title wow fadeInUp" >
                <h3 >related products</h3 >
            </header >
            <div class = "row" >
                <div class = "col-md-8 col-md-offset-2" >
                    <div class = "row" >
                        <div class = "col-md-6 wow fadeInUp" >
                            <div class = "store-item" >
                                <figure >
                                    <a href = "store-item.html" >
                                        <img src = "img/gallery/gallery22.jpg" alt = "Marine Food Store" >
                                    </a >
                                </figure >
                                <h3 class = "food-name" ><a href = "store-item.html" >Taco with Meat &amp; Avocado</a >
                                </h3 >
                                <ul class = "food-category" >
                                    <li >mexican</li >
                                    <li >fruits</li >
                                    <li >meat</li >
                                    <li >taco</li >
                                </ul >
                                <div class = "food-order" >
                                    <p class = "food-price" >$11.89</p >
                                    <a href = "#" class = "add-to-cart-link" >Add To Cart</a >
                                </div >
                                <!-- /food-order -->
                            </div >
                            <!-- /store-item -->
                        </div >
                        <!-- /col-md-6 -->
                        <div class = "col-md-6 wow fadeInUp" >
                            <div class = "store-item" >
                                <figure >
                                    <a href = "store-item.html" >
                                        <img src = "img/gallery/gallery21.jpg" alt = "Marine Food Store" >
                                    </a >
                                </figure >
                                <h3 class = "food-name" ><a href = "store-item.html" >Spring Fruit Salad</a ></h3 >
                                <ul class = "food-category" >
                                    <li >spanish</li >
                                    <li >fruits</li >
                                    <li >salad</li >
                                </ul >
                                <div class = "food-order" >
                                    <p class = "food-price" >$24.95</p >
                                    <a href = "#" class = "add-to-cart-link" >Add To Cart</a >
                                </div >
                                <!-- /food-order -->
                            </div >
                            <!-- /store-item -->
                        </div >
                        <!-- /col-md-6 -->
                    </div >
                    <!-- /row -->
                </div >
                <!-- /col-md-8 -->
            </div >
            <!-- /row -->
        </div >
        <!-- /related-items-container -->
    </div >
    <!-- /container -->
</section >