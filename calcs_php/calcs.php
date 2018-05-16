<?php
/**
 * Created by PhpStorm.
 * User: morales
 * Date: 5/11/2018
 * Time: 2:30 PM
 */

// Calcula os Leads a partir dos Visitantes
function calcVisiToLeads($visitantes, $pctVisiToLeads){
    return ceil($visitantes * $pctVisiToLeads);
}

// Calcula as Oportunidades a partir dos Leads
function calcLeadsToOpor($leads, $pctLeadsToOpor){
    return ceil($leads * $pctLeadsToOpor);
}

// Calcula os Clientes a partir das Oportunidades
function calcOporToClie($oportunidades, $pctOporToClie){
    return ceil($oportunidades * $pctOporToClie);
}

// Calcula as Oportunidades a partir dos Clientes
function calcClieToOpor($clientes, $pctOporToClie){
    return ceil($clientes / $pctOporToClie);
}

// Calcula os Leads a partir das Oportunidades
function calcOporToLeads($oportunidades, $pctLeadsToOpor){
    return ceil($oportunidades / $pctLeadsToOpor);
}

// Calcula os Visitantes a partir dos Leads
function calcLeadsToVisi($leads, $pctVisiToLeads){
    return ceil($leads / $pctVisiToLeads);
}

// Calcula os Visitantes pela taxa de conversao
function calcVisiByTxConversao($clientes, $taxaConversao){
    return ceil($clientes / $taxaConversao);
}

// Calcula os Clientes pela taxa de conversao
function calcClieByTxConversao($visitantes, $taxaConversao){
    return ceil($visitantes * ($taxaConversao * 10));
}

// Calcula os Clientes pela receita e Ticket Medio
function calcClieByTmEReceita($ticketMedio, $receita){
    return round($receita / $ticketMedio);
}

//Calcula o Ticket medio
function calcTicketMedio($receita, $clientes){
    return round($receita / $clientes, 2);
}

// Calcula o CAC
function calcCAC($campanha, $clientes){
    return round($campanha / $clientes, 2);
}

// Calcula o CPL
function calcCPL($campanha, $leads){
    return round($campanha / $leads, 2);
}

// Calcula a Receita Pelo ticket medio e os clientes
function calcReceitaByTmEClientes($ticketMedio, $clientes){
    return round($ticketMedio * $clientes, 2);
}

// Calcula a receita pelo lucro
function calcReceitaByLucro($campanha, $lucro){
    return round($campanha + ($campanha * $lucro), 2);
}

// Calcula a receita pelo prejuizo
function calcReceitaByPreju($campanha, $prejuizo){
    return round($campanha - ($campanha * $prejuizo), 2);
}

// Calcula a campanha pelo lucro
function calcCampanhaByLucro($receita, $lucro){
    return round($receita - ($receita * $lucro), 2);
}

// calcula a campanha pelo prejuizo
function calcCampanhaByPreju($receita, $prejuizo){
    return round($receita + ($receita * $prejuizo), 2);
}

function calcCampanhaByCac($cac, $clientes){
    return $cac * $clientes;
}

// calcula o lucro
function calcLucro($receita, $campanha){
    return round((($receita - $campanha) / $receita) * 100, 2);
}

// calcula prejuizo
function calcPreju($receita, $campanha){
    return round(((($receita - $campanha) / $receita) * 100) * -1, 2);
}

// verifica se obteve lucro ou prejuizo
function calcLucroOuPreju($receita, $campanha){

    if(($receita - $campanha) >= 0){
        return "lucro";
    }else{
        return "preju";
    }

}

function calcLeadsByCplECampanha($cpl, $campanha){
    return ceil($campanha / $cpl);
}

function calcTaxaDeConversao($visitantes, $clientes){
    return ($clientes * 100) / $visitantes;
}