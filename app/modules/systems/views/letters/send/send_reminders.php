

          <!-- page header -->
          <div class="pageheader">
            <h2><i class="fa fa-paper-plane"></i> Send E-Bills
            <span></span></h2>

            <div class="breadcrumbs">
              <ol class="breadcrumb">
                <li>You are here</li>
                <li><a href="../home.php">Home</a></li>
                <li class="active">Send Bills</li>
              </ol>
            </div>
          </div>
          <!-- /page header -->


          <!-- content main container -->
          <div class="main">
              <div class="row">
                  <div class="col-md-12">
                      <?php if($user_data==0){ ?>
                      <section class="tile color transparent-black">
                          <!-- tile header -->
                          <div class="tile-header">
                              <h1><strong>Send</strong> E-Reminders</h1>
                              <div class="pull-right">

                                 <!-- <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                                  <a href="#" class="remove"><i class="fa fa-times"></i></a>-->
                              </div>
                          </div>
                          <!-- /tile header -->
                          <!-- tile body -->
                          <div class="tile-body">
                              <form id="eReminder_form" class="form-vertical" role="form">
                                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                  <div class="row">
                                      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                      <div class="form-group col-sm-3">
                                          <label for="template">Template</label>
                                          <select name="template" id="template" class="select2 form-control" style="\&quot;max-width:200px;\&quot;">
                                              <option value="">(---)</option>
                                              <?php foreach ($templates as $template) { ?>
                                                  <option
                                                      value="<?php echo $template->id ?>"><?php echo $template->title ?></option>
                                              <?php } ?>
                                          </select>
                                          <span class="error-block"></span>
                                      </div>
                                      <div class="form-group col-sm-3">
                                          <div id="submit-button" class="tile-footer rounded-bottom-corners text-right">
                                              <a class="btn btn-primary btn-lg margin-bottom-20 pull-right" href="javascript:"  onclick="send_eReminders();"><i class="fa fa-paper-plane-o"></i> Start <strong>Send</strong> eReminders</a>
                                          </div>
                                      </div>
                                  </div>
                              </form>
                          </div>
                          <!-- /tile body -->
                      </section>
                      <?php } else { ?>
                          <section class="tile color transparent-black">
                              <!-- tile header -->
                              <div class="tile-header">
                                  <h1><strong>Send</strong> E-Reminders</h1>
                                  <div class="pull-right">
                                      <!-- <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                                       <a href="#" class="remove"><i class="fa fa-times"></i></a>-->
                                  </div>
                              </div>
                              <!-- /tile header -->
                              <!-- tile body -->
                              <div class="tile-body">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <h2>eReminder Dispatch Process is Running</h2><h3>you have to wait finish this process to start another run</h3>
                                      </div>
                                  </div>
                              </div>
                              <!-- /tile body -->
                          </section>
                      <?php } ?>
                  </div>
              </div>

          </div>
          <!-- /content container -->

          <script>
              function send_eReminders()
              {
                  bootbox.dialog({
                      message: "Are you sure you want to start this dispatch run?",
                      title: "Alert!",
                      buttons: {
                          success: {
                              label: "Yes",
                              className: "btn-primary",
                              callback: function() {
                                  var url = "<?php echo site_url('admin/send_reminders_fg'); ?>";
                                  $.ajax({
                                      url: url,
                                      data: $("#eReminder_form").serialize(),
                                      type: "POST",
                                      dataType: "JSON",
                                      cache: false,
                                      success: function(data){
                                          bootbox.alert(data.message);
                                          if(data.status)
                                          {
                                              window.location = '<?php echo site_url('admin/send_process'); ?>';
                                          }
                                      },
                                      error: function(jqXHR, textStatus, errorThrown ){
                                          bootbox.alert(textStatus + " : " + errorThrown);
                                          /*console.log(jqXHR);
                                          console.log(textStatus);
                                          console.log(errorThrown);*/
                                      }
                                  });
                              }
                          },
                          danger: {
                              label: "Cancel",
                              className: "btn-danger"
                          }
                      }
                  });

              }
          </script>