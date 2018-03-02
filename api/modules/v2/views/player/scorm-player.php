<?php
/**
 * Created by PhpStorm.
 * User: tangming
 * Date: 7/9/2015
 * Time: 10:11 AM
 */
use yii\helpers\Html;
use yii\helpers\Url;

?>
<?= Html::hiddenInput("currentScoId",$currentScoId,['id'=>'currentScoId'])?>
<?= Html::hiddenInput("currentModResId",$modResId,['id'=>'currentModResId'])?>
<?= Html::hiddenInput("currentCoursewareId",$coursewareId,['id'=>'currentCoursewareId'])?>
<?= Html::hiddenInput("currentCourseId",$courseId,['id'=>'currentCourseId'])?>
<?= Html::hiddenInput("currentComponentCode",$componentCode,['id'=>'currentComponentCode'])?>

<?=Html::jsFile("/components/scormplayer/".$scormVersion.".js")?>

<noscript>
    <div id="noscript">
        <?= Yii::t('common','scorm_no_script');?>
    </div>
</noscript>
<!--                学习课程达到45分钟以上为完成-->

<iframe id="iframe-player" width="100%" height="100%" frameborder="0"></iframe>

<script>
    $(document).ready(function() {

        var currentorg = "<?=$currentorg?>";

        var scormAutoCommit = "<?=$scormAutoCommit?>";

        var  recordUrl = "<?=Url::toRoute([
            'play/record-scorm-data',
            'courseRegId'=>$courseRegId,
            'modResId'=>$modResId,
            'scoId'=>$currentScoId,
            'coursewareId'=>$coursewareId,
            'attempt'=>$attempt,
            'courseCompleteProcessId'=>$courseCompleteProcessId,
            'courseCompleteFinalId'=>$courseCompleteFinalId,
            'withSessionStr'=>$withSessionStr,
            'system_key'=>$system_key,
            'access_token'=>$access_token,
            'userId' => $userId
        ])?>";


        var sessionKey = "<?=Yii::$app->session->getId() ?>";
        var cmistring256 = "<?=$cmistring256?>";
//        alert("cmistring256:"+cmistring256);
        var cmistring4096 = "<?=$cmistring4096?>";
//        alert("cmistring4096:"+cmistring4096);
        var scorm_debugging = "<?=$scorm_debugging?>";
        scorm_debugging = Boolean(scorm_debugging)
//        alert("scorm_debugging:"+scorm_debugging);
        var scormAuto = "<?=$scormAuto?>";
//        alert("scormAuto:"+scormAuto);
        var scormId = "<?=$scormId?>";
//        alert("scormId:"+scormId);
        var scoId = "<?=$currentScoId?>";
//        alert("scoId:"+scoId);
        var attempt = "<?=$attempt?>";
//        alert("attempt:"+attempt);
        var mode = "<?=$mode?>";
//        alert("mode:"+mode);
        var modResId = "<?=$modResId?>";
//        alert("modResId:"+modResId);
        var def = <?=$def?>;
//        alert(def);
//        alert(JSON.stringify(def));
        var cmiobj = <?=$cmiobj?>;
//        alert(cmiobj);
//        alert(JSON.stringify(cmiobj));
        var cmiint = <?=$cmiint?>;
//        alert(cmiint);
//        alert(JSON.stringify(cmiint));

        var cmicommentsuser = <?=$cmicommentsuser?>;
//        alert(JSON.stringify(cmicommentsuser));

        var cmicommentslms = <?=$cmicommentslms?>;
//        alert(JSON.stringify(cmicommentslms));

        var courseRegId = "<?=$courseRegId?>";
        var courseCompleteProcessId = "<?=$courseCompleteProcessId?>";
        var courseCompleteFinalId = "<?=$courseCompleteFinalId?>";

        scorm_api_init(courseRegId,courseCompleteProcessId,courseCompleteFinalId, def, cmiobj, cmiint, cmicommentsuser, cmicommentslms,
            cmistring256, cmistring4096,
            scorm_debugging, scormAuto, scormId, recordUrl,
            sessionKey, scoId, attempt, mode, modResId, currentorg, scormAutoCommit);

        LoadiFramePlayer();
    });



    function mod_scorm_catalog_update() {
        //alert('TriggerCatalogUpdate');
        var modResId = "<?=$modResId?>";
        var scoId = "<?=$currentScoId?>";
        reloadCatalog('scorm',modResId,scoId);
    }



    function LoadiFramePlayer(){

        var ajaxUrl = "<?=$iframeUrl?>";
        $("#iframe-player").attr("src",ajaxUrl.replace(/api\//i,'').replace(/content/i,'content.html'))

    }
</script>