<?php declare(strict_types = 1);

require_once("./InteractionStrategyInterface.php");

class InteractionRandomStrategy implements InteractionStrategyInterface{

    /**
     * Selectionne aléatoirement 2 individus dans une population
     *
     * @param Array $population 
     * @return Array 2 individus
     */
    public function selectTwoIndividual(Array $population): Array
    {
        $numberChosen = array_rand($population, 2);
        return [
            $numberChosen[0] => $population[$numberChosen[0]],
            $numberChosen[1] => $population[$numberChosen[1]],
        ];
    }
}