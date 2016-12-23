<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'application/core/class/autoload.php';
$crud = new CRUD();
$auth = new AccessAuth01();
$log = $auth->Auth01();
@session_start();
?>
<?php //echo base_url('application/views/css/font-awesome.min.css');?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>leilaoimporta24h</title>

    <!--SEO Meta Tags-->
    <meta name="description" content="leilaoimporta24h" />
    <meta name="keywords" content="leilão,shopping,preço baixo,itens novos" />
    <meta name="author" content="Jonh17BR" />

    <!--Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!--Favicon-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Material Icons -->
    <link href="<?php echo base_url('application/views/assets/css/vendor/material-icons.min.css');?>" rel="stylesheet" media="screen">

    <!-- Brand Icons -->
    <link href="<?php echo base_url('application/views/assets/css/vendor/socicon.min.css');?>" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="<?php echo base_url('application/views/assets/css/vendor/bootstrap.min.css');?>" rel="stylesheet" media="screen">

    <link href="<?php echo base_url('application/views/assets/css/font-awesome.css');?>" rel="stylesheet" media="screen">
    <link href="http://themes.rokaux.com/m-store/v1.1/header_2/css/vendor/socicon.min.css" rel="stylesheet" media="screen">
    <link href="http://themes.rokaux.com/m-store/v1.1/header_2/css/vendor/material-icons.min.css" rel="stylesheet" media="screen">

    <link href="<?php echo base_url('application/views/assets/css/font-awesome.min.css');?>" rel="stylesheet" media="screen">

    <!-- Theme Styles -->
    <link href="<?php echo base_url('application/views/assets/css/theme.min.css');?>" rel="stylesheet" media="screen">

    <!-- Page Preloading -->

    <script src="<?php echo base_url('application/views/assets/js/vendor/page-preloading.js');?>"></script>

    <!-- Modernizr -->
    <script src="<?php echo base_url('application/views/assets/js/vendor/modernizr.custom.js');?>"></script>
</head>

<!-- Body -->
<!-- Adding/Removing class ".page-preloading" is enabling/disabling background smooth page transition effect and spinner. Make sure you also added/removed link to page-preloading.js script in the <head> of the document. -->
<body class="page-preloading">
<?php

if($log == true):
?>
<!-- Start of loija Zendesk Widget script -->
<script>/*<![CDATA[*/window.zEmbed||function(e,t){var n,o,d,i,s,a=[],r=document.createElement("iframe");window.zEmbed=function(){a.push(arguments)},window.zE=window.zE||window.zEmbed,r.src="javascript:false",r.title="",r.role="presentation",(r.frameElement||r).style.cssText="display: none",d=document.getElementsByTagName("script"),d=d[d.length-1],d.parentNode.insertBefore(r,d),i=r.contentWindow,s=i.document;try{o=s}catch(e){n=document.domain,r.src='javascript:var d=document.open();d.domain="'+n+'";void(0);',o=s}o.open()._l=function(){var o=this.createElement("script");n&&(this.domain=n),o.id="js-iframe-async",o.src=e,this.t=+new Date,this.zendeskHost=t,this.zEQueue=a,this.body.appendChild(o)},o.write('<body onload="document._l();">'),o.close()}("//assets.zendesk.com/embeddable_framework/main.js","loija.zendesk.com");
    /*]]>*/</script>
<!-- End of loija Zendesk Widget script -->
<?php endif;?>
<!-- Page Pre-Loader -->
<div class="page-preloader">
    <div class="preloader">
        <img src="<?php echo base_url('assets/preloader.gif');?>" alt="Carregando">
    </div>
</div><!-- .page-preloader -->
<style>
    a .active i{
        display: none;
    }
</style>
<!-- Page Wrapper -->
<div class="page-wrapper">
    <script>

    </script>


    <?php

    if($log == true):
        $crud->insert('interact_pannel','type_interact=?,id_user=?',array(0,$_SESSION['ID']));

        ?>
        <header class="navbar navbar-sticky">

            <!-- Site Logo -->
            <a href="<?php echo base_url('home');?>" class="site-logo visible-desktop" style="width:30%;">
			
 <img style="width:1280px;top:15%;margin:1% 0 2% 2%;" src="<?php echo base_url('assets/logo.png');?>" />

            </a><!-- site-logo.visible-desktop -->
            <a href="<?php echo base_url('home');?>" class="site-logo visible-mobile">
                <span></span> <i class="fa fa-eercast" aria-hidden="true"></i>
                <span></span>
            </a><!-- site-logo.visible-mobile -->

            <!--
            <div class="lang-switcher">
                <div class="lang-toggle">
                    <img src="img/flags/GB.png" alt="English">
                    <i class="material-icons arrow_drop_down"></i>
                    <ul class="lang-dropdown">
                        <li><a href="#"><img src="img/flags/FR.png" alt="French">FR</a></li>
                        <li><a href="#"><img src="img/flags/DE.png" alt="German">DE</a></li>
                        <li><a href="#"><img src="img/flags/IT.png" alt="Italian">IT</a></li>
                    </ul>
                </div>
            </div>  -->

            <!-- Toolbar -->
            <div class="toolbar">
                <div class="inner">
                    <script>
                        function notifyFunc() {

                            $.post("<?php echo base_url('application/views/ajax/jp/notifyUser.php');?>",{type:'number'});
                            $("#read").remove();

                        }
                        </script>
                    <a href="#cart" class="toolbar-toggle" onclick="notifyFunc();">
                        <i>
                            <span  class="fa fa-bell shopping_basket"></span>
                            <?php

                            $notify = $crud->select('*','notify_users','WHERE id_user=?',array($_SESSION['ID']));
                            $notifyCount =  $notify->rowCount();
                            if($notifyCount > 0):

                                $read_fds = $notify->fetch(PDO::FETCH_ASSOC);
								$fetch_read = $read_fds['id'];
                                $read_select = $crud->select('*','read_notify','WHERE id_notify=?',array($fetch_read));
                                $row_read = $read_select->rowCount();
                                if($row_read > 0):

                                    echo '<span id="read" class="count">'.$row_read.'</span>';

                                endif;;

                            endif;
                            ?>
                        </i>
                    </a>
										<a href="#menu" class="toolbar-toggle"><i class="fa fa-home menu"></i></a>


                    <a  href="#account" class="toolbar-toggle"><i class="fa fa-bars menu"></i></a>

                </div>
            </div><!-- .toolbar -->

            <!-- Toolbar Dropdown -->
            <div class="toolbar-dropdown">

                <div class="toolbar-section" id="menu">
<div class="inner">
            <ul class="main-navigation space-bottom">
                        <li><a href="<?php echo base_url('home');?>">Inicio</a></li>
              <li><a href="<?php echo base_url('sobre');?>">Sobre</a></li>
              <li><a href="<?php echo base_url('como-funciona');?>">Como funciona?</a></li>
              <!--<li><a href="<?php echo base_url('como-funciona');?>">Dicas?</a></li>-->
            </ul><!-- .main-navigation -->
            <ul class="list-icon text-sm">
              <li>
                <i class="fa fa-map location_on"></i>
                Endereço comercial, Rua Jose Guimarães,<br> 107 Vila Síria – São Paulo/SP
              </li>
              <li>
                <i class="fa fa-phone"></i>
                (11) 96103-3400
              </li>
              <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:info@m-store.com">contato@importa24h.com.br</a>
              </li>
             
			 	<?php
			
			$selredes = $crud->select('*','dados_footer','',array());
			$fsnw = $selredes->fetch(PDO::FETCH_ASSOC); 
			$facebook = $fsnw['facebook'];
			$twitter = $fsnw['twitter'];
			$instagram = $fsnw['instagram'];
			
			?>
            </ul><!-- .list-icon -->
            <span class="text-sm display-inline" style="margin-bottom: 6px;">Redes sociais: &nbsp;&nbsp;</span>
            <div class="social-bar display-inline">
              <a href="<?php echo $facebook; ?>" class="sb-facebook" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                <i class="fa fa-facebook"></i>
              </a>
         
              <a href="<?php echo $twitter; ?>" class="sb-twitter" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="<?php echo $instagram; ?>" class="sb-instagram" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram">
                <i class="fa fa-instagram"></i>
              </a>
            </div>
          </div>				
		  </div>
                <div class="toolbar-section" id="account">
                    <div class="shopping-cart">

                        <!-- <div class="item">

                            <div class="item-details">
                                <h3 class="item-title" style="text-align: center;"><a href="#hcompras" class="toolbar-toggle">Historico de Lances</a></h3>
                            </div>

                            </div> -->

                        <div class="item">


                            <div class="item-details">
                                <h3 class="item-title" style="text-align: center;"><a href="#myproducts" class="toolbar-toggle">Produtos Arrematados</a></h3>

                            </div>

                            </div>



                        <div class="item">

                            <div class="item-details">
                                <h3 class="item-title" style="text-align: center;"><a href="#alterdata" class="toolbar-toggle">Alterar dados</a></h3>

                            </div>

                            </div>

                        <div class="item">

                            <div class="item-details">
                                <h3 class="item-title" style="text-align: center;"><a href="<?php echo base_url('pacotes?action=resgate');?>">Recompensas</a></h3>

                            </div>

                            </div>
                        <div class="item">

                            <div class="item-details">
                                <h3 class="item-title" style="text-align: center;"><a href="<?php echo base_url('pacotes');?>">Comprar Créditos</a></h3>

                            </div>

                            </div>

                        <div class="text-right">

                            <a href="<?php echo base_url('home/logout'); ?>" class="btn btn-primary waves-effect waves-light">Sair</a>
                        </div>

                    </div>
                </div><!-- .toolbar-section#account -->

                <!-- Account (Sign Up) -->
                <div class="toolbar-section" id="hcompras">
                    <div class="shopping-cart">
                        <h5 class="text-uppercase text-gray text-thin space-bottom">Historico de lances</h5>
                        <div class="table-responsive">
                            <table>
                                <thead>
                                <tr>

                                    <th>Leilão</th>
                                    <th>Data de inicio</th>
                                    <th>Meus lances</th>
                                    <th>Total de Lances</th>
                                    <th>Arrematado</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                @$hlances = $crud->select('*','historico_lances','WHERE id_user=?',array($_SESSION['ID']));
                                if($hlances->rowCount() == 0)
                                {
                                ?>
                                <tr>
                                    <td style="text-align: center;">-- --</td>
                                    <td style="text-align: center;">-- --</td>
                                    <td style="text-align: center;">-- --</td>
                                    <td style="text-align: center;">-- --</td>
                                    <td style="text-align: center;">-- --</td>
                                </tr>
                                <?php }else{

                                    while($dadosHlances = $hlances->fetch(PDO::FETCH_ASSOC)){
                                    @$id_lance = $dadosHlances['id_leilao'];
                                    @$inicio_data = $dadosHlances['data_inicio'];
                                    @$meuslances = number_format($dadosHlances['meus_lances']);
                                    @$totallances = number_format($dadosHlances['total_lances']);
                                    @$statusEnd = number_format($dadosHlances['arrematado']);
                                    if($statusEnd == 0)
                                    {
                                      $arremate = '<span class="text-danger">Não</span>';
                                    }else
                                    {
                                        $arremate = '<span class="text-success">Sim</span>';
                                    }

                                       @$leilao = $crud->select('*','todos_leiloes','WHERE id=?',array($id_lance));
                                    @$leilaodds = $leilao->fetch(PDO::FETCH_ASSOC);
                                   @$nameLeilao = utf8_encode($leilaodds['titulo']);

                                    ?>
                                    <tr>
                                        <td><?php echo $nameLeilao;?></td>
                                        <td><?php echo $inicio_data;?></td>
                                        <td><?php echo $meuslances;?></td>
                                        <td><?php echo $totallances;?></td>
                                        <td><?php echo $arremate;?></td>
                                    </tr>
                                <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right">
                            <a href="#account" class="btn btn-default btn-ghost icon-left toggle-section">
                                <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                                Voltar
                            </a>
                            <a href="<?php echo base_url('home/logout'); ?>" class="btn btn-primary waves-effect waves-light">Sair</a>
                        </div>
                    </div>
                </div>

                <div class="toolbar-section" id="myproducts">
                    <div class="shopping-cart">
                        <h5 class="text-uppercase text-gray text-thin space-bottom">Produtos Arrematados</h5>
                        <div class="table-responsive">
                            <table>
                                <thead>
                                <tr>

                                    <th>Leilão</th>
                                    <th>Meus lances</th>
                                    <th>Total de Lances</th>
                                    <th>Valor + Frete</th>
                                    <th>Situação</th>
                                    <th>Pagar</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                @$hlances = $crud->select('*','arremates','WHERE id_user=? ORDER BY id DESC',array($_SESSION['ID']));
                                if($hlances->rowCount() == 0)
                                {
                                    ?>
                                    <tr>
                                        <td style="text-align: center;">-- --</td>
                                        <td style="text-align: center;">-- --</td>
                                        <td style="text-align: center;">-- --</td>
                                        <td style="text-align: center;">-- --</td>
                                        <td style="text-align: center;">-- --</td>
                                        <td style="text-align: center;">-- --</td>
                                    </tr>
                                <?php }else{

                                    while($dadosHlances = $hlances->fetch(PDO::FETCH_ASSOC)){
                                    @$id_lance = $dadosHlances['id_leilao'];
                                    @$meuslances = number_format($dadosHlances['meuslances']);
                                    @$totallances = number_format($dadosHlances['todoslances']);
                                    @$valorTotal = number_format($dadosHlances['valor_total']);
                                    @$status = $dadosHlances['status'];
                                    @$linkpayment = $dadosHlances['link_payment'];
                                        $track = $dadosHlances['track'];

                                        if($status == 7)
                                    {
                                        $statusPayment = '<span class="text-danger" style="font-size: small;">Cancelado</span>';

                                    }elseif($status == 1)
                                    {
                                        $statusPayment = '<span class="text-info" style="font-size: small;">Aguardando pagamento</span>';
                                    }elseif($status == 2)
                                    {
                                        $statusPayment = '<span class="text-info" style="font-size: small;">Em análise</span>';
                                    }elseif($status == 3)
                                    {
                                        $statusPayment = '<span class="text-success" style="font-size: small;">Pagamento recebido</span>';
                                    }elseif($status == 4)
                                    {
                                        $statusPayment = '<span class="text-success" style="font-size: small;">Disponivel</span>';
                                    }elseif($status == 5)
                                    {
                                        $statusPayment = '<span class="text-info" style="font-size: small;">Em disputa</span>';
                                    }elseif($status == 6)
                                    {
                                        $statusPayment = '<span class="text-warning" style="font-size: small;">Devolvida</span>';
                                    }elseif($status == 10)
                                    {
                                        $statusPayment = '<a href="'.$track.'" target="_blank" class="text-warning" style="font-size: small;">Em transporte</a>';
                                    }else{

                                        $statusPayment = '<span class="text-danger" style="font-size: small;">Status indisponivel</span>';

                                    }

                                    @$leilao = $crud->select('*','todos_leiloes','WHERE id=?',array($id_lance));
                                    @$leilaodds = $leilao->fetch(PDO::FETCH_ASSOC);
                                    @$nameLeilao = utf8_encode($leilaodds['titulo']);

                                    ?>
                                    <tr>
                                        <td><?php echo $nameLeilao;?></td>
                                        <td><?php echo $meuslances;?></td>
                                        <td><?php echo $totallances;?></td>
                                        <td><?php echo $valorTotal;?></td>
                                        <td><?php echo $statusPayment;?></td>
                                        <?php if($status == 1){?>
                                            <td><a href="<?php echo $linkpayment;?>" target="_blank" class="text-success">Pagar</a></td>
                                        <?php }else
                                        {?>
                                            <td style="text-align: center;">-- --</td>

                                        <?php } ?>
                                    </tr>
                                <?php }} ?>
                                </tbody>
                            </table>
                            <div class="text-right">
                                <a href="#account" class="btn btn-default btn-ghost icon-left toggle-section">
                                    <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                                    Voltar
                                </a>
                                <a href="<?php echo base_url('home/logout'); ?>" class="btn btn-primary waves-effect waves-light">Sair</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="toolbar-section" id="alterdata">
                    <div class="shopping-cart">
                        <form method="post" action="javascript:func();" class="checkout-form container">
                            <div class="cart-subtotal space-bottom">
                                <div class="column">
                                    <h3 class="toolbar-title">Alterar dados</h3>
                                </div>
                            </div><!-- .subtotal -->
                            <div class="row">
                                <script>
                                    function altuserdata() {
                                        $("#respalt").html('<img style="position: absolute; width: 25px;" src="http://themes.rokaux.com/m-store/v1.1/header_1/img/preloader.gif" alt="Carregando">');
                                        var firstname = $("#firstnamealt").val();

                                        var lastname = $("#lastnamealt").val();


                                        var pass = $("#passalt").val();

                                        var passag = $("#apassalt").val();



                                        var cep = $("#cepalt").val();

                                        var bairro = $("#bairroalt").val();

                                        var rua = $("#ruaalt").val();

                                        var casan = $("#numeroalt").val();

                                        var complemento = $("#complementoalt").val();

                                                $.post("application/views/ajax/jp/alterUserDados.php",{firstname:firstname,lastname:lastname,pass:pass,passag:passag,cep:cep,bairro:bairro,rua:rua,casan:casan,complemento:complemento},function (res) {

                                                    if(res == 11)
                                                        $("#respalt").html('<small style="color: #5fe271;">Dados alterados com sucesso</small>');
                                                    else
                                                        $("#respalt").html('<small style="color: #b20000;">'+res+'</small>');

                                                });


                                        }

                                </script>

                                <?php

                                @session_start();
                                @$dadosUser = $crud->select('*','usuarios','WHERE id=? ',array($_SESSION['ID']));

                                if($dadosUser->rowCount() > 0)
                                {
                                    @$resultDataUser = $dadosUser->fetch(PDO::FETCH_ASSOC);
                                    @$firstname = utf8_encode($resultDataUser['firstname']);
                                    @$lastname = utf8_encode($resultDataUser['lastname']);
                                    @$cep = $resultDataUser['cep'];
                                    @$endereco = utf8_encode($resultDataUser['endereco']);
                                    @$explodead = explode('-', $endereco);
                                }else
                                {
                                    @$firstname = 'Unknown';
                                    @$lastname = 'Unknown';
                                    @$cep = 'Unknown';
                                    @$endereço = 'Unknown';
                                }



                                ?>
                                <div class="col-sm-6">
                                    <input id="firstnamealt" type="text" class="form-control" name="co_f_name" placeholder="Nome" value="<?php echo $firstname;?>">
                                    <input id="passalt" type="password" class="form-control" name="co_email" placeholder="Nova Senha" >
                                </div>
                                <div class="col-sm-6">
                                    <input id="lastnamealt" type="text" class="form-control" name="co_l_name" placeholder="Sobrenome" value="<?php echo $lastname;?>">
                                    <input id="apassalt" type="password" class="form-control" name="co_phone" placeholder="Repetir a senha">
                                </div>
                            </div><!-- .row -->
                            <input id="cepalt" type="text" class="form-control" name="co_company" placeholder="CEP" value="<?php echo $cep;?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input id="ruaalt" type="text" class="form-control" name="co_f_name" placeholder="Rua" value="<?php echo $explodead[0];?>">
                                    <input id="numeroalt" type="text" class="form-control" name="co_email" placeholder="Numero" value="<?php echo $explodead[2];?>">

                                </div>
                                <div class="col-sm-6">
                                    <input id="bairroalt" type="text" class="form-control" name="co_l_name" placeholder="Bairro" value="<?php echo $explodead[1];?>">
                                    <input id="complementoalt" type="text" class="form-control" name="co_phone" placeholder="Complemento" value="<?php echo $explodead[3];?>">
                                </div>
                            </div><!-- .row -->

                            <div class="text-right">
                                <span id="respalt"></span>
                                <a  href="#account" class="btn btn-default btn-ghost icon-left toggle-section">
                                    <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>

                                    Voltar
                                </a>

                                <button onclick="altuserdata();" class="btn btn-primary waves-effect waves-light">Alterar</button>
                            </div>
                        </form>
                    </div>


                </div>

                <div class="toolbar-section" id="cart">
                    <div class="shopping-cart">
                        <?php
                        if($notifyCount == 0)
                        {
                            echo '<h1 style="text-align: center;">Nenhuma notificação</h1>';
                        }else{

                            $notifyrel = $crud->select('*','notify_users','WHERE id_user=? ORDER BY id DESC',array($_SESSION['ID']));

                            while ($ndds = $notifyrel->fetch(PDO::FETCH_ASSOC))
                            {
                                $title = utf8_encode($ndds['titulo']);
                                $description = utf8_encode($ndds['descricao']);
                                $linkp = $ndds['link'];
                                $image = $ndds['image'];
                                ?>
                                <div class="item">
                                    <a href="<?php echo $linkp;?>" target="_blank" class="item-thumb">
                                        <img src="<?php echo base_url($image);?>" alt="<?php echo $title;?>">
                                    </a>
                                    <div class="item-details">
                                        <h3 class="item-title"><a href="<?php echo $linkp;?>" target="_blank"><?php echo $title;?></a></h3>
                                        <h4 class="item-price"><small><?php echo $description;?></small></h4>
                                    </div>
                                   <!-- <a href="#" class="item-remove" data-toggle="tooltip" data-placement="top" title="Remove">
                                        <i class="fa fa-times remove_shopping_cart"></i>
                                    </a>-->
                                </div>

                            <?php }}?>

                    </div><!-- .shopping-cart -->
                </div><!-- .toolbar-section#cart -->


            </div><!-- .toolbar-dropdown -->

        </header><!-- .navbar.navbar-sticky -->
        <?php
    endif;

    ?>

    <?php

    if($log == false):
        $crud->insert('interact_pannel','type_interact=?,id_user=?',array(0,0));
        ?>

        <header class="navbar navbar-sticky">

            <!-- Site Logo -->
            <a href="<?php echo base_url('home');?>" class="site-logo visible-desktop">

              <img style="width:1280px;top:15%;margin:1% 0 2% 2%;" src="<?php echo base_url('assets/logo.png');?>" />


            </a><!-- site-logo.visible-desktop -->
            <a href="<?php echo base_url('home');?>" class="site-logo visible-mobile">
                <span></span> <i class="fa fa-eercast" aria-hidden="true"></i>
                <span></span>
            </a><!-- site-logo.visible-mobile -->

            <!--
            <div class="lang-switcher">
                <div class="lang-toggle">
                    <img src="img/flags/GB.png" alt="English">
                    <i class="material-icons arrow_drop_down"></i>
                    <ul class="lang-dropdown">
                        <li><a href="#"><img src="img/flags/FR.png" alt="French">FR</a></li>
                        <li><a href="#"><img src="img/flags/DE.png" alt="German">DE</a></li>
                        <li><a href="#"><img src="img/flags/IT.png" alt="Italian">IT</a></li>
                    </ul>
                </div>
            </div>  -->

            <!-- Toolbar -->
            <div class="toolbar">
                <div class="inner">
				                    <a href="#menu" class="toolbar-toggle"><i class="fa fa-home menu"></i></a>
                    <a href="#account" class="toolbar-toggle"><i class="fa fa-bars menu"></i></a>
                </div>
            </div><!-- .toolbar -->

            <!-- Toolbar Dropdown -->
            <div class="toolbar-dropdown">

                 <div class="toolbar-section" id="menu">
<div class="inner">
            <ul class="main-navigation space-bottom">
                        <li><a href="<?php echo base_url('home');?>">Inicio</a></li>
              <li><a href="<?php echo base_url('sobre');?>">Sobre</a></li>
              <li><a href="<?php echo base_url('como-funciona');?>">Como funciona?</a></li>
              <!--<li><a href="<?php echo base_url('como-funciona');?>">Dicas?</a></li>-->
            </ul><!-- .main-navigation -->
            <ul class="list-icon text-sm">
              <li>
                <i class="fa fa-map location_on"></i>
                Endereço comercial, Rua Jose Guimarães,<br> 107 Vila Síria – São Paulo/SP
              </li>
              <li>
                <i class="fa fa-phone"></i>
                (11) 96103-3400
              </li>
              <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:info@m-store.com">contato@importa24h.com.br</a>
              </li>
             
            </ul><!-- .list-icon -->
            <span class="text-sm display-inline" style="margin-bottom: 6px;">Redes sociais: &nbsp;&nbsp;</span>
            <div class="social-bar display-inline">
              <a href="#" class="sb-facebook" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                <i class="fa fa-facebook"></i>
              </a>
         
              <a href="#" class="sb-twitter" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#" class="sb-instagram" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram">
                <i class="fa fa-instagram"></i>
              </a>
            </div>
          </div>				
		  </div>
                <div class="toolbar-section" id="menu">
<div class="inner">
            <ul class="main-navigation space-bottom">
                        <li><a href="<?php echo base_url('home');?>">Inicio</a></li>
              <li><a href="<?php echo base_url('sobre');?>">Sobre</a></li>
              <li><a href="<?php echo base_url('como-funciona');?>">Como funciona?</a></li>
            </ul><!-- .main-navigation -->
            <ul class="list-icon text-sm">
              <li>
                <i class="fa fa-map location_on"></i>
                45 Park Avenue, Apt. 303<br>New York, NY 10016, USA
              </li>
              <li>
                <i class="fa fa-phone"></i>
                001 (917) 555-4836
              </li>
              <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:info@m-store.com">info@m-store.com</a>
              </li>
              <li>
                <i class="fa fa-skype"></i>
                <a href="#">Skype/a>
              </li>
            </ul><!-- .list-icon -->
			<?php
			
			$selredesof = $crud->select('*','dados_footer','',array());
			$fsnwof = $selredesof->fetch(PDO::FETCH_ASSOC); 
			$facebook = $fsnwof['facebook'];
			$twitter = $fsnwof['twitter'];
			$instagram = $fsnwof['instagram'];
			
			?>
            <span class="text-sm display-inline" style="margin-bottom: 6px;">Redes sociais: &nbsp;&nbsp;</span>
            <div class="social-bar display-inline">
              <a href="<?php echo $facebook;?>" class="sb-facebook" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                <i class="fa fa-facebook"></i>
              </a>
         
              <a href="<?php echo $twitter;?>" class="sb-twitter" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="<?php echo $instagram;?>" class="sb-instagram" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram">
                <i class="fa fa-instagram"></i>
              </a>
            </div>
          </div>				</div>
                <!-- Account (Login) -->
                <div class="toolbar-section" id="account">
                    <h3 class="toolbar-title space-bottom">Você não esta logado.</h3>
                    <div class="inner">

                        <script>


                            function setLog()
                            {

                                $("#resposta").html('<img style="position: absolute; width: 25px;" src="http://themes.rokaux.com/m-store/v1.1/header_1/img/preloader.gif" alt="Carregando">');

                                var email = $("#emaillog").val();

                                var pass = $("#passlog").val();

                                $.post("application/views/ajax/jp/log.php",{email:email,pass:pass},function(res){

                                    if(res == 11)
                                    {

                                        window.location.reload();
                                    }
                                    else
                                    {
                                        $("#resposta").html(res);

                                    }

                                });

                            }

                        </script>
                        <form method="post" action="javascript:func();" class="login-form">
                            <input id="emaillog" type="email" class="form-control" placeholder="Email" >
                            <input id="passlog" type="password" class="form-control" placeholder="Senha" >
                            <div class="form-footer">
                                <small style="position: absolute; float: left;width: 30%;margin-top:4%;text-transform: capitalize;" id="resposta" class="text-danger"></small>
                                <div class="rememberme">
                                    <label class="checkbox">
                                        <input type="checkbox" checked>  Mantenha-me conectado
                                    </label>
                                </div>
                                <div class="form-submit">
                                    <button onclick="setLog();" class="btn btn-primary btn-block waves-effect waves-light">Login</button>
                                </div>
                            </div>
                        </form><!-- .login-form -->
                        <p class="text-sm space-top">Não tem uma conta? <a href="#signup" class="toggle-section">Cadastre-se aqui</a>
                        </p>
                        <!--
                        <a href="#" class="social-signup-btn ssb-facebook">
                            <i class="fa fa-facebook"></i>
                            <span>Signup with Facebook</span>
                        </a>
                        <a href="#" class="social-signup-btn ssb-google">
                            <i class="socicon-googleplus"></i>
                            <span>Signup with Google+</span>
                        </a>
                        <a href="#" class="social-signup-btn ssb-twitter">
                            <i class="socicon-twitter"></i>
                            <span>Signup with Twitter</span>
                        </a> -->
                    </div><!-- .inner -->
                </div><!-- .toolbar-section#account -->

                <!-- Account (Sign Up) -->

                <script>
                    function setCadUser() {

                        $("#respcad").html('<img style="position: absolute; width: 25px;" src="http://themes.rokaux.com/m-store/v1.1/header_1/img/preloader.gif" alt="Carregando">');



                        var firstname = $("#firstname").val();

                        var lastname = $("#lastname").val();
                        var username = $("#user").val();

                        var email = $("#email").val();

                        var pass = $("#pass").val();

                        var passag = $("#passag").val();


                        var cpf = $("#cpf").val();

                        var cep = $("#cep").val();

                        var bairro = $("#bairro").val();

                        var rua = $("#rua").val();

                        var casan = $("#casan").val();

                        var complemento = $("#complemento").val();
                        var sexo = document.getElementById("sexo");
                        var itemSelecionado = sexo.options[sexo.selectedIndex].value;

                        var aChk = document.getElementsByName("terms");

                        for (var i=0;i<aChk.length;i++){

                            if (aChk[i].checked == true){

                                $.post("application/views/ajax/jp/cad.php",{firstname:firstname,lastname:lastname,username:username,email:email,pass:pass,passag:passag,cpf:cpf,cep:cep,bairro:bairro,rua:rua,casan:casan,complemento:complemento,sexo:itemSelecionado},function (res) {

                                    if(res == 11)
									{
                                        window.location.reload();

									}
                                        else
										{
											$("#respcad").html(res);

										}

                                });

                            }  else {
                                $("#respcad").html('Aceite os termos de uso e politica de privacidade');
                            }

                        }


                    }







                </script>
                <div class="toolbar-section" id="signup">
                    <h3 class="toolbar-title space-bottom">Cadastre-se, e de graça</h3>
                    <div class="inner">




                        <form method="post" action="javascript:func()" class="login-form">
                            <label>
                                <input id="firstname" type="text" class="form-control" placeholder="Nome" >
                                <input id="lastname" type="text" class="form-control" placeholder="Sobrenome" >
                                <select class="form-control" id="sexo">
                                    <option value="masculino" selected>Masculino</option>
                                    <option value="feminino">Feminino</option>
                                </select>
                                <input id="user" type="text" class="form-control" placeholder="Aplelido/Usuário">
                                <input id="email" type="email" class="form-control" placeholder="E-mail" >
                                <input id="pass" type="password" class="form-control" placeholder="Senha" >
                                <input id="passag" type="password" class="form-control" placeholder="Repita a senha">
                                <input id="cpf" type="text" class="form-control" placeholder="CPF" >
                            </label>

                            <label>Endereço
                                <input id="cep" type="text" class="form-control" placeholder="CEP">
                                <input id="bairro" type="text" class="form-control" placeholder="Bairro" >
                                <input id="rua" type="text" class="form-control" placeholder="Rua" >
                                <input id="casan" type="text" class="form-control" placeholder="Número" >
                                <input id="complemento" type="text" class="form-control" placeholder="Complemento">
                            </label>
                            <div class="rememberme">
                                <label class="checkbox">
                                    <input type="checkbox" checked>   Aceito receber e-mails com Promoções
                                </label>
                            </div><div class="rememberme">
                                <label class="checkbox">
                                    <input id="terms" name="terms" type="checkbox" checked>  Li e aceitei os <a href="#">Termos de uso</a> e <a href="#">Politica de privacidade</a>.
                                </label>
                            </div>
                            <div class="form-footer">
                                <small style="position: absolute; float: left;width: 30%;margin-top:4%;text-transform: capitalize;" id="respcad" class="text-danger"></small>



                                <div class="rememberme"></div>

                                <div class="form-submit">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" onclick="setCadUser();">Cadastrar</button>
                                </div>
                            </div>
                        </form><!-- .login-form -->
                        <p class="text-sm space-top">Já tem uma conta? Então pode <a href="#account" class="toggle-section">entrar aqui</a>.</p>
                    </div><!-- .inner -->

                </div><!-- .toolbar-section#account -->
            </div><!-- .toolbar-dropdown -->
        </header><!-- .navbar.navbar-sticky -->
        <?php
    endif;

    ?>
<div id="containerAds">