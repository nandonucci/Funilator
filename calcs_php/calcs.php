<?php
/**
 * Created by PhpStorm.
 * User: morales
 * Date: 5/11/2018
 * Time: 2:30 PM
 */

// Calcula os Leads a partir dos Visitantes
function calcVisiToLeads($visitantes, $pctVisiToLeads){
    return round($visitantes * $pctVisiToLeads);
}

// Calcula as Oportunidades a partir dos Leads
function calcLeadsToOpor($leads, $pctLeadsToOpor){
    return round($leads * $pctLeadsToOpor);
}

// Calcula os Clientes a partir das Oportunidades
function calcOporToClie($oportunidades, $pctOporToClie){
    return round($oportunidades * $pctOporToClie);
}

// Calcula as Oportunidades a partir dos Clientes
function calcClieToOpor($clientes, $pctOporToClie){
    return round($clientes / $pctOporToClie);
}

// Calcula os Leads a partir das Oportunidades
function calcOporToLeads($oportunidades, $pctLeadsToOpor){
    return round($oportunidades / $pctLeadsToOpor);
}

// Calcula os Visitantes a partir dos Leads
function calcLeadsToVisi($leads, $pctVisiToLeads){
    return round($leads / $pctVisiToLeads);
}

// Calcula os Visitantes pela taxa de conversao
function calcVisiByTxConversao($clientes, $taxaConversao){
    return round($clientes / $taxaConversao);
}

// Calcula os Clientes pela taxa de conversao
function calcClieByTxConversao($visitantes, $taxaConversao){
    return round($visitantes * $taxaConversao);
}

// Calcula os Clientes pela receita e Ticket Medio
function calcClieByTmEReceita($ticketMedio, $receita){
    return round($ticketMedio / $receita);
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
function CPL($campanha, $leads){
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

// calcula o lucro
function calcLucro($receita, $campanha){
    return round((($receita - $campanha) / $receita) * 100, 2);
}

// calcula prejuizo
function calcPreju($receita, $campanha){
    return round(((($receita - $campanha) / $receita) * 100) * -1, 2);
}