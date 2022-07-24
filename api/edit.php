<?php
include('./base.php');
$table = $_POST['table'];
$DB = new DB($table);

foreach ($_POST['id'] as $key => $id) {

    if(isset($_POST['del'])){
    
        foreach ($_POST['del'] as $del) {

            if($id == $del){
                
                $DB->del($id);
            }
        }

}else{

    
        $row = $DB->find($id);
        
        switch($table) {
            case 'title':
                $row['sh'] = ($_POST['sh'] == $id)?1:0;
                $row['text'] = $_POST['text']["$key"];
            break;
        
                    
            case 'ad':
            case 'mvim':
            case 'image':
                $row['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                    
            break;

            case 'news':
                $row['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                $row['text'] = $_POST['text']["$key"];
                    
            break;
                            
            break;
        
            case 'admin':
                    
            break;
        
            case 'menu':
                $row['href'] = $_POST['href']["$key"];
                $row['text'] = $_POST['text']["$key"];
                $row['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;  
            break;
        
        
        }
    
        $DB->save($row);
    }
}



to('../back.php?do='.$table);

?>