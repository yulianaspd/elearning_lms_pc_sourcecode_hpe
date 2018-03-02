<?php
/**
 * Created by PhpStorm.
 * User: tangming
 * Date: 3/17/2015
 * Time: 9:31 PM
 */
?>





    <form>
        <textarea name="modalContent" style="width:700px;height:200px;visibility:hidden;"></textarea>
        <p>
            <input type="button" name="getHtml" value="Get HTML" />
            <input type="button" name="isEmpty" value="Is Empty" />
            <input type="button" name="getText" value="Get text(includes img and embed)" />
            <input type="button" name="selectedHtml" value="Get selected HTML" />
        </p>
        <p>
            <input type="button" name="setHtml" value="Set HTML" />
            <input type="button" name="setText" value="Set text" />
            <input type="button" name="insertHtml" value="Insert HTML" />
            <input type="button" name="appendHtml" value="Append HTML" />
            <input type="button" name="clear" value="Clear" />
            <input type="reset" name="reset" value="Reset" />
        </p>
    </form>

<script>
    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('textarea[name="modalContent"]', {
            allowFileManager : true
        });
        K('input[name=getHtml]').click(function(e) {
            alert(editor.html());
        });
        K('input[name=isEmpty]').click(function(e) {
            alert(editor.isEmpty());
        });
        K('input[name=getText]').click(function(e) {
            alert(editor.text());
        });
        K('input[name=selectedHtml]').click(function(e) {
            alert(editor.selectedHtml());
        });
        K('input[name=setHtml]').click(function(e) {
            editor.html('<h3>Hello KindEditor</h3>');
        });
        K('input[name=setText]').click(function(e) {
            editor.text('<h3>Hello KindEditor</h3>');
        });
        K('input[name=insertHtml]').click(function(e) {
            editor.insertHtml('<strong>Insert HTML</strong>');
        });
        K('input[name=appendHtml]').click(function(e) {
            editor.appendHtml('<strong>Append HTML</strong>');
        });
        K('input[name=clear]').click(function(e) {
            editor.html('');
        });
    });
</script>