			@extends ('layouts.admin')
			@section ('contenido')
				<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<h2 >Nuevo Cliente</h2>
											<h3>Ingrese los datos solicitados</h3>
											<!-- 				<Para recibir los errores del request>-->		
											@if (count($errors)>0)
											<div class="alert alert-danger">
												<ul>	
								 				@foreach ($errors->all() as $error)
													<li>{{$error}}</li>
												@endforeach
												</ul>
											</div>
											@endif
										</div>
				</div>
			{!!Form::open(array('url'=>'ventas/cliente','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}
			<div class="row">
							            	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							            		<div class="form-group">
							            			<label for ="nombre"> Nombre </label>
							            			<input type ="text" name="nombre" required value ="{{old('nombre')}}" class ="form-control" placeholder="Nombre...">
							            		</div>
							            	</div>
							            	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							            		 <div class="form-group">
							            			<label > Dirección </label>
							            			<input type ="text" name="direccion" required value ="{{old('direccion')}}" class ="form-control" placeholder="Dirección...">
							            		</div>
							            	</div>	
							            	 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							            		<div class="form-group">
							            			<label for ="codigo"> Documento </label>
							            			<select name="tipo_documento" class="form-control">
							            				<option value="DPI" >DPI </option>
							            				<option value="NIT" >NIT </option>
							            				<option value="PAS">PASAPORTE</option>
							            			</select>
							            		</div>			            		
							            	</div>	
							            	 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							            		<div class="form-group">
							            			<label for ="num_documento"> Numero Documento </label>
							            			<input type ="text" name="num_documento"  value ="{{old('num_documento')}}" class ="form-control" placeholder="Numero de Documento...">
							            		</div>	
							            	</div>
							            	 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							            		<div class="form-group">
							            			<label for ="telefono"> Teléfono </label>
							            			<input type ="text" name="telefono"  value ="{{old('telefono')}}" class ="form-control" placeholder="Telefono...">
							            		</div>	
							            	</div>
							            	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							            		<div class="form-group">
							            			<label for ="email"> Email </label>
							            			<input type ="text" name="email"  value ="{{old('email')}}" class ="form-control" placeholder="Email...">
							            		</div>		
							            	</div>
							            	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							            		<div class="form-group">
							            			<button class="btn btn-primary" type="submit">Guardar</button>
							            			<button class="btn btn-danger" type="reset">Cancelar</button>
								            	</div>
							            	</div> 			            		
			</div>
			{!!Form::close()!!}		
				@endsection