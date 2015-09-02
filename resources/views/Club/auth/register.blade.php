@extends('Club.app')

@section('contenido')
        <!-- Start wrapper -->
<div class = "wrapper" >

    <!-- Start main-header -->
    <header class = "main-header" id = "top" >
        <div class = "logo-container light-shark-bg align-center" >
            <div class = "section-title" >
                <h1 ><span >Registrate</span ></h1 >
            </div >
        </div >
        <!-- /logo-container -->
        <div class = "header-bottom-bar" >
            <div class = "container" >
                <div class = "row" >
                    <div class = "col-md-12" >
                        <div class = "contact-info align-right" >
                            <ul >
                                <li >Necesitas Ayuda? Llamanos: 7168 5165</li >
                                <li ><a href = "#" >E-mail</a ></li >
                            </ul >
                        </div >
                        <!-- /contact-info -->
                    </div >
                    <!-- /col-md-12 -->
                </div >
                <!-- /row -->
            </div >
            <!-- /container -->
        </div >
        <!-- /header-bottom-bar -->
    </header >
    <!-- End main-header -->

    <section class = "store-checkout" >
        <div class = "container wow fadeInDown" >
            <div class = "row" >
                <div class = "col-md-12" >
                    <div class = "container" >
                        <div class = "row" >
                            <div class = "col-md-6 col-md-offset-3 wow fadeInDown" >
                                <div class = "contact-form-contaienr" >
                                    <form id = "contact-form" role = "form" method = "post"
                                          action = "{{ route('clubPostRegistrar') }}" >
                                        <input type = "hidden" name = "_token" value = "{{ csrf_token() }}" >

                                        <div class = "container" >
                                            <div class = "dropzone" id = "dropzoneFileUpload" >
                                            </div >
                                        </div >


                                        <input type = "text" name = "name" value = "{{ old('name') }}"
                                               placeholder = "Nombre" >

                                        <input type = "email" name = "email" autocomplete = "off"
                                               placeholder = "E-mail*" value = "{{ old('email') }}" required >

                                        <input type = "password" name = "password" placeholder = "Contrasena*"
                                               required >

                                        <input type = "password" name = "password_confirmation"
                                               placeholder = "Confirma la Contrasena*" required >

                                        <div class = "text-center" align = "center" >
                                            {!! Recaptcha::render() !!}
                                        </div >


                                        <button type = "submit" >Registrame</button >
                                    </form >
                                    <div id = "form-messages" >
                                        @if (count($errors) > 0)
                                            <strong >Whoops!</strong > Hubieron unos problemas con tus datos.<br ><br >
                                            <ul >
                                                @foreach ($errors->all() as $error)
                                                    <li >{{ $error }}</li >
                                                @endforeach
                                            </ul >
                                        @endif
                                    </div >
                                </div >
                                <!-- /contact-form-container -->
                            </div >
                            <!-- /col-md-6 -->
                        </div >
                        <!-- /row -->
                    </div >
                    <!-- /container -->
                </div >
                <!-- /col-md-12 -->
            </div >
            <!-- /row -->
        </div >
        <!-- /container -->
    </section >
</div >

<script type="text/javascript">
    var baseUrl = "{{ url('/') }}";
    var token = "{{ Session::getToken() }}";
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#dropzoneFileUpload", {
        url: baseUrl+"/dropzone/uploadFiles",
        params: {
            _token: token
        }
    });
    Dropzone.options.myAwesomeDropzone = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        accept: function(file, done) {

        },
    };
</script>

@endsection
