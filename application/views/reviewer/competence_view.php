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
                      Competence
                    </h5>
                    <p class="subtitle-a">
                        Your competence will determined what fields of science you have mastered
                    </p>
                    <div class="line-mf"></div>
                  </div>
                  </div>

                  <p class="bg-success">
                  <?php if($this->session->flashdata('competence_updated')): ?>
                  <?php echo $this->session->flashdata('competence_updated'); ?>
                  <?php endif; ?>
                  </p>
                  
                  <div class="about-info text-center">
                      <p><span class="title-s">Competence: </span> <span><?php  echo $competence->kompetensi; ?></span></p>
                      <a class="btn btn-primary" href="<?php echo base_url();?>users/edit_competence/<?php echo $user_id ?>">Edit Competence</a>
                  </div>
                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>