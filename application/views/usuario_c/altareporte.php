<div id="formulario_imagenes">
    <span><?php echo validation_errors(); ?></span>
<?=form_open_multipart(base_url()."upload/do_upload")?>
    <label>Título:</label><input type="text" name="titulo" />
    <label>Imagen 1:</label><input type="file" name="userfile" /><br /><br />
    <input type="submit" value="Subir imágenes" />
<?=form_close()?>


