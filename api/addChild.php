<?php
include('./base.php');
$table = $_POST['table'];
$DB = new DB($table);
$data = [];

if(isset($_POST['id'])){

    foreach ($_POST['id'] as $key => $id) {
        if(isset($_POST['del'])){
    
            if(in_array($id,$_POST['del'])){
                $DB->del($id);
        
            }
        }else {
            $row = $DB->find($id);
            $row['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            $row['text'] = $_POST['text']["$key"];
            $row['href'] = $_POST['href']["$key"];

            $DB->save($row);

        }
    }

}

if(isset($_POST['addtext'])){

    $data = [];

    foreach ($_POST['addtext'] as $key => $text) {
        if(!empty($text)){
            $data['text'] = $text;
            $data['href'] = $_POST['addhref']["$key"];
            $data['parent'] = $_POST['parentId'];
            $data['sh'] = 1;
        }


        $DB->save($data);

    }
}

to('../back.php?do='.$table);

?>