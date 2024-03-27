<?php

class Panier
{
    public $items; 

    public function __construct()
    {
        $this->items = array();
    }

    public function ajouterItem(Item $item, $quantity)
    {
        
        $this->items[$item->Id] = $quantity;
        
    }

    public function retirerItem($itemId)
    {
        if (isset($this->items[$itemId])) {
            unset($this->items[$itemId]);
        }
    }

    public function viderPanier()
    {
        $this->items = array();
    }

    public function getItems()
    {
        return $this->items;
    }
    public function changerQuantiteItem($itemId, $newQuantity)
    {
        if (isset($this->items[$itemId])) {
            $this->items[$itemId] = $newQuantity;
        }
    }
}