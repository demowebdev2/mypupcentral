

	<div class="content-wrapper">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                
                <h1 class="m-0 text-dark">Shopping List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Dashboard')?>">Home</a></li>
                    <li class="breadcrumb-item active">Shopping List</li>
                </ol>

               

            </div><!-- /.col -->


        </div><!-- /.row -->
        <div class="row">
        <div class="col-sm-6 ">
           
        </div>
        </div>

    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                          Shopping List
                        </h3>
                          <a href="<?=base_url()?>admin/shopping/add" class="btn btn-success float-sm-right"><i class="fas fa-plus" style="color: white"></i> Create New</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body"><br>
                            <br>
                    <div class="table-responsive">
                       <table class="table table-striped table-bordered table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>                                      
                                        <th>Title</th>
                                        <th>Photo</th>
                                        <th>Description</th>
                                        <th>Note</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                <?php foreach($list as $key=>$row) { ?>
                                <tr>
                                <td><?=$key+1?></td>
                                <td><?=$row->title?></td>
                                <td><img src="<?=base_url()?>uploads/shopping/<?=$row->photo?>" style="height:100px; width:auto"> </td>
                                <td><?=$row->description?></td>
                                <td><?=$row->note?></td>
                                <td><a href="<?=$row->link?>" target="_blank">Click Here</td>
                                <td>
                                 <a href="<?=base_url()?>admin/shopping/edit/<?=$row->id?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="javascript:void(0)" id="<?=$row->id?>" class="btn  btn-sm btn-danger delete_blog">Delete</a>
                                </td>
                                </tr>
                                
                                <?php } ?>
                                </tbody>
                            </table>
                    </div>
                        

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
    $(document).ready(function() {

        var token = "<?= $this->security->get_csrf_hash(); ?>";
        var dataTable = $('#datatable').DataTable();
   
    });
  



$(document).on('click', '.delete_blog', function() {
    var token = "<?= $this->security->get_csrf_hash(); ?>";
    var id=$(this).attr("id");
    $.confirm({
    title: 'Delete!',
    content: 'Are you sure to continue!?',
    buttons: {
        confirm: {
            btnClass: 'btn-red',
            action: function(){
                $.ajax({
                type: "POST",
                url: "<?=base_url()?>admin/shopping/delete",
                data: {id:id,csrf_test_name:token},
                dataType: "json",
                success: function (response) {
                    if(response.status=='success')
                    {
                        $.alert('Deleted');
                       location.reload(true);
                    }
                    else{
                        $.alert('Something Went Wrong! Try Again');
                    }
                }
            });
            }
        },

        cancel: function () {
            // $.alert('Canceled!');
        },
      
    }
});

});

</script>
