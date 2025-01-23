<?php
class groupthirteen extends exception{
    public function __construct($message = "division by zero is not allowed!"){
        parent::__construct($message);
    }
}
function divideNumbers($a,$b){
    try{
        if($b==0){
            throw new groupthirteen();
        }
        return $a/$b;
    }catch(groupthirteen $e){
        echo "error:".$e->getmessage();
    }
}
echo divideNumbers(10,0);
?>