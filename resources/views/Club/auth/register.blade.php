@extends('Club.app')

@section('contenido')

		<!-- Start wrapper -->
<div class = "wrapper" >

	<!-- Start main-header -->
	<header class = "main-header" id = "top" >
		<div class = "logo-container light-shark-bg align-center" >
			<a href = "#" class = "logo" >
				<img src = "img/logo/logo.png" alt = "Marine Food Logo" >
			</a >
		</div >
		<!-- /logo-container -->
		<div class = "header-bottom-bar" >
			<div class = "container" >
				<div class = "row" >
					<div class = "col-md-12" >
						<div class = "contact-info align-right" >
							<ul >
								<li ><a href = "#" >OLVIDE MI CONTRASENA!</a ></li >
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
									<div class = "section-title" >
										<h1 ><span >Inicia Sesion</span ></h1 >
									</div >
									<form id = "contact-form" method = "post" class = "text-center" >
										<input type = "text" id = "name" name = "name" placeholder = "E-mail*"
											   required >
										<input type = "email" id = "email" name = "email" placeholder = "Contrasena*"
											   required >
										<button type = "submit" >Ingresar</button >
									</form >
									<div id = "form-messages" ></div >
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

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registrate</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Hubieron problemas con sus datos.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ route('clubPostRegistrar') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Contrasena</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirmar contrasena</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Registrar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
