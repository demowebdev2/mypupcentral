<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <h1 class="m-0 text-dark">Training Requests</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Requests</li>
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
                                Training Requests
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body"><br>
                      


                            <br>

                            <div class="table-responsive">

                                <table class="table table-striped table-hover dtexample">
                                    <thead>
                                        <tr>
                                        <th>Sl. No</th>
                                            <th>Customer</th>
                                            <th>Address</th>
                                            <th>Puppy</th>
                                            <th>Preferred Start Date</th>
                                            <th>Plan</th>
                                            <th>Created at</th>
                                            <th>Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($req as $key=>$row){ ?>
                                          
                                        <tr>
                                        <td>
                                                <p ><?=$key+1?></p>
                                            </td>
                                            <td>
                                                <p ><?=$row->first_name?><?=$row->last_name?></p>
                                            </td>
                                            <td>
                                            <p ><?=$row->address?><br>
                                            <?=$row->city?> , <?=$row->state?><br>
                                            <?=$row->zipcode?><br>
                                            Email : <?=$row->email ?><br>
                                             Phone :<?=$row->phone ?>
                                        
                                        </p>
                                               
                                            </td>
                                            <td>
                                                <?php 	$breed=$this->common_model->list_row('breeds', array('id' =>$row->breed)); ?>
                                            Puppy Name : <?=$row->puppy_name?><br>
                                            Breed : <?=$breed->breed_name?><br>
                                            DOB : <?=$row->puppy_dob?><br>
                                            Breeder : <?=$row->breeder?><br>
                                            Breeder Phone : <?=$row->breeder_phone?><br>
                                            </td>
                                            <td>
                                            <p ><?=$row->created_at?></p>
                                            </td>

                                            <td>
                                            <p ><?php if($row->plan==0) {echo 'Puppy Basics - 3 Weeks Training Program $1495'; }?>
                                            <?php if($row->plan==1) {echo 'Advanced Puppy- 5 Weeks Training Program $2495'; }?>
                                        </p>
                                        <p>
                                            <br>
                                            Discount : <?=$row->discount?><br>
                                            Discount Method: <?=$row->discount_method?><br>
                                            Total Paid: <b>$<?=$row->total?></b>
                                        </p>
                                            </td>

                                            <td>
                                            <p ><?=date('m/d/Y H:i',strtotime($row->created_at))?></p>
                                            </td>
                                            <td>
                                            <p ><?=$row->note?></p>
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