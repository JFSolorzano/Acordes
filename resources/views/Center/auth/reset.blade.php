@extends('Center.app')

@section('titulo')
{{ 'Inicia Sesion | Acordes' }}
@endsection

@section('contenido')
		<!-- Start wrapper -->
<div class = "wrapper" >

	<!-- Start main-header -->
	<header class = "main-header" id = "top" >
		@if(\Session::has('alerta'))
			<div class = "col-md-12 text-right alert alert-dismissible alert-success"
				 style = "background-color: white" >
				<button type = "button" class = "close" data-dismiss = "alert" >×</button >
				<h1 >{{Session::get('alerta')}}</h1 >
				<br >
			</div >
		@endif
		@if ( !$errors->isEmpty() )
			<div class = "col-md-12 alert alert-dismissible alert-danger" >
				<button type = "button" class = "close" data-dismiss = "alert" >×</button >
				<strong>Ooops!</strong> Hay problemas con los datos ingresados.<br><br>
				<ul >
					@foreach ( $errors->all() as $error )
						<li >{{ $error }}</li >
					@endforeach
				</ul >
				<br >
			</div >
		@endif
		<div class = "logo-container light-shark-bg align-center" >
			<a href = "#" class = "logo" >
				<img src = "{{ asset('club/img/logo/243x100p.png') }}" alt = "Restaurante Acordes" >
			</a >
		</div >
		<!-- /logo-container -->
		<div class = "header-bottom-bar" >
			<div class = "container" >
				<div class = "row" >
					<div class = "col-md-12" >
						<div class = "contact-info align-right" >
							<ul >
								{{--<li ><a href = "{{ route('adminOlvide') }}" >OLVIDE MI CONTRASENA!</a ></li >--}}
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
									<div class = "section-title" >
										<h1 ><span >Restablece tu Contrasena</span ></h1 >
									</div >
									{!! Form::open(['route' => 'adminPostRestablecer',
                                     'method' => 'post', 'id' => 'contact-form', 'role' => 'form' ]) !!}
									{!! Form::token() !!}
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="E-Mail">
                                    <input type="password" name="password" placeholder="Nueva Contrasena">
                                    <input type="password" name="password_confirmation" placeholder="Confirma tu Contrasena">
									{!! Form::submit('Restablecer!',['style'=>'width: 100%']) !!}
									{!! Form::close() !!}
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

@endsection
