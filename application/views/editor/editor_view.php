<section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <div class="about-img">
                      <img src="<?php echo base_url();?>assets/img/ereviewlogo.png" class="img-fluid rounded b-shadow-a w-100" alt="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="about-me pt-4 pt-md-0">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      Editor View
                    </h5>
                  </div>
                  <p class="lead">
                    Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat, accumsan id
                    imperdiet et, porttitor
                    at sem. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla
                    porttitor accumsan tincidunt.
                  </p>
                  <p class="lead">
                    Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus suscipit tortor eget felis
                    porttitor volutpat. Vestibulum
                    ac diam sit amet quam vehicula elementum sed sit amet dui. porttitor at sem.
                  </p>
                  <p class="lead">
                    Nulla porttitor accumsan tincidunt. Quisque velit nisi, pretium ut lacinia in, elementum id enim.
                    Nulla porttitor accumsan
                    tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-sm-12 text-center">
                <a class="btn btn-primary btn-lg" href="<?php echo base_url();?>editor/create/<?php echo $user_id ?>" role="button">Create a new task</a>
            </div>
            <br>
            <br>
            <div class="col-sm-12 text-center">
              <p class="bg-success">
                  <?php if($this->session->flashdata('task_created')): ?>
                  <?php echo $this->session->flashdata('task_created'); ?>
                  <?php endif; ?>
              </p>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>




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
                      Task Pending Payment
                    </h5>
                    <p class="subtitle-a">
                        Task in this list are task that need to be paid before assigned
                    </p>
                    <div class="line-mf"></div>
                  </div>
                  </div>

          <div class="col-sm-12 text-center">
              <p class="bg-success">
                  <?php if($this->session->flashdata('task_paid')): ?>
                  <?php echo $this->session->flashdata('task_paid'); ?>
                  <?php endif; ?>
              </p>
          </div>

            <div class="row">
            <table class="table table-hover table-primary">
              <thead>
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Authors</th>
                  <th scope="col">Keywords</th>
                  <th scope="col">Your File</th>
                  <th scope="col">Nama Reviewer</th>
                  <th scope="col">Assign Date</th>
                  <th scope="col">Due Date</th>
                  <th scope="col">Commit Payment</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <?php if($task_pending_payment): ?>
                  <?php foreach($task_pending_payment as $task): ?>
                    <tr>
                        <td><?php echo $task->judul; ?></td>
                        <td><?php echo $task->authors; ?></td>
                        <td><?php echo $task->keywords; ?></td>
                        <td><a href="<?php echo base_url();?>users/download/<?php echo $task->file_loc;?>.pdf">Click to download</a></td>
                        <td><?php echo $task->nama_reviewer; ?></td>
                        <td><?php echo $task->tgl_assign; ?></td>
                        <td><?php echo $task->tgl_deadline; ?></td>
                        <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>editor/pay/<?php echo $task->id_task ?>" role="button">Commit Payment</a></td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                        <td>You have no tasks here</td>
                </tr>
                <?php endif; ?>
                </tr>
              </tbody>
            </table>
        </div>
                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




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
                      Task Pending Confirm Pay
                    </h5>
                    <p class="subtitle-a">
                        Task in this list are task already paid and is waiting for admin confirmation
                    </p>
                    <div class="line-mf"></div>
                  </div>
                  </div>
                  
                  <div class="row">
            <table class="table table-hover table-primary">
              <thead>
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Authors</th>
                  <th scope="col">Keywords</th>
                  <th scope="col">Your File</th>
                  <th scope="col">Nama Reviewer</th>
                  <th scope="col">Assign Date</th>
                  <th scope="col">Due Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <?php if($task_pending_confirm_pay): ?>
                  <?php foreach($task_pending_confirm_pay as $task): ?>
                    <tr>
                        <td><?php echo $task->judul; ?></td>
                        <td><?php echo $task->authors; ?></td>
                        <td><?php echo $task->keywords; ?></td>
                        <td><a href="<?php echo base_url();?>users/download/<?php echo $task->file_loc;?>.pdf">Click to download</a></td>
                        <td><?php echo $task->nama_reviewer; ?></td>
                        <td><?php echo $task->tgl_assign; ?></td>
                        <td><?php echo $task->tgl_deadline; ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                        <td>You have no tasks here</td>
                </tr>
                <?php endif; ?>
                </tr>
              </tbody>
            </table>
        </div>
                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>





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
                      Task Pending Acceptance
                    </h5>
                    <p class="subtitle-a">
                        Task in this list are task already paid and is waiting for reviewer acceptance
                    </p>
                    <div class="line-mf"></div>
                  </div>
                  </div>
                  
                  <div class="row">
            <table class="table table-hover table-primary">
              <thead>
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Authors</th>
                  <th scope="col">Keywords</th>
                  <th scope="col">Your File</th>
                  <th scope="col">Nama Reviewer</th>
                  <th scope="col">Assign Date</th>
                  <th scope="col">Due Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <?php if($task_pending_acceptance): ?>
                  <?php foreach($task_pending_acceptance as $task): ?>
                    <tr>
                        <td><?php echo $task->judul; ?></td>
                        <td><?php echo $task->authors; ?></td>
                        <td><?php echo $task->keywords; ?></td>
                        <td><a href="<?php echo base_url();?>users/download/<?php echo $task->file_loc;?>.pdf">Click to download</a></td>
                        <td><?php echo $task->nama_reviewer; ?></td>
                        <td><?php echo $task->tgl_assign; ?></td>
                        <td><?php echo $task->tgl_deadline; ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                        <td>You have no tasks here</td>
                </tr>
                <?php endif; ?>
                </tr>
              </tbody>
            </table>
        </div>
                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>





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
                      Task Assigned
                    </h5>
                    <p class="subtitle-a">
                        Task in this list are task are assigned to a reviewer and are still in progress
                    </p>
                    <div class="line-mf"></div>
                  </div>
                  </div>
                  
                  <div class="row">
            <table class="table table-hover table-primary">
              <thead>
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Authors</th>
                  <th scope="col">Keywords</th>
                  <th scope="col">Your File</th>
                  <th scope="col">Nama Reviewer</th>
                  <th scope="col">Assign Date</th>
                  <th scope="col">Due Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <?php if($task_assigned): ?>
                  <?php foreach($task_assigned as $task): ?>
                    <tr>
                        <td><?php echo $task->judul; ?></td>
                        <td><?php echo $task->authors; ?></td>
                        <td><?php echo $task->keywords; ?></td>
                        <td><a href="<?php echo base_url();?>users/download/<?php echo $task->file_loc;?>.pdf">Click to download</a></td>
                        <td><?php echo $task->nama_reviewer; ?></td>
                        <td><?php echo $task->tgl_assign; ?></td>
                        <td><?php echo $task->tgl_deadline; ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                        <td>You have no tasks here</td>
                </tr>
                <?php endif; ?>
                </tr>
              </tbody>
            </table>
        </div>
                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>





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
                      Task Rejected
                    </h5>
                    <p class="subtitle-a">
                        Task in this list are task that are rejected by the reviewer, you can create a new one and upload the same proof of payment
                    </p>
                    <div class="line-mf"></div>
                  </div>
                  </div>
                  
                  <div class="row">
            <table class="table table-hover table-primary">
              <thead>
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Authors</th>
                  <th scope="col">Keywords</th>
                  <th scope="col">Your File</th>
                  <th scope="col">Nama Reviewer</th>
                  <th scope="col">Assign Date</th>
                  <th scope="col">Due Date</th>
                  <th scope="col">Create New</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <?php if($task_rejected): ?>
                  <?php foreach($task_rejected as $task): ?>
                    <tr>
                        <td><?php echo $task->judul; ?></td>
                        <td><?php echo $task->authors; ?></td>
                        <td><?php echo $task->keywords; ?></td>
                        <td><a href="<?php echo base_url();?>users/download/<?php echo $task->file_loc;?>.pdf">Click to download</a></td>
                        <td><?php echo $task->nama_reviewer; ?></td>
                        <td><?php echo $task->tgl_assign; ?></td>
                        <td><?php echo $task->tgl_deadline; ?></td>
                        <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>editor/create/<?php echo $user_id ?>" role="button">Create a new task</a></td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                        <td>You have no tasks here</td>
                </tr>
                <?php endif; ?>
                </tr>
              </tbody>
            </table>
        </div>
                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>





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
                      Task Confirm Finished
                    </h5>
                    <p class="subtitle-a">
                        Task in this list are task that are finished and is waiting for your confirmation
                    </p>
                    <div class="line-mf"></div>
                  </div>
                  </div>

                  <div class="col-sm-12 text-center">
              <p class="bg-success">
                  <?php if($this->session->flashdata('task_finished')): ?>
                  <?php echo $this->session->flashdata('task_finished'); ?>
                  <?php endif; ?>
              </p>
          </div>
                  
                  <div class="row">
            <table class="table table-hover table-primary">
              <thead>
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Authors</th>
                  <th scope="col">Keywords</th>
                  <th scope="col">Finished File</th>
                  <th scope="col">Nama Reviewer</th>
                  <th scope="col">Assign Date</th>
                  <th scope="col">Due Date</th>
                  <th scope="col">Confirm</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <?php if($task_confirm_finished): ?>
                  <?php foreach($task_confirm_finished as $task): ?>
                    <tr>
                        <td><?php echo $task->judul; ?></td>
                        <td><?php echo $task->authors; ?></td>
                        <td><?php echo $task->keywords; ?></td>
                        <td><a href="<?php echo base_url();?>users/download/<?php echo $task->file_loc;?>.pdf">Click to download</a></td>
                        <td><?php echo $task->nama_reviewer; ?></td>
                        <td><?php echo $task->tgl_assign; ?></td>
                        <td><?php echo $task->tgl_deadline; ?></td>
                        <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>editor/confirm_finished/<?php echo $task->id_task;?>">Mark Complete</a></td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                        <td>You have no tasks here</td>
                </tr>
                <?php endif; ?>
                </tr>
              </tbody>
            </table>
        </div>
                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>





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
                      Task Finished
                    </h5>
                    <p class="subtitle-a">
                        Task in this list are task that is finished
                    </p>
                    <div class="line-mf"></div>
                  </div>
                  </div>
                  
                  <div class="row">
            <table class="table table-hover table-primary">
              <thead>
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Authors</th>
                  <th scope="col">Keywords</th>
                  <th scope="col">Finished File</th>
                  <th scope="col">Nama Reviewer</th>
                  <th scope="col">Assign Date</th>
                  <th scope="col">Due Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <?php if($task_finished): ?>
                  <?php foreach($task_finished as $task): ?>
                    <tr>
                        <td><?php echo $task->judul; ?></td>
                        <td><?php echo $task->authors; ?></td>
                        <td><?php echo $task->keywords; ?></td>
                        <td><a href="<?php echo base_url();?>users/download/<?php echo $task->file_loc;?>.pdf">Click to download</a></td>
                        <td><?php echo $task->nama_reviewer; ?></td>
                        <td><?php echo $task->tgl_assign; ?></td>
                        <td><?php echo $task->tgl_deadline; ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                        <td>You have no tasks here</td>
                </tr>
                <?php endif; ?>
                </tr>
              </tbody>
            </table>
        </div>
                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>