<?php include('head.php');?>
<?php include('header.php');?>
<div class="container-fluid">
	<div class="row">
		
    <div class="bg"><img src="img/image%20(2).png" class="img-fluid" style="filter: blur(1px);
  -webkit-filter: blur(1px);width:100%">
       <div class="hero-text">
    <h1 style="color:white;display:inline-block;margin-top:-1000px; ">Contact Us</h1>
    
  </div>

    </div>
</div>
<div class="container">
    <div class="row">
		
        <div class="btn-group btn-breadcrumb breadcrumb-default">
            <a href="index.php" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
     
           <div class="btn btn-default visible-xs-block hidden-xs visible-sm-block ">...</div>
            <div class="btn btn-info"><b>Contact Us</b></div>
        </div>
	</div>
</div>

<section class="contact_details sec-padd2">
    <h2 ></h2>
    <div class="container">
      <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="item center">
                    <div class="icon_box">
                       <img src="img/map-pointer.png">
                    </div>
                    <h4>Visit Our Place</h4>
                    <div class="text">
                        <p>No.50, 9th A Main Road, 1st Stage, Indiranagar, Bangalore - 560 038.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="item center">
                    <div class="icon_box">
                       <img src="img/mail.png">
                    </div>
                    <h4>Send Mail</h4>
                    <div class="text">
                        <p>response@galtechinfo.com<br></p>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="item center">
                    <div class="icon_box">
                        <img src="img/phone.png">
                    </div>
                    <h4>Call Us</h4>
                    <div class="text">
                        <p>Ph: +91 - 8800537008 <br></p>
                        <br>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<a  name="enquire_now"></a>

<section class="contact_us sec-padd-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h3 style="text-align: center;">Enquire Now</h3>
                </div>
                <div class="default-form-area">
                    <form id="myForm contact-form" name="frm" class="default-form" action="mail.php" onsubmit="return validateForm()" method="post">
                    
                        <div class="row clearfix">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" value="" placeholder="Your Name *" required="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control required email" value="" placeholder="Your Mail *" required="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" value="" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" value="" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control textarea required" placeholder="Your Message...."></textarea>
                                </div>
                            </div>   
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" >
                                    <button class="thm-btn2" type="submit" data-loading-text="Please wait..." style="margin-left: 45%;"><i class=" fa fa-paper-plane"></i> Send</button>
                                </div>
                            </div>   

                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>
<div class="container">
        <div class="row">
      <div class="col-sm-12">
            <!-- Start Map -->
       <div class="mapouter"><div class="gmap_canvas"><iframe width="1080" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=galtech%20info%20solutions&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.crocothemes.net">search wordpress sites</a></div><style>.mapouter{text-align:right;height:500px;width:1080px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:1080px;}
           @media all and (max-width: 700px) and (min-width: 300px) {
 
                    .gmap_canvas {
   width:335px!important;
  }
}</style></div>
            <!-- End Map -->
          </div>
            </div>
</div>

    </div>
<footer class="main-footer" style="margin-top:100px;">
<!--Footer Bottom-->
     <section class="footer-bottom">
        <div class="container">
            <div class="center copy-text">
                <p><span class="footer-color">© 2018 Galtech Info solutions Pvt Ltd. | Powered by</span> <a href="http://razorbee.com" target="_blank"> Razorbee Online solutions</a></p>
                
            </div><!-- /.pull-right -->
            <div class="pull-right get-text">
                <ul>
                    
                </ul>
            </div><!-- /.pull-left -->
        </div><!-- /.container -->
    </section>
</footer>
<!-- Scroll Top Button -->
    


	<?php include('script.php');?>
