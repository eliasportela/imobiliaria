<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index()
	{
		//Finalidade Imovel
		$fi = $this->Crud_model->ReadAll('finalidade_imovel');
		$data['fis'] = $fi;
		//Tipo Imovel
		$ti = $this->Crud_model->ReadAll('tipo_imovel');
		$data['tis'] = $ti;
		//Cidade Imovel
		$cidades = $this->Crud_model->ReadAll('cidade');
		$data['cidades'] = $cidades;
		
		//Imoveis em destaque p/ locacao
		$sql = "SELECT i.referencia_imovel, i.preco_imovel, i.img_imovel, i.disponibilidade, f.id_fi, f.ds_fi, t.ds_tipo, d.n_suite, d.n_dormitorio, d.n_vagas_garagem, c.nome_cidade, c.sigla_estado
		FROM imovel i
		JOIN finalidade_imovel f ON (f.id_fi = i.id_finalidade)
		JOIN tipo_imovel t ON (t.id_tipo = i.id_tipo_imovel)
		JOIN detalhes_imovel d ON (d.id_detalhes_imovel = i.id_detalhes_imovel)
		JOIN endereco_imovel e ON (e.id_endereco_imovel = i.id_endereco_imovel)
		JOIN bairro b ON (b.id_bairro = e.id_bairro)
		JOIN cidade c ON (c.id_cidade = b.id_cidade)
		WHERE i.fg_ativo = 1 and i.destaque_imovel = 1 order by i.id_imovel desc limit 4";

		$data['destaques'] = $this->Crud_model->Query($sql);

		//Imoveis em destaque p/ venda

		//pagina
		$header['title'] = 'A Spinelli Imoveis';
		$header['page'] = '1';
		$this->load->view('template/commons/header',$header);
		$this->load->view('template/index',$data);
		$this->load->view('template/commons/footer');
	}

	public function QuemSomos()
	{
		$data = '';
		$header['title'] = 'ASI | Quem Somos';
		$this->load->view('template/commons/header',$header);
		$this->load->view('template/pages/sobre-nos',$data);
		$this->load->view('template/commons/footer');
	}

	public function Contato()
	{
		$fi = $this->Crud_model->ReadAll('finalidade_imovel');
		$data['fis'] = $fi;
		$header['page'] = 4;
		$header['title'] = 'ASI | Contato';
		$this->load->view('template/commons/header',$header);
		$this->load->view('template/pages/contato',$data);
		$this->load->view('template/commons/footer');
	}

	#Imoveis detalhes

	public function DetalhesImovel()
	{
		//Pegando a referencia na url
		$ref = $this->uri->segment(2);

		//select dos dados do imovel
		$sql = "SELECT i.id_imovel, i.referencia_imovel, i.preco_imovel, f.id_fi, f.ds_fi, t.ds_tipo, d.n_banheiro, d.n_suite, d.n_dormitorio, d.n_vagas_garagem, d.area, d.n_cozinha, d.n_sala, d.detalhes, c.nome_cidade, c.sigla_estado, b.nome_bairro, l.ds_logradouro as logradouro, e.ds_logradouro, e.numero, e.cep
		FROM imovel i
		JOIN finalidade_imovel f ON (f.id_fi = i.id_finalidade)
		JOIN tipo_imovel t ON (t.id_tipo = i.id_tipo_imovel)
		JOIN detalhes_imovel d ON (d.id_detalhes_imovel = i.id_detalhes_imovel)
		JOIN endereco_imovel e ON (e.id_endereco_imovel = i.id_endereco_imovel)
		JOIN logradouro l ON (l.id_logradouro = e.id_logradouro)
		JOIN bairro b ON (b.id_bairro = e.id_bairro)
		JOIN cidade c ON (c.id_cidade = b.id_cidade)
		WHERE i.fg_ativo = 1 and i.referencia_imovel = '$ref' and i.disponibilidade = 1 limit 1";

		$res = $this->Crud_model->Query($sql);

		if ($res):

		$data['imovel'] = $res[0];
		//select das imagens da galeria deste imovel
		$id_imovel = $data['imovel']->id_imovel;
		$sql = "SELECT * FROM galeria_imagem where id_imovel = $id_imovel";
		$data['galerias'] = $this->Crud_model->Query($sql);
		//die(var_dump($data['galerias']));

		else: 
			$data['imovel'] = false;
		endif;


		######################################
		# Cruds das pesquisas
		######################################
		$fis = $this->Crud_model->ReadAll('finalidade_imovel');
		$data['fis'] = $fis;
		//Tipo Imovel
		$ti = $this->Crud_model->ReadAll('tipo_imovel');
		$data['tis'] = $ti;
		//Cidade Imovel
		$cidades = $this->Crud_model->ReadAll('cidade');
		$data['cidades'] = $cidades;
		
		######################################
		#Telas 
		######################################
		$header['title'] = 'ASI | Detalhes Imovel';
		$this->load->view('template/commons/header',$header);
		$this->load->view('template/pages/imovel-detalhes',$data);
		$this->load->view('template/commons/footer');
	}

	public function Imoveis(){

		$data['cidadePesquisa'] = '';
		$data['finalidadePesquisa'] = '';
		$data['tipoPesquisa'] = '';

		$res = 'as';

		//parametros
		// se esta usando o campo pesquisa
		if ($this->input->get()) {
			
			$cidade = 'c.id_cidade = '.$this->input->get("cidade");
			$tipo = 't.id_tipo = '.$this->input->get("tipo");
			$finalidade = 'f.id_fi = '.$this->input->get("finalidade");

			//variaveis de pesquisa
			$data['finalidadePesquisa'] = $this->input->get("finalidade");
			$data['tipoPesquisa'] = $this->input->get("tipo");
			$data['cidadePesquisa'] = $this->input->get("cidade");

			$sql = "SELECT i.referencia_imovel, i.preco_imovel, i.img_imovel, i.disponibilidade, f.id_fi, f.ds_fi, t.ds_tipo, d.n_banheiro, d.n_dormitorio, d.n_vagas_garagem, c.nome_cidade, c.sigla_estado
				FROM imovel i
				JOIN finalidade_imovel f ON (f.id_fi = i.id_finalidade)
				JOIN tipo_imovel t ON (t.id_tipo = i.id_tipo_imovel)
				JOIN detalhes_imovel d ON (d.id_detalhes_imovel = i.id_detalhes_imovel)
				JOIN endereco_imovel e ON (e.id_endereco_imovel = i.id_endereco_imovel)
				JOIN bairro b ON (b.id_bairro = e.id_bairro)
				JOIN cidade c ON (c.id_cidade = b.id_cidade)";
			
			//Caso nao tenha informado os itens
			if ($this->input->get("dormitorio") == 0) {
				$dormitorio = '1=1';
			}elseif($this->input->get("dormitorio") < 3){
				$dormitorio = 'd.n_dormitorio = '.$this->input->get("dormitorio");
			}else{
				$dormitorio = 'd.n_dormitorio > 3';
			}

			//garagem
			if($this->input->get("garagem") == 0){
				$garagem = '1=1';
				}elseif ($this->input->get("garagem") < 3) {
					$garagem = 'd.n_vagas_garagem = '.$this->input->get("garagem");
					}else{
						$garagem = 'd.n_vagas_garagem > 2';
					}

			//preco
			if($this->input->get("preco") == 0){
				$preco = '1=1';
			}elseif($this->input->get("finalidade") == 1){ //venda
				if($this->input->get("preco") == 1){
					$preco = 'i.preco_imovel BETWEEN 80000 and 150000';	
				}elseif($this->input->get("preco") == 2){
					$preco = 'i.preco_imovel BETWEEN 150000 and 250000';
				}elseif($this->input->get("preco") == 3){
					$preco = 'i.preco_imovel BETWEEN 250000 and 500000';
				}else{
					$preco = 'i.preco_imovel >= 500000';
				}
			}elseif($this->input->get("finalidade") == 2){ //aluguel
				if($this->input->get("preco") == 1){
					$preco = 'i.preco_imovel BETWEEN 250 and 600';	
				}elseif($this->input->get("preco") == 2){
					$preco = 'i.preco_imovel BETWEEN 600 and 800';
				}elseif($this->input->get("preco") == 3){
					$preco = 'i.preco_imovel BETWEEN 800 and 1200';
				}else{
					$preco = 'i.preco_imovel >= 1200';
				}
			}

			//banheiro
			if($this->input->get("banheiro") == 0){
				$banheiro = '1=1';
			}elseif($this->input->get("banheiro") < 3){
				$banheiro = 'd.n_banheiro = '.$this->input->get("banheiro");
			}else{
				$banheiro = 'd.n_banheiro > 2';
			}

			if($this->input->get("bairro") == 0){
				$bairro = '1=1';
			}else{
				$bairro = 'b.id_bairro = '.$this->input->get("bairro");
			}

			$sql = $sql . ' WHERE '.$cidade.' and '.$tipo.' and '.$finalidade.' and '.$dormitorio.' and '.$garagem.' and '.$preco.' and '.$banheiro.' and '.$bairro. ' and i.disponibilidade = 1 order by i.id_imovel desc';

		}else{

			$sql = "SELECT i.referencia_imovel, i.preco_imovel, i.img_imovel, i.disponibilidade, f.id_fi, f.ds_fi, t.ds_tipo, d.n_banheiro, d.n_dormitorio, d.n_vagas_garagem, c.nome_cidade, c.sigla_estado
			FROM imovel i
			JOIN finalidade_imovel f ON (f.id_fi = i.id_finalidade)
			JOIN tipo_imovel t ON (t.id_tipo = i.id_tipo_imovel)
			JOIN detalhes_imovel d ON (d.id_detalhes_imovel = i.id_detalhes_imovel)
			JOIN endereco_imovel e ON (e.id_endereco_imovel = i.id_endereco_imovel)
			JOIN bairro b ON (b.id_bairro = e.id_bairro)
			JOIN cidade c ON (c.id_cidade = b.id_cidade)
			WHERE i.fg_ativo = 1 and i.disponibilidade = 1 order by i.id_imovel desc";
		}


		//die(var_dump($sql));
		
		//Imoveis em destaque p/ locacao
		

		$data['imoveis'] = $this->Crud_model->Query($sql);

		//Finalidade Imovel
		$fi = $this->Crud_model->ReadAll('finalidade_imovel');
		$data['fis'] = $fi;
		//Tipo Imovel
		$ti = $this->Crud_model->ReadAll('tipo_imovel');
		$data['tis'] = $ti;
		//Cidade Imovel
		$cidades = $this->Crud_model->ReadAll('cidade');
		$data['cidades'] = $cidades;
		######################################
		# Cruds das pesquisas
		######################################
		
		$header['title'] = "Imóveis";
		$this->load->view('template/commons/header',$header);
		
		if($res){
			$this->load->view('template/pages/imoveis',$data);
		}else{

		}
		$this->load->view('template/commons/footer');
	}
	
}
