<div class="container-narrow">

    <div class="jumbotron">
        <h1>¿Representas a un Ayuntamiento?</h1>
        <p class="lead">Si quieres ser un ayuntamiento cercano al ciudadano y tener un sistema de control sobre las 
        incidencias detectadas por los mismos, ¡no lo dudes!, envia una solicitud a nuesto portal web para ponernos en contacto.</p>
    </div>

    <hr> 
    <?= form_open('home/valida_contacto', array('class' => 'form-signin')); ?>

    <h2 class="form-signin-heading">Formulario de contacto</h2>

    <?= my_validador_errores(validation_errors()); ?>
    
    <div class="control-group">
        <?= form_input(array('type' => 'text', 'class' => 'input-block-level', 'name' => 'nom_ayunt', 'id' => 'nom_ayunt', 'placeholder' =>  'Ayuntamiento', 'value'=> set_value('nom_ayunt'))); ?>
    </div>
    <div class="control-group">
        <?= form_input(array('type' => 'text', 'class' => 'input-block-level', 'name' => 'mail_contact', 'id' => 'mail_contact', 'placeholder' => 'Correo de contacto', 'value'=> set_value('mail_contact'))); ?>
    </div>
    <div class="control-group">
        <?= form_input(array('type' => 'text', 'class' => 'input-block-level', 'name' => 'telf_contact', 'id' => 'telf_contact', 'placeholder' => 'Teléfono de contacto','value'=> set_value('telf_contact'))); ?>
    </div>
    <div class="control-group">
        <?php
        $options = array(
            'id' => 'text_solicitud',
            'name' => 'text_solicitud',
            'rows' => '6',
            'cols' => '90',
            'style' => 'width: 95%',
            'placeholder' => 'Introduce el texto de solicitud',
            'value'=> set_value('text_solicitud'));
        ?>
        <?= form_textarea($options); ?>
    </div>
    <div class="control-group">
    <?= form_button(array('type' => 'submit', 'class' => 'btn btn-primary', 'content' => 'Enviar')); ?>
    <?= anchor('home/index', 'Cancelar', array('class' => "btn")); ?>
    </div>
<?= form_close(); ?>
</div> <!-- /container -->