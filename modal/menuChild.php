<?php
$do = $_GET['do'] ?? 'title';
include('../api/base.php');
?>
<h3 class="cent"><?= $STR->updateHeader ?></h3>
<hr>
<form action="../api/addChild.php" method="post">
    <table class="m-auto cent" style="width: 60%;">
        <tr>
            <td style="width: 40;">
                <?= $STR->updateText ?>
            </td>
            <td style="width: 40;">
                <?= $STR->updateHref ?>
            </td>
            <td>
                刪除
            </td>
        </tr>
        <?php
        $DB = new DB($do);
        $rows = $DB->all(['parent' => $_GET['id']]);
        foreach ($rows as $key => $row) {
        ?>
            <tr>
                <td>
                    <input type="text" name="text[]" class="w-90" value="<?= $row['text'] ?>">
                </td>
                <td>
                    <input type="text" name="href[]" class="w-90" value="<?= $row['href'] ?>">
                </td>
                <td>
                    <input type="checkbox" name="del[]" value="<?= $row['id'] ?>">
                </td>
                <input type="hidden" name="" value="<?= $row['id'] ?>">
            </tr>
        <?php
        }
        ?>

        <tr class="lastTr">
            <td colspan="2">
            <input type="hidden" name="parentId" value="<?= $_GET['id'] ?>">
            <input type="hidden" name="table" value="<?= $do ?>">
                <input type="submit" value="修改確定">
                <input type="reset" value="重置">
                <input type="button" id="addBtn" value="更多選單">
            </td>
        </tr>
    </table>
</form>

<script>
    $(document).ready(function(){
        $('#addBtn').click(function(){
            $('.lastTr').before(`<tr>
            <td>
                <input type="text" name="addtext[]" class="w-90">
            </td>
            <td>
                <input type="text" name="addhref[]" class="w-90">
            </td>
        </tr>`)
        })
    })
</script>