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
              <h2 class="mb-4 mt-0 text-center">Lista de Solicitudes</h2>
              
              
              <table class="table">
                <tr>
                  <th scope="col">Hidrante</th>
                  <th scope="col">Accion</th>
                  <th scope="col">Proceso</th>
                  <th scope="col">Estado</th>
                </tr>
                <?php foreach ($solicitudes as $solicitud): ?>
                <tr>
                  <td><?php echo $solicitud['hidrante_nombre'] ?></td>
                 
                  <td>
                    <?php 
                    switch($solicitud['accion']){
                      case 0 : echo 'Pendiente'; break;
                      case 1 : echo 'Instalacion'; break;
                      case 2 : echo 'Mantenimiento'; break;
                      case 3 : echo 'Ninguna'; break;
                    }
                  ?>
                  </td>
               
                  <td>
                    <?php 
                      if($solicitud['estado']== 0){
                        echo 'Pendiente';
                      }else{
                        echo 'Procesada';
                      }
                    ?>
                  </td>
                  <td>
                  <?php 
                      if($solicitud['estado']== 0){ ?>
                        <a href="<?php echo base_url(); ?>solicitudes/update?id=<?php echo $solicitud['id'] ?>" class="modificar">Modificar</a>
                      <?php
                      }else{
                        echo 'Completado';
                      }
                    ?> 

                  </td>       
                <?php endforeach; ?>
              </table>
            </div>
          </div>
        </div>
      </div>

</section>
<!-- END section -->