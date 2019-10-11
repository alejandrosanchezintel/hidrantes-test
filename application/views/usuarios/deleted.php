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
      <div class="container login">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <h2 class="heading mb-12">Usuario Eliminado</h2>
            <div class="sub-heading">
              <p class="mb-12">El usuario se ha eliminado satisfactoriamente.</p>
              <p class="mb-12">
                <a class="btn btn-success btn-lg pb_btn-pill smoothscroll" href="<?php echo base_url(); ?>usuarios">
                  <span class="pb_font-14 text-uppercase pb_letter-spacing-1">Volver</span>
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>