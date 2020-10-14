<section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row">
              <div class="col-md-12">
                <div class="about-me pt-4 pt-md-0">
                  <div class="title-box-2">
                  <div class="title-box text-center">
                    <h5 class="title-a">
                      Your Funds
                    </h5>
                    <p class="subtitle-a">
                        You can only transfer funds with the same or lower value that your avalailable funds
                    </p>
                    <div class="line-mf"></div>
                  </div>
                  </div>

                  <p class="bg-success">
                  <?php if($this->session->flashdata('funds_deducted')): ?>
                  <?php echo $this->session->flashdata('funds_deducted'); ?>
                  <?php endif; ?>
                  </p>
                  
                  <div class="about-info text-center">
                      <p><span class="title-s">Available Funds: </span> <span><?php  echo $funds->funds; ?></span></p>
                      <a class="btn btn-primary" href="<?php echo base_url()?>reviewer/deduct_funds/<?php echo $user_id ?>" role="button">Deduct Funds</a>
                  </div>
                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>