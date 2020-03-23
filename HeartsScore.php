<?php


namespace MRJ\LSHearts;


class HeartsScore
{
    private $mypoints;

    function __construct(){
        $this->setMypoints([0,0,0,0]);
    }

    function addPoints(int $player, int $points){
        $temp = $this->getMypoints();
        $temp[$player] += $points;
        $this->setMypoints($temp);
    }

    function continueGame() :bool{
        if(max($this->mypoints)<50){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param array $mypoints
     */
    public function setMypoints(array $mypoints) {
        $this->mypoints = $mypoints;
    }

    /**
     * @return array
     */
    public function getMypoints(): array {
        return $this->mypoints;
    }
}