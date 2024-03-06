<?php

class television implements sellable
{
    private $_screenSize;
    private $_stockLevel;

    public function getScreenSize()
    {
        return $this->_screenSize;
    }
    public function setScreenSize($screenSize)
    {
        $this->screenSize = $screenSize;
    }

    public function addStock($numItems)
    {
        $this->_stockLevel + $numItems;
    }
    public function sellItem()
    {
        if ($this->_stockLevel > 0) {
            $this->_stockLevel--;
            return true;
        } else {
            return false;
        }
    }
    public function getStockLevel()
    {
        return $this->_stockLevel;
    }
}

