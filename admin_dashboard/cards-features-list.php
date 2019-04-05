<?php include('../includes/header.php');?>
<style>
    .modal-footer .btn+.btn
    {
        margin-bottom: 5px!important;
    }
</style>
<?php 
    $course_id = $_REQUEST['id'];

    if(isset($_REQUEST['delete']))
    {
        $id=$_REQUEST['delete'];

        $delete = "delete from credit_card_features where id='$id'";

        if($conn->query($delete))
        {
            //echo "Delete Succesfully";
        }
    }

?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Tables</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url();?>includes/admin_home.php">Home</a>
            </li>
            <li>
                <a>Tables</a>
            </li>
            <li class="active">
                <strong>Data Tables</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="cards-features.php?id=<?= $course_id;?>" class="btn btn-success"><i class="fa fa-plus"></i> add</a>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Bank Name</th>
                                <th>Card Type</th>
                                <th>Card Name</th>
                                <th>Annual Fees</th> 
                                <th>Card Image</th>
                                <th>Card Details</th> 
                                <th>Created Date</th> 
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql_cmp=$conn->query("select credit_card_features.*, course1.name as bank_name from credit_card_features left join course1 on course1.id = credit_card_features.sub_course_id where credit_card_features.sub_course_id = '$course_id'");
                                    $count=1;
                                    while($data_cmp=mysqli_fetch_array($sql_cmp))
                                    {
                                ?>
                                <tr class="gradeX">
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $data_cmp['bank_name']; ?></td>
                                    <td>
                                    <?php
                                        if($data_cmp['card_type_id']==1)
                                        {
                                    ?>
                                        Travel
                                    <?php
                                        }
                                        elseif($data_cmp['card_type_id']==2)
                                        {
                                    ?>
                                        Fuel
                                    <?php
                                        }
                                        elseif($data_cmp['card_type_id']==3)
                                        {
                                    ?>
                                        Premium
                                    <?php
                                        }
                                        elseif($data_cmp['card_type_id']==4)
                                        {
                                    ?>
                                        Rewards
                                    <?php
                                        }
                                        elseif($data_cmp['card_type_id']==5)
                                        {
                                    ?>
                                        Shopping & Cashback
                                    <?php
                                        }
                                        elseif($data_cmp['card_type_id']==6)
                                        {
                                    ?>
                                        LifeStyle
                                    <?php
                                        }
                                    ?>
                                    </td>
                                    <td><?php echo $data_cmp['card_name']; ?></td>
                                    <td><?php echo $data_cmp['annual_fees']; ?></td>
                                    <td><img src="uploads/card_images/<?php echo $data_cmp['card_image']; ?>" style="width:70px;height:70px;"></td>
                                    <td><?php echo $data_cmp['card_details']; ?></td>
                                    <td><?php echo $data_cmp['created_at']; ?></td>
                                    <td class="center">
                                        <a href="cards-features-edit.php?id=<?php echo $data_cmp['id']; ?>" class="btn btn-primary btn-circle">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <a href="#<?= $data_cmp['id'];?>" data-toggle="modal" class="btn btn-danger btn-circle animation_select" data-animation="shake">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                                <div id="<?= $data_cmp['id'];?>" class="modal fade animated shake" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Delete Category</h4>
                                          </div>
                                          <div class="modal-body">
                                            <p>Are you sure you want to Delete ?</p>
                                            <input type="hidden" id="delt" value="<?= $data_cmp['id'];?>"> 
                                          </div>
                                          <div class="modal-footer">
                                            <form method="post">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button class="btn btn-danger" type="submit" name="delete" value="<?php echo $data_cmp['id']; ?>">Delete</button>
                                            </form>
                                          </div>
                                        </div>

                                    </div>
                                </div>                              
                            <?php $count++; }?>
                            </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('../includes/footer.php');?>