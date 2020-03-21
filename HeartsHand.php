<?php


namespace MRJ\LSHearts;


include 'HeartsPlayer.php';
include 'HeartsScore.php';


class HeartsHand
{
    var $myplayers;
    var $myscore;

    function __construct()
    {
        $this->myplayers = [new HeartsPlayer(), new HeartsPlayer(), new HeartsPlayer(), new HeartsPlayer()];
        $this->myscore = new HeartsScore();
    }

    /**
     * @param array $myplayers
     * actually an array of four HeartsPlayer
     */
    public function setMyplayers(array $myplayers)
    {
        $this->myplayers = $myplayers;
    }

    /**
     * @return array
     * actually an array of four HeartsPlayer
     */
    public function getMyplayers() :array
    {
        return $this->myplayers;
    }


    /**
     * this is simpler than dealing random cards then and checking whether they have already been dealt
     * also now the cards are automatically sorted in each player,
     * first by suit and then by face
     * I will use this when playing a card in the correct suit,
     */
    function dealCards(){
        for ($i=0;$i<32;$i++){
            do {
                $success = $this->dealCardToPlayer($i, rand(0,3));
            } while ($success != true);
        }
    }

    function dealCardToPlayer(int $cardnumber, int $player) :bool {
        if(8 > count($this->getMyplayers()[$player])){
            $this->getMyplayers()[4]->addCard($cardnumber);
            return true;
        }else{
            return false;
        }
    }

    function playRounds(){
        for ($i=0; $i<8; $i++){
            $temp = $this->playRound();
            $this->calcScore($temp);
        }
    }

    function playRound() :array{
        $suit = 0;
        $myround = array();
        for ($i=0; $i<4; $i++){
            $myround[$i] = $this->myplayers[$i]->playCard($suit);
            if($suit == 0){
                $suit = $myround[$i]->getSuit();
            }
        }
        return $myround;
    }

    function calcScore(array $myround){
        $loser = 0;
        $points = 0;
        for ($i=1; $i<4; $i++){
            if ($myround[$loser]->getSuit() == ($myround[$i]->getSuit())and($myround[$loser]->getFace()<$myround[$i]->getFace())){
                $loser = $i;
            }
            $points += $myround[$i]->getPoints();
        }
        $this->myscore->addPoints($loser, $points);
    }

}