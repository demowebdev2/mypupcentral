<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
<div class="main-container">
    <div class="container">
        <div class="row">
            
            <?php $this->load->view('front/profile_sidebar'); ?>



            <div class="col-md-9 page-content">

            <?php if ($this->session->flashdata('msg')) { ?>
                                                <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>


                <div class="inner-box">
                    <h2 class="title-2"><i class="fas fa-user-tie"></i> Contact Person </h2>

                    <div class="table-responsive">

                        <table  class="table table-striped table-bordered dt">
                            <thead>
                                <tr>
                                    <th data-type="numeric" data-sort-initial="true"></th>
                                    <th>Name</th>
                                    <th data-sort-ignore="true">Phone</th>
                                    <th data-type="numeric">Email</th>
                                    <th >Contact Method</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count=0; foreach($result as $row) {  $count++; ?>
                                    <tr>
                                        <td><?=$count?></td>
                                        <td><?=$row->full_name?></td>
                                        <td><?=$row->phone?></td>
                                        <td><?=$row->email?></td>
                                        <td><?php foreach(json_decode($row->preferred_contact) as $ro){
                                            echo $ro.',';
                                        }?></td>
                                        <td>
                                        <a href="<?=base_url()?>contact-person/edit/<?=$row->id?>">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a onclick="delete_recordById('<?=base_url()?>frontend/Contact_person/delete/<?=$row->id?>', 'Delete')" href="#">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>


                                    <?php } ?>
                            </tbody>
                        </table>

                    </div>

                    <nav>

                    </nav>

                </div>
            </div>


        </div>
    </div>
</div>

<script>
    function delete_recordById(url, Msg) {
        $.confirm({
			title: 'Delete!',
			content: 'Are you sure to continue?',
			buttons: {
				confirm: {
					text: 'Delete',
					btnClass: 'btn-red',
					action:function() {
                        window.location.replace(url);
					
					}
				},
				cancel: function () {
					//$.alert('Canceled!');
				},

			}
		});

            }
</script>