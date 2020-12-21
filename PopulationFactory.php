<?php declare(strict_types = 1);

require_once("./DistributionStrategyInterface.php");
require_once("./PopulationFactoryInterface.php");

class PopulationFactory implements PopulationFactoryInterface {
    private DistributionStrategyInterface $strategyDistribution;

    /**
     * Allow to create population
     *
     * @param integer $populationSize
     * @return array
     */
    public function createPopulation(int $populationSize): array
    {
        $population = [];

        for($i = 0; $i < $populationSize; $i++){
            $population[] = $this->strategyDistribution->getWallet();
        }

        return $population;
    }

    /**
     * Allow to set distribution strategy
     *
     * @param DistributionStrategyInterface $strategyDistribution
     * @return void
     */
    public function setDistributionStrategy(DistributionStrategyInterface $strategyDistribution): void
    {
        $this->strategyDistribution = $strategyDistribution;
    }
}