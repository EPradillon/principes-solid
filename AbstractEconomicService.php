<?php declare(strict_types = 1);

abstract class AbstractEconomicService implements SimulationEconomicServiceInterface
{
    private array $population;

    protected InteractionStrategyInterface $interactionStrategy;

    protected TransactionStrategyInterface $transactionStrategy;

    private PopulationFactoryInterface $populationFactory;

    public function __construct(PopulationFactoryInterface $populationFactory) {
        $this->populationFactory = $populationFactory;
    }

    public function initializePopulation(): void
    {
        $this->population = $this->populationFactory->createPopulation(10000);
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
        
    }

    public function setInteractionStrategy(InteractionStrategyInterface $interactionStrategy): void
    {
        
    }

    public function setTransactionStrategy(TransactionStrategyInterface $transactionStrategy): void
    {
        
    }
}