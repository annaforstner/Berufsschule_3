<?php 
class Element {
    // ATtribute
    private string $value;
    public ?Element $next;

    // Konstruktor
    public function __construct(string $value) {
        $this->value = $value;
        $this->next = null;
    }

    //Methoden
    public function getElement() {
        return $this->value;
    }
}
?>