<div class="w3-container w3-margin w3-card-2 w3-white w3-padding w3-padding-16">
  <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center w3-text-pink">Buscar Imóveis</h3>
  <form method="GET" action="<?=base_url("imoveis")?>">
    <div class="w3-row-padding">
      <div class="w3-col l2 m3 w3-margin-bottom">
        <label><b>Finalidade</b></label>
        <select class="w3-select w3-border" name="finalidade" required>
          <?php foreach ($fis as $finalidadeImovel): ?>
          <option value="<?=$finalidadeImovel->id_fi?>"><?=$finalidadeImovel->ds_fi?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="w3-col l2 m3 w3-margin-bottom">
        <label><b>Imóvel</b></label>
        <select class="w3-select w3-border" name="tipo" required>
          <?php foreach ($tis as $tipoImovel): ?>
          <option value="<?=$tipoImovel->id_tipo?>"><?=$tipoImovel->ds_tipo?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="w3-col l3 m3 w3-margin-bottom">
        <label><b>Cidade</b></label>
        <select class="w3-select w3-border"  name="cidade">
          <?php foreach ($cidades as $cidade): ?>
          <option value="<?=$cidade->id_cidade?>"><?=$cidade->nome_cidade?></option>
          <?php endforeach; ?>
        </select>  
      </div>      
      <div class="w3-col l2 m3 w3-margin-bottom">
        <label><b>Referência</b></label>
        <input class="w3-input" type="text" placeholder="Referência" name="ref" value="">
      </div>
      <div class="w3-col l3 m12 w3-margin-bottom">
        <label><b>Pesquisar</b></label>
        <button class="w3-button w3-block w3-pink" id="inserir_cidade"><i class="fa fa-search"></i></button>
      </div>
    </div>
  </form>
  <br>
</div>


<!-- Header -->
<header class="w3-display-container w3-margin w3-hide-small" style="max-width:100%">
  <div class="w3-card-2">
    <img class="w3-image" src="<?=base_url('assets/img/site/banner.jpg')?>">
    <div class="w3-display-topleft w3-margin w3-center">
      <h1 class="w3-xxlarge w3-text-white"><span class="w3-text-light-grey">CREDIBILIDADE E CONFIANÇA</span></h1>
    </div>
    <div class="w3-display-bottomright w3-margin-right">
      <p class="w3-text-white">Patrocínio Paulista - SP</p>
    </div>
  </div>
</header>

<!-- Page content -->

<div class="w3-padding">
  <!-- Project Section -->

  <div class="w3-row-padding w3-card-2 w3-white w3-padding-16">
    
    <div class="w3-container" id="projects">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center w3-text-pink">Imóveis em Destaque</h3>
    </div>
    <?php if ($destaques): ?>
    <?php foreach ($destaques as $destaque): ?>
    <div class="w3-col l3 m6">
      <div class="w3-padding">
        <?php  
        // define a rota amigavel
        $ref = strtolower($destaque->referencia_imovel);
        $tipo = str_replace(" ","-",strtolower(preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities($destaque->ds_tipo))));
        $finalidade = str_replace(" ","-",strtolower(preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities($destaque->ds_fi))));
        $cidade = str_replace(" ","-",strtolower(preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities($destaque->nome_cidade))));
        $rota = $ref.'/'.$tipo.'-'.$finalidade.'-'.$cidade;
        ?>
        <a href="<?=base_url('imovel/'.$rota)?>">
        <div class="w3-display-container">
          <div class="w3-display-topleft w3-pink w3-padding">R$ <?=number_format($destaque->preco_imovel,2,",",".");?></div>
          <img src="<?=base_url('assets/img/imoveis/'.$destaque->img_imovel)?>" alt="House" class="w3-hover-opacity" style="width:100%">
          <p class="w3-center w3-opacity"><?=$destaque->ds_tipo?> p/ <?=$destaque->ds_fi?><br><?=$destaque->nome_cidade?> - <?=$destaque->sigla_estado?></p>
          <div class="w3-pink w3-padding">
            <div class="w3-row w3-center">
              <div class="w3-col s4">
                <i class="fa fa-bed"></i> <?php if($destaque->n_dormitorio < 1): echo '<small>N/D</small>'; else: echo $destaque->n_dormitorio; endif;?>
              </div>
              <div class="w3-col s4">
                <i class="fa fa-bath"></i> <?php if($destaque->n_suite < 1): echo 'N/D'; else: echo $destaque->n_suite; endif;?>
              </div>
              <div class="w3-col s4">
                <i class="fa fa-car"></i> <?php if($destaque->n_vagas_garagem < 1): echo 'N/D'; else: echo $destaque->n_vagas_garagem; endif;?>
              </div>
            </div>
          </div>
        </div>
        </a>
        <hr>
      </div>
    </div>
    <?php endforeach ?>  
    <?php endif ?>
  </div>
  <br>
</div>

  
