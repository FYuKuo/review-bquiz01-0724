<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $STR->header ?></p>
    <form method="post" action="./api/edit.php">
        <table width="80%" class="cent m-auto">
            <tbody>
                <tr class="yel">
                    <td width="40%"><?= $STR->acc ?></td>
                    <td width="40%"><?= $STR->pw ?></td>
                    <td width="10%">刪除</td>
                </tr>
                <?php
                $DB = new DB($do);
                $rows = $DB->all();
                foreach ($rows as $key => $row) {
                ?>
                <tr>
                    <td>
                        <input type="text" name="acc[]" value="<?=$row['acc']?>" class="w-90">
                    </td>
                    <td>
                        <input type="password" name="pw[]" value="<?=$row['pw']?>" class="w-90">
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id']?>">
                    </td>
                    <input type="hidden" name="id[]" value="<?=$row['id']?>">
                    <input type="hidden" name="table" value="<?=$do?>">
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:80%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modal/<?= $do ?>.php?do=<?= $do ?>')" value="<?= $STR->addBtn ?>">
                    </td>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>