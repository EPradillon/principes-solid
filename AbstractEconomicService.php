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