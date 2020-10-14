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
                      Register Form
                    </h5>
                    <p class="subtitle-a">
                        One last step to enjoy a freedom of knowledge
                    </p>
                    <div class="line-mf"></div>
                  </div>
                  <?php echo validation_errors("<p class='bg-danger'>"); ?>
                  <div class="d-flex justify-content-md-center">
                            <?php $attributes = array('id'=>'register_form', 'class'=> 'form_horizontal'); ?>
                            <?php echo form_open('users/register', $attributes);?>

                            <div class="form-group">
                                <?php echo form_label('Name'); ?>
                                <?php $data = array(
                                    'class' => 'form-control',
                                    'name' => 'nama',
                                    'placeholder' => 'Name',
                                    'value' => set_value('nama')
                                    );?>
                                <?php echo form_input($data); ?>
                            </div>

                            <div class="form-group">	
                            <?php echo form_label('Email'); ?>
                            <?php
                            $data = array(
                                'class' => 'form-control',
                                'name' => 'email',
                                'placeholder' => 'Enter Your Email',
                                'value' => set_value('email')
                                );
                            ?>
                            <?php echo form_input($data); ?>
                            </div>

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

                            <div class="form-group">	
                            <?php echo form_label('Pick Your Role'); ?>
                            <?php
                            $options = array(
                                    '1'         => 'Editor',
                                    '2'         => 'Reviewer'
                                );
                            ?>
                            <?php echo form_dropdown('peran', $options); ?>
                            </div>

                            <div class="form-group text-center">
                            <?php
                            $data = array(
                                'class' => 'btn btn-primary',
                                'name' => 'submit',
                                'value' => 'Register'
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