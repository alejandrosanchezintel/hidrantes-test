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
            <h2 class="heading mb-3">Nueva Inspeccion</h2>
            <div class="sub-heading">
              <p class="mb-4">Ingrese los datos del nuevo usuario</p>
            </div>
          </div>
          <div class="col-md-1">
          </div>
          <div class="col-md-5 relative align-self-center">
            <!--<form action="#" class="bg-white rounded pb_form_v1">-->
            <?php echo form_open('inspecciones/create', 'class="bg-white rounded pb_form_v1"'); ?>
              <div class="validation_errors"><?php echo validation_errors(); ?></div>
              <div class="form-group">
                  <label for="bombero">Bombero a quien se le asigna la inspeccion</label>
                <div class="pb_select-wrap">
                  <select class="form-control pb_height-50 reverse" name="bombero">
                    <option value="" selected>Bombero</option>
                    <?php foreach ($bomberos as $bombero): ?>
                      <option value="<?php echo $bombero['id'] ?>"><?php echo $bombero['nombre'] . ' ' . $bombero['apellido_1'] . ' ' . $bombero['apellido_2'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                  <label for="bombero">Hidrante al que se realiza la inspeccion</label>
                <div class="pb_select-wrap">
                  <select class="form-control pb_height-50 reverse hidrante" name="hidrante">
                    <option value="" selected>Hidrante</option>
                    <option value="n">Nuevo Hidrante</option>
                    <?php foreach ($hidrantes as $hidrante): ?>
                      <option value="<?php echo $hidrante['id'] ?>"><?php echo $hidrante['nombre'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group ver_mapa" container="nueva_inspeccion">
                  <a>Ver Mapa</a>
              </div>
              <div class="form-group localizacion">
                <label for="bombero">Dirijase al mapa y haga click sobre la ubicacion del nuevo hidrante para copiarla</label>
                <input type="text" class="form-control pb_height-50 reverse localizacion" placeholder="Localizacion" name="localizacion" readonly>
                <label for="bombero">Nombre de Hidrante Nuevo</label>
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Hidrante Nuevo" name="hidrante_nuevo">
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue" value="Registrar">
              </div>
            </form>

          </div>
        </div>
      </div>

    </section>
    <!-- END section -->