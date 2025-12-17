<?php

class Liste {

    public ?Element $head;

    public function __construct($value = null) {
        if ($value === null) {
            $this->head = null;
        } else {
            $this->head = new Element($value);
        }
    }

    // Ersten Knoten vorne einfügen
    public function insertFirst($value) {
        $newElement = new Element($value);
        $newElement->next = $this->head;
        $this->head = $newElement;
    }

    // Ersten Knoten löschen
    public function deleteFirst() {
        if ($this->head === null) {
            return null;
        }

        $value = $this->head->getElement();
        $this->head = $this->head->next;
        return $value;
    }

    // Letzten Knoten einfügen
    public function insertLast($value) {
        $newElement = new Element($value);

        if ($this->head === null) {
            // Liste leer → neuer Knoten wird head
            $this->head = $newElement;
            return;
        }

        $temp = $this->head;

        while ($temp->next !== null) {
            $temp = $temp->next;
        }

        $temp->next = $newElement;
    }

    // Letzten Knoten löschen
    public function deleteLast() {

        if ($this->head === null) {
            return null;
        }

        // Wenn nur ein Element vorhanden ist
        if ($this->head->next === null) {
            $value = $this->head->getElement();
            $this->head = null;
            return $value;
        }

        $cursor = $this->head;

        // Bis zum vorletzten Knoten gehen
        while ($cursor->next->next !== null) {
            $cursor = $cursor->next;
        }

        $value = $cursor->next->getElement();
        $cursor->next = null;

        return $value;
    }

    public function insertAt(int $index, $value) {
        if ($index < 0) {
            throw new Exception("index$index darf nicht negativ sein.");
        }
    
        // Einfügen am Anfang
        if ($index === 0) {
            $this->insertFirst($value);
            return;
        }
    
        $newElement = new Element($value);
        $current = $this->head;
        $index = 0;
    
        // Zum Knoten vor der Einfügeindex$index gehen
        while ($current !== null && $index < $index - 1) {
            $current = $current->next;
            $index++;
        }
    
        // index$index ist außerhalb der Liste
        if ($current === null) {
            throw new Exception("index $index liegt außerhalb der Liste.");
        }
    
        // Einfügen
        $newElement->next = $current->next;
        $current->next = $newElement;
    }
    


    // Liste in String umwandeln
    public function toString() {
        $temp = $this->head;
        $s = "";

        while ($temp !== null) {
            $s .= $temp->getElement();
            if ($temp->next !== null) {
                $s .= ",";
            }
            $temp = $temp->next;
        }

        return $s;
    }
}

?>
