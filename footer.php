<style>
    .ab p{
        color:#fff;
    }
</style>
 <?php
    $sql1=$conn->query("select * from text");
    $row1=mysqli_fetch_array($sql1);

    $email = $row1['email'];
    $phone = $row1['phone'];

    $phone = explode(',',$phone);
    $email = explode(',',$email);
?>
<section class="footerSection container-fluid">
    <div class="pageSection  row">
        <div class="container footerWidget">
            <?php 
                $sql=$conn->query("select * from courses limit 0,4");
                while($row=mysqli_fetch_array($sql))
                {
                $id = $row['id'];
                    
            ?>
            <ul class="footerLinks col-md-3">
                <h4 style="color:#fff;"><?= $row['name'];?></h4>
                <?php 
                    $sql1=$conn->query("select * from course1 where course_id=$id");
                    while($row1=mysqli_fetch_array($sql1))
                    {
                ?>
                    <li>
                    <?php
                        if($row1['id']==18){
                    ?>
                        <a href="https://health.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                            <?= $row1['name'];?>
                        </a>
                    <?php
                        }
                        elseif($row1['id']==19){
                    ?>
                        <a href="https://termlife.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                            <?= $row1['name'];?>
                        </a>
                    <?php
                        }
                        elseif($row1['id']==26){
                    ?>
                        <a href="https://travel.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                            <?= $row1['name'];?>
                        </a>
                    <?php
                        }
                        elseif($row1['id']==27){
                    ?>
                        <a href="http://sme.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                            <?= $row1['name'];?>
                        </a>    
                    <?php
                        }
                        if($row1['id']==28){
                    ?>
                        <a href="http://home.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                            <?= $row1['name'];?>
                        </a> 

                    <?php
                        }
                        elseif($row1['id']==51){
                    ?>
                        <a href="https://twowheeler.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                            <?= $row1['name'];?>
                        </a>
                    <?php
                        }
                        elseif($row1['id']==53){
                    ?>
                        <a href="https://ci.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                            <?= $row1['name'];?>
                        </a>
                    <?php
                        }
                        elseif($row1['id']==54){
                    ?>
                        <a href="http://cancerinsurance.policybazaar.com/ci?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                            <?= $row1['name'];?>
                        </a>
                    <?php
                        }
                        elseif($row1['id']!=18 && $row1['id']!=19 && $row1['id']!=26 && $row1['id']!=27 && $row1['id']!=28 && $row1['id']!=51 && $row1['id']!=53 && $row1['id']!=54)
                        {
                    ?>
                        <a href="<?= base_url();?>product/<?= $row1['metatitle'];?>">
                            <?= $row1['name'];?>
                        </a>
                    <?php
                        }
                    ?>
                    </li>
                <?php
                    }
                ?>
            </ul>
            <?php
                }
            ?>
        </div>        
        <div class="container footerWidget">

            <ul class="footerLinks col-md-4 ab">
                <h4 style="color:#fff;">Contact Us</h4>
                <li><?php echo $row1['address'];?></li>
                <li>E-mail 1: <a href="mailto:<?= $email[0];?>"><?= $email[0];?></a></li>
                <li>Phone No.: <a href="tel:<?= $phone[0];?>"><?= $phone[0];?></a></li>
            </ul>
            <ul class="footerLinks col-md-4">
                <h4 style="color:#fff;">Quick Links</h4>
                <li><a href="<?= base_url();?>">Home</a></li>
                <li><a href="<?= base_url();?>aboutus">About Us</a></li>
                <li><a href="<?= base_url();?>contactus">Contact Us</a></li>
            </ul>
            <ul class="footerLinks col-md-4">
                <h4 style="color:#fff;">Our Location</h4>
            </ul>

        </div>

        <div class="copyrightWidget container">
 
            <span>Copyright © 2018 Sumiksha Services. All Rights Reserved.</span>
            <span style="float:right">Designed by :- <a style="color:#fff
            ;" href="http://dexusmedia.com/" target="_blank">Dexus Media</a></span>
            <a id="back-to-top" href="#" class="btn   btn-lg back-to-top" role="button" title="Back to Top" data-toggle="tooltip" data-placement="top">
                <img src="<?= base_url();?>frontend_assets/images/arr.png">
            </a>
            
        </div>
 
      </div>
</section> 
<script type="text/javascript">
    $(document).ready(function(){
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });        
        if ($(window).width() >= 768) { 
            $(window).scroll(function () {
                if ($(this).scrollTop() > 150) {
                    $(".MarqueeId").hide();
                    $(".Marquee").show();
                    $('.headerLogo').css({
                        "background-color":"#fff !important"
                    });                
                    $('.logo_back').css({
                        "background-color":"#222 !important"
                    });
                } else {
                    $(".Marquee").hide();
                    $(".MarqueeId").show();
                    $('.headerLogo').css({
                        "background-color":"rgba(255,255,255,.5) !important"
                    });                
                    $('.logo_back').css({
                        "background":"none"
                    });
                }
            });
        }
        $(".Marquee").hide();
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('hide');
    });
    
</script>
<!-- animation csss -->
<script src='<?= base_url();?>frontend_assets/js/wow.min.js'></script>
<script>
    new WOW().init();
</script>
<!-- jQuery --> 
<script type="text/javascript" src="<?= base_url();?>frontend_assets/js/cubeportfolio/jquery.cubeportfolio.min.js"></script> 
<script type="text/javascript" src="<?= base_url();?>frontend_assets/js/cubeportfolio/main.js"></script> 
<script src="<?= base_url();?>frontend_assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?= base_url();?>frontend_assets/js/count-to.js"></script> 
<script type="text/javascript" src="<?= base_url();?>frontend_assets/js/owl.carousel.min.js"></script> 
<!-- SmartMenus jQuery plugin --> 
 
<script type="text/javascript" src="<?= base_url();?>frontend_assets/js/jquery.smartmenus.js"></script> 
<script type="text/javascript" src="<?= base_url();?>frontend_assets/js/jquery.smartmenus.bootstrap.js"></script> 
<script src="<?= base_url();?>frontend_assets/js/transit.js" type="text/javascript"></script>
<script src="<?= base_url();?>frontend_assets/js/waypoints.js" type="text/javascript"></script>
<script src="<?= base_url();?>frontend_assets/js/easing.js" type="text/javascript"></script>
<script src="<?= base_url();?>frontend_assets/js/jquery.bxslider.js" type="text/javascript"></script>
<script src="<?= base_url();?>frontend_assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

 
<script>
    (function($){
        $(window).load(function(){
            $(".content-area .modal-body").mCustomScrollbar({

                setHeight:450,
                theme:"minimal-dark"
            });
        });
    })(jQuery);
</script>


<script>
$(document).ready(function ($) {
    $('.scroll-bt a').click(function(){

        var rel=$(this).attr('rel');
             $('html,body').animate({

        scrollTop: $("#"+rel).offset().top-100},

        'slow');

    });

    $('#main-menu').smartmenus({});
    $('.timer').countTo();

    $('.owl-carousel').owlCarousel({
        items:3,

        margin:10,
    nav: true,
      loop: true,

        responsive: {
         0: {
          items: 1

        },
         600: {
            items: 2
         },
         1000: {

            items: 3

          }
        }   
    });
    $("#testimonial-slider").owlCarousel({
        items:3,
        itemsDesktop:[1000,3],
        itemsDesktopSmall:[990,2],
        itemsTablet:[768,2],
        itemsMobile:[650,1],
        pagination:true,
        navigation:false,
        autoPlay:true
    });
});
</script>

<script>
  
$(document).ready(function ($) {
    $('.calculateBtn').click(function(){
 
        $('.error_blank').hide();
            $('.loan-payment').hide();
 
            var loan_amount = $('#loan_amount').val();
     
            var loan_month = $('#loan_duration').val();
     
            var loan_interest = $('#interest_rate').val();
            var valid=0;
 
        if(loan_amount==''){
            $('#loan_amount').parent().find('span').fadeIn();
 
            valid = 1;
 
        }if(loan_month==''){
 
            $('#loan_duration').parent().find('span').fadeIn();
 
            valid = 1;
 

        }if(loan_interest==''){
        $('#interest_rate').parent().find('span').fadeIn();
        valid = 1;
 
        }

    if(valid == 0){
    var rateOfInterest = loan_interest/(12*100);
    var numerator = (loan_amount * rateOfInterest)*(Math.pow((1+rateOfInterest), loan_month));
    var denominator = (Math.pow((1+rateOfInterest), loan_month))-1 ;
    var emi = parseInt(numerator/denominator);
 
        console.log('rateOfInterest'+rateOfInterest+'numerator'+numerator+'denominator'+denominator);
 
        $('.loan-payment span').html('<span class="rs">`</span> '+emi+'</span>');
 

        $('.loan-payment').fadeIn();
 
        }
 
    });
 
    $('#main-menu').smartmenus({});
        $('.owl-carousel').owlCarousel({
         
            items:3,
            margin:10,
            nav: true,
            loop: false,
            pagination:true,
            responsive: {
        0: {  
            items: 1
        },
 
        600: {
            items: 2
        },
        1000: {
           items: 3
        }
    }   
});
 

$('.intro_text h2').transition({opacity:1},1000,'ease');
 
$('.intro_text h1').transition({opacity:1, delay:500},1000,'ease');
 

$('.loader').transition({opacity:1, delay:500},1000,'ease');    

var countt=0;
 
$('#box0,#box1,#box2,#box3,#box4,#box5').transition({ y: '50px', opacity:0 , delay:0, scale:1, perspective: '1000px',
 
  rotateY: '20px' }, 0, 'ease');
 
$('#box10,#box11,#box12,#box13').transition({ y: '50px', opacity:0 , delay:0, scale:1, perspective: '1000px',  rotateY: '20px' }, 0, 'ease');   
 
var waypoints1 = $('.magic-1').waypoint(function(direction) { if(countt==0){ animate1(); countt=1;} }, {  offset: '50%' }); 
 
var waypoints2 = $('.magic-2').waypoint(function(direction) {  animate2(); }, {  offset: '50%' });   
  
var waypoints3 = $('.magic-3').waypoint(function(direction) {  animate3(); }, {  offset: '50%' });  

var waypoints4 = $('.magic-4').waypoint(function(direction) {  animate4(); }, {  offset: '50%' });  
 
var waypoints5 = $('.magic-5').waypoint(function(direction) {  animate5(); }, {  offset: '50%' });  
 
function animate1()

{
 

    $('#box0').transition({ y: '0px', opacity:1 , scale:1, rotateY: '0deg',  delay:0 }, 1000, 'ease');

    $('.timer').countTo();
 
}
 
function animate2()
 
{
 
    $('#box1').transition({ y: '0px', opacity:1 , scale:1, rotateY: '0deg',  delay:0 }, 1000, 'ease');
 
}
 

function animate3()
{

    $('#box2').transition({ y: '0px', opacity:1 , scale:1, rotateY: '0deg',  delay:0 }, 1000, 'ease');  

    $('#box10').transition({ y: '0px', opacity:1 , scale:1, rotateY: '0deg', delay:200 },1000, 'ease'); 
     
    $('#box11').transition({ y: '0px', opacity:1 , scale:1, rotateY: '0deg', delay:400 },1000, 'ease');
     
    $('#box12').transition({ y: '0px', opacity:1 , scale:1, rotateY: '0deg', delay:600 },1000, 'ease');
     
    $('#box13').transition({ y: '0px', opacity:1 , scale:1, rotateY: '0deg', delay:600 },1000, 'ease'); 
 
}
 
function animate4()
{

    $('#box3').transition({ y: '0px', opacity:1 , scale:1, rotateY: '0deg',  delay:0 }, 1000, 'ease');
    $('#box4').transition({ y: '0px', opacity:1 , scale:1, rotateY: '0deg',  delay:200 }, 1000, 'ease');
}

function animate5()
{

    $('#box5').transition({ y: '0px', opacity:1 , scale:1, rotateY: '0deg',  delay:0 }, 1000, 'ease');
 
}

});
 
function is_touch_device() {

    return (('ontouchstart' in window)

        || (navigator.MaxTouchPoints > 0)
        || (navigator.msMaxTouchPoints > 0));
     
    }
    $(window).on('load', function() { 
        $('.bxslider').bxSlider({
     
            mode:'fade',
     
            auto:true
        });

        setTimeout(function() {

        $('html, body').scrollTop(0);
     

        }, 10);

    });

</script>

 
</body>
 
</html> 
 