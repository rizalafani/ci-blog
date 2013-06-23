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

    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/cleditor/jquery.cleditor.js'></script>        
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/webadmin/js/plugins/ckeditor/ckeditor.js'></script>    
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
                    <li class="active">
                        <a href="#" class="blyellow">Post</a>
                        <div class="open"></div>
                        <ul>
							<li class="active"><a href="<?php echo base_url(); ?>index.php/webadmin/newcontent">Tulis Baru</a></li>
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
                    <li>
                        <a href="#" class="blorange">Setting</a>
                        <div class="open"></div>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>index.php/webadmin/settingdasar">Setting dasar</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/webadmin/settingprofile">Setting profile anda</a></li>
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
                        <span class="ico-window"></span>
                    </div>
                    <h1><?php if($status == "baru"){ ?>Write <?php }else{ ?> Edit <?php } ?> Post<small>calonpresident.blogspot.com</small></h1>
                </div>
				<!-- start -->
				<form method="post" id="validate" action="<?php echo base_url(); ?>index.php/webadmin/savecontent">
				<div class="row-fluid">
					<div class="span6">
                        <div class="block">
                            <div class="data-fluid">                                
                                <div class="row-form">
                                    <div class="span3"> Judul Post:</div>
                                    <div class="span9"><input type="text" class="validate[required]" name="judul_post" value="<?php echo $judul_content; ?>" placeholder="judul post"/></div>
                                </div>
                                <div class="row-form">
                                    <div class="span3">Header Post:</div>
                                    <div class="span9">                            
                                        <div class="input-append">
                                           <!-- <input type="file" name="file"/>-->
                                            <input type="text" class="validate[required]" id="header_post" name="header_post" value="<?php echo $header_post; ?>" placeholder="pilih file lebih dari(650 X 400)"/>
                                            <button class="btn btn-success" id="btnbrowse">Browse</button>
                                        </div>                            
                                    </div>
                                </div> 
                                <div class="row-form">
                                    <div class="span3">Deskripsi Penelusuran:</div>
                                    <div class="span9"><textarea placeholder="deskripsi untuk google" name="deskripsi"><?php echo $deskripsi; ?></textarea></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="block">
                            <div class="data-fluid">								
                                <div class="row-form">
                                    <div class="span3">Status:</div>
                                    <div class="span9">
										<?php $arr_status = array('Publish','Draft'); ?>
                                        <select name="status">
										<?php 
											foreach($arr_status as $r){ 
												if(strtolower($r) == $status_content){
										?>
                                            <option selected="selected" value="<?php echo strtolower($r); ?>"><?php echo $r; ?></option>
										<?php }else{ ?>
											<option value="<?php echo strtolower($r); ?>"><?php echo $r; ?></option>
										<?php } } ?>
                                        </select>
                                    </div>
                                </div>                  

                                <div class="row-form">
                                    <div class="span3">Labels (Kategori):</div>
                                    <div class="span9">
                                        <select name="labels[]" multiple="multiple" class="validate[required] select" style="width: 100%;">
										<?php 
											foreach($label as $l){
												if(!in_array($l['kode_label'],$label_post)){
										?>
                                            <option value="<?php echo $l['kode_label'] ?>"><?php echo $l['judul_label'] ?></option>
										<?php } else { ?>
											<option selected="selected" value="<?php echo $l['kode_label'] ?>"><?php echo $l['judul_label'] ?></option>
										<?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row-form">
                                    <div class="span3">Tags input:</div>
                                    <div class="span9">
                                        <input type="text" class="validate[required] tags" name="tags" value="<?php echo $tags; ?>"/>
                                    </div>
                                </div>
								<div class="toolbar bottom tar">
                                    <div class="btn-group">
										<button class="btn btn-primary" type="button" onclick="window.open('<?php echo base_url(); ?>index.php/webadmin/pratinjau','_blank')">Pratinjau 
										<span class="icon-zoom-in icon-white"></span></button>
                                        <button class="btn btn-info" type="button" onClick="$('#validate').validationEngine('hide');">Refresh
										<span class="icon-refresh icon-white"></span></button>
                                        <button class="btn btn-danger" style="float:right;" id="btnsubmit" onclick="$('#validate').submit();">Simpan 
										<span class="icon-lock icon-white"></span></button>
										<input type="hidden" value="<?php echo $kode_content; ?>" name="kode_content" />
										<input type="hidden" value="<?php echo $status; ?>" name="status_simpan" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<!-- end -->
                <div class="row-fluid">

                    <div class="span12">   
                        <div class="block">
                            <div class="head orange">
                                <h2>CKEditor</h2>
                                <ul class="buttons">             
                                    <li><a href="#" onClick="source('editor_ck'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                </ul>                                                                
                            </div>
                            <div class="data-fluid">
                                <textarea id="ckeditor" name="isi" style="height: 800px;"><?php echo $isi;?></textarea>
                            </div>
                        </div>
                    </div>
                </div>  </form>                 
                
            </div>
            
        </div>
        
    </div>
	<form id="pratinjo" target="_blank" action="<?php echo base_url(); ?>index.php/webadmin/cetak">
	</form>
    
    <script>
		$(document).ready(function(){
			$.post('<?php echo base_url(); ?>index.php/webadmin/session_preview',$("#validate").serialize(),function(data){});
			setInterval(function(){				
				$.post('<?php echo base_url(); ?>index.php/webadmin/session_preview',$("#validate").serialize(),function(data){});
			},1000);
			
			$("#btnbrowse").click(function(){
				window.KCFinder = {
					callBack: function(url) {
						$('#header_post').val(url);
						window.KCFinder = null;					
					}
				};
				window.open('<?php echo base_url(); ?>asset/webadmin/js/kcfinder/browse.php?type=images', 'kcfinder_textbox',
					'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
					'resizable=1, scrollbars=0, width=800, height=600'
				);
				return false;
			});
			
			/*$("#btnsubmit").click(function(){
				alert("submit");
				$('#validate').submit();				
			});*/
		});
        var ckeditor = CKEDITOR.replace('ckeditor',{
			height:'600px',
			filebrowserBrowseUrl : '<?php echo base_url(); ?>asset/webadmin/js/kcfinder/browse.php?type=files',
			filebrowserImageBrowseUrl : '<?php echo base_url(); ?>asset/webadmin/js/kcfinder/browse.php?type=images',
			filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>asset/webadmin/js/kcfinder/browse.php?type=flash',
			filebrowserUploadUrl : '<?php echo base_url(); ?>asset/webadmin/js/kcfinder/upload.php?type=files',
			filebrowserImageUploadUrl : '<?php echo base_url(); ?>asset/webadmin/js/kcfinder/upload.php?type=images',
			filebrowserFlashUploadUrl : '<?php echo base_url(); ?>asset/webadmin/js/kcfinder/upload.php?type=flash'		
		});
        CKEDITOR.disableAutoInline = true;
        CKEDITOR.inline('editable');		
    </script>                            
                                
    <div class="dialog" id="source" style="display: none;" title="Source"></div>    
    
</body>
</html>