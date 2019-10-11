<section class="pb_cover_v3 overflow-hidden cover-bg-indigo cover-bg-opacity text-left pb_gradient_v1 pb_slant-light" id="section-home">
    <div class="map_container">
      
      <div id="map"></div>
      <div id="locationCopied">
        <p>Localizacion Copiada: <span></span></p>
        <div class="mb-4 backbutton"><a class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue">Volver</a></div>
      </div>
      <div id="wrapper">
        <div class="mb-4 backbutton"><a class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue">Volver</a></div>
        <div id="location" class="mb-4"></div>
        <div id="scale" class="mb-4"></div>
      </div>
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <h2 class="heading mb-3">Busqueda de Hidrantes</h2>
            <div class="sub-heading">
              <?php 
                if(isset($hidrantes)){
                  foreach ($hidrantes as $hidrante): ?>
                  <p>Id: <?php echo $hidrante['id'] ?></p>
                  <p>Nombre: <?php echo $hidrante['nombre'] ?></p>
                  <p>Calle: <?php echo $hidrante['calle'] ?></p>
                  <p>Avenida: <?php echo $hidrante['avenida'] ?></p>
                  <p>Caudal: <?php echo $hidrante['caudal'] ?></p>
                  <?php endforeach; 
                }
              ?>
            </div>
          </div>
          <div class="col-md-1">
          </div>
          <div class="col-md-5 relative align-self-center">
            <form action="<?php echo base_url(); ?>hidrantes/search_name" class="bg-white rounded pb_form_v1" method="get">
              <div class="validation_errors"><?php echo validation_errors(); ?></div>
              <div class="form-group">
                <label for="bombero">Nombre del hidrante</label>
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Nombre" name="nombre" >
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue" value="Buscar">
              </div>
            </form>

          </div>
        </div>
      </div>

    </section>
    <!-- END section -->