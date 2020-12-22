<?php declare(strict_types = 1);

require_once("./DistributionStrategyInterface.php");

class DistributionNormalStrategy implements DistributionStrategyInterface
{
    private int $sigma = 667;

    private int $mu = 2500;

    /**
     * The 68-95-99.7 rule for a Normal Distribution
     *
     * @var array
     */
    private $normalLawDistributionRule = [
        68.2,
        95.4,
        99.7
    ];

    /**
     * Allow to get wallet
     *
     * @return integer
     */
    public function getWallet(): int
    {
        $initialValue = $this->getMu();
        $modifier = $this->getModifierAbsoluteValue();
        $modifiedValue = $this->applyDisparity($initialValue, $modifier);
        return $modifiedValue;
    }

    /**
     * Allow to apply disparity
     *
     * @param integer $initialValue
     * @param integer $modifier
     * @return integer
     */
    public function applyDisparity(int $initialValue, int $modifier): int
    {
        return rand(0, 1) === 1 ? $initialValue - $modifier : $initialValue + $modifier;
    }

    /**
     * Evaluate the range from average wallet
     * 
     * @return integer
     */
    public function getModifierAbsoluteValue(): int
    {
        $steps = $this->getNormalLawDistributionRule();// récupération de la régle "68-95-99.7"
        $roll = rand(1, 1000); // 1000 pour prévoir la décimal
        
        $sigmaValue = $this->getSigma();
        // Quoi qu'il arrive on aura une valeur entre deux seuls comprise entre 0 et sigma
        $modifier = rand(0, $sigmaValue); 

        // Pour chaque niveau de probabilité on passe au "seuil" suivant.
        foreach ($steps as $probability) {
            if ($roll > $probability * 10) { // *10 pour inclure la décimale
                $modifier += $sigmaValue;
            }
        }
        return $modifier;
    }


    /**
     * Get the value of normalLawDistributionRule
     */
    public function getNormalLawDistributionRule()
    {
        return $this->normalLawDistributionRule;
    }

    /**
     * Get the value of mu
     */
    public function getMu()
    {
        return $this->mu;
    }

    /**
     * Get the value of sigma
     */ 
    public function getSigma()
    {
        return $this->sigma;
    }
}
