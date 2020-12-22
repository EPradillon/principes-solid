<?php

class Display {
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

    public function configurationPanel()
    {
        return (
               "--------------- Simulation Economique ---------------\n" .
               "|                                                   |\n" .
               "|           Configuration des stratégies            |\n" .
               "|          ******************************           |\n" .
               "|                                                   |\n" .
               "| - Stratégies de distribution   - CLI : distr      |\n" .
               "| - Stratégies de d'intéraction  - CLI : inter      |\n" .
               "| - Stratégies de transaction    - CLI : trans      |\n" .
               "| - Retour      - CLI : menu                        |\n" .
               "|                                                   |\n" .
               "---------------           🖥          ---------------\n"
        );
    }

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

    public function startSimulationPanel(float $giniFirst, float $giniFinal)
    {
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
            "---------------           🖥          ---------------\n"
        );
    }

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

    public function clearConsole()
    {
        if(PHP_OS == "Linux"){
            return system('clear');
        } elseif (PHP_OS == "WINNT"){
            return system('cls');
        }
    }
}
