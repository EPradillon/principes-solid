<?php declare(strict_types = 1);

require_once("./InteractionStrategyInterface.php");

class NeighbourgInteractionStrategy implements InteractionStrategyInterface{

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
// $test = new NeighbourgInteractionStrategy;
// $populationtest = [
//     0 => 0,
//     1 => 100,
//     2 => 200,
//     3 => 300,
//     4 => 400,
//     5 => 500,
//     6 => 600
// ];
// $population = [
//     0,
//     100,
//     200,
//     300,
//     400,
//     500,
//     600
// ];

// for ($i=0; $i < 100; $i++) { 
//     $test->selectTwoIndividual($population);
// }

// var_dump($test->selectTwoIndividual($population));

