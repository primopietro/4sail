 <?php  

$addedString = "";
if(isset( $_SESSION['currentItem'])){
    if( $_SESSION['currentItem'] != 0){
        $addedString = "../";
    }
}
?>
 <!--
        |========================
        |  FOOTER
        |========================
        -->
        <footer class="xt-footer">
            
            <div class="footer-middle bg-2">
                <div class="container">
                    <div class="row section-separator">
                        <div class="col-md-4 col-sm-4">
                            <div class="footer-widget-2">
                                <div class="row">
                                    <div class="col-md-2 f-icon">
                                         <i class="fa flaticon-credit-card"></i>
                                    </div>
                                    <div class="col-md-10">
                                        <h4>Safe Payment</h4>
                                        <p>Pay with the world’s most popular and secure
                                        payment methods.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="footer-widget-2">
                                <div class="row">
                                    <div class="col-md-2 f-icon">
                                         <i class="fa flaticon-shipped"></i>
                                    </div>
                                    <div class="col-md-10">
                                        <h4>Worldwide delivery</h4>
                                        <p>With sites in 5 languages, we shop to over 100
                                        countries and regions.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="footer-widget-2">
                                <div class="row">
                                    <div class="col-md-2 f-icon">
                                         <i class="fa flaticon-question"></i>
                                    </div>
                                    <div class="col-md-10">
                                        <h4>24/7 help center</h4>
                                        <p>Round-the-clock assistance for a smooth
                                        shopping experience.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row section-separator">
                        <div class="col-md-6 col-sm-6">
                            <p>Free Bootstrap eCommerce Template by <a href="https://xoothemes.com/" target="_blank">XooThemes</a>.</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                           <img src="<?php echo $addedString; ?>assets/images/payment.png" alt="" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </footer>