<?php declare(strict_types = 1);

require_once("./InteractionStrategyInterface.php");

class InteractionNeighbourgStrategy implements InteractionStrategyInterface{

    /**
     * Selectionne aléatoirement 2 individus dans une population
     *
     * @param Array $population 
     * @return Array 2 individus
     */
    public function selectTwoIndividual(Array $population): Array
    {
        $randomInhabitant = array_rand($population, 1); 
        if ($randomInhabitant === array_key_first($population)) { // Si c'est le premier habitant
            $neighbour =  $randomInhabitant+1; // On prend le voisin suivant
        } elseif ($randomInhabitant === array_key_last($population) ) { // si c'est le "dernier"
            $neighbour =  $randomInhabitant-1; // On prend le voisin précédent
        } else { // Si ce n'est pas un cas particulier on prend le suivant ou le précédent
            $neighbour = rand(0,1) == 1 ? $randomInhabitant-1 : $randomInhabitant+1;
        }
        return [
            $randomInhabitant => $population[$randomInhabitant],
            $neighbour => $population[$neighbour],
        ];
    }
}

