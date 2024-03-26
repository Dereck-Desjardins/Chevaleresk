<?php

class Panier{
    public $Items;

  public function AddLine(Line $line){
    $id = $line->IdItem;
    if(!$this->findObjectById($id)){
        array_push($this->Items,$line); 
    }
    else {
        $qt = $line->QtItem;
        $this->Items;

    }
  }
function findObjectById($id){
    $array = $this->Items;
    if ( isset( $array[$id] ) ) {
        return $array[$id];
    }
    return false;
}
}

class Line{
    public $IdItem;
    public $QtItem;

    public function setNewItem($id,$qt){
        $this->IdItem=$id;
        $this->QtItem = $qt;
    }
}