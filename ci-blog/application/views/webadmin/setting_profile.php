
<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="author" content="Ahmad Rizal Afani (calonpresident.blogspot.com)">

    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />        
    <![endif]-->                
    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/ico" href="favicon.ico"/>
    
    <link href="<?php echo base_url(); ?>asset/webadmin/css/stylesheets.css" rel="stylesheet" type="text/css" />
    <!--[if lte IE 7]>
        <link href="<?php echo base_url(); ?>asset/webadmin/css/ie.css" rel="stylesheet" type="text/css" />
        <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/other/lte-ie7.js'></script>
    <![endif]-->     
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/jquery/jquery-1.9.1.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/jquery/jquery-migrate-1.1.1.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/jquery/globalize.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/other/excanvas.js'></script>
    
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/other/jquery.mousewheel.min.js'></script>
        
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/bootstrap/bootstrap.min.js'></script>
    
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/cookies/jquery.cookies.2.2.0.min.js'></script>    
    
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>    
    
    <script type='text/javascript' src="<?php echo base_url(); ?>asset/webadmin/js/plugins/uniform/jquery.uniform.min.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>asset/webadmin/js/plugins/select/select2.min.js"></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/tagsinput/jquery.tagsinput.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/maskedinput/jquery.maskedinput-1.3.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/multiselect/jquery.multi-select.min.js'></script>
    
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/shbrush/XRegExp.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/shbrush/shCore.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/shbrush/shBrushXml.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/shbrush/shBrushJScript.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/shbrush/shBrushCss.js'></script>    
    
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/charts.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/actions.js'></script>
    
	<script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/validationEngine/languages/jquery.validationEngine-en.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/validationEngine/jquery.validationEngine.js'></script>
</head>
<body>    
    <div id="loader"><img src="<?php echo base_url(); ?>asset/webadmin/img/loader.gif"/></div>
    <div class="wrapper">
        
        <div class="sidebar">
            
            <div class="top">
                <a href="<?php echo base_url(); ?>" target="_blank" class="logo"></a>
                <div class="search">
                    <div class="input-prepend">
                        <span class="add-on orange"><span class="icon-search icon-white"></span></span>
                        <input type="text" placeholder="search..."/>                                                      
                    </div>            
                </div>
            </div>
            <div class="nContainer">                
                <ul class="navigation">         
                    <li><a href="<?php echo base_url(); ?>index.php/webadmin/" class="blblue">Dashboard</a></li>
                    <li>
                        <a href="#" class="blyellow">Post</a>
                        <div class="open"></div>
                        <ul>
							<li><a href="<?php echo base_url(); ?>index.php/webadmin/newcontent">Tulis Baru</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/webadmin/content">Semua Post</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/webadmin/contentpublish">Diterbitkan</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/webadmin/contentdraft">Draft</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url(); ?>index.php/webadmin/labels" class="blgreen">Label</a></li>               
                    <li><a href="<?php echo base_url(); ?>index.php/webadmin/users" class="blred">User</a></li>                
                    <li>
                        <a href="#" class="bldblue">Statistik</a>
                        <div class="open"></div>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>index.php/webadmin/statistikpost">Post</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/webadmin/statistikvisitor">Visitor</a></li>                    
                        </ul>
                    </li>
					<li>
                    <a href="#" class="blpurple">Comment</a>
						<div class="open"></div>
						<ul>
							<li><a href="<?php echo base_url(); ?>index.php/webadmin/listcomment">List comment</a></li>
						</ul>
					</li>
                    <li class="active">
                        <a href="#" class="blorange">Setting</a>
                        <div class="open"></div>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>index.php/webadmin/settingdasar">Setting dasar</a></li>
                            <li class="active"><a href="<?php echo base_url(); ?>index.php/webadmin/settingprofile">Setting profile anda</a></li>
							<li><a href="<?php echo base_url(); ?>index.php/webadmin/settingpassword">Setting password anda</a></li>
                        </ul>                    
                    </li>
                </ul>
                <a class="close">
                    <span class="ico-remove"></span>
                </a>
            </div>
            <div class="widget">
                <div class="datepicker"></div>
            </div>
            
        </div>
        
        <div class="body">
            <ul class="navigation">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/webadmin/" class="button">
                        <div class="icon">
                            <span class="ico-monitor"></span>
                        </div>                    
                        <div class="name">Dashboard</div>
                    </a>                
                </li>
                <li>
                    <a href="#" class="button yellow">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-copy"></span>
                        </div>                    
                        <div class="name">Post</div>
                    </a>          
                    <ul class="sub">
						<li><a href="<?php echo base_url(); ?>index.php/webadmin/newcontent">Tulis Baru</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/webadmin/content">Semua Post</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/webadmin/contentpublish">Diterbitkan</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/webadmin/contentdraft">Draft</a></li>
                    </ul>
                </li>                
                <li>
                    <a href="<?php echo base_url(); ?>index.php/webadmin/labels" class="button green">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-bookmark-3"></span>
                        </div>                    
                        <div class="name">Label</div>
                    </a>                   
                </li>                        
                <li>
                    <a href="<?php echo base_url(); ?>index.php/webadmin/users" class="button red">
                        <div class="icon">
                            <span class="ico-user"></span>
                        </div>                    
                        <div class="name">Users</div>
                    </a>                
                </li>                
                <li>
                    <a href="#" class="button dblue">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-chart-4"></span>
                        </div>                    
                        <div class="name">Statistic</div>
                    </a> 
                    <ul class="sub">
                        <li><a href="<?php echo base_url(); ?>index.php/webadmin/statistikpost">Post</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/webadmin/statistikvisitor">Visitor</a></li>    
                    </ul>                                        
                </li>
				<li>
                    <a href="#" class="button purple">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-chat-3"></span>
                        </div>                    
                        <div class="name">Comment</div>
                    </a>                  
                    <ul class="sub">
                        <li><a href="<?php echo base_url(); ?>index.php/webadmin/listcomment">List comment</a></li>
                    </ul>                                        
                </li>
                <li>
                    <a href="#" class="button orange">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-cog-2"></span>
                        </div>                    
                        <div class="name">Setting</div>
                    </a>                
                    <ul class="sub">
                        <li><a href="<?php echo base_url(); ?>index.php/webadmin/settingdasar">Setting dasar</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/webadmin/settingprofile">Setting profile anda</a></li>
						<li><a href="<?php echo base_url(); ?>index.php/webadmin/settingpassword">Setting password anda</a></li>
                    </ul>                                        
                </li>                
                <li>
                    <div class="user">
                        <a href="#" class="name">
                            <span><?php echo $session['pengguna']; ?></span>
                            <span class="sm">administrator</span>
                        </a>
                    </div>
					<div class="buttons">
                        <div class="sbutton blue">
                            <a href="<?php echo base_url(); ?>index.php/webadmin/destroyingsession" onclick="return confirm('yakin mau keluar ?');" title="logout"><span class="ico-off"></span></a>
                        </div>                        
                    </div>
                    <div class="buttons">
                        <div class="sbutton green navButton">
                            <a href="#"><span class="ico-align-justify"></span></a>
                        </div>
                        <div class="sbutton blue">
                            <a href="#"><span class="ico-cogs"></span></a>
                            <div class="popup">
                                <div class="arrow"></div>
                                <div class="row-fluid">
                                    <div class="row-form">
                                        <div class="span12"><strong>SETTINGS</strong></div>
                                    </div>                                    
                                    <div class="row-form">
                                        <div class="span4">Navigation:</div>
                                        <div class="span8"><input type="radio" class="cNav" name="cNavButton" value="default"/> Default <input type="radio" class="cNav" name="cNavButton" value="bordered"/> Bordered</div>
                                    </div>                                    
                                    <div class="row-form">
                                        <div class="span4">Content:</div>
                                        <div class="span8"><input type="radio" class="cCont" name="cContent" value=""/> Responsive <input type="radio" class="cCont" name="cContent" value="fixed"/> Fixed</div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>                        
                    </div>
                </li>
               
            </ul>
            <div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-pen-2"></span>
                    </div>
                    <h1>Setting Profile<small>your profile</small></h1>
                </div>
				<div class="block">
					<?php if($message != 0 && $message != -1){ ?>
						<div class="alert alert-success">            
							<strong>Well done!</strong> Operasi berhasil...
						</div>
					<?php }else if($message == 0){ ?>
						<div class="alert alert-error">            
							<strong>Oh snap (-_-") !</strong> terjadi kesalahan... 
						</div>
					<?php } ?>
				<div>
                <div class="row-fluid">
					<form method="post" id="validate" action="<?php echo base_url(); ?>index.php/webadmin/saveprofile">
                    <div class="span7"> 
                        <div class="block">
                            <div class="head">                                
                                <h2>Setting for your profile and your account</h2>
                                <ul class="buttons">             
                                    <li><a href="#" onClick="source('form_default'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                </ul>                                  
                            </div>                                        
                            <div class="data-fluid">
                                <div class="row-form">
                                    <div class="span3">Username :</div>
                                    <div class="span9"><input type="text" name="username" value="<?php echo $username; ?>" readonly="readonly" placeholder="username"/></div>
                                </div>
                                <div class="row-form">
                                    <div class="span3">Nama pengguna:</div>
									<div class="span9"><input class="validate[required]" type="text" name="nama_lengkap" value="<?php echo $nama_lengkap; ?>" placeholder="nama pengguna"/></div>
                                </div>
                                <div class="row-form">
                                    <div class="span3">Facebook (url) :</div>
                                    <div class="span9"><input type="text" name="facebook" value="<?php echo $fb; ?>" placeholder="facebook"/></div>
                                </div>                    
                                <div class="row-form">
                                    <div class="span3">Google+ (url):</div>
                                    <div class="span9"><input type="text" name="g_plus" value="<?php echo $g_plus; ?>" placeholder="google+"/></div>
                                </div>
								<div class="row-form">
                                    <div class="span3">Twitter (url):</div>
                                    <div class="span9"><input type="text" name="twitter" value="<?php echo $twitter; ?>" placeholder="twitter"/></div>
                                </div>
								<div class="row-form">
                                    <div class="span3">Tentang Anda : </div>
                                    <div class="span9"><textarea name="about"><?php echo $about; ?></textarea></div>
                                </div>
								<div class="row-form">
                                    <div class="span3">Password (confirm)</div>
                                    <div class="span9"><input class="validate[required]" type="password" name="password" placeholder="passwords"/></div>
                                </div>
								 <div class="row-form">
									<div class="span3"></div>
                                    <div class="span9">
									<button class="btn btn-danger" style="float:right;" onclick="$('#validate').submit();" type="button">Simpan 
									<span class="icon-lock icon-white"></span></button>
									<input type="hidden" name="kode_user" value="<?php echo $kode_user; ?>" />
									<!--<input type="submit" value="Simpan" class="btn btn-danger" style="float:right;" />-->
									</div>
                                </div>
                            </div>
                        </div>
                    </div></form>
				</div>                
                
            </div>
            
        </div>
        
    </div>
    
    <div class="dialog" id="source" style="display: none;" title="Source"></div>    
    
</body>
</html>
