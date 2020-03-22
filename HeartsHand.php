<?php


namespace MRJ\LSHearts;


include 'HeartsPlayer.php';
include 'HeartsScore.php';


class HeartsHand
{
    var $myplayers;
    var $myscore;
    var $startingplayer;


    function __construct()
    {
        // names in honor of the late great Kenny Rogers
        $this->myplayers = [new HeartsPlayer("Janice"), new HeartsPlayer("Jean"), new HeartsPlayer("Margo"), new HeartsPlayer("Marianne")];
        $this->myscore = new HeartsScore();
        $this->startingplayer = 0;
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
        for ($i = 0; $i < 31; $i++){
            $this->dealCardToPlayer($i);
        }
        switch (true){
            case $this->myplayers[0]->countCards()==7:
                $this->myplayers[0]->addCard(31);
                break;
            case $this->myplayers[1]->countCards()==7:
                $this->myplayers[1]->addCard(31);
                break;
            case $this->myplayers[2]->countCards()==7:
                $this->myplayers[2]->addCard(31);

                break;
            case $this->myplayers[3]->countCards()==7:
                $this->myplayers[3]->addCard(31);
                break;
        }
    }

    function resetPlayers(){
        $this->setMyplayers([new HeartsPlayer("Janice"), new HeartsPlayer("Jean"), new HeartsPlayer("Margo"), new HeartsPlayer("Marianne")]);
    }

    function dealCardToPlayer(int $cardnumber){
        do {
            $r = rand(0,3);
        } while ($this->myplayers[$r]->countCards() > 7);
        $this->myplayers[$r]->addCard($cardnumber);

    }

    function playRounds(){
        for ($i=0; $i<8; $i++){
            $temp = $this->playRound();
            $this->calcScore($temp);

        }
    }

    function printHands(){
        for ($i=0; $i<4; $i++){
            $name = $this->myplayers[$i]->getName();
            echo "$name has: ";
            $this->myplayers[$i]->printPlayerCards();
            echo "<br>";
        }
        echo "<br>";
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
        $name = $this->myplayers[$loser]->getName();
        echo "$name has lost the round and scored $points points", "<br>";
    }

    function printScore(){
        echo "<br>";
        for($i=0; $i<4; $i++){
            $s = $this->myscore->getMypoints()[$i];
            $name = $this->myplayers[$i]->getName();
            echo "$name has $s points <br>";
        }
        echo "<br><br>";
    }
}