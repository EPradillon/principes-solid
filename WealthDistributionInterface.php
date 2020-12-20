<?php declare(strict_types = 1);

/**
 * Interface de Distribution de richesse
 * @author Etienne Pradillon <epradillon@gmail.com> | Samir Founou <samir_615@live.fr>
 */
interface WealthDistributionInterface {
    function returnWalletValue(): int;
}
