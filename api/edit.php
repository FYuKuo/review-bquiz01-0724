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
                $row['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                    
            break;
                    
            case 'mvim':
                       
            break;
        
            case 'image':
                    
            break;
        
            case 'total':
                    
            break;
        
            case 'bottom':
                    
            break;
        
            case 'news':
                    
            break;
        
            case 'admin':
                    
            break;
        
            case 'menu':
                    
            break;
        
        
        }
    
        $DB->save($row);
    }
}



to('../back.php?do='.$table);

?>