<section class="pb_cover_v3 overflow-hidden cover-bg-indigo cover-bg-opacity text-left pb_gradient_v1 pb_slant-light" id="section-home">
    <div class="map_container">
      
      <div id="map"></div>
      <div id="wrapper">
        <div class="mb-4 backbutton"><a class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue">Volver</a></div>
        <div id="location" class="mb-4"></div>
        <div id="scale" class="mb-4"></div>
      </div>
    </div>

    <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <h2 class="heading mb-3">Modificar Solicitud</h2>
            <div class="sub-heading">
              <p class="mb-4">Ingrese los datos de la solicitud a modificar</p>
            </div>
          </div>
          <div class="col-md-1">
          </div>
          <div class="col-md-5 relative align-self-center">
            <?php echo form_open('solicitudes/update?id=' . $solicitudes[0]['id'], 'class="bg-white rounded pb_form_v1"'); ?>
              <div class="validation_errors"><?php echo validation_errors(); ?></div>
              <label for="hidrante">Hidrante</label>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Hidrante" name="hidrante" value="<?php echo $solicitudes[0]['hidrante_nombre'] ?>">
              </div>
              <div class="form-group ver_mapa" container="nueva_inspeccion">
                  <a>Ver Mapa</a>
              </div>
              <label for="hidrante">Accion</label>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Accion" name="accion" value="<?php 
                switch($solicitudes[0]['accion']){
                  case 0 : echo 'Pendiente'; break;
                  case 1 : echo 'Instalacion'; break;
                  case 2 : echo 'Mantenimiento'; break;
                  case 3 : echo 'Ninguna'; break;
                }
                ?>" readonly>
              </div>
              <label for="hidrante">Fecha de Solicitud</label>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Fecha de Solicitud" name="fecha_solicitud" value="<?php echo $solicitudes[0]['fecha_solicitud'] ?>" readonly>
              </div>
              <label for="hidrante">Fecha de Finalizacion</label>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Fecha de Finalizacion" name="fecha_finalizacion" value="<?php echo $solicitudes[0]['fecha_solicitud'] ?>" readonly>
              </div>
              <div class="form-group">
              <label for="hidrante">Estado</label>
              <div class="pb_select-wrap">
                  <select class="form-control pb_height-50 reverse" name="estado">
                    <option value="0" selected>Pendiente</option>
                    <option value="1">Completado</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue" value="Enviar">
              </div>
            </form>

          </div>
        </div>
      </div>

    </section>
    <!-- END section -->