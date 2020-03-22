<?php

/* All will be in English since this is a best practice I try to train for myself*/
namespace MRJ\LSHearts;


include 'HeartsHand.php';



class HeartsGame {
    var $myHand;

    function __construct()
    {
        $this->myHand = new HeartsHand();
    }

    function play(){
        while($this->myHand->myscore->continueGame()){
            $this->resetHand();
            $this->dealHand();
            $this->printHand();
            $this->playHand();
            $this->printScore();
        }
    }

    function resetHand(){
        $this->myHand->resetPlayers();
    }
    function dealHand(){
        $this->myHand->dealCards();
    }
    function printHand(){
        $this->myHand->printHands();
    }
    function playHand(){
        $this->myHand->playHand();
    }
    function printScore(){
        $this->myHand->printScore();
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
