<?php


namespace MRJ\LSHearts;


class  HeartsCard
{
    private $number;    // integer [0..31] control value = 42, would have loved to use 0 for control value, but that's impractical with div and mod
    private $status;    // integer 0 undefined, 1 played, 2 not played

    function __construct()
    {
        $this->setNumber(42);
        $this->setStatus(0);
    }


    /**
     * suit is not a variable but a calculated return
     * first 8 cards [0..7] are spades, next hearts, next diamonds, next clubs
     */
    function getSuit() :int{
        return intdiv($this->getNumber(),8) + 1;
    }

    /**
     * face is not a variable but a calculated return
     * first card [0] is the 7 of spades and onward
     * must remember to show 11 as jack, 12 as queen, 13 as king, 14 as ace
     */
    function getFace() :string {
        switch (($this->getNumber() % 8)){
            case 0:
                $face = '7';
                break;
            case 1:
                $face = '8';
                break;
            case 2:
                $face = '9';
                break;
            case 3:
                $face = '10';
                break;
            case 4:
                $face = 'J';
                break;
            case 5:
                $face = 'Q';
                break;
            case 6:
                $face = 'K';
                break;
            case 7:
                $face = 'A';
                break;
        }
        return $face;
    }

    /**
     * points is not a variable but a calculated return
     * business logic about score can be altered here
     * hearts = 1 pts, i.e. suit = 2, i.e. 7 < $number < 16
     * queen of spades = 5 pts, card number 5
     * jack of clubs = 2 pts, card number 28
     */
    function getPoints() :int{
        switch ($this->getNumber()){
            case 5: return 5;   // queen of spades
            case 28: return 2;  // jacks of clubs
            case 8:
            case 9:
            case 10:
            case 11:
            case 12:
            case 13:
            case 14:
            case 15:
                return 1;       // all hearts
            default: return 0;  // rest of cards
        }
    }

    function printCard(){
        switch ($this->getSuit()){
            case 1:
                $suitsign = '♠';
                break;
            case 2:
                $suitsign = '♥';
                break;
            case 3:
                $suitsign = '♦';
                break;
            case 4:
                $suitsign = '♣';
                break;
        }
        print ($suitsign.$this->getFace()."  ");
    }

    /**
     * @param int $number
     */
    public function setNumber(int $number)
    {
        $this->number = $number;
    }

    /**
     * @return int
     */
    public function getNumber() :int
    {
        return $this->number;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getStatus() :int
    {
        return $this->status;
    }
}