<section class="pb_cover_v3 overflow-hidden cover-bg-indigo cover-bg-opacity text-left pb_gradient_v1 pb_slant-light" id="section-home">
<div class="map_container">
      <div id="map"></div>
      <div id="wrapper">
        <div id="location" class="mb-4"></div>
        <div id="scale" class="mb-4"></div>
      </div>
    </div>
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <h2 class="heading mb-3">Geolocalizacion de Hidrantes</h2>
            <div class="sub-heading">
              <p class="mb-4">Ingrese su usuario y contrasena para iniciar sesion</p>
              
            </div>
          </div>
          <div class="col-md-1">
          </div>
          <div class="col-md-5 relative align-self-center">

            <form action="<?php echo base_url();?>usuarios/login" class="bg-white rounded pb_form_v1" method="post">
              <h2 class="mb-4 mt-0 text-center" style="padding-top:20px;">Login</h2>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Cedula" name="cedula">
              </div>
              <div class="form-group">
                <input type="password" class="form-control pb_height-50 reverse" placeholder="Contrasena" name="contrasena">
              </div>
              
              <?php if(! is_null($msg)) {?>
              <div class="form-group">
                <p style="color:red"><?php echo $msg;?></p>
              </div>
              <?php } ?>
              
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue" value="Ingresar">
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>