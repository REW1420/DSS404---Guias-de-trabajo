<?php
class tennisBall implements sellable
{
    private $_color;
    private $_ballsLeft;


    public function getColor()
    {
        return $this->_color;
    }

    public function setColor($color)
    {
        $this->_color = $color;
    }
    public function addStock($numItems)
    {
        $this->_ballsLeft + $numItems;
    }
    public function sellItem()
    {
        if ($this->_ballsLeft > 0) {
            $this->_ballsLeft--;
            return true;
        } else {
            return false;
        }
    }

    public function getStockLevel()
    {
        return $this->_ballsLeft;
    }
}
?>