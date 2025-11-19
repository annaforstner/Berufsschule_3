<?php

class Liste {

public Element $head;

// der Konstruktor ist von ChatGPT, weil nur ein Konstruktor möglich ist, aber zwei brauche.
public function __construct($value = null)
{
    if ($value === null) {
        $this->head = null;
    } else {
        $this->head = new Element($value);
    }
}


public function insertFirst($value){
    if($this->head != null){  // richtig verknüpfen
    $newElement->next = $this->head;
    }
    $head = $newElement;
}

public function deleteFirst() {
    if ($this->head === null) {
        return null;
    }

    $value = $this->head->getElement();
    $this->head = $this->head->next;

    return $value;
}

public function insertLast($value){
    $newElement = new Element($value);
    $temp = $this->head;
    while ($temp->next !== null) {
        $temp = $temp->next;
    }
    $temp->next = $newElement;
}

public function deleteLast(){
    // Sengwein
    if(!isset($this->head)){
        return;
    }
    $cursor = $this->head;
    while($cursor->next->next != null){
        $cursor = $cursor->next;
    }
    $cursor->next = $cursor->next->next; // oder = null
}




public function toString(){
    $temp = $this->head;
    $s = "";

    while ($temp->next !== null) {
        $s = $s + $temp->getElement().",";
        $temp = $temp->next;

        if ($temp !== null) {
            $s = $s + $temp->getElement();
        }
        return $s;
    }

    return $s;
}
}
?>
