<div class="container-narrow">
    
    
    <!-- aqui cambio el'home/valida_contacto'-->
    <?= form_open('home/valida_registro', array('class' => 'form-signin')); ?>

    <h2 class="form-signin-heading">Formulario alta</h2>
    <hr> 
    
    <?= my_validador_errores(validation_errors()); ?>
    
    <div class="control-group">
        <?= form_input(array('type' => 'text', 'class' => 'input-block-level', 'name' => 'email', 'id' => 'email', 'placeholder' => 'Correo electrónico','value'=> set_value('email'))); ?>
    </div>
     <div class="control-group">
        <?= form_input(array('type' => 'text', 'class' => 'input-block-level', 'name' => 'name_user', 'id' => 'name_user', 'placeholder' => 'Nombre usuario','value'=> set_value('name_user'))); ?>
    </div>
    <div class="control-group">
        <?= form_input(array('type'=>'password','class'=>'input-block-level', 'name'=>'password','id'=>'password','placeholder'=>'Contraseña','value'=> set_value('password'))); ?>
    </div>
    <div class="control-group">
        <?= form_input(array('type'=>'password','class'=>'input-block-level', 'name'=>'passwordval','id'=>'passwordval','placeholder'=>'Repetir contraseña','value'=> set_value('passwordval'))); ?>
    </div>
    
    <!-- aqui va el desplegable localidad-->

    <div class="control-group">
        <select name ="localidad" class="input-block-level">
            <option selected value="ninguna">Selecciona una localidad</option>
               <?php foreach($registros as $item): ?>
                       <option value="<?php echo $item['id_localidad']; ?>"><?php echo $item['nom_localidad']; ?></option>
               <?php endforeach; ?>
        </select>

    </div>
    <hr>
    <div class="control-group">
    <?= form_button(array('type' => 'submit', 'class' => 'btn btn-primary', 'content' => 'Crear')); ?>
    <?= anchor('home/index', 'Cancelar', array('class' => "btn")); ?>
    </div>
<?= form_close(); ?>
</div>