
<?php
	HtmlHelper::registerCssAndScriptsFiles(array('/assets/css/menus/multi_tags_scopes.css'), Yii::app()->theme->baseUrl); 
	HtmlHelper::registerCssAndScriptsFiles(array('/js/menus/multi_tags_scopes.js'), $this->module->getParentAssetsUrl()); 
	
	HtmlHelper::registerCssAndScriptsFiles(array('/assets/css/menus/multiscopes.css'), Yii::app()->theme->baseUrl );
	HtmlHelper::registerCssAndScriptsFiles(array( '/js/menus/multitags.js'), $this->module->getParentAssetsUrl());
//	HtmlHelper::registerCssAndScriptsFiles(array( '/js/menus/multiscopes.js'), $this->module->assetsUrl);

	$cities = CO2::getCitiesNewCaledonia();

	$multiscopesStr = "{}";
	if(@$me["multiscopes"]){
		$multiscopesStr = @$me["multiscopes"] ? json_encode(@$me["multiscopes"]) : "{}";
	}else{
		$multiscopesStr = (empty($me) && isset( Yii::app()->request->cookies['multiscopes'] )) ? 
							Yii::app()->request->cookies['multiscopes']->value : "{}";
	}

	if(!empty($multiscopesStr)){
		$newMultiS = array();
		$multiscopesStr = json_decode($multiscopesStr, true);
		foreach ($multiscopesStr as $key => $value) {
			if( MongoId::isValid($key))
				$newMultiS[$key] = $value;
			else if( !empty($value["type"]) && $value["type"] == "cp" && !empty($value["countryCode"]) )
				$newMultiS[$key] = $value;
		}
		$multiscopesStr = ( empty($newMultiS) ? '{}' : json_encode($newMultiS));
	}
?>
<style>
	.modal-content{
		padding-top:15px!important;
	}


    h4.title-scope{
		background-color: #EAE7E7;
		padding: 8px;
		border-radius: 50px;
    }

    .item-scope-name{
        color:white;
    }

    .breadcrum-communexion .btn-decommunecter {
        margin-top: -10px;
        border-radius: 50%;
        height: 30px;
        width: 30px;
        padding: 0px;
        margin-right: 15px;
        margin-left: 20px;
        font-size: 13px;
        border: 1px solid #ea4335;
    }
    
    @media (max-width: 768px) {
        .portfolio-modal .modal-content h2 {
            font-size: 1em;
        }
        .btn-scope h5,
        .btn-scope h4{
            font-size: 0.8em;
        }
        .btn-scope h4{
           margin: 0px;
        }

        h4.title-scope{
            font-size: 0.8em;
        }
    }    
</style>
<div class="portfolio-modal modal fade" id="modalScopes" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="">
            <div class="row">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="modal-body text-center">
						<h3 class="text-red"><!-- <i class="fa fa-bullseye fa-2x"></i> -->
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/cible3.png" height=70><br>
						<?php echo Yii::t("common","<span class='text-dark'>Searching </span>on") ?></h3>
						<h5 class="text-dark"><?php echo Yii::t("common","Select scopes of research") ?></h5>
						
						<div class="col-md-6 col-md-offset-3 no-padding">
              <span class="col-md-12 col-sm-12 col-xs-12 letter-blue padding-10"><i class="fa fa-info-circle"></i> <?php echo Yii::t("docs","You will find only countries, cities, postal codes and zones <b>which match data</b>.<br/> If you <b>don't find</b> a country, a city or a zone, feel free <b>to create an organization, a project, an event, on this geographical zone...</b><br/><br/><b>Then you will find this result here</b>") ?> !</span>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<hr>
								<div class="btn-group  btn-group-justified margin-bottom-10 hidden-xs btn-group-scope-type" role="group">
									<select id="select-country"></select>
								</div>
								<div class="btn-group  btn-group-justified margin-bottom-10 hidden-xs btn-group-scope-type" role="group">
                                    <div class="btn-group btn-group-justified">
                                      <button type="button" class="btn btn-default tooltips active" data-scope-type="city"
                                              data-toggle="tooltip" data-placement="top" 
                                              title="<?php echo Yii::t("common","Add a city") ?>">
                                        <strong><i class="fa fa-bullseye"></i></strong> <?php echo Yii::t("common","City") ?>
                                      </button>
                                    </div>
                                    <div class="btn-group btn-group-justified">
                                      <button type="button" class="btn btn-default tooltips" data-scope-type="cp"
                                              data-toggle="tooltip" data-placement="top" 
                                              title="<?php echo Yii::t("common","Add a postal code") ?>">
                                        <strong><i class="fa fa-bullseye"></i></strong> <?php echo Yii::t("common","Postal code") ?>
                                      </button>
                                    </div>
                                    <div class="btn-group btn-group-justified">
                                      <button type="button" class="btn btn-default tooltips" data-scope-type="zone"
                                              data-toggle="tooltip" data-placement="top" 
                                              title="<?php echo Yii::t("common","Add a zone") ?>">
                                        <strong><i class="fa fa-bullseye"></i></strong> <?php echo Yii::t("common","Zone") ?>
                                      </button>
                                    </div>
                                    <!--<div class="btn-group btn-group-justified">
                                      <button type="button" class="btn btn-default tooltips" data-scope-type="dep"
                                              data-toggle="tooltip" data-placement="top" 
                                              title="Ajouter un département">
                                        <strong><i class="fa fa-bullseye"></i></strong> Département
                                      </button>
                                    </div>
                                    <div class="btn-group btn-group-justified">
                                      <button type="button" class="btn btn-default tooltips" data-scope-type="region"
                                              data-toggle="tooltip" data-placement="top" 
                                              title="Ajouter une région">
                                        <strong><i class="fa fa-bullseye"></i></strong> Région
                                      </button>
                                    </div> -->
                                </div>
                                <div class="btn-group  btn-group-justified margin-bottom-10 visible-xs btn-group-scope-type" role="group">
                                    <div class="btn-group btn-group-justified">
                                      <button type="button" class="btn btn-default tooltips active" data-scope-type="city"
                                              data-toggle="tooltip" data-placement="top" 
                                              title="<?php echo Yii::t("common","Add a city") ?>">
                                        <strong><i class="fa fa-bullseye"></i></strong> <?php echo Yii::t("common","City") ?>
                                      </button>
                                    </div>
                                    <div class="btn-group btn-group-justified">
                                      <button type="button" class="btn btn-default tooltips" data-scope-type="cp"
                                              data-toggle="tooltip" data-placement="top" 
                                              title="<?php echo Yii::t("common","Add a postal code") ?>">
                                        <strong><i class="fa fa-bullseye"></i></strong> <?php echo Yii::t("common","Postal code") ?>
                                      </button>
                                    </div>
                                </div>
                               <!-- <div class="btn-group  btn-group-justified margin-bottom-10 visible-xs btn-group-scope-type" role="group">
                                    <div class="btn-group btn-group-justified">
                                      <button type="button" class="btn btn-default tooltips" data-scope-type="dep"
                                              data-toggle="tooltip" data-placement="top" 
                                              title="Ajouter un département">
                                        <strong><i class="fa fa-bullseye"></i></strong> Département
                                      </button>
                                    </div>
                                    <div class="btn-group btn-group-justified">
                                      <button type="button" class="btn btn-default tooltips" data-scope-type="region"
                                              data-toggle="tooltip" data-placement="top" 
                                              title="Ajouter une région">
                                        <strong><i class="fa fa-bullseye"></i></strong> Région
                                      </button>
                                    </div>
                                </div>-->
                                <div class="btn-group  btn-group-justified margin-bottom-10 visible-xs btn-group-scope-type" role="group">
                                    <div class="btn-group btn-group-justified">
                                      <button type="button" class="btn btn-default tooltips" data-scope-type="zone"
                                              data-toggle="tooltip" data-placement="top" 
                                              title="<?php echo Yii::t("common","Add a zone") ?>">
                                        <strong><i class="fa fa-bullseye"></i></strong> <?php echo Yii::t("common","Zone") ?>
                                      </button>
                                    </div>
                                </div>
                                <div class="col-md-12 no-padding">
                                    <div class="input-group margin-bottom-10">
                                      <span class="input-group-btn">
                                        <div class="input-group-addon" type="button">
                                            <i class="fa fa-plus"></i> <i class="fa fa-bullseye"></i>
                                        </div>
                                      </span>
                                      <input id="input-add-multi-scope" type="text" class="form-control" placeholder="<?php echo Yii::t("common","Add a city") ?> ...">
                                      <div class="dropdown">
                                          <ul class="dropdown-menu" id="dropdown-multi-scope-found">
                                          </ul>
                                      </div>
                                     
                                    </div>
                                </div>
                                
                            </div>
                            <div class="text-left">                    
                                <div id="multi-scope-list-city" class="col-md-12 margin-top-15">
                                    <h4><i class="fa fa-angle-down"></i> <?php echo Yii::t("common","Cities") ?> </h4>
                                    <hr style="margin-top: 10px; margin-bottom: 10px;">
                                </div>
                                <div id="multi-scope-list-cp" class="col-md-12 margin-top-15">
                                    <h4><i class="fa fa-angle-down"></i> <?php echo Yii::t("common","Postal codes") ?></h4>
                                    <hr style="margin-top: 10px; margin-bottom: 10px;">
                                </div>
                                <div id="multi-scope-list-level4" class="col-md-12 margin-top-15">
                                    <h4><i class="fa fa-angle-down"></i> <?php echo Yii::t("common","Administrative zone N°4") ?></h4>
                                    <hr style="margin-top: 10px; margin-bottom: 10px;">
                                </div>
                                <div id="multi-scope-list-level3" class="col-md-12 margin-top-15">
                                    <h4><i class="fa fa-angle-down"></i> <?php echo Yii::t("common","Administrative zone N°3") ?></h4>
                                    <hr style="margin-top: 10px; margin-bottom: 10px;">
                                </div>
                                <div id="multi-scope-list-level2" class="col-md-12 margin-top-15">
                                    <h4><i class="fa fa-angle-down"></i> <?php echo Yii::t("common","Administrative zone N°2") ?></h4>
                                    <hr style="margin-top: 10px; margin-bottom: 10px;">
                                </div>
                                <div id="multi-scope-list-level1" class="col-md-12 margin-top-15">
                                    <h4><i class="fa fa-angle-down"></i> <?php echo Yii::t("common","Country") ?></h4>
                                    <hr style="margin-top: 10px; margin-bottom: 10px;">
                                </div>
                                <div class="col-md-12">
                                    <hr style="margin-top: 10px; margin-bottom: 10px;">
                                    <div class="label label-info label-sm block text-left" id="lbl-info-select-multi-scope"></div>
                                </div>
                            </div>


                            <div class="col-md-12 text-left margin-top-25 hidden-empty">
                                <button class="btnShowAllScope btn btn-default tooltips" 
                                        onclick="javascript:selectAllScopes(true)"
                                        data-toggle="tooltip" data-placement="bottom" 
                                        title="<?php echo Yii::t("common","Select all places") ?>">
                                <i class="fa fa-check-circle"></i> <?php echo Yii::t("common","Select all") ?>
                                </button>
                                <button class="btnHideAllScope btn btn-default tooltips hidden-empty" 
                                        onclick="javascript:selectAllScopes(false)"
                                        data-toggle="tooltip" data-placement="bottom" 
                                        title="<?php echo Yii::t("common","Desactivate all places") ?>">
                                    <i class="fa fa-circle-o"></i> <?php echo Yii::t("common","Desactivate all") ?>
                                </button>

                                <button type="button" class="btn btn-success pull-right" id="btn-validate-scope" data-dismiss="modal">
                                    <i class="fa fa-check"></i> <?php echo Yii::t("common","Validate") ?>
                                </button>
                                <!-- <button type="button" class="btn btn-default pull-right" data-dismiss="modal">
                                <i class="fa fa-times"></i> Annuler
                                </button> -->
                                
                            </div>
                        </div>   


                        <div class="col-md-6 col-md-offset-3  visible-empty text-dark text-left">
                            <blockquote>
                                <?php echo Yii::t("common","To keep contact with a territory, you can fulfil your favorites geographical zones selecting <strong>cities, postal codes, departments, or regions</strong>") ?>.
                            </blockquote>
                            <blockquote> <?php echo Yii::t("docs","<strong>Add, delete, activate, desactivate </strong> your <i>favorite zones</i>") ?>.</blockquote>
                            
                            <blockquote>
                                 <?php echo Yii::t("common","<strong>For instance : </strong>Paris, California, Andalousia, 59000, Haut de France, etc") ?>
                            </blockquote>
                        </div>
                        <div class="col-md-6 col-md-offset-3  text-dark">
                            <?php if(!empty($me) && (!isset($me["address"]["postalCode"]) || $me["address"]["postalCode"] == "" )) { ?>
                                <span class="text-red msg-scope-co">
                                    <strong><i class='fa fa-home'></i> <?php echo Yii::t("common","You are not connected to your city") ; ?> : </strong> <?php echo Yii::t("common","To get quick access to information in your city, to filter and map view local content, please fill your postal code on your profile page.") ; ?><br>
                                    <a href="#person.detail.id.<?php echo Yii::app()->session['userId']; ?>" class="lbh btn btn-sm btn-default margin-top-10"><i class="fa fa-cogs"></i> Paramétrer mon code postal</a>
                                </span>
                            <?php }else if(isset($me["address"]["addressLocality"])){ ?>
                                <span class="text-red msg-scope-co">
                                    <!-- <a href="#person.detail.id.<?php echo Yii::app()->session['userId']; ?>" 
                                      class="lbh btn btn-sm btn-default"><i class="fa fa-cogs"></i></a>  -->
                                      <hr>
                                     <span><i class='fa fa-home'></i> <?php Yii::t("common","You are connected to {what}", array("{what}"=>$me["address"]["addressLocality"])) ?></span>
                                </span>
                            <?php } ?>
                            
                        </div>

                        <?php 
                           // $layoutPath = 'webroot.themes.'.Yii::app()->theme->name.'.views.layouts.';
                            //$this->renderPartial($layoutPath.'scopes/multi_scope', array("me"=>$me, "layoutPath"=>$layoutPath)); 
                        ?>
                                             
                    </div>
                </div>
            </div>
            
            </div>
        </div>
    </div>
</div>

<input id="searchLocalityCITYKEY" type="hidden" val=""/>
<input id="searchLocalityCODE_POSTAL" type="hidden" />
<input id="searchLocalityDEPARTEMENT" type="hidden"/>
<input id="searchLocalityREGION" type="hidden" />
<input id="searchLocalityLEVEL" type="hidden" />
<input id="searchLocalityZONE" type="hidden" />
<input id="searchTags" type="hidden" />
<!-- <div class="item-scope-region hidden" id="scope-max-dep" data-scope-value="Nouvelle-Calédonie"></div> -->


<style>
    .item-scope-dep.disabled{
        color:red;
    }
    .modal{
        z-index:1100;
    }
</style>

<script type="text/javascript">
	var myMultiTags = {};
	var myMultiScopes = <?php echo $multiscopesStr; ?>;

	console.log("myMultiScopes init", myMultiScopes);


    var currentScopeType = "city";
    var timeoutAddScope;
    var interval;
    var loadingScope = true;
    var actionOnSetGlobalScope="filter";
    jQuery(document).ready(function() {
      mylog.log("myMultiScopes 1 ", myMultiScopes);

		var options = "";
    var countryList = <?php echo json_encode(Zone::getListCountry(true)) ?>;
		$.each(countryList, function(key, val){
        if(notEmpty(userConnected) && notEmpty(userConnected.address) && userConnected.address.addressCountry != "" && userConnected.address.addressCountry == val.countryCode)
          options += '<option value="'+val.countryCode+'" checked>'+val.name+'</option>';
        else
          options += '<option value="'+val.countryCode+'">'+val.name+'</option>';
		});

		$("#select-country").html(options);


    $("#dropdown-multi-scope-found").hide();

    $('ul.dropdown-menu').click(function(){ return false });


   // $.each(myMultiScopes, function(key, val){
     //   myMultiScopes[key]["active"] = false;
    //});

    $(".item-scope-select").off().click(function(){

        currentScopeType = "city";
       	if($(this).hasClass("selected")){
            var scopeValue = $(this).data("scope-value");
            if(scopeExists(scopeValue)){
                delete myMultiScopes[scopeValue];
                $(this).removeClass("selected");
            }
        }else{
            addScopeToMultiscope( $(this).data("scope-value"), $(this).data("scope-name"));
            $(this).addClass("selected");
            toastr.success('Ajout de "' + $(this).data("scope-name")+'"');
        }
        checkScopeMax();            
        
        mylog.log("toogle");//, $(this).data("scope-value"));
        showTagsScopesMin(".scope-min-header");
    });

    $('#input-add-multi-scope').filter_input({regex:'[^@#\'\"\`\\\\]'}); //[a-zA-Z0-9_] 
    $('#input-add-multi-scope').keyup(function(){ 
        $("#dropdown-multi-scope-found").show();
        if($('#input-add-multi-scope').val()!=""){
            if(typeof timeoutAddScope != "undefined") clearTimeout(timeoutAddScope);
            timeoutAddScope = setTimeout(function(){ autocompleteMultiScope(); }, 500);
        }
    });
    $('#input-add-multi-scope').click(function(){ //mylog.log("$('#input-add-multi-scope').click");
        if($('#input-add-multi-scope').val()!="")
            setTimeout(function(){$("#dropdown-multi-scope-found").show();}, 500);
    });

    $(".btn-group-scope-type .btn-default").click(function(){
			currentScopeType = $(this).data("scope-type");
			$(".btn-group-scope-type .btn-default").removeClass("active");
			$(this).addClass("active");
			//mylog.log("change scope type :", currentScopeType);
			if(currentScopeType == "city") $('#input-add-multi-scope').attr("placeholder", "<?php echo Yii::t("common","Add a city") ?> ...");
			if(currentScopeType == "cp") $('#input-add-multi-scope').attr("placeholder", "<?php echo Yii::t("common","Add a postal code") ?> ...");
			/*if(currentScopeType == "dep") $('#input-add-multi-scope').attr("placeholder", "Ajouter un département ...");
			if(currentScopeType == "region") $('#input-add-multi-scope').attr("placeholder", "Ajouter une région ...");*/
			if(currentScopeType == "zone") $('#input-add-multi-scope').attr("placeholder", "<?php echo Yii::t("common","Add a zone") ?> ...");
    });

        $("#btn-validate-scope").click(function(){
    			if(location.hash.indexOf("#live") >=0 || location.hash.indexOf("#freedom") >=0)
    				startNewsSearch(true);
    			else
    				startSearch(0, indexStepInit);
        });

        
       /* $(".item-globalscope-checker").click(function(){  
            $(".item-globalscope-checker").addClass("inactive");
            $(this).removeClass("inactive");
            alert("click itemchecker");
            mylog.log("globalscope-checker",  $(this).data("scope-name"), $(this).data("scope-type"));
            setGlobalScope( $(this).data("scope-value"), $(this).data("scope-name"), $(this).data("scope-type"),
                             $(this).data("insee-communexion"), $(this).data("name-communexion"), $(this).data("cp-communexion"), 
                             $(this).data("region-communexion"), $(this).data("country-communexion"),"filter" ) ;
        });*/

        /*$(".start-new-communexion").click(function(){  
            activateGlobalCommunexion(true);
        });*/

        //rebuildSearchScopeInput();
        //showTagsScopesMin(".scope-min-header");
        
        mylog.log("communexionActivated cookie", $.cookie('communexionActivated'), typeof $.cookie('communexionActivated'));
        loadingScope = false;
    });

   

    function checkScopeMax(){
        var empty = true;
        $.each(myMultiScopes, function(key, val){
            if(val.active == true) empty = false;
        });

        if(empty){ $("#scope-max-dep").removeClass("disabled"); }
        else { $("#scope-max-dep").addClass("disabled"); }
    }

</script>