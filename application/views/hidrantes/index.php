<?php 
  $this->load->helper('url'); 
  $this->load->library('session');
  
  //echo $this->session->tipo;
  //Tipos: 0 Admin, 1 Bombero, 2 Municipalidad
?>
<section class="pb_cover_v3 overflow-hidden cover-bg-indigo cover-bg-opacity text-left pb_gradient_v1 pb_slant-light" id="section-home">
    <div class="map_container">
      
      <div id="map"></div>
      <div id="wrapper">
        <div class="mb-4 backbutton"><a class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue">Volver</a></div>
        <div id="location" class="mb-4"></div>
        <div id="scale" class="mb-4"></div>
      </div>
    </div>
      <div class="container lista_usuarios">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12 relative align-self-center">
            <div class="box_container">
              <h2 class="mb-4 mt-0 text-center">Lista de Hidrantes</h2>
              <div class="form-group ver_mapa" container="nueva_inspeccion">
                  <a>Ver Mapa</a>
              </div>
              <table class="table">
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Calle</th>
                  <th scope="col">Avenida</th>
                  <th scope="col">Caudal</th>
                </tr>

                <?php foreach ($hidrantes as $hidrante): ?>
                        <tr>
                          <td><?php echo $hidrante['id'] ?></td>
                          <td><?php echo $hidrante['nombre'] ?></td>
                          <td><?php echo $hidrante['calle'] ?></td>
                          <td><?php echo $hidrante['avenida'] ?></td>
                          <td><?php echo $hidrante['caudal'] ?></td>
                          <?php if($this->session->tipo == 0 || $this->session->tipo == 2){ ?>
                            <td><a href="<?php echo base_url(); ?>hidrantes/update?id=<?php echo $hidrante['id'] ?>" class="modificar">Modificar</a></td>
                            <td><a href="<?php echo base_url(); ?>hidrantes/delete?id=<?php echo $hidrante['id'] ?>" class="eliminar">Eliminar</a></td>
                          <?php } ?>
                        </tr>
                <?php endforeach; ?>
              </table>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- END section -->