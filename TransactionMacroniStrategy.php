<?php declare(strict_types = 1);

require_once("./TransactionStrategyInterface.php");

class TransactionMacroniStrategy implements TransactionStrategyInterface{

    /**
     * Effectue une transaction entre 2 individus
     *
     * @param Array $population 
     * @return Array
     */
    public function makeTransaction(Array $selectedIndividuals): Array
    {
        $sharedWealth = array_sum ($selectedIndividuals);
        $firstGuyMoney = $selectedIndividuals[array_keys($selectedIndividuals)[0]];
        $secondGuyMoney = $selectedIndividuals[array_keys($selectedIndividuals)[1]];
        // Le plus riche des deux individus récupère la totalité.
        if ($firstGuyMoney < $secondGuyMoney) {
            $selectedIndividuals[array_keys($selectedIndividuals)[0]] = $sharedWealth;
            $selectedIndividuals[array_keys($selectedIndividuals)[1]] = 0;
        } else {
            $selectedIndividuals[array_keys($selectedIndividuals)[1]] = $sharedWealth;
            $selectedIndividuals[array_keys($selectedIndividuals)[0]] = 0;
        }
        return $selectedIndividuals;
    }
}

