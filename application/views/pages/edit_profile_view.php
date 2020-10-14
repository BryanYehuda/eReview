<?php if($this->session->userdata('logged_in')): ?>
  <?php $user_id = $this->session->userdata('user_id'); ?>
<section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                    <div class="about-img w-100">
                      <img src="<?php echo base_url();?>uploads/Profile/<?php echo $user_id;?>" class="img-fluid rounded mx-auto d-block" alt="">
                    </div>
                  <div class="col-sm-6 col-md-7">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="about-me pt-4 pt-md-0">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      About me
                    </h5>
                  </div>

                  <p class="bg-success">
                  <?php if($this->session->flashdata('profile_updated')): ?>
                  <?php echo $this->session->flashdata('profile_updated'); ?>
                  <?php endif; ?>
                  </p>

                  <div class="about-info">
                      <p><span class="title-s">Name: </span> <span><?php  echo $profile->nama; ?></span></p>
                      <p><span class="title-s">Username: </span> <span><?php  echo $profile->username; ?></span></p>
                      <p><span class="title-s">Role: </span> <span><?php foreach ($roles as $role) {echo ucwords($role['nama_grup'] ." ");} ?>
                      </span></p>
                      <p><span class="title-s">Email: </span> <span><?php  echo $profile->email; ?></span></p>
                    </div>
                    <a class="btn btn-primary" href="<?php echo base_url();?>users/edit_profile/<?php echo $user_id ?>">Edit Profile</a>
                    <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>