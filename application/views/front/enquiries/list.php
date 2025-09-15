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
                    <h2 class="title-2"><i class="icon-mail-1"></i> Inquiries </h2>

                    <div class="table-responsive">

                        <table  class="table table-striped table-bordered dt">
                            <thead>
                                <tr>
                                    <th data-type="numeric" data-sort-initial="true"></th>
                                    <th>Name</th>
                                    <th data-sort-ignore="true">Phone</th>
                                    <th data-type="numeric">Email</th>
                                    <th data-type="numeric">Ad Title</th>
                                    <th data-type="numeric">Inquiry</th>
                                     <th data-type="numeric">Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count=0; foreach($result as $row) {  $count++; ?>
                                    <tr>
                                        <td><?=$count?></td>
                                        <td><?=$row->name?></td>
                                        <td><?=$row->user_phone?></td>
                                        <td><?=$row->user_email?></td>
                                        <td><?=$row->title?>( Ad ID =  <?= $row->post_id?>)</td>
                                        <td><?=$row->enquiry?></td>
                                         <td><?=date("d-M-Y g:i a", strtotime($row->created_at))?></td>
                                        <td>
                                            <?php
                                                if($row->status == 1)
                                                {
                                                    ?>
                                             <span class="text text-success btn-xs">   Answered</span>
                                            <?php
                                                }
                                                elseif($row->status == 0)
                                                {
                                              ?>
                                             <span class="text text-danger btn-xs"> Pending</span>
                                              <?php      
                                                }
                                            ?>
                                                
                                            </td>
                                        <td>
                                       
                                            <a onclick="changestatus_ById('<?=base_url()?>frontend/EnquiryController/changestatus/<?=$row->id?>', 'Change Status')" href="#">Change Status
                                                <i class="fas fa-edit"></i>
                                            </a>
                                           <!--  <a href="#contactUser_<?= $row->id?>" data-bs-toggle="modal"><i class="fas fa-eye"></i>View Enquiry</a> -->
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                    <div class="modal fade" id="contactUser_<?= $row->id?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        <i class="icon-mail-2"></i> Enquiry
                                                    </h4>

                                                    <button type="button" class="close" data-bs-dismiss="modal">
                                                        <span aria-hidden="true">&times;</span>
                                                        <span class="sr-only">Close</span>
                                                    </button>
                                                </div>

                                                    <div class="modal-body">

                                                        <div class="mb-3 required">
                                                            <textarea><?= $row->enquiry ?></textarea>
                                                        </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr> -->

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
    function changestatus_ById(url, Msg) {
        $.confirm({
			title: 'Change Status!',
			content: 'Are you sure to change status to Answered ?',
			buttons: {
				confirm: {
					text: 'Change Status',
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