<?php

class BowlingGame
{
    protected $rolls = [];

    public function roll($pins)
    {
        $this->guardAgainstInvalidRoll($pins);
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $roll = 0;

        for ($frame = 1; $frame <= 10; $frame++) {

            if($this->isStrike($roll)) /*then we got a strike*/
            {
                 $score += 10 + $this->strikeBonus($roll);
                 $roll += 1;
            }


            else if ($this->isSpare($roll)) /*then we got a spare*/
            {
                $score += 10 + $this->spareBonus($roll);
                $roll += 2;
            }
            else
            {
                $score += $this->rolls[$roll] + $this->rolls[$roll + 1];
                $roll += 2;
            }

        }
            return $score;
        }

    /**
     * @param $roll
     * @return bool
     */
    public function isSpare($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1] == 10;
    }

    /**
     * @param $roll
     * @return bool
     */
    public function isStrike($roll)
    {
        return $this->rolls[$roll] == 10;
    }

    private function strikeBonus($roll){
        return $this->rolls[$roll + 1] + $this->rolls[$roll +2];
    }

    private function spareBonus($roll){
        return $this->rolls[$roll + 2];
    }

    /**
     * @param $pins
     */
    public function guardAgainstInvalidRoll($pins)
    {
        if ($pins < 0) {
            throw new InvalidArgumentException;
        }
    }

}
