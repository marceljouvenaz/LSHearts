<?php

/* All will be in English since this is a best practice I try to train for myself*/
namespace MRJ\LSHearts;

class HeartsGame
{   var $myHand;

    function __construct()
    {
        $this->myHand = new HeartsHand();
    }

    function play(){
        while($this->myHand->myscore->continueGame()){
            $this->dealHand();
            $this->playRounds();
        }
    }

    function dealHand(){
        $this->myHand->dealCards();
    }
    function playRounds(){
        $this->myHand->playRounds();
    }

    /**
     * @param mixed $myHand
     */
    public function setMyHand($myHand)
    {
        $this->myHand = $myHand;
    }

    /**
     * @return mixed
     */
    public function getMyHand()
    {
        return $this->myHand;
    }
}
