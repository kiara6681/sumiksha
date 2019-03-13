<?php include('header.php');?>
<style>
    .contact{
        background: #003399;
        padding: 40px;
    }
    .contact h4{
        color:#fff!important;
    }    
    .contact p{
        color:#fff!important;
    }   
     .contact span{
        color:#fff!important;
    }    
    .contact a{
        color:#fff!important;
    }
    .smart-forms .btn-primary.orange-2{
        background: linear-gradient(to left, rgb(255, 102, 0) 0%, rgb(0, 51, 153) 80%)
    }
</style>
<section class="gredientPattern container-fluid" style="padding-top: 110px;">
<!-- <div class="bgtrans"></div> -->
    <div class="pageSection row magic-3">
        <img src="<?= base_url();?>assets/img/CONTACT-US.jpg" alt="" class="img-responsive"> 
    </div>
</section>

<section class="sec-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="smart-forms bmargin">
                   
                    <h3 class="text-left" style="color: #000;font-weight: 600;margin-top: 20px;">Contact Form</h3>
                    <p>You have gone through our website fully and may want to contact us or want more details to become our customer.</p>
                    <br>
                    <br>
                    <form method="post" action="javascript:;" id="smart-form">
                        <div>
                            <div class="col-md-6">
                                <div class="section" style="padding: 0px 0px;">
                                    <label class="field prepend-icon">
                                    <input type="text" name="sendername" id="sendername" class="gui-input" placeholder="Enter name" required="">
                                    <span class="field-icon"><i class="fa fa-user"></i></span> </label>
                                </div>
                                <div class="section" style="padding: 0px 0px;">
                                    <label class="field prepend-icon">
                                    <input type="email" name="emailaddress" id="emailaddress" class="gui-input" placeholder="Email address">
                                    <span class="field-icon"><i class="fa fa-envelope"></i></span> </label>
                                </div>
                                <div class="section" style="padding: 0px 0px;">
                                    <label class="field prepend-icon">
                                    <input type="tel" name="telephone" id="telephone" class="gui-input" placeholder="Telephone">
                                    <span class="field-icon"><i class="fa fa-phone-square"></i></span> </label>
                                </div>
                            </div>
                            <!-- end section -->
                            
                            <div class="col-md-6">
                                <div class="section" style="padding: 0px 0px;">
                                    <label class="field prepend-icon">
                                    <textarea class="gui-textarea" id="sendermessage" name="sendermessage" placeholder="Enter message"></textarea>
                                    <span class="field-icon"><i class="fa fa-comments"></i></span> <!-- <span class="input-hint"> <strong>Hint:</strong> Please enter between 80 - 300 characters.</span> --> </label>
                                </div>
                                <!-- end .form-body section -->
                                <div class="form-footer">
                                    <button type="submit" data-btntext-sending="Sending..." class="button btn-primary orange-2">Submit</button>
                                    <button type="reset" class="button"> Cancel </button>
                                </div>
                            </div>
                            <!-- end section --> 
                            
                        </div>
                        <!-- end .form-footer section -->
                    </form>
                  </div>
              <!-- end .smart-forms section --> 
            </div>
            <?php
                $sql1=$conn->query("select * from text");
                $row1=mysqli_fetch_array($sql1);

                $email = $row1['email'];
                $phone = $row1['phone'];

                $phone = explode(',',$phone);
                $email = explode(',',$email);
            ?>
            <div class="col-md-4">
                <br>
                <diV class="contact">
                    <h4>Address Info</h4>
                    <?php echo $row1['address'];?>
                    <p>E-mail 1: <a href="mailto:<?= $email[0];?>"><?= $email[0];?></a></p>
                    <p>Phone No.: <a href="tel:<?= $phone[0];?>"><?= $phone[0];?></a></p>
                </diV>
            </div>  
        </div>
        <hr>
        <div class="col-md-12">
            
            <p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3556.1052541177546!2d75.77855231504601!3d26.963565983105717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db3b47a84b429%3A0x92b38efd91251d5d!2sDexus+Media+Best+website+development+company+Jaipur!5e0!3m2!1sen!2sin!4v1542365475975" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            </p>
            
        </div>
    </div>
</section>
<?php include('footer.php');?>