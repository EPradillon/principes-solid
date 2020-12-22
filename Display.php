<?php declare(strict_types = 1);

class Display {
    /**
     * Allow to show menu panel
     *
     * @return void
     */
    public function menuPanel()
    {
        return (
                "--------------- Simulation Economique ---------------\n" .
                "|                                                   |\n" .
                "|                        Menu                       |\n" .
                "|                       ******                      |\n" .
                "|                                                   |\n" .
                "| - Configuration des stratégies - CLI : option     |\n" .
                "| - Lancer la simulation         - CLI : start      |\n" .
                "| - Quitter                      - CLI : stop       |\n" .
                "|                                                   |\n" .
                "---------------           🖥          ---------------\n"
        );
    }

    /**
     * Allow to show configuration panel
     *
     * @param string $strategyName
     * @return void
     */
    public function configurationPanel(string $strategyName = null)
    {
        if($strategyName){
            $notification = "\033[33m" . "Notification : " . $strategyName . " a été sélectionnée" . "\033[0m" ."\n";
        } else {
            $notification = "";
        }

        return (
               "--------------- Simulation Economique ---------------\n" .
               "|                                                   |\n" .
               "|           Configuration des stratégies            |\n" .
               "|          ******************************           |\n" .
               "|                                                   |\n" .
               "| - Stratégies de distribution   - CLI : distr      |\n" .
               "| - Stratégies de d'intéraction  - CLI : inter      |\n" .
               "| - Stratégies de transaction    - CLI : trans      |\n" .
               "| - Retour                       - CLI : menu                        |\n" .
               "|                                                   |\n" .
               "---------------           🖥          ---------------\n" .
               $notification
        );
    }

    /**
     * Allow to show strategies distribution panel
     *
     * @return void
     */
    public function strategiesDistributionPanel()
    {
        return (
                "--------------- Simulation Economique ---------------\n" .
                "|                                                   |\n" .
                "|             Stratégies de distribtion             |\n" .
                "|            ***************************            |\n" .
                "|                                                   |\n" .
                "| - Stratégie 1 - CLI : distr1                      |\n" .
                "| - Stratégie 2 - CLI : distr2                      |\n" .
                "| - Retour      - CLI : option                      |\n" .
                "|                                                   |\n" .
                "---------------           🖥          ---------------\n"
        );
    }

    /**
     * Allow to show strategies interaction panel
     *
     * @return void
     */
    public function strategiesInteractonPanel()
    {
        return (
               "--------------- Simulation Economique ---------------\n" .
               "|                                                   |\n" .
               "|             Stratégies d'intéraction              |\n" .
               "|            **************************             |\n" .
               "|                                                   |\n" .
               "| - Stratégie 1 - CLI : inter1                      |\n" .
               "| - Stratégie 2 - CLI : inter2                      |\n" .
               "| - Retour      - CLI : option                      |\n" .
               "|                                                   |\n" .
               "---------------           🖥          ---------------\n"
        );
    }

    /**
     * Allow to show stratgies transaction panel
     *
     * @return void
     */
    public function strategiesTransactionPanel()
    {
        return ( 
                "--------------- Simulation Economique ---------------\n" .
                "|                                                   |\n" .
                "|             Stratégies de transaction             |\n" .
                "|            ***************************            |\n" .
                "|                                                   |\n" .
                "| - Stratégie 1 - CLI : trans1                      |\n" .
                "| - Stratégie 2 - CLI : trans2                      |\n" .
                "| - Retour      - CLI : option                      |\n" .
                "|                                                   |\n" .
                "---------------           🖥          ---------------\n"
        );
    }

    /**
     * Allow to show simulation panel
     *
     * @param float $giniFirst
     * @param float $giniFinal
     * @return void
     */
    public function startSimulationPanel(float $giniFirst, float $giniFinal)
    {
        $messageBeforeIteration = null;
        $messageAfterIteration = null;

        $percentageGiniFirst  = $giniFirst * 100;
        $percentageGiniSecond = $giniFinal * 100;

        if($giniFirst < 0.25){
            $messageBeforeIteration = "\033[34m" . "Avant l'itération nous avons une inégalité très faible avec un indice de gini d'environ $percentageGiniFirst % "  . "\033[0m" ."\n";
        } elseif($giniFirst <= 0.5 && $giniFirst > 0.25){
            $messageBeforeIteration = "\033[92m" . "Avant l'itération nous avons une inégalité faible avec un indice de gini d'environ $percentageGiniFirst % "  . "\033[0m" ."\n";
        } elseif($giniFirst > 0.5 && $giniFirst <= 0.75){
            $messageBeforeIteration = "\033[33m" . "Avant l'itération nous avons une inégalité haute avec un indice de gini d'environ $percentageGiniFirst % "  . "\033[0m" ."\n";
        } elseif($giniFirst > 0.75){
            $messageBeforeIteration = "\033[31m" . "Avant l'itération nous avons une inégalité très haute avec un indice de gini d'environ $percentageGiniFirst % "  . "\033[0m" ."\n";
        }

        if($giniFinal < 0.25){
            $messageAfterIteration = "\033[34m" . "Après l'itération nous avons une inégalité très faible avec un indice de gini d'environ $percentageGiniSecond % "  . "\033[0m" ."\n";
        } elseif($giniFinal <= 0.5 && $giniFinal > 0.25){
            $messageAfterIteration = "\033[92m" . "Après l'itération nous avons une inégalité faible avec un indice de gini d'environ $percentageGiniSecond % "  . "\033[0m" ."\n";
        } elseif($giniFinal > 0.5 && $giniFinal <= 0.75){
            $messageAfterIteration = "\033[33m" . "Après l'itération nous avons une inégalité haute avec un indice de gini d'environ $percentageGiniSecond % "  . "\033[0m" ."\n";
        } elseif($giniFinal > 0.75){
            $messageAfterIteration = "\033[31m" . "Après l'itération nous avons une inégalité très haute avec un indice de gini d'environ $percentageGiniSecond % "  . "\033[0m" ."\n";
        }

        $showGiniFirst = "| => $giniFirst                                           |\n";
        $showGiniFinal = "| => $giniFinal                                           |\n";
        return ( 
            "--------------- Simulation Economique ---------------\n" .
            "|                                                   |\n" .
            "|            Lancement de la simulation             |\n" .
            "|           ****************************            |\n" .
            "|                                                   |\n" .
            "| - Indice de GINI avant la simulation :            |\n" .
            $showGiniFirst .
            "|                                                   |\n" .
            "| - Indice de GINI après la simulation :            |\n" .
            $showGiniFinal .
            "|                                                   |\n" .
            "| - Retour   - CLI : menu                           |\n" .
            "| - Relancer - CLI : start                          |\n" .
            "| - Quitter  - CLI : stop                           |\n" .
            "|                                                   |\n" .
            "---------------           🖥          ---------------\n" .
            $messageBeforeIteration . $messageAfterIteration . "\n"
        );
    }

    /**
     * Allow show cli exception panel
     *
     * @return void
     */
    public function CliException()
    {
        return ( 
                "--------------- Simulation Economique ---------------\n" .
                "|                                                   |\n" .
                "|         ⛔️ Warning : CLI non reconnue ⛔️          |\n" .
                "|           ****************************            |\n" .
                "| - Retour      - CLI : menu                        |\n" .
                "|                                                   |\n" .
                "---------------           🖥          ---------------\n"
        );
    }

    /**
     * Allow to clear console
     *
     * @return void
     */
    public function clearConsole()
    {
        if(PHP_OS == "Linux"){
            return system('clear');
        } elseif (PHP_OS == "WINNT"){
            return system('cls');
        }
    }
}
