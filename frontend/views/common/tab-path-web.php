<?php
use common\helpers\TTimeHelper;
use common\services\learning\RecordService;
use common\helpers\TStringHelper;
use yii\helpers\Html;

?>
<? foreach ($data as $v): ?>
    <?
    $title = str_replace(['{time}', '{verb}', '{category}', '{acivity}'], [TTimeHelper::toDate($v['created_at'], 'Y年m月d日'), $v['learning_verb'], $v['record_category'], $v['learning_acivity']], RecordService::RECORD_TEMPLATE_RECORD_1);
    ?>
    <div class="timeline-item">
        <div class="timeline-icon">
            <i class="glyphicon glyphicon-globe" title="<?= Yii::t('frontend', 'web_page') ?>"></i>
        </div>
        <div class="timeline-content">
            <h2 title="<?=Html::encode($title)?>">
                <span class="lessWord timelineTitle"><?=Html::encode($title)?></span>
                <a class="btn pull-right noticeShare" href="javascript:void(0);" onclick="ShareRecord(this,'<?=$v['object_id']?>')"><?= Yii::t('frontend', 'share') ?></a>
            </h2>
            <table class="timeLine_pathBlock">
                <?if($v['url']):?>
                    <tr>
                        <td><strong><?= Yii::t('frontend', 'related_link') ?>:</strong><a href="<?=$v['url']?>"><?=$v['url']?></a></td>
                    </tr>
                <?endif;?>
                <?if($v['duration']):?>
                    <tr>
                        <td><strong><?= Yii::t('frontend', 'duration_time') ?>:</strong><?=TTimeHelper::timeConvert($v['duration'])?></td>
                    </tr>
                <?endif;?>
                <? if($v['attach_original_filename']):?>
                    <tr>
                        <td><strong><?= Yii::t('frontend', 'enclosure') ?>:</strong><a href="javascript:void(0)" onclick="submitDownload('<?=$v['object_id']?>','record')"><?=Html::encode($v['attach_original_filename'])?></a></td>
                    </tr>
                <? endif; ?>
                <tr>
                    <td><strong><?= Yii::t('frontend', 'question_content') ?>:</strong><?=Html::encode($v['content'])?></td>
                </tr>
            </table>
            <hr/>
            <span><i class="glyphicon glyphicon-time"></i><?= Yii::t('frontend', 'record_time') ?>：<?= TTimeHelper::toDateTime($v['created_at'],'Y年m月d日 H:i') ?></span>
        </div>
    </div>
<? endforeach; ?>