//madal do conteudo do pedido
function conteudoPedido(id) {
	// body...
	request('Carregando conteudo..');
	$.get(base_urla + 'admin/buscar-pedido?id='+id, function(res) { 
		data = JSON.parse(res);
		$('#nomeContato').html(data.nome_contato);
		$('#assuntoContato').html(data.assunto);
		$('#emailContato').html(data.email);
		$('#telefoneContato').html(data.telefone);
		$('#idContato').html(data.id_contato);
		$('#referenciaImovelContato').html(data.referencia_imovel);
		$('#msgContato').html(data.texto);
		$('#dataContato').html(data.data_contato);
		$('#horaContato').html(data.hora_contato);

		$("#linkImovelContato").attr("href", base_urla +'admin/imoveis?cidade=1&tipo=1&finalidade=1&ref='+ data.referencia_imovel);
		$("#imgImovelContato").attr("src", base_urla +'assets/img/imoveis/'+ data.img_imovel);
		//$('#imgImovelContato').attr('src', data.img_imovel);
	})
	.done(function(){
		view = visualizarImovel(data.id_contato);
		if (view) {
			requestSuccess();
    		$('#modalConteudoPedido').css('display','block');	
		}
    });

	//assim q o user abre o modal, o pedido passa a ser como visualizado
    function visualizarImovel(id) {
		$.get(base_urla + 'admin/visualizacao-pedido?id='+id, function(res){
			data = res;
		});
		if (data) {
			return true;
		}else{
			return false;
		}
    }


}


