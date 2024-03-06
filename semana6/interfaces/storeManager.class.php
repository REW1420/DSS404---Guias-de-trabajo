<?php
class storeManager
{

    private $_productList = array();


    public function addProduct(sellable $producto)
    {
        $this->_productList[] = $producto;
    }

    public function stockUp()
    {
        foreach ($this->_productList as $product) {
            $product->addStock(100);

        }
    }
}
?>