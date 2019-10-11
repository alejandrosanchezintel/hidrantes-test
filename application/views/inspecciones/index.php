<?php 
  $this->load->helper('url'); 
  $this->load->library('session');
?>
<section class="pb_cover_v3 overflow-hidden cover-bg-indigo cover-bg-opacity text-left pb_gradient_v1 pb_slant-light" id="section-home">
    <div class="map_container">
      
      <div id="map"></div>
      <div id="wrapper">
        <div id="backbutton" class="mb-4"><a class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue">Volver</a></div>
        <div id="location" class="mb-4"></div>
        <div id="scale" class="mb-4"></div>
      </div>
    </div>
      <div class="container lista_usuarios">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12 relative align-self-center">
            <div class="box_container">
              <h2 class="mb-4 mt-0 text-center">Lista de Inspecciones</h2>
              <table class="table">
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Bombero</th>
                  <th scope="col">Hidrante</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Accion</th>
                  <th scope="col">Fecha de Solicitud</th>
                  <th scope="col">Fecha de Finalizacion</th>
                </tr>

                <?php foreach ($inspecciones as $inspeccion): ?>
                        <tr>
                          <td><?php echo $inspeccion['id'] ?></td>
                          <td><?php echo $inspeccion['bombero_nombre'] ?></td>
                          <td><?php echo $inspeccion['hidrante_nombre'] ?></td>
                          <td><?php echo $inspeccion['completo'] ?></td>
                          <td><?php 
                            switch($inspeccion['accion']){
                              case 0 : echo 'Sin revisar'; break;
                              case 1 : echo 'Instalacion'; break;
                              case 2 : echo 'Mantenimiento'; break;
                              case 3 : echo 'Ninguna'; break;
                            }
                          ?></td>
                          <td><?php echo $inspeccion['fecha_solicitud'] ?></td>
                          <td><?php echo $inspeccion['fecha_finalizacion'] ?></td>

                          <?php if($this->session->tipo == 0 || $this->session->tipo == 1){ ?>
                          <td>
                            <?php
                              if($inspeccion['completo'] == "Completada"){
                                echo 'Procesada';
                              }
                              else{
                                ?>
                                <a href="<?php echo base_url(); ?>inspecciones/update?id=<?php echo $inspeccion['id'] ?>" class="modificar">Modificar</a>
                                <?php
                              }
                            ?>
                          </td>
                          <!--<td><a href="<?php echo base_url(); ?>inspecciones/delete?id=<?php echo $inspeccion['id'] ?>" class="eliminar">Eliminar</a></td>-->
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