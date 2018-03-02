<?php
/**
 * Created by PhpStorm.
 * User: LiuCheng
 * Date: 2015/6/12
 * Time: 11:16
 */
use common\helpers\TTimeHelper;
use common\services\learning\RecordService;
use yii\helpers\Html;

?>
<? foreach ($data as $v): ?>
<div class="timeline-item">
    <div class="timeline-icon">
        <i class="glyphicon glyphicon-headphones" title="<?= Yii::t('frontend', 'exam') ?>"></i>
    </div>
    <div class="timeline-content">
        <h2>
            <? if ($v->record_format==='1'):?>
                <?=str_replace(['{who}','{time}','{verb}','{category}','{acivity}'],[Html::encode($v->push_user_name),TTimeHelper::toDate($v['created_at'],'Y年m月d日'),$v['learning_verb'],$v['record_category'],Html::encode($v['learning_acivity'])],RecordService::RECORD_TEMPLATE_EXAM_1)?>
            <? elseif($v->record_format==='2'): ?>
                <?=str_replace(['{time}','{verb}','{category}','{acivity}','{result}'],[TTimeHelper::toDate($v['created_at'],'Y年m月d日'),$v['learning_verb'],$v['record_category'],Html::encode($v['learning_acivity']),$v['learning_result']],RecordService::RECORD_TEMPLATE_EXAM_2)?>
            <? endif;?>
        </h2>
        <br/>
        <span><i class="glyphicon glyphicon-time"></i><?= $v['learning_verb'] ?><?= Yii::t('common', 'time') ?>：<?=TTimeHelper::toDateTime($v['created_at'],'Y年m月d日 H:i')?></span>
        <a target="_blank" href="<?= Yii::$app->urlManager->createUrl(['exam/view', 'id' => $v->object_id]) ?>" class="pull-right"><?= Yii::t('common', 'view_button') ?></a>
    </div>
</div>
<? endforeach; ?>