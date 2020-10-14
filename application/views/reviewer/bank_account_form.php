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
                      Edit Bank Account
                    </h5>
                    <div class="line-mf"></div>
                  </div>
                  </div>
                  <?php echo validation_errors("<p class='bg-danger'>"); ?>
                  <div class="d-flex justify-content-md-center">
                            <?php $attributes = array('id'=>'register_form', 'class'=> 'form_horizontal'); ?>
                            <?php echo form_open_multipart('users/edit_bank/' . $profile_data->id . '', $attributes);?>

                            <div class="form-group">
                                <?php echo form_label('Bank Account'); ?>
                                <?php
                                $data = array(
                                    'class' => 'form-control',
                                    'name' => 'no_rek',
                                    'value' => $bank_account->no_rek
                                    );
                                ?>
                                <?php echo form_input($data); ?>
                                </div>

                                <div class="form-group">
                                <?php
                                $data = array(
                                    'class' => 'btn btn-primary',
                                    'name' => 'submit',
                                    'value' => 'Update'
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