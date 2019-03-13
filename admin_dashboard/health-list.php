<?php include'header.php';?>
<?php include'config.php';?>
    <!--Navigation Top Bar End-->
    <section id="main-container">

        <!--Left navigation section start-->
        <?php include'sidebar.php';?>
        <!--Left navigation section end-->
        
        <?php
        if(isset($_POST['submit'])){
        
            $name = $_REQUEST['name'];
            $metatitle1 = $_REQUEST['metatitle'];
        
            if($metatitle1){
                $metatitle1=$amit = preg_replace('/[^A-Za-z0-9\-]/', '-', $metatitle1);
                $metatitle=strtolower($metatitle1);
            }
            else{
                $metatitle1=$amit = preg_replace('/[^A-Za-z0-9\-]/', '-', $name);
                $metatitle=strtolower($metatitle1);
            }
        
            $fl_id = $_REQUEST['fl_id'];
            $description1 = $_REQUEST['description'];
            $aneg = str_replace("'","\'",$description1);
            $j = 0; //Variable for indexing uploaded image 
        
            //loop to get individual element from the array 
        
              define ("MAX_SIZE","4000000000000000000000000000000000000000");
        
              for($i=0; $i<count($_FILES['p_image1']['name']); $i++)  {
        
                $validextensions = array("jpeg", "jpg", "png");
        
                $size=filesize($_FILES['p_image1']['tmp_name'][$i]); 
        
                $path = "galleryphoto/";
                $fname = $_FILES['p_image1']['name'][$i];
                $size = $_FILES['p_image1']['size'][$i];
                list($txt, $ext) = explode(".", $fname);
                //date_default_timezone_set ("Asia/Calcutta"); 
                //$currentdate=date("d M Y");  
                $file= time().substr(str_replace(" ", "_", $txt), 0);
                $info = pathinfo($file);
                $filename = $file.".".$ext;
        
                $j = $j + 1;
        
                if($size < (MAX_SIZE*204800000000000000000000) && in_array($ext, $validextensions)){
        
                    if (move_uploaded_file($_FILES['p_image1']['tmp_name'][$i], $path.$filename)){
                    //if file moved to uploads folder
                        //echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                        /***********************************************/
        
                        
                        //echo"<img src=".$filepath."   >";    
                        if(mysql_query("INSERT INTO `healths` (`name`, `image`, `description`, `cat_id`) VALUES ('$name', '$filename', '$aneg', '$metatitle')"))     
                        {
                            echo "<script language='javascript'>alert('Successfully Submited !');window.location = 'healths-list.php';</script>";
                        }
        
                        else
                        {
                            echo "<script language='javascript'>alert('Image not saved successfully !');window.location = 'healths-list.php';</script>";
                        }
                        /*************************************************/
                    } else {//if file was not moved.
                        echo "<script language='javascript'>alert('please try again!.');window.location = 'healths.php';</script>";
                    }
                } else {//if file size and file type was incorrect.
                    echo "<script language='javascript'>alert('***Invalid file Size or Type***');window.location = 'healths.php';</script>";
                }
            }
        }
        ?>


        <!--Page main section start-->
        <section id="min-wrapper">
            <div id="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!--Top header start-->
                            <h3 class="ls-top-header">User Image</h3>
                     
                        </div>
                    </div>
                    <!-- Main Content Element  Start-->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">User Image</h3>
                                </div>
                                <div class="panel-body">
                                    <form method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                           <select name="email" style="padding:10px">
                                           <option>Select user</option>
                                           <?php 
                                           $row=mysql_query("select * from health");
                                           while($sql=mysql_fetch_array($row))
                                           {
                                           
                                           ?>
                                           
                                           <option value="<?php echo $sql['cat_id'];?>"><?php echo $sql['cat_id'];?></option>
                                           <?php }?>
                                           </select>
                                        </div>
                                         <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        
                                    <div class="form-group">
                                        <label>Photo</label>
                    
                                        <input type="file"  name="p_image1[]"  multiple="multiple"  accept="image/*" /> 
                                        <span style="color:#FF0000;font-size:20px;"><strong>User Can Select Multiple Images!</strong></span>  
                                    </div>
                  
                                    <input type="submit" value="Submit" name="submit">
                                       
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                  
                    <!-- Main Content Element  End-->
                </div>
            
            </div>

        </section>
        <!--Page main section end -->
        <!--Right hidden  section start-->
        
        <!--Right hidden  section end -->
        <div id="change-color">
            <div id="change-color-control">
                <a href="javascript:void(0)"><i class="fa fa-magic"></i></a>
            </div>
            <div class="change-color-box">
                <ul>
                    <li class="default active"></li>
                    <li class="red-color"></li>
                    <li class="blue-color"></li>
                    <li class="light-green-color"></li>
                    <li class="black-color"></li>
                    <li class="deep-blue-color"></li>
                </ul>
            </div>
        </div>
    </section>
<script src="js/jquery.min.js"></script>

<script src="js/tinymce/tinymce.dev.js"></script>
<script src="js/tinymce/plugins/table/plugin.dev.js"></script>
<script src="js/tinymce/plugins/paste/plugin.dev.js"></script>
<script src="js/tinymce/plugins/spellchecker/plugin.dev.js"></script>
<script src="js/tinymce/plugins/codesample/plugin.dev.js"></script>

<script>
    tinymce.init({
        selector: "textarea#elm1",
        theme: "modern",
        plugins: [
            "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker codesample"
        ],
        external_plugins: {
            //"moxiemanager": "/moxiemanager-php/plugin.js"
        },
        content_css: "css/development.css",
        add_unload_trigger: false,
        autosave_ask_before_unload: false,

        toolbar1: "save newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2: "cut copy paste pastetext | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media help code | insertdatetime preview | forecolor backcolor",
        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft | insertfile insertimage codesample",
        menubar: false,
        toolbar_items_size: 'small',

        style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],

        templates: [
            {title: 'My template 1', description: 'Some fancy template 1', content: 'My html'},
            {title: 'My template 2', description: 'Some fancy template 2', url: 'development.html'}
        ],

        spellchecker_callback: function(method, data, success) {
            if (method == "spellcheck") {
                var words = data.match(this.getWordCharPattern());
                var suggestions = {};

                for (var i = 0; i < words.length; i++) {
                    suggestions[words[i]] = ["First", "second"];
                }

                success({words: suggestions, dictionary: true});
            }

            if (method == "addToDictionary") {
                success();
            }
        }
    });
</script>
    <!--Layout Script start -->
    <script type="text/javascript" src="assets/js/color.js"></script>
    <script type="text/javascript" src="assets/js/lib/jquery-1.11.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/multipleAccordion.js"></script>

    <!--easing Library Script Start -->
    <script src="assets/js/lib/jquery.easing.js"></script>
    <!--easing Library Script End -->

    <!--Nano Scroll Script Start -->
    <script src="assets/js/jquery.nanoscroller.min.js"></script>
    <!--Nano Scroll Script End -->

    <!--switchery Script Start -->
    <script src="assets/js/switchery.min.js"></script>
    <!--switchery Script End -->

    <!--bootstrap switch Button Script Start-->
    <script src="assets/js/bootstrap-switch.js"></script>
    <!--bootstrap switch Button Script End-->

    <!--easypie Library Script Start -->
    <script src="assets/js/jquery.easypiechart.min.js"></script>
    <!--easypie Library Script Start -->

    <!--bootstrap-progressbar Library script Start-->
    <script src="assets/js/bootstrap-progressbar.min.js"></script>
    <!--bootstrap-progressbar Library script End-->

    <script type="text/javascript" src="assets/js/pages/layout.js"></script>
    <!--Layout Script End -->

    <!--Upload button Script Start-->
    <script src="assets/js/fileinput.min.js"></script>
    <!--Upload button Script End-->

    <!--Auto resize  text area Script Start-->
    <script src="assets/js/jquery.autosize.js"></script>
    <!--Auto resize  text area Script Start-->
    <script src="assets/js/pages/sampleForm.js"></script>
</body>

<!-- Mirrored from fickle.aimmate.com/sample-form.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Apr 2016 11:28:05 GMT -->
</html>