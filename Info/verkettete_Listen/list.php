<?php

class Liste {

public ?Element $head = null;

public function __construct($value){
    $this->head = new Element($value);
}

public function insertFirst($value){
    $newElement = new Element($value);
    $newElement->next = $this->head;   // richtig verknüpfen
    $this->head = $newElement;
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
    // Liste leer
    if ($this->head === null) {
        return;
    }

    // Nur ein Element
    if ($this->head->next === null) {
        $this->head = null;
        return;
    }

    // Mehrere Elemente
    $temp = $this->head;

    while ($temp->next->next !== null) {
        $temp = $temp->next;
    }

    $temp->next = null;
}




public function toString(){
    $temp = $this->head;
    $s = "";

    while ($temp !== null) {
        $s .= $temp->getElement();

        if ($temp->next !== null) {
            $s .= ", ";
        }

        $temp = $temp->next;  // weiterlaufen!
    }

    return $s;
}
}
?>
