<!DOCTYPE html>
<!-- Template Name: Rapido - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.0 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title><?php echo ($this->pageTitle) ? CHtml::encode($this->pageTitle) : "set a pageTitle"; ?></title>
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="Human Pixel Community" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<?php 
		$detect = new Mobile_Detect;
		$isMobile = $detect->isMobile();
		$cs = Yii::app()->getClientScript();
		$themeAssetsUrl = Yii::app()->theme->baseUrl. '/assets';
		$layoutPath = 'webroot.themes.'.Yii::app()->theme->name.'.views.layouts.';
		//$cs->registerCssFile('http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,200,100,800');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/bootstrap/css/bootstrap.min.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/font-awesome/css/font-awesome.min.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/font-awesome-custom/css/font-awesome.css');
		
		$cs->registerCssFile($themeAssetsUrl.'/plugins/iCheck/skins/all.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/perfect-scrollbar/src/perfect-scrollbar.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/animate.css/animate.min.css');
		//<!-- end: MAIN CSS -->
		//<!-- start: CSS REQUIRED FOR SUBVIEW CONTENTS -->
		$cs->registerCssFile($themeAssetsUrl.'/plugins/owl-carousel/owl-carousel/owl.carousel.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/owl-carousel/owl-carousel/owl.theme.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/owl-carousel/owl-carousel/owl.transitions.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/summernote/dist/summernote.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/fullcalendar/fullcalendar/fullcalendar.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/toastr/toastr.min.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/bootstrap-select/bootstrap-select.min.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/DataTables/media/css/DT_bootstrap.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css');

		$cs->registerCssFile($themeAssetsUrl.'/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/bootstrap-modal/css/bootstrap-modal.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/ladda-bootstrap/dist/ladda.min.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/ladda-bootstrap/dist/ladda-themeless.min.css');

		//start: CSS REQUIRED FOR slider ONLY -->
		$cs->registerCssFile($themeAssetsUrl.'/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/slider/css/slider.css');
		$cs->registerCssFile($themeAssetsUrl.'/plugins/jQRangeSlider/css/classic-min.css');
		//<!-- end: CSS REQUIRED FOR slider ONLY -->
		$cs->registerCssFile($themeAssetsUrl.'/plugins/flexSlider/flexslider.css');
		//<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		//<!-- start: CORE CSS -->
		$cs->registerCssFile($themeAssetsUrl.'/css/styles.css');
		$cs->registerCssFile($themeAssetsUrl.'/css/styles-responsive.css');
		$cs->registerCssFile($themeAssetsUrl.'/css/plugins.css');

		?>
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/css/themes/<?php echo (isset($this->themeStyle)) ? $this->themeStyle : "theme-default"?>.css" type="text/css" id="skin_color">
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/css/print.css" type="text/css" media="print"/>
		<!-- end: CORE CSS -->
		<link rel='shortcut icon' type='image/x-icon' href="<?php echo (isset($this->module->assetsUrl) ) ? $this->module->assetsUrl : ""?>/images/favicon.ico" />
		<script>
		   var initT = new Object();
		   //var showDelaunay = true;
		   // A supprimer une fois le redirect corrigé 
		   var baseUrl = "<?php echo Yii::app()->getRequest()->getBaseUrl(true);?>";
		   var themeUrl = "<?php echo Yii::app()->theme->baseUrl;?>";
		   var moduleId = "<?php echo (isset($this->module->id) ) ? $this->module->id : '' ?>";
		   var personMap = <?php echo json_encode( (isset($this->person)) ? $this->person : array())?>;
		   <?php if(YII_DEBUG){ ?>
	       var debugMap = [
		       { "userId":"<?php echo Yii::app()->session['userId']?>"},
		       { "userEmail":"<?php echo Yii::app()->session['userEmail']?>"}
	       ];
	       <?php } ?>
		   
		</script>
		
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body>
		<?php $this->renderPartial($layoutPath.'topSlidingBar');?>
		<div class="main-wrapper">
			<?php $this->renderPartial($layoutPath.'topbar');?>
			<?php 
			$sidemenuL = $layoutPath.'sideMenuL';
			$this->renderPartial($sidemenuL);
			?>
			<?php $this->renderPartial($layoutPath.'sideMenuR');?>

			<!-- start: MAIN CONTAINER -->
			<div class="main-container inner">
				<!-- start: PAGE -->
				<div class="main-content">
					<!-- start: PANEL CONFIGURATION MODAL FORM -->
					<div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;
									</button>
									<h4 class="modal-title">Panel Configuration</h4>
								</div>
								<div class="modal-body">
									Here will be a configuration form
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">
										Close
									</button>
									<button type="button" class="btn btn-primary">
										Save changes
									</button>
								</div>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>
					<!-- /.modal -->
					<!-- end: SPANEL CONFIGURATION MODAL FORM -->
					<div class="container">
						<!-- start: PAGE HEADER -->
						<?php 
						$path = '.views.layouts.toolbar';
						if($isMobile) { 
						    $path = '.views.layouts.toolbarMobile'; 
						} 
						$this->renderPartial('webroot.themes.'.Yii::app()->theme->name.$path);
						//<!-- end: PAGE HEADER -->
						
						if(!count($this->sidebar2 ))
							echo '<div class="space20"></div> ';
						//$this->renderPartial($layoutPath.'breadcrumb');?>
						
						<!-- start: PAGE CONTENT -->
						<div class="row page_content_wrap">
							<span class="page_navigation_bg col-md-3 hidden-xs hidden-sm <?php echo (count($this->sidebar2 )) ? "" : "hide" ?>"></span>
							<!-- start: MODULE  MENU -->
							<div class="<?php echo (count($this->sidebar2 )) ? "col-md-3" : "hide" ?>">
								<?php $this->renderPartial($layoutPath.'menuModule'); ?>
							</div>
							<!-- end: MODULE MENU -->
							<div class="col-md-<?php echo (count($this->sidebar2 )) ? "9" : "12" ?>">
								<section class="page_content">
									<?php echo $content;  ?>
								</section>
							</div>
						</div>
						
						<!-- end: PAGE CONTENT-->
					</div>
					<div class="subviews">
						<div class="subviews-container"></div>
					</div>
				</div>
				<!-- end: PAGE -->
			</div>
			<!-- end: MAIN CONTAINER -->
			<?php 
			$this->renderPartial($layoutPath.'footer');
			$this->renderPartial($layoutPath.'subview');
			$this->renderPartial($layoutPath.'modals');
			if (isset($this->subviews)) {
				foreach( $this->subviews as $item )
		        {
		            $this->renderPartial(Yii::app()->params["modulePath"].$this->module->id.".views.".$item);
		        }
		    }
			?>
		</div>
		<?php
		/*echo "<!-- start: MAIN JAVASCRIPTS -->";
		echo "<!--[if lt IE 9]>";
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/respond.min.js' , CClientScript::POS_HEAD);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/excanvas.min.js' , CClientScript::POS_HEAD);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/jQuery/jquery-1.11.1.min.js' , CClientScript::POS_HEAD);
		echo "<![endif]-->";*/
		echo "<!--[if gte IE 9]><!-->";
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/jQuery/jquery-2.1.1.min.js' , CClientScript::POS_HEAD);
		echo "<!--<![endif]-->";
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/bootstrap/js/bootstrap.min.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/blockUI/jquery.blockUI.js' , CClientScript::POS_END);
	    
	    $cs->registerScriptFile($themeAssetsUrl.'/plugins/perfect-scrollbar/src/jquery.mousewheel.js' , CClientScript::POS_END);
	    $cs->registerScriptFile($themeAssetsUrl.'/plugins/perfect-scrollbar/src/perfect-scrollbar.js' , CClientScript::POS_END);
	    $cs->registerScriptFile($themeAssetsUrl.'/plugins/bootbox/bootbox.min.js' , CClientScript::POS_END);
	    $cs->registerScriptFile($themeAssetsUrl.'/plugins/jquery.scrollTo/jquery.scrollTo.min.js' , CClientScript::POS_END);
	    $cs->registerScriptFile($themeAssetsUrl.'/plugins/ScrollToFixed/jquery-scrolltofixed-min.js' , CClientScript::POS_END);
	    $cs->registerScriptFile($themeAssetsUrl.'/plugins/jquery.appear/jquery.appear.js' , CClientScript::POS_END);
	    $cs->registerScriptFile($themeAssetsUrl.'/plugins/jquery-cookie/jquery.cookie.js' , CClientScript::POS_END);
	    $cs->registerScriptFile($themeAssetsUrl.'/plugins/velocity/jquery.velocity.min.js' , CClientScript::POS_END);
	    $cs->registerScriptFile($themeAssetsUrl.'/plugins/TouchSwipe/jquery.touchSwipe.min.js' , CClientScript::POS_END);
		//<!-- end: MAIN JAVASCRIPTS -->
		//<!-- start: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/iCheck/jquery.icheck.min.js' , CClientScript::POS_END);
	    $cs->registerScriptFile($themeAssetsUrl.'/plugins/moment/min/moment.min.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/owl-carousel/owl-carousel/owl.carousel.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/jquery-mockjax/jquery.mockjax.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/toastr/toastr.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/bootstrap-modal/js/bootstrap-modal.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/bootstrap-modal/js/bootstrap-modalmanager.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/jquery-validation/dist/jquery.validate.min.js' , CClientScript::POS_END);
		
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/fullcalendar/fullcalendar/fullcalendar.min.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/bootstrap-select/bootstrap-select.min.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/ladda-bootstrap/dist/spin.min.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/ladda-bootstrap/dist/ladda.min.js' , CClientScript::POS_END);
		
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js' , CClientScript::POS_END);

		$cs->registerScriptFile($themeAssetsUrl.'/plugins/DataTables/media/js/jquery.dataTables.min.1.10.4.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/DataTables/media/js/DT_bootstrap.js' , CClientScript::POS_END);

		$cs->registerScriptFile($themeAssetsUrl.'/plugins/truncate/jquery.truncate.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/summernote/dist/summernote.min.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/bootstrap-daterangepicker/daterangepicker.js' , CClientScript::POS_END);

		$cs->registerScriptFile($themeAssetsUrl.'/js/subview.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/js/jquery.dynForm.js' , CClientScript::POS_END);
		//$cs->registerScriptFile($themeAssetsUrl.'/js/global-subviews.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/js/sig/sig.js' , CClientScript::POS_END);
		
		//$cs->registerCssFile($themeAssetsUrl.'/plugins/jQuery-Tags-Input/jquery.tagsinput.css');
		//$cs->registerScriptFile(Yii::app()->request->baseUrl. '/js/bootstrap/bootstrap-typeahead.js' , CClientScript::POS_END);
		//$cs->registerScriptFile($themeAssetsUrl.'/plugins/jQuery-Tags-Input/jquery.tagsinput.js' , CClientScript::POS_END);
		$cs->registerCssFile($themeAssetsUrl.'/plugins/select2/select2.css');
		//$cs->registerScriptFile(Yii::app()->request->baseUrl. '/js/bootstrap/bootstrap-typeahead.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/select2/select2.min.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/autosize/jquery.autosize.min.js' , CClientScript::POS_END);

		//mainly used by ajax pods
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/jquery.pulsate/jquery.pulsate.min.js' , CClientScript::POS_END);

		$cs->registerScriptFile(Yii::app()->request->baseUrl. '/js/pace.min.js' , CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->request->baseUrl. '/js/api.js' , CClientScript::POS_END);

		//<!-- start: JAVASCRIPTS REQUIRED FOR sliders -->
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/jQRangeSlider/jQAllRangeSliders-min.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/modernizr/modernizr.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/slider/js/bootstrap-slider.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/jQuery-Knob/js/jquery.knob.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/js/ui-sliders.js' , CClientScript::POS_END);
		//<!-- end: JAVASCRIPTS REQUIRED FOR sliders -->

		$cs->registerScriptFile($themeAssetsUrl.'/plugins/nvd3/lib/d3.v3.js' , CClientScript::POS_END);
		$cs->registerScriptFile($themeAssetsUrl.'/plugins/flexSlider/jquery.flexslider-min.js', CClientScript::POS_END);
		//D3 script
		$cs->registerScriptFile($themeAssetsUrl.'/js/additional.js' , CClientScript::POS_END);

		$path = '/assets/js/main.js';
		$detect = new Mobile_Detect;
	    $isMobile = $detect->isMobile();
	      
	    if($isMobile)
	    	$path = '/assets/js/mainMobile.js'; 
		
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.$path , CClientScript::POS_END);
		?>
		<!-- end: CORE JAVASCRIPTS  -->
		<script type="text/javascript">
		
		paceOptions = {  
			  // Configuration goes here. Example: 
			  ajax: false, 
			  elements: false,  
			} 
		jQuery(document).ready(function() {
			Main.init();
			Additional.init();
			//SVGlobal.init();
			//Sig.init();
			toastr.options = {
			  "closeButton": false,
			  "positionClass": "toast-bottom-right",
			  "onclick": null,
			  "showDuration": "1000",
			  "hideDuration": "1000",
			  "timeOut": "5000",
			  "extendedTimeOut": "1000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			};
			//Connecting pace loader toall ajax requests 
			$(document).ajaxStart(function() { Pace.restart(); });
		});
		</script>
	</body>
	<!-- end: BODY -->
</html>