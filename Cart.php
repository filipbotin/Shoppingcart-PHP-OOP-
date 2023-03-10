<?php


class Cart
{
    private $items = [];

    //TODO Skriv getter för items
    public function getItems() {
        return $this->items;
    }
    /*
     Skall lägga till en produkt i kundvagnen genom att
     skapa ett nytt cartItem och lägga till i $items array.
     Metoden skall returnera detta cartItem.

     VG: Om produkten redan finns i kundvagnen
     skall istället quantity på cartitem ökas.
     */
    public function addProduct($product) {
        $cartitem = new CartItem($product, 1);

        $this->items[$product->getId()] = $cartitem;

        return $cartitem;
    }
    //skriv en if sats om det finns eller inte + lägg quantity, prova isset istället

    //Skall ta bort en produkt ur kundvagnen (använd unset())
    public function removeProduct($product) {
        unset($this->items[$product->getId()]);
    }

    //Skall returnera totala antalet produkter i kundvagnen
    //OBS: Ej antalet unika produkter
    public function getTotalQuantity() {
        $totalQuantity = 0;

        foreach ($this->items as $item) {
            $totalQuantity += $item->getQuantity();
        }

        return $totalQuantity;
    }

    //Skall räkna ihop totalsumman för alla produkter i kundvagnen
    //VG: Tänk på att ett cartitem kan ha olika quantity
    public function getTotalSum() {
        $totalSum = 0;

        foreach ($this->items as $item) {
            $totalSum += $item->getQuantity() * $item->getProduct()->getPrice();
        }

        return $totalSum;
    }
}


