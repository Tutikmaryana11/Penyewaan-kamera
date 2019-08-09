<?php include_once 'template/menu/menu_user.php';
// include_once 'database/connection.php';

$a = mysql_query("SELECT * from user where user_id='$_SESSION[user_id]'");
$data = mysql_fetch_array($a);

?>

<!-- Content Wrapper. Contains page content -->
<div id="page-wrapper">
  <!-- Content Header (Page header) -->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><i class="fa fa-user">&nbsp;</i>Profile</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <hr>
              <strong><i class="fa fa-file-text-o mr-1"></i> Notes</strong>

              <p class="text-muted"><?php echo $data['user_info']?></p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item active"><a class="nav-link " href="#settings" data-toggle="tab">Settings</a></li>
              </ul>
            </div><!-- /.card-header -->
            <hr>

            <div class="card-body">
              <div class="tab-content">

                <div class="tab-pane active" id="settings">
                  <form class="form-horizontal" action="index.php?view=profile_edit_process_user" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
                    <input type="hidden" name="password3" value="<?php echo $data['user_password'];?>">

                    <div class="form-group">
                      <!-- <label for="inputName" class="col-sm-2 control-label">Name</label> -->

                      <div class="col-sm-10">
                        <input type="text" readonly="" name="username" class="form-control" id="inputName" placeholder="Input Username" value="<?php echo $data['user_username']?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <!-- <label for="inputSkills" class="col-sm-2 control-label">Skills</label> -->

                      <div class="col-sm-10">
                        <textarea type="text" name="keterangan" class="form-control" id="inputSkills" placeholder="Additional Info"><?php echo $data['user_info']?></textarea>
                      </div>
                    </div>
                    *Change your password here.
                    <div class="form-group">
                      <!-- <label for="inputEmail" class="col-sm-2 control-label">Email</label> -->

                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="inputEmail" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <!-- <label for="inputName2" class="col-sm-2 control-label">Name</label> -->

                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="password2" id="inputName2" placeholder="Re-Type Password">
                      </div>
                    </div>


                    <div class="form-group" align="left">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>