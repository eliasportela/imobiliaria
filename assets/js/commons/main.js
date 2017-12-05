jQuery(document).ready(function(){

	//buscando as notidicacoes de pedidos
	$.get(base_urla+'admin/notificacao-pedido', function(res) { 
       	data = JSON.parse(res); 	
    })
    .done(function(){
    	if (data.qtd > 0) {
    		$('#qtdContato').html('<a href="'+base_urla+'/admin/pedidos"><i class="fa fa-bell" title="Há '+data.qtd+' contatos não visualizados"></i></a> ' + data.qtd);
    	}
    });

});
// passar como parametro o que sera carregado Ex (Aguarde.. Carregando (bairros) (ds = bairros))
function request(ds){
	$('#request').css("display","block");
	$('#descricaoRequest').empty();
	$('#descricaoRequest').append(ds);	
}
function requestSuccess(){
	$('#request').css("display","none");
}
