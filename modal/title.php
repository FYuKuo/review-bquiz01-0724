<?php
$do = $_GET['do']??'title';
include('../api/base.php');
?>
<h3 class="cent"><?=$STR->addHeader?></h3>
<hr>
<form action="../api/add.php" method="post" enctype="multipart/form-data">
    <table class="m-auto cent">
        <tr>
            <td>
            <?=$STR->addImg?>
            </td>
            <td>
                <input type="file" name="img" class="w-100">
            </td>
        </tr>
        <tr>
            <td>
                <?=$STR->addText?>
            </td>
            <td>
                <input type="text" name="text" class="w-100">
            </td>
            <input type="hidden" name="table" value="<?=$do?>">
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
</form>