<section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row">
              <div class="col-md-12">
                <div class="about-me pt-4 pt-md-0">
                <div class="title-box text-center">
                    <h5 class="title-a">
                      Login Form
                    </h5>
                    <p class="subtitle-a">
                        We are glad to see you back
                    </p>
                    <div class="line-mf"></div>
                  </div>

                  <p class="bg-success">
                  <?php if($this->session->flashdata('login_success')): ?>
                  <?php echo $this->session->flashdata('login_success'); ?>
                  <?php endif; ?>

                  <?php if($this->session->flashdata('user_registered')): ?>
                  <?php echo $this->session->flashdata('user_registered'); ?>
                  <?php endif; ?>
                  </p>

                  <?php echo validation_errors("<p class='bg-danger'>"); ?>

                  <p class="bg-danger">
                  <?php if($this->session->flashdata('login_failed')): ?>
                  <?php echo $this->session->flashdata('login_failed'); ?>
                  <?php endif; ?>
                  </p>

                  <div class="d-flex justify-content-md-center">
                            <?php $attributes = array('id'=>'register_form', 'class'=> 'form_horizontal'); ?>
                            <?php echo form_open('users/login', $attributes);?>

                            <div class="form-group">	
                            <?php echo form_label('Username'); ?>
                            <?php
                            $data = array(
                                'class' => 'form-control',
                                'name' => 'username',
                                'placeholder' => 'Enter Username',
                                'value' => set_value('username')
                                );
                            ?>

                            <?php echo form_input($data); ?>
                            </div>

                            <div class="form-group">
                            <?php echo form_label('Password'); ?>
                            <?php
                            $data = array(
                                'class' => 'form-control',
                                'name' => 'password',
                                'placeholder' => 'Enter Password'
                                );
                            ?>
                            <?php echo form_password($data); ?>
                            </div>

                            <div class="form-group">	
                            <?php echo form_label('Confirm Password'); ?>
                            <?php
                            $data = array(
                                'class' => 'form-control',
                                'name' => 'confirm_password',
                                'placeholder' => 'Confirm Password'
                                );
                            ?>
                            <?php echo form_password($data); ?>
                            </div>

                            <div class="form-group text-center">
                            <?php
                            $data = array(
                                'class' => 'btn btn-primary',
                                'name' => 'submit',
                                'value' => 'Login'
                                );
                            ?>
                            <?php echo form_submit($data); ?>
                            </div>

                            <?php echo form_close();?>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>