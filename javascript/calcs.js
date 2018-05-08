// Cria um uma collection com todos os inputs que o usuário tem acesso
let inputsArray = document.getElementsByClassName('valor-input');

// Valores mkt médio
let mktVisiToLeads = 0.2;
let mktLeadsToOpor = 0.1;
let mktOporToClie = 0.25;
let taxa = 0.05;

setInterval(function () {
    let divMedias = document.getElementById('divMedias');

    let inputVisiToLeads = document.getElementById('visiToLeads');
    let inputLeadsToOpor = document.getElementById('leadsToOpor');
    let inputOporToClie = document.getElementById('oporToClie');
    let inputTaxa = document.getElementById('taxaConversao');
    let msgSpan = document.getElementById('alertMsg');

    if (document.getElementById("usarMedia").checked === false) {

        divMedias.classList.remove('hidden');

        if (inputTaxa.value !== '') {

            inputVisiToLeads.value = '';
            inputLeadsToOpor.value = '';
            inputOporToClie.value = '';

            taxa = inputTaxa.value;

            for (input of inputsArray) {
                input.disabled = false;
            }
        } else {
            if (inputOporToClie.value === '' || inputLeadsToOpor.value === '' || inputVisiToLeads.value === '') {
                if(inputOporToClie.value !== '' || inputLeadsToOpor.value !== '' || inputVisiToLeads.value !== ''){
                    msgSpan.innerText = "Complete os três campos de porcetagem";
                }
                for (input of inputsArray) {
                    input.disabled = true;
                }
            } else {
                msgSpan.innerText = "";

                mktVisiToLeads = (inputVisiToLeads.value / 100);
                mktLeadsToOpor = (inputLeadsToOpor.value / 100);
                mktOporToClie = (inputOporToClie.value / 100);

                for (input of inputsArray) {
                    input.disabled = false;
                }
            }
        }
    } else {

        divMedias.classList.add('hidden');

        mktVisiToLeads = 0.2;
        mktLeadsToOpor = 0.1;
        mktOporToClie = 0.25;

        inputVisiToLeads.value = '';
        inputLeadsToOpor.value = '';
        inputOporToClie.value = '';
        inputTaxa.value = '';

        for (input of inputsArray) {
            input.disabled = false;
        }
    }
}, 1000);


// Adiciona um evento onkeyup em todos os inputs da nossa collection
for (input of inputsArray) {
    input.onkeyup = () => {
        calc();
    }
}

// Função principal, executa todos nossos cálculos
function calc() {

    if (returnField('taxaConversao').value !== '') {
        if (returnField('visitantes') === document.activeElement || (returnField('taxaConversao') === document.activeElement && returnField('clientes').value === '')) {

            calcClientesTaxaConversao(returnField('visitantes').value, returnField('taxaConversao').value);
        } else {
            calcVisiTaxaConversao(returnField('clientes').value, returnField('taxaConversao').value);
        }
    } else {
        if (returnField('visitantes') === document.activeElement || returnField('leads') === document.activeElement) {

            calcVisi(returnField('leads').value, returnInputPct('visiToLeads', mktVisiToLeads));
            calcLeads(returnField('oportunidades').value, returnField('visitantes').value, returnInputPct('visiToLeads', mktVisiToLeads), returnInputPct('leadsToOpor', mktLeadsToOpor));
            calcOpor(returnField('leads').value, returnField('clientes').value, returnInputPct('leadsToOpor', mktLeadsToOpor), returnInputPct('oporToClie', mktOporToClie));
            calcClientes(returnField('oportunidades').value, returnInputPct('oporToClie', mktOporToClie));

        } else if (returnField('clientes') === document.activeElement || returnField('oportunidades') === document.activeElement) {

            calcClientes(returnField('oportunidades').value, returnInputPct('oporToClie', mktOporToClie));
            calcOpor(returnField('leads').value, returnField('clientes').value, returnInputPct('leadsToOpor', mktLeadsToOpor), returnInputPct('oporToClie', mktOporToClie));
            calcLeads(returnField('oportunidades').value, returnField('visitantes').value, returnInputPct('visiToLeads', mktVisiToLeads), returnInputPct('leadsToOpor', mktLeadsToOpor));
            calcVisi(returnField('leads').value, returnInputPct('visiToLeads', mktVisiToLeads));
        }
    }

    calclTM(returnField('receita').value, returnField('clientes').value);
    calcLucro(returnField("receita").value, returnField("campanha").value);
    calcCampanha(returnField('receita').value, returnField('lucro').value, returnField('prejuizo').value);
    calcCPL(returnField('campanha').value, returnField('leads').value);
    calcCAC(returnField('campanha').value, returnField('clientes').value);

}

// Calcula Clientes
function calcClientes(oportunidades, porcentagem, tm, receita) {
    if (returnField('clientes') !== document.activeElement) {
        if (returnField('oportunidades') === document.activeElement) {
            returnField('clientes').value = Math.round(oportunidades * porcentagem);
        } else if (oportunidades !== "") {
            returnField('clientes').value = Math.round(oportunidades * porcentagem);
        }
    }
}

// Calcula os Clientes pela Taxa de Conversão
function calcClientesTaxaConversao(visitantes, taxaConversao) {
    if (returnField('clientes') !== document.activeElement) {
        returnField('clientes').value = visitantes * toDecimal(taxaConversao);
        returnField('leads').value = '';
        returnField('oportunidades').value = '';
    }
}


// function calcCliePorTm(tm, receita){
//     if (returnField('clientes') !== document.activeElement) {
//         if (tm !== '' && receita !== ''){
//             console.log("teste");
//             returnField('clientes').value = Math.round(tm / receita);
//         }
//     }
// }

// Calcula Oportunidades
function calcOpor(leads, clientes, porcentagemBaixo, porcentagemCima) {
    if (returnField('oportunidades') !== document.activeElement) {
        let oporResult = 0;
        if (returnField('leads') === document.activeElement) {
            oporResult = leads * porcentagemBaixo;
        } else if (returnField('clientes') === document.activeElement) {
            oporResult = clientes / porcentagemCima;
        } else if (leads !== "") {
            oporResult = leads * porcentagemBaixo;
        }
        returnField('oportunidades').value = Math.round(oporResult);
    }
}

// Calcula Leads
function calcLeads(oportunidades, visitantes, porcentagemBaixo, porcentagemCima) {
    if (returnField('leads') !== document.activeElement) {
        let leadsResult = 0;
        if (returnField('oportunidades') === document.activeElement) {
            leadsResult = oportunidades / porcentagemCima;
        } else if (returnField('visitantes') === document.activeElement) {
            leadsResult = visitantes * porcentagemBaixo;
        } else if (oportunidades !== "") {
            leadsResult = oportunidades / porcentagemCima;
        }
        returnField('leads').value = Math.round(leadsResult);
    }
}

// Calcula Visitantes
function calcVisi(leads, porcentagem) {
    if (returnField('visitantes') !== document.activeElement) {
        if (returnField('leads') === document.activeElement) {
            returnField('visitantes').value = Math.round(leads / porcentagem);
        } else if (leads !== "") {
            returnField('visitantes').value = Math.round(leads / porcentagem);
        }
    }
}

// Calcula os Visitantes pela Taxa de Conversão
function calcVisiTaxaConversao(clientes, taxaConversao) {
    if (returnField('visitantes') !== document.activeElement) {
        returnField('visitantes').value = clientes / toDecimal(taxaConversao);
        returnField('leads').value = '';
        returnField('oportunidades').value = '';
    }
}

// Calcula Ticket Medio
function calclTM(receita, cliente) {
    if (receita !== '' && cliente !== '') {
        if (returnField('ticketmedio') !== document.activeElement) {
            returnField('ticketmedio').value = (receita / cliente).toFixed(2);
        }
    }
}

// Calcula CAC
function calcCAC(valorCampanha, cliente) {
    if (valorCampanha !== '' && cliente !== '') {
        if (returnField('cac') !== document.activeElement) {
            returnField('cac').value = (valorCampanha / cliente).toFixed(2);
        }
    }
}

// Calcula CPL
function calcCPL(valorCampanha, lead) {
    if (valorCampanha !== '' && lead !== '') {
        if (returnField('cpl') !== document.activeElement) {
            returnField('cpl').value = (valorCampanha / lead).toFixed(2);
        }
    }
}

// Calcula Receita
function calcReceita(ticketMedio, cliente, lucro, prejuizo, despesa) {
    if (ticketMedio !== '' && cliente !== '') {
        if (returnField('receita') !== document.activeElement) {
            returnField('receita').value = (ticketMedio * cliente).toFixed(2);
            console.log('oi');
        }
    } else {
        if (despesa !== '' && (lucro !== '' || prejuizo !== '')) {
            if (returnField('receita') !== document.activeElement) {
                console.log('oi');
                let receita;
                if (lucro !== '') {
                    receita = despesa + (despesa * (lucro / 100));
                } else {
                    receita = despesa - (despesa * (prejuizo / 100));
                }
                returnField('receita').value = receita.toFixed(2);
            }
        }
    }
}

// Calcula Despesa/Campanha
function calcCampanha(receita, lucro, prejuizo) {
    if (receita !== '' && (lucro !== '' || prejuizo !== '')) {
        if (returnField('campanha') !== document.activeElement) {
            let campanha;
            if (lucro !== '') {
                campanha = receita - (receita * (lucro / 100));
            } else if (prejuizo !== '') {
                preju = (receita * (prejuizo / 100))
                campanha = parseInt(receita) + parseInt(preju);
            }
            returnField('campanha').value = campanha;
        }
    }
}


// Calcula Lucro/Prejuizo
function calcLucro(valorReceita, valorDespesa) {
    if (valorDespesa !== "" && valorReceita !== "") {
        if (returnField('lucro') !== document.activeElement && returnField('prejuizo') !== document.activeElement) {
            let lucroResult = valorReceita - valorDespesa;
            let pct = (lucroResult / valorReceita) * 100;
            if (lucroResult > 0) {
                returnField('prejuizo').value = 0;
                returnField('lucro').value = pct.toFixed(2);
            }
            else {
                returnField('lucro').value = 0;
                returnField('prejuizo').value = (pct * -1).toFixed(2);
            }
        }
    }
}


function returnInputPct(id, mkt) {
    return returnField(id).value !== '' ? (returnField(id).value / 100) : mkt;
}

function returnField(id) {
    return document.getElementById(id);
}

function toDecimal(pct) {
    return pct / 100;
}


function easterEgg(url) {
    // Create a new `Image` instance
    let image = new Image();

    image.onload = function () {
        // Inside here we already have the dimensions of the loaded image
        let style = [
            // Hacky way of forcing image's viewport using `font-size` and `line-height`
            'font-size: 1px;',
            'line-height: ' + this.height + 'px;',

            // Hacky way of forcing a middle/center anchor point for the image
            'padding: ' + this.height * .5 + 'px ' + this.width * .5 + 'px;',

            // Set image dimensions
            'background-size: ' + this.width + 'px ' + this.height + 'px;',

            // Set image URL
            'background: url(' + url + ');'
        ].join(' ');

        console.log('%c', style);
    };

    // Actually loads the image
    image.src = url;
}