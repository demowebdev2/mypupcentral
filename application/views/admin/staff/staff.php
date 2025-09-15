<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Staff</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Staff</li>
          </ol>

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                Staff List
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php if ($this->rbac->hasPrivilege('staff', 'can_add')) { ?>
                <a href="<?= base_url() ?>admin/Staff/create">
                  <button type="button" class="btn btn-outline-primary">Add Staff</button>
                </a>
              <?php } ?>
              <br><br>
              <table class="table table-striped table-bordered table-hover dtexample">
                <thead>
                  <tr>
                    <th>Sl.no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Status</th>


                    <th class="no-print">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($resultlist))  { 
                  ?>

                    <?php
                  } else {
                    $count = 0;
                    foreach ($resultlist as $data) { $count++;
                    ?>
                      <tr>
                        <td class="mailbox-name">
                          <?php echo $count; ?>
                        </td>
                        <td class="mailbox-name"> <?php echo $data['name'] ?></td>
                        <td class="mailbox-name">
                          <?php echo $data['email'] ?>
                        </td>
                        <td class="mailbox-name">
                          <?php echo $data['contact_no'] ?>
                        </td>
                        <td class="mailbox-name">
                          <?php echo $data['gender'] ?>
                        </td>
                        <td class="mailbox-name">
                          <?php echo $data['user_type'] ?>
                        </td>
                        <td class="mailbox-name">
                          <?php if ($data['is_active'] == 1) {
                            echo '<p class="text-success">Active</p>';
                          } else {
                            echo '<p class="text-danger">Not Active</p>';
                          }  ?>
                        </td>


                        <td class="mailbox-date pull-right no-print">
                          <?php if ($this->rbac->hasPrivilege('staff', 'can_edit')  && $data['role_id']!=7) {
                          ?>
                            <a href="<?php echo base_url() . "admin/Staff/edit/" . $data['id'] ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="Edit">
                              <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?php echo base_url() . "admin/Staff/change_pswd/" . $data['id'] ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="Change Password">
                              <i class="fas fa-key"></i>
                            </a>
                            <?php  } ?>

                            <?php if ($this->rbac->hasPrivilege('staff', 'can_delete') && $data['role_id']!=7) {
                          ?>
                            <a class="btn btn-default btn-xs"  data-toggle="tooltip" title="Delete" onclick="delete_recordById('<?php echo site_url('admin/Staff/delete/' . $data['id']); ?>', 'Delete')">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                            </a> <?php  } ?>
                        </td>
                      </tr>
                  <?php
                    }
                    $count++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

    </div>
  </section>

</div>

<script>
    function delete_recordById(url, Msg) {
                if (confirm('Delete Confirm?')) {
                    $.ajax({
                        url: url,
                        success: function (res) {
                            toastr.success('Deleted')
                            window.location.reload(true);
                        }
                    })
                }
            }
</script>