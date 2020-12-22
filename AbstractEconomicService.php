<?php declare(strict_types = 1);

require_once("./SimulationEconomicServiceInterface.php");
require_once("./InteractionStrategyInterface.php");
require_once("./InteractionRandomStrategy.php");
require_once("./TransactionStrategyInterface.php");
require_once("./TransactionRandomStrategy.php");
require_once("./PopulationFactoryInterface.php");

abstract class AbstractEconomicService implements SimulationEconomicServiceInterface
{
    private array $population;

    protected InteractionStrategyInterface $interactionStrategy;

    protected TransactionStrategyInterface $transactionStrategy;

    private PopulationFactoryInterface $populationFactory;

    public function __construct(PopulationFactoryInterface $populationFactory) {
        $this->populationFactory = $populationFactory;

        /**
         * Initialize interaction strategy by default
         */
        $this->interactionStrategy = new InteractionRandomStrategy();

        /**
         * Initialize transaction strategy by default
         */
        $this->transactionStrategy = new TransactionRandomStrategy();
    }

    public function initializePopulation(): void
    {
        $this->population = $this->populationFactory->createPopulation(1000);
    }

    public function getPopulation(): array
    {
        return $this->population;
    }

    /**
     * Evaluation de la répartition de richesse
     * 
     * l'objectif était de faire un patron de conception : Template méthode.
     * Mais comme nous n'avons travailler actuellement que sur l'indice gini 
     * il est dur de connaitre les étapes communes entre plusieurs méthode d'évaluation.
     * Au final on a choisi une abstract function qui sera implémenter par les enfants.
     *
     * @return float
     */
    abstract public function evaluateWealth(): float;

    public function makeIteration(int $iteration): void
    {
        for($i = 0; $i < $iteration; $i++){
            // Step one : Make interaction between two individuals
            $twoIndividuals = $this->interactionStrategy->selectTwoIndividual($this->population);
            // var_dump($twoIndividuals);
            // Step two : Make them trade money
            $situationAfterTrade = $this->transactionStrategy->makeTransaction($twoIndividuals);
    
            // Step three : Reassignment of new values in array population
            foreach($situationAfterTrade as $key => $value){
                $this->population[$key] = $value;
            }
        }
    }

    public function setInteractionStrategy(InteractionStrategyInterface $interactionStrategy): void
    {
        $this->interactionStrategy = $interactionStrategy;
    }

    public function setTransactionStrategy(TransactionStrategyInterface $transactionStrategy): void
    {
        $this->transactionStrategy = $transactionStrategy;
    }

    /**
     * Get the value of interactionStrategy
     */ 
    public function getInteractionStrategy()
    {
        return $this->interactionStrategy;
    }

    /**
     * Get the value of transactionStrategy
     */ 
    public function getTransactionStrategy()
    {
        return $this->transactionStrategy;
    }
}