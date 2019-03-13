<?php include('../includes/header.php');?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Help and Support</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url();?>includes/admin_home.php">Home</a>
                </li>
                <li>
                    <a>Forms</a>
                </li>
                <li class="active">
                    <strong>Help and Support</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <?php
        $sql1=$conn->query("select * from text");
        $row1=mysqli_fetch_array($sql1);

        $email = $row1['email'];
        $phone = $row1['phone'];

        $phone = explode(',',$phone);
        $email = explode(',',$email);
    ?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">
                <div class="widget lazur-bg p-xl text-center">
                    <h1 style="font-size: 50px;">
                        Help and Support
                    </h1>
                    <ul class="list-unstyled m-t-md">
                        <li style="font-size: 25px;">
                            <span class="fa fa-envelope m-r-xs"></span>
                            <label>Email:</label>
                            <?= $email[0];?>
                        </li>
                        <!-- <li>
                            <span class="fa fa-home m-r-xs"></span>
                            <label>Address:</label>
                            Street 200, Avenue 10
                        </li> -->
                            <?php
                                $i=0;
                                $sql1=$conn->query("select * from text");
                                while($row1=mysqli_fetch_array($sql1))
                                {

                                $phone = $row1['phone'];
                                $phone = explode(',',$phone);
                            ?>
                            <li style="font-size: 25px;">
                                <span class="fa fa-phone m-r-xs"></span>
                                <label>Contact:</label>
                                <?= $phone[$i];?>
                            </li>
                        <?php
                            $i++;}
                        ?>
                    </ul>

                </div>

            </div>
        </div>

    </div>
    <div class="footer">
        <div>
            <strong>Copyright</strong> &copy; 2017 Designed by <a href="http://dexusmedia.com/" target="_blank">Dexus Media</a>
        </div>
    </div>
<?php include('../includes/footer_scripts.php');?>