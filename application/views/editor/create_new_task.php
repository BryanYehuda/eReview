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
                      Create a new task
                    </h5>
                    <div class="line-mf"></div>
                  </div>
                  <?php echo validation_errors("<p class='bg-danger'>"); ?>
                  <div class="d-flex justify-content-md-center">
                            <?php $attributes = array('id'=>'create_new_task', 'class'=> 'form_horizontal'); ?>
                            <?php echo form_open_multipart('editor/create/' . $profile_data->id . " ", $attributes);?>

                            <div class="form-group">
                                <?php echo form_label('Title'); ?>
                                <?php $data = array(
                                    'class' => 'form-control',
                                    'name' => 'judul',
                                    'placeholder' => 'Enter Title',
                                    'value' => set_value('judul')
                                    );?>
                                <?php echo form_input($data); ?>
                            </div>

                            <div class="form-group">	
                            <?php echo form_label('Authors'); ?>
                            <?php
                            $data = array(
                                'class' => 'form-control',
                                'name' => 'authors',
                                'placeholder' => 'Enter Authors',
                                'value' => set_value('authors')
                                );
                            ?>
                            <?php echo form_input($data); ?>
                            </div>

                            <div class="form-group">	
                            <?php echo form_label('Keywords'); ?>
                            <?php
                            $data = array(
                                'class' => 'form-control',
                                'name' => 'keywords',
                                'placeholder' => 'Enter Keywords',
                                'value' => set_value('keywords')
                                );
                            ?>
                            <?php echo form_textarea($data); ?>
                            </div>

                            <div class="form-group">
                            <?php echo form_label('Paper File'); ?><br>
                            <?php echo $error;?>
                            <input type="file" name="userfile" size="20" />
                            </div>

                            <div class="form-group">
                            <label>Assign to a reviewer</label>
                            <select class="form-control" name="reviewer" id="reviewer" required>
                                <option value="">Nothing Selected</option>
                                <?php foreach($reviewer as $reviewers):?>
                                <option value="<?php echo $reviewers->id_reviewer;?>"><?php echo $reviewers->nama;?></option>
                                <?php endforeach;?>
                            </select>
                          </div>

                          <div class="form-group">
                          <?php echo form_label('Due Date'); ?><br>
                            <?php
                            $data = array(
                              'class' => 'form-control',
                                'name' => 'tgl_deadline',
                                'type' => 'date'
                              );
                            ?>
                            <?php echo form_input($data); ?>
                            </div>

                            <div class="form-group text-center">
                            <?php
                            $data = array(
                                'class' => 'btn btn-primary',
                                'name' => 'submit',
                                'value' => 'Create'
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