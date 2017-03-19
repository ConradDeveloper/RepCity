 <?= form_open('home/validarlogin',array('class'=>'form-signin')); ?>

        <h2 class="form-signin-heading">Iniciar sesión</h2>

        <?= my_validador_errores(validation_errors()); ?>
        
        <?= form_input(array('type'=>'text','class'=>'input-block-level','name'=>'loginuser','id'=>'loginuser','placeholder'=>'Usuario', 'value'=> set_value('loginuser'))); ?>
        <br>
         <?= form_input(array('type'=>'password','class'=>'input-block-level','name'=>'clave','id'=>'clave','placeholder'=>'Contraseña', 'value'=> set_value('clave'))); ?>
        <br>
        <?= form_button(array('type'=>'submit','class'=>'btn btn-primary','content'=>'Ingresar')); ?>
        <?= anchor('home/index', 'Cancelar', array('class' => "btn")); ?>
     <?= form_close(); ?>