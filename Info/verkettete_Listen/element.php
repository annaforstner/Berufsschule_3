<?php 
class Element{
    private String $value;
    public Element $next = null;

    public function __construct(String $value){
        $this->value = $value;
        $next = null;

    }

    public function getElement(){
        return $this->value;
    }
}



?>