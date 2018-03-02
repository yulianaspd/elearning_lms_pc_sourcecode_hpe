<?php
/**
 * Created by PhpStorm.
 * User: TangMingQiang
 * Date: 3/23/15
 * Time: 1:16 AM
 */
use components\widgets\TGridView;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<input type="hidden" id="indexUrl" value="<?=Yii::$app->urlManager->createUrl(['external-system/index']);?>"/>
<script>

    var indexUrl = document.getElementById('indexUrl');

    if(!document.getElementById("content-body"))
    {
        window.location = indexUrl.value;
    }

    function reloadForm()
    {
//            alert("reloadForm");
//        $.pjax.reload({container:"#grid"});
//            $.pjax.reload({container:"#gridframe"});
        var ajaxUrl = "<?=Url::toRoute(['external-system/list'])?>";
//        alert('ajaxUrl:'+ajaxUrl);
        ajaxUrl = urlreplace(ajaxUrl,'PageShowAll',$('#PageShowAll_grid').val());
        ajaxUrl = urlreplace(ajaxUrl,'PageSize',$('#PageSize_grid').val());

        ajaxGetWithForm('searchForm', ajaxUrl,'rightList');
    }

    function exportForm()
    {
        var ajaxUrl = "<?=Url::toRoute(['external-system/export'])?>";

        exportWithForm('searchForm', ajaxUrl);
    }


    function loadModalFormData(modalId,url)
    {
        modalClear("addModal");
        modalClear("updateModal");
        modalClear("viewModal");

        openModalForm(modalId, url);
    }

    function ReloadPageAfterDelete()
    {
        //alert('1');
        reloadForm();
    }

    function ReloadPageAfterUpdate(frameId, formId, modalId, isClose)
    {
//            alert("frameId:"+frameId);
//            alert("formId:"+formId);
//            alert("modalId:"+modalId);
//        alert("isClose:"+isClose);
        reloadForm();
        if (isClose) {

            modalClear(modalId);
            modalHidden(modalId);
//                $('#'+modalId).modal('hide');
        }
        else
        {
//                modalClear(modalId);
            modalLoad(modalId,'<?=Yii::$app->urlManager->createUrl(['external-system/create'])?>');
        }

    }

    function ContinueSubmit(frameId,modalId,isClose,isErrorSubmit,kid)
    {
//        alert('ContinueSubmit');
        submitModalForm(frameId,"clientform-system",modalId,isClose,isErrorSubmit,kid,'1');
    }

    function submitModalFormCustomized(frameId,formId,modalId,isClose,isErrorSubmit)
    {
//        alert($("#clientform-system").length);
        if ($("#clientform-system").length > 0)
        {
//            alert('1');
            submitModalFormWithContinue(frameId,formId,modalId,isClose,isErrorSubmit,'0');
        }
        else
        {
//            alert('2');
            submitModalForm(frameId,formId,modalId,isClose,isErrorSubmit);
        }
    }

</script>

<?php  echo $this->render('_search', ['model' => $searchModel]); ?>
<!-- /.panel-heading -->
<div class="clientform-body">
    <?
    $gridColumns = [
        [
            'name' => 'selectedIds',
            'class' => 'kartik\grid\CheckboxColumn',
            'checkboxOptions' => function($model, $key, $index, $column) {
                return [
                    'value' => $model->kid,
                ];
            }
        ],
        [
            'class' => 'kartik\grid\SerialColumn',
            'header' => Yii::t('common','serial_number'),
        ],
        'system_code',
        'system_name',
        'system_key',
        'encoding_key',
        [
            'class' => 'kartik\grid\DataColumn',
            'attribute'=>'security_mode',
            'format'=>'text',
            'value'=> function ($model, $key, $index, $cloumn){
                if ($model->security_mode=='0')
                    return Yii::t('common', 'security_mode_plain');
                else
                    return Yii::t('common', 'security_mode_encrypt');
            },
        ],
        [
            'class' => 'kartik\grid\DataColumn',
            'attribute'=>'encrypt_mode',
            'format'=>'text',
            'value'=> function ($model, $key, $index, $cloumn){

                if ($model->encrypt_mode=='0')
                    return Yii::t('common', 'encrypt_mode_none');
                else if ($model->encrypt_mode=='1')
                    return Yii::t('common', 'encrypt_mode_aes');
                else
                    return Yii::t('common', 'encrypt_mode_des');
            },
        ],
        [
            'class' => 'kartik\grid\DataColumn',
            'attribute'=>'status',
            'format'=>'text',
            'value'=> function ($model, $key, $index, $cloumn){
                if ($model->status=='0')
                    return Yii::t('common', 'status_temp');
                else if ($model->status=='1')
                    return Yii::t('common', 'status_normal');
                else if ($model->status=='2')
                    return Yii::t('common', 'status_stop');
            },
            'contentOptions' => function ($model, $key, $index, $cloumn){
                if ($model->status=='2')
                    return ['style' => 'color:red'];
                else
                    return [];
            },
        ],
        [
            'class' => 'kartik\grid\ActionColumn',
            'header' => Yii::t('common', 'operation_button'),
            'template' => '{viewpop}{updatepop}{deleteButton}',
            'width' => '100px',
            'buttons' => [
                'viewpop' => function ($url, $model, $key) {
                    return
                        Html::a('<span class="glyphicon glyphicon-eye-open"></span>', '#',
                            ['id'=>'ViewButton', 'title'=>Yii::t('common', 'view_button'),
//                                'data-toggle'=>'modal',
//                                'data-target'=>'#viewModal',
                                'onclick'=>'loadModalFormData("viewModal","'. Yii::$app->urlManager->createUrl(['external-system/view','id'=>$key]).'");'
                            ]);
                },
                'updatepop' => function ($url, $model, $key) {
                    return
                        Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#',
                            ['id' => 'EditButton', 'title' => Yii::t('common', 'edit_button'),
            //                                'data-toggle'=>'modal',
            //                                'data-target'=>'#updateModal',
                                'onclick' => 'loadModalFormData("updateModal","' . Yii::$app->urlManager->createUrl(['external-system/update', 'id' => $key]) . '");'
                            ]);
                },
                'deleteButton' => function ($url, $model, $key) {
                    return
                        Html::a('<span class="glyphicon glyphicon-trash"></span>', '#',
                            ['id' => 'DeleteButton', 'title' => Yii::t('common', 'delete_button'),
                                'onclick' => 'deleteButton("' . $key . '","' . Yii::$app->urlManager->createUrl(['external-system/delete', 'id' => $key]) . '");'
                            ]);
                },
            ],
//                'headerOptions' => ['width' => '80'],
        ],
    ];
    ?>

    <?php
    $contentName = Yii::t('common', 'external_system');

    if ($forceShowAll == 'True') {
        $pageButton = Html::button('<i class="glyphicon glyphicon-resize-small"></i> ' . Yii::t('common', 'resize_current_button'), [
            'title' => Yii::t('common', 'resize_current_button'), 'class' => 'btn btn-default resizeBtn',
            'onclick' => 'ResizeCurrentButton();'
        ]);
    }
    else
    {
        $pageButton = Html::button('<i class="glyphicon glyphicon-resize-full"></i> ' . Yii::t('common', 'resize_full_button'), [
            'title' => Yii::t('common', 'resize_full_button'), 'class' => 'btn btn-default resizeBtn',
            'onclick' => 'ResizeFullButton();'
        ]);
    }

    echo TGridView::widget([
        'id'=>'grid',
        'dataProvider' => $dataProvider,
        //  'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'panel' => [
            'type' => TGridView::TYPE_DEFAULT,
            'heading' => '<h3 class="panel-title" style="text-align: left;"><i class="glyphicon glyphicon-book"></i> ' .Yii::t('common', '{value}_record', ['value'=>$contentName]).'</h3>',
        ],
        'toolbar' => [
            ['content'=>
                Html::button('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('common', 'add_button'),[
                    'title'=>Yii::t('common', 'add_button'), 'class'=>'btn btn-default greenBtn',
//                    'data-toggle'=>'modal',
//                    'data-target'=>'#addModal',
                    'onclick'=>'loadModalFormData("addModal","'. Yii::$app->urlManager->createUrl(['external-system/create']) .'");'
//                    'onclick'=>'updateFormData("'. Yii::$app->urlManager->createUrl(['external-system/update','id'=>43]).'");'
                ])
                .' '.
                Html::button('<i class="glyphicon glyphicon-minus"></i> '.Yii::t('common', 'batch_delete_button'),[
                    'title'=>Yii::t('common', 'batch_delete_button'), 'class'=>'btn btn-default redBtn',
                    'onclick'=>'batchDeleteButton("'. Yii::$app->urlManager->createUrl('external-system/batch-delete').'");'
                ])
                .' '.
                $pageButton
                .' '.
                Html::button('<i class="glyphicon glyphicon-export"></i> '.Yii::t('backend', 'export_button'),[
                    'title'=>Yii::t('backend', 'export_button'), 'class'=>'btn btn-default blueBtn',
                    'onclick'=>'exportForm();'
                ])
            ],
//            '{export}',
//            '{toggleData}'
        ],
        'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=>true,
        ]
    ]);
    ?>
</div>