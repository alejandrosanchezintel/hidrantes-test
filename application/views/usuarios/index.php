<?php $this->load->helper('url'); ?>
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
              <h2 class="mb-4 mt-0 text-center">Lista de Usuarios</h2>
              <table class="table">
                <tr>
                  <th scope="col">Cedula</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Primer Apellido</th>
                  <th scope="col">Segundo Apellido</th>
                  <th scope="col">Telefono</th>
                </tr>
                <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                          <td><?php echo $usuario['cedula'] ?></td>
                          <td><?php echo $usuario['nombre'] ?></td>
                          <td><?php echo $usuario['apellido_1'] ?></td>
                          <td><?php echo $usuario['apellido_2'] ?></td>
                          <td><?php echo $usuario['telefono'] ?></td>
                          <td><a href="<?php echo base_url(); ?>usuarios/update?cedula=<?php echo $usuario['cedula'] ?>" class="modificar">Modificar</a></td>
                          <td><a href="<?php echo base_url(); ?>usuarios/delete?cedula=<?php echo $usuario['cedula'] ?>" class="eliminar">Eliminar</a></td>
                        </tr>
                <?php endforeach; ?>
              </table>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- END section -->