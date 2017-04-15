
<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit">
    <h1>Listado Reportes <h1>
</div>

<?=form_open('home/menuciudadano'); ?>
<select name='registrosEst' class='span2' onchange='this.form.submit()'>  
     <option selected value="ninguna">Filtro reportes</option>
               <option value="5">Todos</option>
               <option value="1">Reportes abiertos</option>
               <option value="2">Resolución en curso </option> 
               <option value="3">Reportes cerrados </option> 
               <option value="4">Reportes reabiertos </option>     
        </select>
<noscript><input type="submit" value="Submit"></noscript>
<?= form_close(); ?>
            

                <hr>
       <div class="container">
                <ul class="thumbnails">
                    <?php foreach ($registros as $item): ?>
                        <li class="span4">
                            <div class="thumbnail">
                                <img class="img-responsive" src="<?= base_url($item['foto_ruta']) ?>" alt="<?= $item['titulo_rep'] ?>">  
                                <h3><?php echo anchor('home/altareporte', $item['titulo_rep'], array('title' => $item['id_report'])) ?></h3>
                                <p><?php echo $item['descripcion']; ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>
            </div>