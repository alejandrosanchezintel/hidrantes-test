<section class="pb_cover_v3 overflow-hidden cover-bg-indigo cover-bg-opacity text-left pb_gradient_v1 pb_slant-light" id="section-home">
    <div class="map_container">
      
      <div id="map"></div>
      <div id="wrapper">
        <div id="backbutton" class="mb-4"><a class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue">Volver</a></div>
        <div id="location" class="mb-4"></div>
        <div id="scale" class="mb-4"></div>
      </div>
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <h2 class="heading mb-3">Nueva Solicitud</h2>
            <div class="sub-heading">
              <p class="mb-4">Ingrese los datos de la nueva solicitud</p>
            </div>
          </div>
          <div class="col-md-1">
          </div>
          <div class="col-md-5 relative align-self-center">
            <!--<form action="#" class="bg-white rounded pb_form_v1">-->
            <?php echo form_open('solicitudes/create', 'class="bg-white rounded pb_form_v1"'); ?>
              <h2 class="mb-4 mt-0 text-center">Registro</h2>
              <div class="validation_errors"><?php echo validation_errors(); ?></div>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Inspeccion" name="inspeccion">
              </div>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Estado" name="estado">
              </div>
            </form>

          </div>
        </div>
      </div>

    </section>
    <!-- END section -->