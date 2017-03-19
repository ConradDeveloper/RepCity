<?= form_open('home/validarcambiopass',array('class'=>'form-signin')); ?>

        <h2 class="form-signin-heading">Cambio contraseña</h2>

        <?= my_validador_errores(validation_errors()); ?>
        
        <?= form_input(array('type'=>'password','class'=>'input-block-level','name'=>'passact','id'=>'passact','placeholder'=>'Contraseña actual','value'=> set_value('passact'))); ?>
        <br>
         <?= form_input(array('type'=>'password','class'=>'input-block-level','name'=>'passnew','id'=>'passnew','placeholder'=>'Contraseña nueva','value'=> set_value('passnew'))); ?>
        <br>
         <?= form_input(array('type'=>'password','class'=>'input-block-level','name'=>'passrep','id'=>'passrep','placeholder'=>'Repetir nueva','value'=> set_value('passrep'))); ?>
        <br>
        <?= form_button(array('type'=>'submit','class'=>'btn btn-primary','content'=>'Cambiar')); ?>
        <?= anchor('home/index', 'Cancelar', array('class' => "btn")); ?>
     <?= form_close(); ?>