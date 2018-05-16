<?php
/**
 * Created by PhpStorm.
 * User: morales
 * Date: 5/11/2018
 * Time: 3:29 PM
 */

include "calcs.php";

function calc()
{
    if (isset($_POST['calcular'])) {

        echo "<span class='title-result'>// Resultados:</span>";

        $pctVisiToLeads = $_POST['visiToLeads'] !== "" ? $_POST['visiToLeads'] / 100 : 0.2;
        $pctLeadsToOpor = $_POST['leadsToOpor'] !== "" ? $_POST['leadsToOpor'] / 100 : 0.1;
        $pctOporToClie = $_POST['oporToClie'] !== "" ? $_POST['oporToClie'] / 100 : 0.25;
        $taxaConversao = $_POST['taxaConversao'] !== "" ? $_POST['taxaConversao'] / 100 : "";

        $clientes = $_POST['clientes'];
        $oportunidades = $_POST['oportunidades'];
        $leads = $_POST['leads'];
        $visitantes = $_POST['visitantes'];
        $ticketMedio = $_POST['ticketmedio'];
        $cac = $_POST['cac'];
        $cpl = $_POST['cpl'];
        $receita = $_POST['receita'];
        $campanha = $_POST['campanha'];
        $lucro = $_POST['lucro'] !== "" ? ($_POST['lucro'] / 100) : "";
        $prejuizo = $_POST['prejuizo'] !== "" ? ($_POST['prejuizo'] / 100) : "";

        $ticketMedioCalc = false;
        $cacCalc = false;
        $cplCalc = false;
        $receitaCalc = false;
        $campanhaCalc = false;
        $lucroPrejuCalc = false;

        if ($visitantes !== "" && $taxaConversao === "") {

            if ($ticketMedio !== "" && $receita !== "") {

                echo "<li><span>Visitantes:</span><p>" . $visitantes . "</p></li>";

                $clientesResultado = calcClieByTmEReceita($ticketMedio, $receita);

                echo "<li><span>Clientes:</span><p>" . $clientesResultado . "</p></li>";

                $taxaConversaoResultado = calcTaxaDeConversao($visitantes, $clientesResultado);

                echo "<li><span>Taxa de Conversão:</span><p>" . $taxaConversaoResultado . "%</p></li>";

            } else if ($campanha !== "" && $ticketMedio !== "") {

                if ($prejuizo !== "" || $lucro !== "") {

                    if ($lucro !== "") {

                        $receitaResultado = calcReceitaByLucro($campanha, $lucro);

                        echo "<li><span>Receita:</span><p>R$" . $receitaResultado . "</p></li>";

                    } else {

                        $receitaResultado = calcReceitaByPreju($campanha, $prejuizo);

                        echo "<li><span>Receita:</span><p>R$" . $receitaResultado . "</p></li>";

                    }

                    $receitaCalc = true;

                    $clientesResultado = calcClieByTmEReceita($ticketMedio, $receitaResultado);

                    echo "<li><span>Clientes:</span><p>" . $clientesResultado . "</p></li>";

                    $taxaConversaoResultado = calcTaxaDeConversao($visitantes, $clientesResultado);

                    echo "<li><span>Taxa de Conversão:</span><p>" . $taxaConversaoResultado . "%</p></li>";

                }

            } else {
                echo "<li><span>Porcentagem Visitantes para Leads utilizada:</span><p>" . $pctVisiToLeads * 100 . "%</p>";
                echo "<li><span>Porcentagem Leads para Oportunidades utilizada:</span><p>" . $pctLeadsToOpor * 100 . "%</p>";
                echo "<li><span>Porcentagem Oportunidades para Clientes utilizada:</span><p>" . $pctOporToClie * 100 . "%</p>";

                $leadsResultado = calcVisiToLeads($visitantes, $pctVisiToLeads);
                $oportunidadesResultado = calcLeadsToOpor($leadsResultado, $pctLeadsToOpor);
                $clientesResultado = calcOporToClie($oportunidadesResultado, $pctOporToClie);

                echo "<li><span>Visitantes:</span><p>" . $visitantes . "</p></li>";
                echo "<li><span>Leads:</span><p>" . $leadsResultado . "</p></li>";
                echo "<li><span>Oportunidades:</span><p>" . $oportunidadesResultado . "</p></li>";
                echo "<li><span>Clientes:</span><p>" . $clientesResultado . "</p></li>";

                $ticketMedioResultado = 0;
                $cacResultado = 0;
                $cplResultado = 0;
                $receitaResultado = 0;
                $campanhaResultado = 0;
                $lucroResultado = 0;
                $prejuizoResultado = 0;

                if ($receita !== "" && $ticketMedio === "") {

                    $ticketMedioResultado = calcTicketMedio($receita, $clientesResultado);

                    echo "<li><span>Ticket Médio:</span><p>R$" . $ticketMedioResultado . "</p></li>";

                    $ticketMedioCalc = true;

                }

                if ($campanha !== "" && $cac === "") {

                    $cacResultado = calcCAC($campanha, $clientesResultado);

                    echo "<li><span>CAC:</span><p>R$" . $cacResultado . "</p></li>";

                    $cacCalc = true;

                }

                if ($campanha !== "" && $cpl === "") {

                    $cplResultado = calcCPL($campanha, $leadsResultado);

                    echo "<li><span>CPL:</span><p>R$" . $cplResultado . "</p></li>";

                    $cplCalc = true;

                }

                if ($receita === "" && $ticketMedio === "") {

                    $receitaResultado = calcReceitaByTmEClientes($ticketMedioResultado, $clientesResultado);

                    echo "<li><span>Receita:</span><p>R$" . $receitaResultado . "</p></li>";

                    $receitaCalc = true;

                }

                if (($lucro !== "" || $prejuizo !== "") && $campanha === "" && $receita === "") {

                    if ($lucro !== "") {

                        $campanhaResultado = calcCampanhaByLucro($receitaResultado, $lucro);

                        echo "<li><span>Campanha:</span><p>R$" . $campanhaResultado . "</p></li>";

                        $campanhaCalc = true;

                    } else {

                        $campanhaResultado = calcCampanhaByPreju($receitaResultado, $prejuizo);

                        echo "<li><span>Campanha:</span><p>R$" . $campanhaResultado . "</p></li>";

                        $campanhaCalc = true;

                    }
                }

                if ($lucro === "" && $prejuizo === "") {

                    if ($campanhaResultado !== 0) {

                        if (calcLucroOuPreju($receitaResultado, $campanhaResultado) === "lucro") {

                            $lucroResultado = calcLucro($receitaResultado, $campanhaResultado);

                            echo "<li><span>Lucro:</span><p>" . $lucroResultado . "%</p>";

                        } else {

                            $prejuizoResultado = calcPreju($receitaResultado, $campanhaResultado);

                            echo "<li><span>Prejuízo:</span><p>" . $prejuizoResultado . "%</p>";

                        }

                        $lucroPrejuCalc = true;

                    }

                }


            }

        } else if ($visitantes !== "" && $taxaConversao !== "") {

            echo "<li><span>Taxa de Coneversão utilizada:</span><p>" . $taxaConversao * 100 . "%</p>";

            $clientesResultado = calcClieByTxConversao($visitantes, $taxaConversao);

            echo "<li><span>Visitantes:</span><p>" . $visitantes . "</p></li>";
            echo "<li><span>Clientes:</span><p>" . $clientesResultado . "</p></li>";

            $ticketMedioResultado = 0;
            $cacResultado = 0;
            $cplResultado = 0;
            $receitaResultado = 0;
            $campanhaResultado = 0;
            $lucroResultado = 0;
            $prejuizoResultado = 0;

            if ($campanha !== "" && ($prejuizo !== "" || $lucro !== "")) {

                if ($lucro !== "") {

                    $receitaResultado = calcReceitaByLucro($campanha, $lucro);

                    echo "<li><span>Receita:</span><p>R$" . $receitaResultado . "</p></li>";

                } else {

                    $receitaResultado = calcReceitaByPreju($campanha, $prejuizo);

                    echo "<li><span>Receita:</span><p>R$" . $receitaResultado . "</p></li>";

                }

                $receitaCalc = true;

                if ($ticketMedio === "") {

                    $ticketMedioResultado = calcTicketMedio($receitaResultado, $clientesResultado);

                    echo "<li><span>Ticket Médio:</span><p>R$" . $ticketMedioResultado . "</p></li>";

                    $ticketMedioCalc = true;

                }

            }

            if ($receita !== "" && $ticketMedio === "") {

                $ticketMedioResultado = calcTicketMedio($receita, $clientesResultado);

                echo "<li><span>Ticket Médio:</span><p>R$" . $ticketMedioResultado . "</p></li>";

                $ticketMedioCalc = true;

            }

            if ($campanha !== "" && $cac === "") {

                $cacResultado = calcCAC($campanha, $clientesResultado);

                echo "<li><span>CAC:</span><p>R$" . $cacResultado . "</p></li>";

                $cacCalc = true;

            }

            if ($receita === "" && $ticketMedio === "") {

                $receitaResultado = calcReceitaByTmEClientes($ticketMedioResultado, $clientesResultado);

                echo "<li><span>Receita:</span><p>R$" . $receitaResultado . "</p></li>";

                $receitaCalc = true;

            }

            if (($lucro !== "" || $prejuizo !== "") && $campanha === "" && $receita === "") {

                if ($lucro !== "") {

                    $campanhaResultado = calcCampanhaByLucro($receitaResultado, $lucro);

                    echo "<li><span>Campanha:</span><p>R$" . $campanhaResultado . "</p></li>";

                    $campanhaCalc = true;

                } else {

                    $campanhaResultado = calcCampanhaByPreju($receitaResultado, $prejuizo);

                    echo "<li><span>Campanha:</span><p>R$" . $campanhaResultado . "</p></li>";

                    $campanhaCalc = true;

                }
            }

            if ($lucro === "" && $prejuizo === "") {

                if ($campanhaResultado !== 0) {

                    if (calcLucroOuPreju($receitaResultado, $campanhaResultado) === "lucro") {

                        $lucroResultado = calcLucro($receitaResultado, $campanhaResultado);

                        echo "<li><span>Lucro:</span><p>" . $lucroResultado . "%</p>";

                    } else {

                        $prejuizoResultado = calcPreju($receitaResultado, $campanhaResultado);

                        echo "<li><span>Prejuízo:</span><p>" . $prejuizoResultado . "%</p>";

                    }

                    $lucroPrejuCalc = true;

                }

            }

            if ($cac !== "") {

                $campanhaResultado = calcCampanhaByCac($cac, $clientesResultado);

                echo "<li><span>Campanha:</span><p>R$" . $campanhaResultado . "</p>";

                $campanhaCalc = true;

                if ($lucro !== "" || $prejuizo !== "") {

                    if ($lucro !== "") {

                        $receitaResultado = calcReceitaByLucro($campanhaResultado, $lucro);

                        echo "<li><span>Receita:</span><p>R$" . $receitaResultado . "</p>";

                    } else {

                        $receitaResultado = calcReceitaByPreju($campanhaResultado, $prejuizo);

                        echo "<li><span>Receita:</span><p>R$" . $receitaResultado . "</p>";

                    }

                    $receitaCalc = true;

                    $ticketMedioResultado = calcTicketMedio($receitaResultado, $clientesResultado);

                    echo "<li><span>Ticket Médio:</span><p>R$" . $ticketMedioResultado . "</p>";

                    $ticketMedioCalc = true;

                }

            }

        } else if ($leads !== "") {

            echo "<li><span>Porcentagem Visitantes para Leads utilizada:</span><p>" . $pctVisiToLeads * 100 . "%</p>";
            echo "<li><span>Porcentagem Leads para Oportunidades utilizada:</span><p>" . $pctLeadsToOpor * 100 . "%</p>";
            echo "<li><span>Porcentagem Oportunidades para Clientes utilizada:</span><p>" . $pctOporToClie * 100 . "%</p>";

            $visitantesResultado = calcLeadsToVisi($leads, $pctVisiToLeads);
            $oportunidadesResultado = calcLeadsToOpor($leads, $pctLeadsToOpor);
            $clientesResultado = calcOporToClie($oportunidadesResultado, $pctOporToClie);

            echo "<li><span>Visitantes:</span><p>" . $visitantesResultado . "</p></li>";
            echo "<li><span>Leads:</span><p>" . $leads . "</p></li>";
            echo "<li><span>Oportunidades:</span><p>" . $oportunidadesResultado . "</p></li>";
            echo "<li><span>Clientes:</span><p>" . $clientesResultado . "</p></li>";

            $ticketMedioResultado = 0;
            $cacResultado = 0;
            $cplResultado = 0;
            $receitaResultado = 0;
            $campanhaResultado = 0;
            $lucroResultado = 0;
            $prejuizoResultado = 0;

            if ($receita !== "" && $ticketMedio === "") {

                $ticketMedioResultado = calcTicketMedio($receita, $clientesResultado);

                echo "<li><span>Ticket Médio:</span><p>R$" . $ticketMedioResultado . "</p></li>";

                $ticketMedioCalc = true;

            }

            if ($campanha !== "" && $cac === "") {

                $cacResultado = calcCAC($campanha, $clientesResultado);

                echo "<li><span>CAC:</span><p>R$" . $cacResultado . "</p></li>";

                $cacCalc = true;

            }

            if ($receita === "" && $ticketMedio !== "") {

                $receitaResultado = calcReceitaByTmEClientes($ticketMedio, $clientesResultado);

                echo "<li><span>Receita:</span><p>R$" . $receitaResultado . "</p></li>";

                $receitaCalc = true;

                if ($lucro !== "" || $prejuizo !== "") {

                    if ($lucro !== "") {

                        $campanhaResultado = calcCampanhaByLucro($receitaResultado, $lucro);

                        echo "<li><span>Campanha:</span><p>R$" . $campanhaResultado . "</p></li>";

                    } else {

                        $campanhaResultado = calcCampanhaByPreju($receitaResultado, $prejuizo);

                        echo "<li><span>Campanha:</span><p>R$" . $campanhaResultado . "</p></li>";
                    }

                    $campanhaCalc = true;

                }

            }

            if (($lucro !== "" || $prejuizo !== "") && $campanha === "" && $receita === "") {

                if ($lucro !== "") {

                    $campanhaResultado = calcCampanhaByLucro($receitaResultado, $lucro);

                    echo "<li><span>Campanha:</span><p>R$" . $campanhaResultado . "</p></li>";

                    $campanhaCalc = true;

                } else {

                    $campanhaResultado = calcCampanhaByPreju($receitaResultado, $prejuizo);

                    echo "<li><span>Campanha:</span><p>R$" . $campanhaResultado . "</p></li>";

                    $campanhaCalc = true;

                }
            }

            if ($lucro === "" && $prejuizo === "") {

                if ($campanhaResultado !== 0) {

                    if (calcLucroOuPreju($receitaResultado, $campanhaResultado) === "lucro") {

                        $lucroResultado = calcLucro($receitaResultado, $campanhaResultado);

                        echo "<li><span>Lucro:</span><p>" . $lucroResultado . "%</p>";

                    } else {

                        $prejuizoResultado = calcPreju($receitaResultado, $campanhaResultado);

                        echo "<li><span>Prejuízo:</span><p>" . $prejuizoResultado . "%</p>";

                    }

                    $lucroPrejuCalc = true;

                }

            }

        } else if ($oportunidades !== "") {

            echo "<li><span>Porcentagem Visitantes para Leads utilizada:</span><p>" . $pctVisiToLeads * 100 . "%</p>";
            echo "<li><span>Porcentagem Leads para Oportunidades utilizada:</span><p>" . $pctLeadsToOpor * 100 . "%</p>";
            echo "<li><span>Porcentagem Oportunidades para Clientes utilizada:</span><p>" . $pctOporToClie * 100 . "%</p>";

            $leadsResultado = calcOporToLeads($oportunidades, $pctLeadsToOpor);
            $visitantesResultado = calcLeadsToVisi($leadsResultado, $pctVisiToLeads);
            $clientesResultado = calcOporToClie($oportunidades, $pctOporToClie);

            $ticketMedioResultado = 0;
            $cacResultado = 0;
            $cplResultado = 0;
            $receitaResultado = 0;
            $campanhaResultado = 0;
            $lucroResultado = 0;
            $prejuizoResultado = 0;

            echo "<li><span>Visitantes:</span><p>" . $visitantesResultado . "</p></li>";
            echo "<li><span>Leads:</span><p>" . $leadsResultado . "</p></li>";
            echo "<li><span>Oportunidades:</span><p>" . $oportunidades . "</p></li>";
            echo "<li><span>Clientes:</span><p>" . $clientesResultado . "</p></li>";

            if ($receita !== "" && $ticketMedio === "") {

                $ticketMedioResultado = calcTicketMedio($receita, $clientesResultado);

                echo "<li><span>Ticket Médio:</span><p>R$" . $ticketMedioResultado . "</p></li>";

                $ticketMedioCalc = true;

            }

            if ($campanha !== "" && $cac === "") {

                $cacResultado = calcCAC($campanha, $clientesResultado);

                echo "<li><span>CAC:</span><p>R$" . $cacResultado . "</p></li>";

                $cacCalc = true;

            }

            if ($campanha !== "" && $cpl === "") {

                $cplResultado = calcCPL($campanha, $leadsResultado);

                echo "<li><span>CPL:</span><p>R$" . $cplResultado . "</p></li>";

                $cplCalc = true;

            }

            if ($receita === "" && $ticketMedio === "") {

                $receitaResultado = calcReceitaByTmEClientes($ticketMedioResultado, $clientesResultado);

                echo "<li><span>Receita:</span><p>R$" . $receitaResultado . "</p></li>";

                $receitaCalc = true;

            }

            if (($lucro !== "" || $prejuizo !== "") && $campanha === "" && $receita === "") {

                if ($lucro !== "") {

                    $campanhaResultado = calcCampanhaByLucro($receitaResultado, $lucro);

                    echo "<li><span>Campanha:</span><p>R$" . $campanhaResultado . "</p></li>";

                    $campanhaCalc = true;

                } else {

                    $campanhaResultado = calcCampanhaByPreju($receitaResultado, $prejuizo);

                    echo "<li><span>Campanha:</span><p>R$" . $campanhaResultado . "</p></li>";

                    $campanhaCalc = true;

                }
            }

            if ($lucro === "" && $prejuizo === "") {

                if ($campanhaResultado !== 0) {

                    if (calcLucroOuPreju($receitaResultado, $campanhaResultado) === "lucro") {

                        $lucroResultado = calcLucro($receitaResultado, $campanhaResultado);

                        echo "<li><span>Lucro:</span><p>" . $lucroResultado . "%</p>";

                    } else {

                        $prejuizoResultado = calcPreju($receitaResultado, $campanhaResultado);

                        echo "<li><span>Prejuízo:</span><p>" . $prejuizoResultado . "%</p>";

                    }

                    $lucroPrejuCalc = true;

                }

            }

        } else if ($clientes !== "" && $taxaConversao === "") {

            echo "<li><span>Porcentagem Visitantes para Leads utilizada:</span><p>" . $pctVisiToLeads * 100 . "%</p>";
            echo "<li><span>Porcentagem Leads para Oportunidades utilizada:</span><p>" . $pctLeadsToOpor * 100 . "%</p>";
            echo "<li><span>Porcentagem Oportunidades para Clientes utilizada:</span><p>" . $pctOporToClie * 100 . "%</p>";

            $oportunidadesResultado = calcClieToOpor($clientes, $pctOporToClie);
            $leadsResultado = calcOporToLeads($oportunidadesResultado, $pctLeadsToOpor);
            $visitantesResultado = calcLeadsToVisi($leadsResultado, $pctVisiToLeads);

            $ticketMedioResultado = 0;
            $cacResultado = 0;
            $cplResultado = 0;
            $receitaResultado = 0;
            $campanhaResultado = 0;
            $lucroResultado = 0;
            $prejuizoResultado = 0;

            echo "<li><span>Visitantes:</span><p>" . $visitantesResultado . "</p></li>";
            echo "<li><span>Leads:</span><p>" . $leadsResultado . "</p></li>";
            echo "<li><span>Oportunidades:</span><p>" . $oportunidadesResultado . "</p></li>";
            echo "<li><span>Clientes:</span><p>" . $clientes . "</p></li>";

            if ($campanha !== "" && $cpl === "") {

                $cplResultado = calcCPL($campanha, $leadsResultado);

                echo "<li><span>CPL:</span><p>R$" . $cplResultado . "</p></li>";

                $cplCalc = true;

            }

        } else if ($clientes !== "" && $taxaConversao !== "") {

            echo "<li><span>Taxa de Coneversão utilizada:</span><p>" . $taxaConversao * 100 . "%</p>";

            $visitantesResultado = calcVisiByTxConversao($clientes, $taxaConversao);

            echo "<li><span>Visitantes:</span><p>" . $visitantesResultado . "</p></li>";
            echo "<li><span>Clientes:</span><p>" . $clientes . "</p></li>";

        } else if ($ticketMedio !== "" && $receita !== "") {

            $clientesResultado = calcClieByTmEReceita($ticketMedio, $receita);

            echo "<li><span>Clientes:</span><p>" . $clientesResultado . "</p></li>";


            if ($campanha !== "" && $cac === "") {

                $cacResultado = calcCAC($campanha, $clientesResultado);

                echo "<li><span>CAC:</span><p>R$" . $cacResultado . "</p></li>";

                $cacCalc = true;

            }

        }

        if ($campanha !== "" && $cpl !== "") {

            $leadsResultado = calcLeadsByCplECampanha($cpl, $campanha);

            echo "<li><span>Porcentagem Visitantes para Leads utilizada:</span><p>" . $pctVisiToLeads * 100 . "%</p>";
            echo "<li><span>Porcentagem Leads para Oportunidades utilizada:</span><p>" . $pctLeadsToOpor * 100 . "%</p>";
            echo "<li><span>Porcentagem Oportunidades para Clientes utilizada:</span><p>" . $pctOporToClie * 100 . "%</p>";

            $visitantesResultado = calcLeadsToVisi($leadsResultado, $pctVisiToLeads);
            $oportunidadesResultado = calcLeadsToOpor($leadsResultado, $pctLeadsToOpor);
            $clientesResultado = calcOporToClie($oportunidadesResultado, $pctOporToClie);

            echo "<li><span>Visitantes:</span><p>" . $visitantesResultado . "</p></li>";
            echo "<li><span>Leads:</span><p>" . $leadsResultado . "</p></li>";
            echo "<li><span>Oportunidades:</span><p>" . $oportunidadesResultado . "</p></li>";
            echo "<li><span>Clientes:</span><p>" . $clientesResultado . "</p></li>";

        }

        if ($ticketMedioCalc === false) {

            if ($clientes !== "" && $receita !== "") {

                $ticketMedioResultado = calcTicketMedio($receita, $clientes);

                echo "<li><span>Ticket Médio:</span><p>R$" . $ticketMedioResultado . "</p></li>";

            }

        }

        if ($cacCalc === false) {

            if ($clientes !== "" && $campanha !== "") {

                $cacResultado = calcCAC($campanha, $clientes);

                echo "<li><span>CAC:</span><p>R$" . $cacResultado . "</p></li>";

            }

        }

        if ($cplCalc === false) {

            if ($campanha !== "" && $leads !== "") {

                $cplResultado = calcCPL($campanha, $leads);

                echo "<li><span>CPL:</span><p>R$" . $cplResultado . "</p></li>";

            }

        }

        if ($receitaCalc === false) {

            if ($ticketMedio !== "" && $clientes !== "") {

                $receitaResultado = calcReceitaByTmEClientes($ticketMedio, $clientes);

                echo "<li><span>Receita:</span><p>R$" . $receitaResultado . "</p></li>";

                if ($lucro !== "") {

                    $campanhaResultado = calcCampanhaByLucro($receitaResultado, $lucro);

                    echo "<li><span>Campanha:</span><p>R$" . $campanhaResultado . "</p></li>";

                    $campanhaCalc = true;

                } else if ($prejuizo !== "") {

                    $campanhaResultado = calcCampanhaByPreju($receitaResultado, $prejuizo);

                    echo "<li><span>Campanha:</span><p>R$" . $campanhaResultado . "</p></li>";

                    $campanhaCalc = true;

                }

            } else if ($campanha !== "" && ($lucro !== "" || $prejuizo !== "")) {

                if ($lucro !== "") {

                    $receitaResultado = calcReceitaByLucro($campanha, $lucro);

                    echo "<li><span>Receita:</span><p>R$" . $receitaResultado . "</p></li>";

                } else {

                    $receitaResultado = calcReceitaByPreju($campanha, $prejuizo);

                    echo "<li><span>Receita:</span><p>R$" . $receitaResultado . "</p></li>";

                }
            }
        }

        if ($campanhaCalc === false) {

            if (($lucro !== "" || $prejuizo !== "") && $campanha === "") {

                if ($lucro !== "") {

                    $campanhaResultado = calcCampanhaByLucro($receita, $lucro);

                    echo "<li><span>Campanha:</span><p>R$" . $campanhaResultado . "</p></li>";


                } else {

                    $campanhaResultado = calcCampanhaByPreju($receita, $prejuizo);

                    echo "<li><span>Campanha:</span><p>R$" . $campanhaResultado . "</p></li>";

                }

                if($cpl !== "" && $leads === ""){

                    $leadsResultado = calcLeadsByCplECampanha($cpl, $campanhaResultado);

                    echo "<li><span>Leads:</span><p>" . $leadsResultado . "</p></li>";

                    $oportunidadesResultado = calcLeadsToOpor($leadsResultado, $pctLeadsToOpor);
                    $clientesResultado = calcOporToClie($oportunidadesResultado, $pctOporToClie);

                    echo "<li><span>Oportunidades:</span><p>" . $oportunidadesResultado . "</p></li>";
                    echo "<li><span>Clientes:</span><p>" . $clientesResultado . "</p></li>";

                }
            }
        }

        if ($lucroPrejuCalc === false) {

            if ($lucro === "" && $prejuizo === "" && $receita !== "" && $campanha !== "") {

                if (calcLucroOuPreju($receita, $campanha) === "lucro") {

                    $lucroResultado = calcLucro($receita, $campanha);

                    echo "<li><span>Lucro:</span><p>" . $lucroResultado . "%</p>";

                } else {

                    $prejuizoResultado = calcPreju($receita, $campanha);

                    echo "<li><span>Prejuízo:</span><p>" . $prejuizoResultado . "%</p>";

                }
            }
        }
    }
}
