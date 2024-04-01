
<div class="col-sm-8 text-left"> 		  
					<div class="container text-left">		
						<h1><?php echo $tittle?></h1>
						<h3>Sistema de evaluacion del estudiante</h3>
						<hr>
					</div>	
                    
							
                    <?= form_open(base_url(route_to('login')), ['method' => 'post', 'class' => 'form-inline']); ?>
                    <div class="form-group mx-2">
                    <?= form_label('Teléfono:', 'fkPhone', ['class' => 'sr-only']); ?>
                    <?= form_input(['name' => 'fkPhone', 'value'=>old('fkPhone'), 'id' => 'fkPhone', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Teléfono']); ?>
                    <p class="is-danger help">
                        <?=session('errors.fkPhone')?>
                    </p>
                </div>
                <div class="form-group mx-2">
                    <?= form_label('Contraseña:', 'password', ['class' => 'sr-only']); ?>
                    <?= form_input(['name' => 'password','value'=>old('password'), 'id' => 'password', 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Contraseña']); ?>
                   <p class="is-danger help">
                        <?=session('errors.password')?>
                    </p>
                </div>
                <?= form_submit('login', 'Ingresar', ['class' => 'btn btn-primary']); ?>

                 <?= form_close(); ?>
                    								 
				</div>
                
