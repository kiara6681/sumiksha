    <!-- Mainly scripts -->
    <script src="<?= base_url();?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= base_url();?>assets/js/inspinia.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- SUMMERNOTE -->
    <script src="<?= base_url();?>assets/js/plugins/summernote/summernote.min.js"></script>
    
    <!-- Data picker -->
    <script src="<?= base_url();?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <!-- Validation Jquery -->
    <link rel="stylesheet" href="<?= base_url();?>frontend_assets/css/validationEngine.jquery.css" type="text/css"/>
    <script src="<?= base_url();?>frontend_assets/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?= base_url();?>frontend_assets/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    <script>
        $(document).ready(function(){
            // binds form submission and fields to the validation engine
            $(".Register_form").validationEngine();
        });
    </script>
    <script>
        $(document).ready(function(){

            $('.summernote').summernote({
                minHeight: 200
            });
        });

    </script>
<!--     <script>
    $(document).ready(function(){
        var mem = $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
    });
</script> -->
    <script>
    $(function(){
        $('#datepicker').datepicker({
            onSelect: function(value, ui) {
                var today = new Date(), 
                    age = today.getFullYear() - ui.selectedYear;
                $('#age').val(age+" Years");
            },
            maxDate: '+0d',
            changeMonth: true,
            changeYear: true,
            defaultDate: '-18yr',
        });
    });
</script>
</body>
</html>