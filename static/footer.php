 
<?php  
if(!isset($_SESSION)){session_start();}
$addedString = "";
if(isset( $_SESSION['currentItem'])){
    if( $_SESSION['currentItem'] != 0){
        $addedString = "../";
    }
}
?>
        <!--
        |========================
        |      Script
        |========================
        -->



        <!-- jquery -->
        <script src="<?php echo $addedString; ?>assets/plugins/js/jquery-1.11.3.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo $addedString; ?>assets/plugins/js/bootstrap.min.js"></script>
        <!-- mean menu nav-->
        <script src="<?php echo $addedString; ?>assets/plugins/js/meanmenu.js"></script>
        <!-- ajaxchimp -->
        <script src="<?php echo $addedString; ?>assets/plugins/js/jquery.ajaxchimp.min.js"></script>
        <!-- wow -->
        <script src="<?php echo $addedString; ?>assets/plugins/js/wow.min.js"></script>
        <!-- Owl carousel-->
        <script src="<?php echo $addedString; ?>assets/plugins/js/owl.carousel.js"></script>
        <!--flexslider-->
        <script src="<?php echo $addedString; ?>assets/plugins/js/jquery.flexslider-min.js"></script>
        <!--dropdownhover-->
        <script src="<?php echo $addedString; ?>assets/plugins/js/bootstrap-dropdownhover.min.js"></script>
        <!--jquery-ui.min-->
        <script src="<?php echo $addedString; ?>assets/plugins/js/jquery-ui.min.js"></script>
        <!--validator -->
        <script src="<?php echo $addedString; ?>assets/plugins/js/validator.min.js"></script>
        <!--smooth scroll-->
        <script src="<?php echo $addedString; ?>assets/plugins/js/smooth-scroll.js"></script>
        <!-- Fancybox js-->
        <script src="<?php echo $addedString; ?>assets/plugins/js/jquery.fancybox.min.js"></script>
        <!-- selectize -->
        <script src="<?php echo $addedString; ?>assets/plugins/js/standalone/selectize.js"></script>
        <!-- init -->
        <script src="<?php echo $addedString; ?>assets/js/init.js"></script>
		<script src="<?php echo $addedString; ?>scripts/scripts.js"></script>
        <!--fileinput with previews yay -->
        <script src="<?php echo $addedString; ?>assets/js/fileinput.js"></script>
        <script src="<?php echo $addedString; ?>themes/gly/theme.js"></script>
        <!-- copy to clipboard yay -->
        <script src="<?php echo $addedString; ?>assets/js/ZeroClipboard.js"></script>

    </body>
</html>