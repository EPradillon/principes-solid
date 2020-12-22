<?php declare(strict_types = 1);

interface PopulationFactoryInterface
{
    /**
     * Allow to create population
     *
     * @param integer $populationSize
     * @return array
     */
    public function createPopulation(int $populationSize) : array;

    /**
     * Allow to set distribution strategy
     *
     * @param DistributionStrategyInterface $strategyDistribution
     * @return void
     */
    public function setDistributionStrategy(DistributionStrategyInterface $strategyDistribution) : void;

}