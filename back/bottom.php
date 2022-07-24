<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $STR->header ?></p>
    <form method="post" action="./api/update.php">
        <table width="70%" class="cent m-auto">
            <tbody>
                <?php
                $DB = new DB($do);
                $rows = $DB->all();
                foreach ($rows as $key => $row) {
                ?>
                    <tr>
                        <td class="yel" style="width: 50%;">
                            <?= $STR->text ?>
                        </td>
                        <td>
                            <input type="text" name="text" value="<?= $row['text'] ?>" class="w-90">
                        </td>

                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="table" value="<?= $do ?>">
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;" class="m-auto">
            <tbody>
                <tr>
                    <td class="cent" colspan="2">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>