<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118085354-1"></script>
  <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
          dataLayer.push(arguments);
      }

      gtag('js', new Date());
      gtag('config', 'UA-118085354-1');
  </script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <meta name="description" content="Ferramenta gratuita para automatizar os cálculos dolorosos e
  demorados do seu funil de vendas"/>
  <link rel="canonical" href="https://www.agenciadosite.com.br/desenvolvimento-de-sites.htm"/>
  <meta property="og:locale" content="pt_BR"/>
  <meta property="og:type" content="article"/>
  <meta property="og:title" content="Funilat0r"/>
  <meta property="og:description" content="Ferramenta gratuita para automatizar os cálculos dolorosos e
  demorados do seu funil de vendas"/>
  <meta property="og:url" content="https://www.funilator.me"/>
  <meta property="og:site_name" content="Funilator"/>

  <!-- TODO: ALTERAR PARA OS NOSSOS ICONES -->

  <!-- <meta property="og:image" content="https://www.agenciadosite.com.br/wp-content/uploads/2017/10/criacao-de-site-img.jpg" />
  <link rel="icon" href="https://www.agenciadosite.com.br/wp-content/uploads/2017/12/cropped-favicon-3-1-32x32.png" sizes="32x32" />
  <link rel="icon" href="https://www.agenciadosite.com.br/wp-content/uploads/2017/12/cropped-favicon-3-1-192x192.png" sizes="192x192" />
  <link rel="apple-touch-icon-precomposed" href="https://www.agenciadosite.com.br/wp-content/uploads/2017/12/cropped-favicon-3-1-180x180.png" />
  <meta name="msapplication-TileImage" content="https://www.agenciadosite.com.br/wp-content/uploads/2017/12/cropped-favicon-3-1-270x270.png" /> -->

  <title>Funilat0r</title>
  <link rel="icon" href="images/fav-icon.png">
  <link href='https://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono" rel="stylesheet">
  <link href="stylesheets/animate.min.css" rel="stylesheet">
  <link href="stylesheets/materialize.css" rel="stylesheet">
  <link href="stylesheets/bootstrap.min.css" rel="stylesheet">
  <link href="stylesheets/style_fear_of_the_dark.css" id="switch_style" rel="stylesheet">
</head>

<body onload="easterEgg('https://i.imgflip.com/27tjfs.jpg');">
<!--==========================================
TOPO
===========================================-->
<header id="home">
  <div class="header-background section">
    <div id="v-card-holder">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">

            <!--==========================================
            CALCULADORA
            ===========================================-->
            <section id="contact" class="section">
              <div class="container">
                <!-- LOGO -->
                <div class="section-title">
                  <img id="logo-funilator" class="img-responsive" src="images/logo_funilator.png"
                       alt="logo_funilator">
                </div>
                <div class="text-center-home">
                  <p>//Funilat0r <span class="version"></span> é uma ferramenta para automatizar os cálculos dolorosos e
                    demorados do seu funil de vendas, é grátis, divirta-se.</p>
                </div>
                <div class="row">
                  <div id="contact-card" class="col-sm-12 col-xs-12">
                    <!-- FORM INPUT DADOS -->
                    <div class="card">
                      <div class="card-content">

                        <br><input type="checkbox" id="usarMedia" checked>
                        <h4>// utilizar média padrão
                          <b><span style="background-color: #e01616; color:#000;">&nbsp;20%&nbsp;</span></b>
                          / <b><span style="background-color: #05d0ff; color:#000;">&nbsp;10%&nbsp;</span></b>
                          / <b><span style="background-color: #34ba3a; color:#000;">&nbsp;25%&nbsp;</span></b>
                          / <b><span style="background-color: #f8a503; color:#000;">&nbsp;0,5%&nbsp;</span></b>
                        </h4>
                        <div class="hidden" id="divMedias">
                          <h5>informe abaixo p/ alterar <span><a href="pages/easteregg.html"
                                                                 style="color: #000000">?</a></span></h5>
                          <br><h6 id="alertMsg"></h6>

                          <!--Visitantes to Leads-->
                          <div class="input-field input-field-red">
                            <input id="visiToLeads" type="number" class="validate"
                                   name="visiToLeads">
                            <label for="visiToLeads">Visitantes p/ Leads</label>
                          </div>
                          <!--Leads to Oportunidades-->
                          <div class="input-field input-field-blue">
                            <input id="leadsToOpor" type="number" class="validate"
                                   name="leadsToOpor">
                            <label for="leadsToOpor">Leads p/ Oport.</label>
                          </div>
                          <!--Oportunidade to Clientes-->
                          <div class="input-field input-field-green">
                            <input id="oporToClie" type="number" class="validate"
                                   name="oporToClie">
                            <label for="oporToClie">Oport. p/ Clientes</label>
                          </div>
                          <!--Taxa de Conversao-->
                          <div class="input-field input-field-yellow">
                            <input id="taxaConversao" type="number" class="validate"
                                   name="taxaConversao">
                            <label for="taxaConversao">Taxa de Conversão</label>
                          </div>
                        </div>
                        <h4>//calcular</h4>
                        <form id="contact-form" name="c-form" class="form-block">
                          <!--CLIENTES-->
                          <div class="input-field">
                            <input id="clientes" type="number" class="validate valor-input"
                                   name="clientes">
                            <label for="clientes">Clientes</label>
                          </div>
                          <!--OPORTUNIDADE-->
                          <div class="input-field">
                            <input id="oportunidades" type="number" class="validate valor-input"
                                   name="oportunidades">
                            <label for="oportunidades">Oportunidades</label>
                          </div>
                          <!--LEADS-->
                          <div class="input-field">
                            <input id="leads" type="number" class="validate valor-input"
                                   name="leads">
                            <label for="leads">Leads</label>
                          </div>
                          <!--VISITANTES-->
                          <div class="input-field">
                            <input id="visitantes" type="number" class="validate valor-input"
                                   name="visitantes">
                            <label for="visitantes">Visitantes</label>
                          </div>
                          <!-- TICKET MÉDIO -->
                          <div class="input-field">
                            <input id="ticketmedio" type="number" class="validate valor-input"
                                   name="ticketmedio">
                            <label for="ticketmedio">Ticket Médio</label>
                          </div><!--CAC-->
                          <div class="input-field">
                            <input id="cac" type="number" class="validate valor-input" name="cac"
                            >
                            <label for="cac">CAC</label>
                          </div>
                          <!--CPL-->
                          <div class="input-field">
                            <input id="cpl" type="number" class="validate valor-input" name="cpl"
                            >
                            <label for="cpl">CPL</label>
                          </div>
                          <!--RECEITA-->
                          <div class="input-field">
                            <input id="receita" type="number" class="validate valor-input"
                                   name="receita">
                            <label for="receita">Receita</label>
                          </div>
                          <!--CAMPANHA-->
                          <div class="input-field">
                            <input id="campanha" type="number" class="validate valor-input"
                                   name="campanha">
                            <label for="campanha">Despesa/Campanha</label>
                          </div>
                          <!--LUCRO-->
                          <div class="input-field">
                            <input id="lucro" type="number" class="validate valor-input" name="lucro"
                            >
                            <label for="lucro">Lucro %</label>
                          </div>
                          <!--PREJUIZO-->
                          <div class="input-field">
                            <input id="prejuizo" type="number" class="validate valor-input"
                                   name="prejuizo">
                            <label for="prejuizo">Prejuizo %</label>
                          </div>


                          <!-- BOTÃO LIMPAR -->

                          <input type="reset" value="limpar">


                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <!--FOOTER-->
            <footer>
              <div class="container">
                <p class="text-center">
<!--                  <a href="https://github.com/brunorales" target="_blank">-->
<!--                    <strong>@BrunoMorales</strong>-->
<!--                  </a>-->
<!--                  <a href="http://fenmeyer.com.br" target="_blank">-->
<!--                    <strong>@FernandoMeyer</strong>-->
<!--                  </a>-->
<!--                  <a href="http://silviozum.github.io" target="_blank">-->
<!--                    <strong>@Silvinh0</strong>-->
<!--                  </a>-->
                  Todos os Direitos Reservados
                  <br>
                  <a href="#home">
                    <strong>Funilat0r <span class="version"></span></strong>
                  </a>
                </p>
              </div>
            </footer>
          </div>
        </div>
      </div>
    </div>
  </div>
  <span style="color: #000000">I'll be back...</span>
</header>

<script src="javascript/jquery-2.1.3.min.js"></script>
<script src="javascript/bootstrap.min.js"></script>
<script src="javascript/materialize.min.js"></script>
<script src="javascript/retina.min.js"></script>
<script src="javascript/scrollreveal.min.js"></script>
<script src="javascript/preloader.js"></script>
<!--<script src="javascript/calcs.js"></script>-->
<script src="javascript/version-control.js"></script>

</body>
</html>
