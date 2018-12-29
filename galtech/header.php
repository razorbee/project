  <?php include('script.php');?>
<body data-spy="scroll" data-target="#navbar-example">

    
    
  

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
       
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                  
                
                  <img class="logoimg" src="img/galtech_logo.png" alt="galtechlogo" title="galtechlogo">
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li id="hometab">
                    <a class="page-scroll" href="index.php">Home</a>
                  </li>
                  <li id="aboutustab">
                    <a  class="page-scroll" href="about.php">About Us</a>
                  </li>
                  <li id="producttab" class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Products<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        
                      <li><a href=# >Digital Copiers/Multifunction Devices <span class="fa fa-caret-right"></span></a>
                          <ul class="dropdown-menu-bar" role="menu">
                              <li id="b/wmodeltab"><a href="b_w_models.php">B/w Models </a></li>
                            <li id="colormodeltab"><a href="color_models.php">Color Models</a></li>
                          </ul>
                        </li>
                      <li><a href=# >Multimedia Projectors <span class="fa fa-caret-right"></span></a>
                        <ul class="dropdown-menu-bar" role="menu">
                              <li><a href="super_short_throw.php">Super Short Throw</a></li>
                            <li><a href="ultra_interactive_short_throw.php">Ultra Interactive Short Throw</a></li>
                            <li><a href="ultra_short_throw.php">Ultra Short Throw</a></li>
                            <li><a href="portable_installation.php">Portable &amp; Installation</a></li>
                            <li><a href="high_resolution_installation.php"> High Resolution / Installation</a></li>
                            <li><a href="ultra_high_resolution.php">Ultra High Resolution</a></li>
                            <li><a href="dlp.php">DLP</a></li>
                            <li><a href="led.php">LED</a></li>
                          </ul></li>
                        <li><a href="interactive_display.php">Interactive flat panel display</a></li>
                        <li><a href="wireless.php">Wireless Presentation devices</a></li>
                    </ul> 
                  </li>
                  <li id="servicetab">
                    <a class="page-scroll" href="services.php">Services &amp; Solutions</a>
                  </li>
                  <li id="newstab">
                    <a class="page-scroll" href="news.php">News</a>
                  </li>

                  <li id="careertab" class="dropdown"><a class="page-scroll" href="careers.php">Careers</a>
                  </li>
                  <li id="contacttab">
                    <a class="page-scroll" href="contact.php">Contact</a>
                  </li>
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    
    <!-- header-area end -->
  </header>
  <!-- header end -->
    <script>
    $(document ).ready(function() {
    var pagename = window.location.href.split("/");
        debugger;
        pagename  = pagename[pagename.length-1]
 
        if(pagename==""||pagename=="index.php"){
            $("#hometab").addClass("active");
        } else if(pagename=="about.php"){
            $("#aboutustab").addClass("active");
        }
        else if(pagename=="about.php"){
            $("#aboutustab").addClass("active");
        }
        else if(pagename=="services.php"){
            $("#servicetab").addClass("active");
        }
        else if(pagename=="news.php"){
            $("#newstab").addClass("active");
        }
        else if(pagename=="careers.php"){
            $("#careertab").addClass("active");
        }
        else if(pagename=="contact.php"){
            $("#contacttab").addClass("active");
        }
    else if(pagename=="b_w_models.php"||pagename=="color_models.php"||pagename=="super_short_throw.php"||pagename=="ultra_interactive_short_throw.php"||pagename=="ultra_short_throw.php"||pagename=="portable_installation.php"||pagename=="high_resolution_installation.php"||pagename=="ultra_high_resolution.php"||pagename=="dlp.php"||pagename=="led.php"||pagename=="interactive_display.php"||pagename=="wireless.php"){
            $("#producttab").addClass("active");
        }
        
});
    </script>
    
    