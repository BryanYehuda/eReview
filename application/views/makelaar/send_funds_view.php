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
                      Send Funds
                    </h5>
                    <div class="line-mf"></div>
                  </div>
                  <?php echo validation_errors("<p class='bg-danger'>"); ?>
                  <div class="d-flex justify-content-md-center">
                            <?php $attributes = array('id'=>'create_new_task', 'class'=> 'form_horizontal'); ?>
                            <?php echo form_open_multipart('makelaar/send_funds/' . $id_reviewer . " ", $attributes);?>

                            <div class="form-group">
                                <?php echo form_label('Amount'); ?>
                                <?php $data = array(
                                    'class' => 'form-control',
                                    'name' => 'amount',
                                    'placeholder' => 'Enter Amount',
                                    'value' => set_value('amount')
                                    );?>
                                <?php echo form_input($data); ?>
                            </div>

                            <div class="form-group">
                            <label>Select a reviewer</label>
                            <select class="form-control" name="reviewer" id="reviewer" required>
                                <option value="">Nothing Selected</option>
                                <?php foreach($reviewer as $reviewers):?>
                                <option value="<?php echo $reviewers->id_reviewer;?>"><?php echo $reviewers->nama;?></option>
                                <?php endforeach;?>
                            </select>
                          </div>

                            <div class="form-group text-center">
                            <?php
                            $data = array(
                                'class' => 'btn btn-primary',
                                'name' => 'submit',
                                'value' => 'Send Funds'
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