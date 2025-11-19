<?php 
class Element{
    private $value;
    public ?Element $next;

    public function __construct(string $value){
        $this->value = $value;
        $next = null;
    }

    public function getElement(){
        return $this->value;
    }
}



?>