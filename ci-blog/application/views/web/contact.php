<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="<?php echo $deskripsi; ?>">
    <meta name="author" content="<?php echo $author; ?>">
    <meta charset="utf-8">
    <meta name="robots" content="all">

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <title><?php echo $title; ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/web/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/web/css/typography.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/web/css/global.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/web/css/elements.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/web/css/shortcodes.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/web/css/widgets.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/web/css/menu.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/web/css/jquery.flexslider.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/web/css/revolution/settings.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/web/css/revolution/fullwidth.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/web/css/revolution/responsive.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/web/css/revolution/absolution_revolution.css"/>
   
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/web/css/jquery.tweet.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/web/css/jquery.isotope.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/web/css/jquery.jcarousel.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/web/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/web/css/responsive-gs-12col.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/web/css/mediaqueries.css"/>     
</head>
<body>

<header class="header-top">
    <div class="container clr">
        <div class="row no-margin-col">
            <div class="col span_5">
                <div class="floatleft">
                    <ul class="inline-ul no-margin">
                        <li><p class="phone-top nova-text">&nbsp;&nbsp;(+62) 87755925565</p></li>
                        <li><p class="mail-top nova-text">&nbsp;&nbsp;&nbsp;&nbsp;ahmadrizalafani@gmail.com</p></li>
                    </ul>          
                </div>
            </div>

            <div class="col span_7">
                <div class="header-social-icons-parent">
                    <div class="header-social-icons clr">
                        <a href="<?php echo $g_plus; ?>" target="_blank">
                            <div class="social-icon-dribbble"></div>
                        </a>
                        <a href="<?php echo $facebook; ?>" target="_blank">
                            <div class="social-icon-facebook"></div>
                        </a>
                        <a href="<?php echo $twitter; ?>" target="_blank">
                            <div class="social-icon-twitter"></div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>  
</header>

<header class="header-container">
    <div class="header-elements container">
        <div class="row span_12 no-margin-col">

            <div class="col span_3">
                <div class="logo">
                    <img src="<?php echo base_url(); ?>asset/web/logo.png" alt="logo">
                </div>
            </div>

            <div class="col span_9">
                <nav class="menu-system">
                    <ul class="absolution">
                        <li>
                            <a href="<?php echo base_url(); ?>">
                                <span class="icon"><span class="menu-icon menu-icon-home"></span></span>HOME
                            </a>
                        </li>                      
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/web/contact">
                                <span class="icon"><span class="menu-icon menu-icon-contact"></span></span>CONTACT
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</header>

<section class="title-large no-margin">
    <div class="title-large-inner">
        <div class="container clr">
            <div class="row span_12 no-margin-col">

                <div class="col span_6">
                    <h2>Contact <span class="text-bold"> Us</span></h2>                    
                </div>

                <div class="col span_6">
                    <ul class="inline-ul breadcrumb">
                        <li><a href="<?php echo base_url(); ?>index.php/web/contact">Contact</a></li>                        
                    </ul>
                </div>

            </div>
        </div>      
    </div>            
</section>
<!--
<div id="map"></div> -->
<section class="container clr">
    <div class="row"><br />
        <div class="col span_12">
            <h3 class="text-center no-margin tif-text">Contoh Aplikasi Website, Weblog, Blog dengan codeiniter 2.1.3 oleh Ahmad Rizal Afani</h3>
            <h3 class="text-center tif-text">Visit my blog :  <a href="http://calonpresident.blogspot.com" style="font-size:17px; color:#89bf42;" target="_blank">calonpresident.blogspot.com</a></h3>
        </div>
    </div>

    <div class="row">
        <div class="col span_8">
            <div class="title-medium">
                <h3>Send Message</h3>
            </div>

            <form action="#">
                <div class="row">

                    <div class="col span_4">                        
                        <input class="default-input name" type="text" name="name" placeholder="Name">
                    </div>
                    <div class="col span_4">                        
                        <input class="default-input email" type="text" name="email" placeholder="Email">
                    </div>
                    <div class="col span_4">                        
                        <input class="default-input website" type="text" name="website" placeholder="Website">
                    </div>

                </div>
                <div class="row">
                    <div class="col span_12">
                        <ul>                        
                        <li><textarea class="default-input pen" rows="4" cols="50"></textarea></li>
                        </ul>
                    </div>
                </div>
                <a class="button-a" href="mailto:<?php echo $email; ?>">
                    <span class="button green small">Small</span>
                </a>    
            </form>
        </div>

        <div class="col span_4">
            <div class="title-medium">
                <h3>Informations</h3>
            </div>
			<div style="text-align:justify;">
				<?php echo $info; ?>
			<div>
        </div>

    </div>

</section>
<footer class="footer-container">
    <div class="container">
        <div class="widget-area row">

            <div class="col span_3">
                <div class="widget text-widget">
                    <img class="margin-bottom" src="<?php echo base_url(); ?>asset/web/logo.png" alt="logo">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed suscipit metus. In sed risus leo, eu aliquet est.</p>
                    <div class="footer-social-icons small clr">
                        <a href="<?php echo $g_plus; ?>" target="_blank">
                            <div class="social-icon-dribbble"></div>
                        </a>
                        <a href="<?php echo $facebook; ?>" target="_blank">
                            <div class="social-icon-facebook"></div>
                        </a>
                        <a href="<?php echo $twitter; ?>" target="_blank">
                            <div class="social-icon-twitter"></div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col span_3">
                <div class="widget widget_recent_entries">
                    <div class="title-small clr">
                        <h5>Recent <span class="text-bold">Posts</span></h5>
                    </div>
                    <ul>
                        <?php foreach($recent_post as $r){ ?>
                        <li><a href="<?php echo base_url(); ?>index.php/web/detail/<?php echo $r['kode_content']; ?>"><?php echo $r['judul_content']; ?></a></li>
						<?php } ?>
                    </ul>
                </div>
            </div>

            <div class="col span_3">
                <div class="title-small clr">
                    <h5>Follow me <span class="text-bold">on Twitter</span></h5>
                </div>
				<object type="application/x-shockwave-flash" data="http://www.twpics.com/BUTTON8/twitbutton.swf" width="200" height="200">
				<param name="movie" value="http://www.twpics.com/BUTTON8/twitbutton.swf"></param><param name="allowscriptaccess" value="always"></param>
				<param name="menu" value="false"></param><param name="wmode" value="transparent"></param>
				<param name="flashvars" value="username=<?php echo $temp_user_twitter[3]; ?>"></param>
				<a href="http://www.gamblinginsider.ca/casino-games/" title="find casino games at GamblingInsider">find casino games at GamblingInsider</a>
				<embed src="http://www.twpics.com/BUTTON8/twitbutton.swf" type="application/x-shockwave-flash" allowscriptaccess="always" width="200" height="200" menu="false" wmode="transparent" flashvars="username=<?php echo $temp_user_twitter[3]; ?>"></embed></object>
			</div>

            <div class="col span_3">
                <div class="title-small clr">
                    <h5>Find us on <span class="text-bold">facebook</span></h5>
                </div>
                <div class="flickr clr">
                    <div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=309896558224";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
					</script>			
					<div class="fb-like-box" data-href="<?php echo $fb_fans_page; ?>" data-width="300" data-height="180" data-show-faces="true" data-stream="false" data-header="false" style="border:"></div>
					</div>
				</div>
        </div>
    </div>

    <div class="copyright-container">
        <div class="container">
            <p class="white-text">© Copyright Absolution by<a target="blank" href="www.rubidium-style.html" class="green-hover"> Rubidium Style </a>- 2013</p>
        </div>
    </div>

</footer>
<div class="to-top"></div>

<script type="text/javascript" src="<?php echo base_url(); ?>asset/web/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/web/js/jquery.gmap-1.1.0-min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/web/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/web/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/web/js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/web/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/web/js/jquery.isotope.min.js"></script>  
<script type="text/javascript" src="<?php echo base_url(); ?>asset/web/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/web/js/modernizr.custom.17475.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/web/js/jquery.mobilemenu.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/web/js/jquery.tweet.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/web/js/main.js"></script>

</body>
</html>