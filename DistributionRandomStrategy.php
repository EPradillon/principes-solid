<?php declare(strict_types = 1);

class DistributionRandomStrategy implements DistributionStrategyInterface
{
    /**
     * Allow to get wallet
     *
     * @return integer
     */
    public function getWallet(): int
    {
        return rand(600, 5000);
    }
}