<?php declare(strict_types = 1);

require_once("./TransactionStrategyInterface.php");

class RandomTransactionStrategy implements TransactionStrategyInterface{

    /**
     * Effectue une transaction entre 2 individus
     *
     * @param Array $population 
     * @return Array
     */
    public function makeTransaction(Array $selectedIndividuals): Array
    {
        $sharedWealth = array_sum ($selectedIndividuals);
        $coef = rand(1,100)/100;
        $selectedIndividuals[array_keys($selectedIndividuals)[0]] = $sharedWealth * $coef;
        $selectedIndividuals[array_keys($selectedIndividuals)[1]] = $sharedWealth *  (1 - $coef);
        return $selectedIndividuals;
    }
}
