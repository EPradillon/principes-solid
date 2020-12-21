<?php declare(strict_types = 1);

interface DistributionStrategyInterface
{
    /**
     * Allow to get wallet
     *
     * @return integer
     */
    public function getWallet() : int;
}