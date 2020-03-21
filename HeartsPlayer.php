<?php


namespace MRJ\LSHearts;


include 'HeartsCard.php';

class HeartsPlayer
{
    var $mycards;

    function __construct()
    {
        $this->mycards = array();
    }


    /**
     * @param array $mycards
     * actually an array of HeartsCard
     */
    public function setMycards(array $mycards)
    {
        $this->mycards = $mycards;
    }

    /**
     * @return array
     * actually an array of HeartsCard
     */
    public function getMycards() :array
    {
        return $this->mycards;
    }

    function addCard(int $card) {

        $temp = $this->getMycards();
        $mycard = new HeartsCard();
        $mycard->setNumber($card);
        $mycard->setStatus(2);

        array_push($temp, $mycard);
        $this->setMycards($temp);
    }

    function playCard(int $suit) :HeartsCard {

        if($suit == 0){
            // suit has not been set, first player plays random card with status 2, not played
            while (true) {
                    // keep randomly picking a card until a status 2 is picked
                $i = rand(0,7);

                if($this->mycards[$i]->getStatus() == 2){
                    $this->mycards[$i]->setStatus(1);
                    return $this->mycards[$i]; // loop breaks on return
                }
            }
        }else{
            // cards are ordered by suit and face, see HeartsHand->dealCards(), so find first card with correct suit, status 2, otherwise play random card,
            for($i=0;$i<8;$i++){
                if (($this->mycards[$i]->getSuit() == $suit) and ($this->mycards[$i]->getStatus() == 2)){
                    $this->mycards[$i]->setStatus(1);
                    return $this->mycards[$i];
                }
            }
            // if we get here, every card is either the wrong suit or played, so draw a random card that hasn't been played
            while (true){
                $i = rand(0,7);

                if($this->mycards[$i]->getStatus() == 2){
                    $this->mycards[$i]->setStatus(1);
                    return $this->mycards[$i]; // loop breaks on return
                }
            }
        }


    }
}