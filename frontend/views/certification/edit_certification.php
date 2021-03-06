<?php
use yii\helpers\Url;

?>

<!-- 新建证书的弹出窗口 -->
     
        <div class="header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><?= Yii::t('frontend', 'modify_certificate') ?></h4>
        </div>
        
        <form id="edit_certification_form_id">
        
          <input type="hidden" id="kid" value="<?=$id?>"/>
                        
        <div class="content">
          <div class="courseInfo">
            <div role="tabpanel" class="tab-pane active" id="teacher_info">
              <div class=" panel-default scoreList">
                <div class="panel-body">
                  <div class="infoBlock">
                    <h4><?= Yii::t('frontend', 'tab_basic_information') ?></h4>
                    <hr/>
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <div class="form-group form-group-sm">
                          <label class="col-sm-3 control-label"><?= Yii::t('common', 'certification_name') ?></label>
                          <div class="col-sm-9">
                              <input data-delay="1"   data-mode="COMMON" data-condition="required" data-alert="<?=Yii::t('frontend', '{value}_not_null',['value'=>Yii::t('common', 'certification_name')])?>"  class="form-control" type="text" name="certification_name" id="certification_name_id" placeholder="<?=Yii::t('common', 'certification_name')?>">
                          </div>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                          <div class="col-md-12 col-sm-12">
                              <div class="form-group form-group-sm">
                                  <label class="col-sm-3 control-label"><?= Yii::t('common', 'certification_display_name') ?></label>
                                  <div class="col-sm-9">
                                      <textarea data-mode="COMMON" name="certification_display_name" id="certification_display_name_id" ></textarea>
                                  </div>
                              </div>
                          </div>
                      </div>
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <div class="form-group form-group-sm">
                          <label class="col-sm-3 control-label"><?=Yii::t('common', 'certification_description')?></label>
                          <div class="col-sm-9">
                            <textarea data-mode="COMMON" data-condition="required" data-alert="<?=Yii::t('frontend', '{value}_not_null',['value'=>Yii::t('common', 'certification_description')])?>"   name="description" id="description_id" >
                           
                            </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <div class="form-group form-group-sm">
                          <label class="col-sm-3 control-label"><?=Yii::t('common', 'certification_template')?></label>
                           <div class="col-sm-9">
                            <div class="btn-group timeScope pull-left" style="width:80%;">
                              <button id="btn_dropdown" class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" style="width:100%;"><?=Yii::t('common', 'select_{value}',['value'=>Yii::t('common', 'certification_template')])?> &nbsp;<span class="caret" style="margin:0;"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu" style="width:100%;">
                                <? foreach ($temps as $row): ?>
                                 <li><a href="javascript:void(0)" onclick="selectTemplate('edit_certification_form_id',this,'<?= $row['kid'] ?>')"><?= $row['template_name'] ?></a></li>
                               
                                <? endforeach; ?>
                              </ul>
                            </div>
                            <input type="hidden" id="certification_template_id" name="certification_template_id" data-mode="COMMON" data-condition="required" data-alert="<?=Yii::t('frontend', '{value}_not_null',['value'=>Yii::t('common', 'certification_template')])?>"/>
                        
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--                     <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <div class="form-group form-group-sm">
                          <label class="col-sm-3 control-label">证书印章</label>
                          <div class="col-sm-9">
                            <input class="form-control pull-left" type="text" id="formGroupInputSmall" placeholder="李明哲" style="width:80%">
                            <a href="#" class="btn btn-default btn-sm pull-right">上传</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <div class="form-group form-group-sm">
                          <label class="col-sm-3 control-label">证书类型</label>
                          <div class="col-sm-9">
                            <div class="btn-group timeScope pull-left" style="width:50%;">
                              <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" style="width:100%;">选择打印大小 &nbsp;<span class="caret" style="margin:0;"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="#">A4大小</a></li>
                                <li><a href="#">信封大小</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <h4><?= Yii::t('frontend', 'issue_related') ?></h4>
                    <hr/>
                    <div class="infoBlock">
                      <div class="row">
                        <div class="col-md-12 col-sm-12">
                          <div class="form-group form-group-sm">
                            <label class="col-sm-3 control-label"><?= Yii::t('common', 'time_validity') ?></label>
                            <div class="col-sm-9">
                              <div class="btn-group timeScope pull-left" style="width:40%;">
                                <button id="btn_dropdown_type" class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" style="width:80%;"><?= Yii::t('common', 'select_{value}',['value'=>Yii::t('frontend','date_text_type')]) ?> &nbsp;<span class="caret" style="margin:0;"></span>
                                </button>
                                  <input type="hidden" id="expire_time_type_id" name="expire_time_type" data-mode="COMMON" data-condition="required" data-alert="<?=Yii::t('frontend', '{value}_not_null',['value'=>Yii::t('common', 'time_validity_type')])?>"/>
                        
                                <ul class="dropdown-menu" role="menu">                               
                                    <li><a href="javascript:void(0)" onclick="selectExpireTimeType('edit_certification_form_id',this,0)"><?= Yii::t('common', 'time_day_number') ?></a></li>
                                    <li><a href="javascript:void(0)" onclick="selectExpireTimeType('edit_certification_form_id',this,1)"><?= Yii::t('frontend', 'date_text') ?></a></li>
                                  <li><a href="javascript:void(0)" onclick="selectExpireTimeType1('edit_certification_form_id',this,2)"><?= Yii::t('frontend', 'forever_valid') ?></a></li>
                            
                                </ul>
                              </div>
                            <input readonly="readonly"  data-alert="<?= Yii::t('frontend', '{value}_not_null',['value'=>Yii::t('common','time_validity')]) ?>"  data-delay="1" data-mode="COMMON" data-type="rili"  name="expire_time_rili"  id="expire_time_rili_id" class="form-control pull-left" type="text" placeholder="yyyy-MM-dd" style="width:34%; margin-right:6%;">
                              
                              <input   data-alert="<?= Yii::t('frontend', '{value}_not_null',['value'=>Yii::t('common','time_validity')]) ?>" data-delay="1" data-mode="COMMON" name="expire_time_day" id="expire_time_day_id" class="form-control pull-left" type="text" placeholder="<?= Yii::t('frontend', 'number2') ?>" style="display:none;width:34%; margin-right:6%;">
                              
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 col-sm-12">
                          <div class="form-group form-group-sm">
                            <label class="col-sm-3 control-label"><?= Yii::t('frontend', 'notification_mail') ?></label>
                            <div class="col-sm-9">
                              <div class="col-sm-9">
                                <div class="btn-group" data-toggle="buttons">
                                  <label style="margin-right:40px; font-weight:normal">
                                    <input name="is_email_user" id="is_email_user" type="checkbox" /> <?= Yii::t('frontend', 'pick_up_people') ?>
                                  </label>
                                  <label style="font-weight:normal">
                                    <input name="is_email_teacher" id="is_email_teacher" type="checkbox" /> <?=Yii::t('common', 'lecturer')?>
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 col-sm-12">
                          <div class="form-group form-group-sm">
                            <label class="col-sm-3 control-label"><?= Yii::t('frontend', 'print_score') ?></label>
                            <div class="col-sm-9">
                              <div class="col-sm-9">
                                <div class="btn-group" data-toggle="buttons">
                                  <label style="margin-right:68px;">
                                    <input type="radio" checked="checked" name="is_print_score" value="1" /> <?= Yii::t('frontend', 'yes') ?>
                                  </label>
                                  <label>
                                    <input type="radio" name="is_print_score" value="0" /> <?= Yii::t('frontend', 'no') ?>
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                       <div class="row">
                        <div class="col-md-12 col-sm-12">
                          <div class="form-group form-group-sm">
                            <label class="col-sm-3 control-label"><?= Yii::t('frontend', 'auto_push') ?></label>
                            <div class="col-sm-9">
                              <div class="col-sm-9">
                                <div class="btn-group" data-toggle="buttons">
                                  <label style="margin-right:68px;">
                                    <input type="radio"  name="is_auto_certify" value="1" /> <?= Yii::t('frontend', 'yes') ?>
                                  </label>
                                  <label>
                                    <input type="radio"  name="is_auto_certify" value="0" /> <?= Yii::t('frontend', 'no') ?>
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-12 col-sm-12 centerBtnArea">
                        <a id="save_edit_certification" class="btn btn-success btn-sm centerBtn" style="width:20%;"><?= Yii::t('frontend', 'modify') ?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="c"></div>
        </div>
  </form>  
  
  
<script type="text/javascript">

app.genCalendar();	
$(function(){
	//
	
	 $("#certification_name_id").mouseout(function(){
    		
    		      		$("#certification_name_id").trigger("blur");
         });
	
	window.validation_edit =app.creatFormValidation($("#edit_certification_form_id"));   

	

    $("#save_edit_certification").click(function(){
    //	$("#save_edit_certification").attr("disabled", true);
    
    
	 save_edit_certification("<?=Url::toRoute(['certification/edit-certification',])?>");

  			//
    }); 


    $.ajax({
   	   async: false,
 		   url: "<?=Url::toRoute(['certification/get-certification',])?>",
 		   data: {id:'<?=$id?>'},
 		   success: function(msg){
 			 
 			  
 			   $("#certification_name_id").val(msg.result.certification_name);
 			   $("#description_id").val(msg.result.description);
               $("#certification_display_name_id").val(msg.result.certification_display_name);


 			   validateCertificationName('certification_name_id','<?=Yii::t('frontend', '{value}_repeat',['value'=>Yii::t('common', 'certification_name')])?>','<?=Yii::t('frontend', '{value}_limit_25_word_and_not_null',['value'=>Yii::t('common', 'certification_name')])?>','<?=Yii::t('frontend', '{value}_not_null',['value'=>Yii::t('common', 'certification_name')])?>',validation_edit,msg.result.certification_name);

 			   if(msg.result.is_print_score==1){
 				   $("#edit_certification_form_id input[name='is_print_score']").get(0).checked = true;
 			   }else{
 				   $("#edit_certification_form_id input[name='is_print_score']").get(1).checked = true;
 			   }


 			  if(msg.result.is_auto_certify==1){
				   $("#edit_certification_form_id input[name='is_auto_certify']").get(0).checked = true;
			   }else{
				   $("#edit_certification_form_id input[name='is_auto_certify']").get(1).checked = true;
			   }
			   

 			   if(msg.result.is_email_user=='1'){
 				   $("#is_email_user").attr("checked",true);
 			   }

 			   if(msg.result.is_email_teacher=='1'){
 				   $("#is_email_teacher").attr("checked",true);
 			   }
 			  
 			  
 			  if(msg.result.expire_time_type=='0'){
 		    	   $("#expire_time_day_id").show();
 		    	   $("#expire_time_rili_id").hide();
 		    	   $("#expire_time_day_id").val(msg.result.expire_time);
 		    	   $("#edit_certification_form_id #btn_dropdown_type").html("<?= Yii::t('common', 'time_day_number') ?>" + ' &nbsp;<span class="caret">');
 		           app.preventGenCalendar();
 		       }else if(msg.result.expire_time_type=='1'){
 		    	   $("#expire_time_day_id").hide();
 		    	   $("#expire_time_rili_id").show();
 		    	  
 		    	  $("#edit_certification_form_id #btn_dropdown_type").html("<?= Yii::t('frontend', 'date_text') ?>" + ' &nbsp;<span class="caret">');
 		    	   $("#expire_time_rili_id").val(msg.result.expire_time);
 		       }else if(msg.result.expire_time_type=='2'){

 		    	   $("#expire_time_day_id").hide();
		    	   $("#expire_time_rili_id").hide();
		    	   $("#edit_certification_form_id #btn_dropdown_type").html("<?= Yii::t('frontend', 'forever_valid') ?>" + ' &nbsp;<span class="caret">');
 	 		   }

 			 
 			 $("#expire_time_type_id").val(msg.result.expire_time_type);
 			 $("#certification_template_id").val(msg.result.certification_template_id);
 			 $("#edit_certification_form_id #btn_dropdown").html(msg.result.template_name + ' &nbsp;<span class="caret">');
 			  
 		      
 		   }
 		 });


	//
});

function save_edit_certification(url){

	 if(!validation_edit.validate()){

	   	    //$("#msm_alert_content").text("验证未通过");
	  	     //app.alert("#foo");	   
	         
	        return;
		  };

	console.log(url);
    var certification_name=$("#certification_name_id").val();
	var description=$("#description_id").val();
    var certification_display_name=$("#certification_display_name_id").val();
    var certification_template_id=$("#certification_template_id").val();
    
    var expire_time_type=$("#expire_time_type_id").val();
    var is_email_user=$("#edit_certification_form_id input[name='is_email_user']:checked").val();
    var is_email_teacher=$("#edit_certification_form_id input[name='is_email_teacher']:checked").val();
    var is_print_score=$("#edit_certification_form_id input[name='is_print_score']:checked").val();

    var is_auto_certify=$("#edit_certification_form_id input[name='is_auto_certify']:checked").val();

    if(is_email_user){
    	is_email_user='1';
    }else{
    	is_email_user='0';
    }

    if(is_email_teacher){
    	is_email_teacher='1';
    }else{
    	is_email_teacher='0';
    }

    var expire_time='';
    if(expire_time_type=='0'){
    	expire_time=$("#expire_time_day_id").val();

    	if(expire_time==""){
    		validation_edit.showAlert("#expire_time_day_id","<?= Yii::t('frontend', '{value}_not_null',['value'=>Yii::t('common','time_validity')]) ?>");
    		return;
        	}

    	if(!(/^[0-9]+$/gi.test(expire_time))){
    		//app.showMsg("有效期只能是数字");
    		validation_edit.showAlert("#expire_time_day_id","<?= Yii::t('frontend', '{value}_must_int',['value'=>Yii::t('common','time_validity')]) ?>");
    		return;
         } else if(expire_time==0){
        	 validation_edit.showAlert("#expire_time_day_id","<?= Yii::t('frontend', '{value}_must_int',['value'=>Yii::t('common','time_validity')]) ?>");
      		 return;
             }
    }else if(expire_time_type=='1'){
    	expire_time=$("#expire_time_rili_id").val();

    	 if(expire_time==""){
      		validation_edit.showAlert("#expire_time_rili_id","<?= Yii::t('frontend', '{value}_not_null',['value'=>Yii::t('common','time_validity')]) ?>");
      		return;
          	}

    	 var c_d = new Date();
   	     var c_d_str = c_d.getFullYear()+"-"+(c_d.getMonth()+1)+"-"+c_d.getDate();
   	    
   	     if(!compareDate(c_d_str,expire_time,validation_edit,"expire_time_rili_id")){
	    	 return;
		 }
    }

//      if(is_email_user=='0'&&is_email_teacher=='0'){

//     	// $("#msm_alert_content").text("通知邮件不能为空");
//     	 app.showMsg("通知邮件不能为空");	
//    	     return ;
//      }

//      if(expire_time==''){

//     	 //$("#msm_alert_content").text("有效期不能为空");
//     	 app.showMsg("有效期不能为空");	
//    	     return ;
//      }
    
    
	 
    var certification_obj={};
    
    certification_obj.certification_name=certification_name;
    certification_obj.certification_display_name=certification_display_name;
    certification_obj.description=description;
    certification_obj.certification_template_id=certification_template_id;
    certification_obj.expire_time=expire_time;
    certification_obj.expire_time_type=expire_time_type;
    certification_obj.is_email_user=is_email_user;

    certification_obj.is_email_teacher=is_email_teacher;
    certification_obj.is_print_score=is_print_score;
    certification_obj.is_auto_certify=is_auto_certify;
    
    certification_obj.kid=$("#kid").val();

   
	  console.log(url);

	
   $.ajax({
	   type: "POST",
	   url: url,
	   data: certification_obj,
	   success: function(msg){
		 loadList();
		 //$("#edit_certification").modal('hide');
		 app.hideAlert("#edit_certification");
	   }
	 });

}


</script> 