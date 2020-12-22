<?php declare(strict_types = 1);
require_once("./AbstractEconomicService.php");

final class GiniGenerator extends AbstractEconomicService
{
    /**
     * Initialization of salaries bracket
     */
    private array $salaryBracket = [
        "0-1000",
        "1000-2000",
        "2000-3000",
        "3000-4000",
        "4000-5000"
    ];

    /**
     * Allow to initialize the concentration array
     *
     * @return array
     */
    function iniatilzeArrayConcentrationStepOne() : array
    {
        $ni = 0;
        $fi = 0.0;
        $Fi = 0.0;
        $xi = 0.0;
        $nixi = 0.0;
        
        $arrayConcentration = [];

        $indexSalarayBracket = 0;

        foreach($this->salaryBracket as $bracket){
            list($min,$max) = explode('-', $bracket);
            $populationSize = count($this->getPopulation());
            $arrayConcentrationIndex = $min . '-' . $max;

            foreach($this->getPopulation() as $id => $salary){
                if($salary <= $max && $salary > $min){
                    $ni += 1;
                }
            }

            $fi = $ni / $populationSize;

            if($indexSalarayBracket == 0){
                $Fi = $fi;
            } else {
                $Fi = $arrayConcentration[$this->salaryBracket[$indexSalarayBracket - 1]]["Fi"] + $fi;
            }

            $xi   = ($min + $max) / 2;
            $nixi = $ni * $xi;

            $arrayConcentration[$arrayConcentrationIndex]["ni"] = $ni;
            $arrayConcentration[$arrayConcentrationIndex]["fi"] = $fi;
            $arrayConcentration[$arrayConcentrationIndex]["Fi"] = $Fi;
            $arrayConcentration[$arrayConcentrationIndex]["xi"] = $xi;
            $arrayConcentration[$arrayConcentrationIndex]["nixi"] = $nixi;

            $ni = 0;
            $fi = 0.0;
            $Fi = 0.0;
            $xi = 0;
            $nixi = 0;
            $indexSalarayBracket += 1;
        }

        return $arrayConcentration;
    }

    /**
     * Allow to increment concentration array
     *
     * @param array $arrayConcentration
     * @return array
     */
    function iniatilzeArrayConcentrationStepTwo(array $arrayConcentration) : array
    {
        $fnixi = 0.0;
        $Fnixi = 0.0;

        $indexSalarayBracket = 0;
        $total_nixi = 0;

        foreach($this->salaryBracket as $value){
            $total_nixi += $arrayConcentration[$value]["nixi"];
        }

        foreach($this->salaryBracket as $bracket){
            list($min,$max) = explode('-', $bracket);
            $arrayConcentrationIndex = $min . '-' . $max;

            $fnixi = $arrayConcentration[$arrayConcentrationIndex]["nixi"] / $total_nixi;

            if($indexSalarayBracket == 0){
                $Fnixi = $fnixi;
            } else {
                $Fnixi = $arrayConcentration[$this->salaryBracket[$indexSalarayBracket - 1]]["Fnixi"] + $fnixi;
            }

            $arrayConcentration[$arrayConcentrationIndex]["fnixi"] = $fnixi;
            $arrayConcentration[$arrayConcentrationIndex]["Fnixi"] = $Fnixi;

            $fnixi = 0;
            $Fnixi = 0;
            $indexSalarayBracket += 1;
        }

        return $arrayConcentration;
    }

    /**
     * Allow to get concentration surface
     *
     * @param array $arrayConcentration
     * @return float
     */
    function getConcentrationSurface(array $arrayConcentration) : float
    {
        $arraySumSurfaceConcentration = [];
        $indexSalarayBracket = 0;

        foreach($this->salaryBracket as $bracket){
            list($min,$max) = explode('-', $bracket);
            $arrayConcentrationIndex = $min . '-' . $max;

            $Fi    = $arrayConcentration[$arrayConcentrationIndex]["Fi"];
            $Fnixi = $arrayConcentration[$arrayConcentrationIndex]["Fnixi"];

            $firstConcentrationSurface = ($Fi * $Fnixi) / 2;

            if($indexSalarayBracket == 0){
                array_push($arraySumSurfaceConcentration, $firstConcentrationSurface);
            } else {
                $concentrationSurface = (
                    ($arrayConcentration[$this->salaryBracket[$indexSalarayBracket - 1]]["Fnixi"] + $Fnixi) *
                    ($Fi - $arrayConcentration[$this->salaryBracket[$indexSalarayBracket - 1]]["Fi"])
                ) / 2;

                array_push($arraySumSurfaceConcentration, $concentrationSurface);
            }

            $indexSalarayBracket += 1;
        }

        $totalSurface = array_sum($arraySumSurfaceConcentration);

        return 0.5 - $totalSurface;
    }

    /**
     * Allow to get gini index
     *
     * @param float $surfaceConcentration
     * @return float
     */
    function getGiniInedx(float $surfaceConcentration) : float
    {
        return 2 * $surfaceConcentration;
    }

    /**
     * Allow to evaluate wealth
     *
     * @return float
     */
    function evaluateWealth() : float
    {
        $arrayConcentrationStepOne = $this->iniatilzeArrayConcentrationStepOne();
        $arrayConcentrationStepTwo = $this->iniatilzeArrayConcentrationStepTwo($arrayConcentrationStepOne);

        // print_r($arrayConcentrationStepTwo);
        $surfaceConcentration = $this->getConcentrationSurface($arrayConcentrationStepTwo);
        
        return $this->getGiniInedx($surfaceConcentration);
    }
}