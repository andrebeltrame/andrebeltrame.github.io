let marvel = {
	render: function(){
		let urlAPI = 'https://gateway.marvel.com/v1/public/characters?ts=1&apikey=d339e3db759298d2d8611887e2def440&hash=2ece10f89a62e6498dbe7a6e92287ce9';
		let contenedor = document.getElementById('marvel-container');
		let mensaje = document.getElementById('mensaje');
		let contenidoHTML=' ';

		$.ajax({
			url:urlAPI,
			type:'GET',
			beforeSend:function(){
				mensaje.innerHTML='aguarde....';
			},
			complete:function(){
				mensaje.innerHTML='carregado';
			},
			success:function(response){

				contenidoHTML="<div class='row'>";
				for (let i=0; i<response.data.results.length;i++){
					 let element = response.data.results[i];
					 let imagen = element.thumbnail.path+'/portrait_fantastic.'+element.thumbnail.extension;
					 let urlPersonaje= element.urls[0].url;
					 contenidoHTML+="<div class='col-md-3'>";
					 	contenidoHTML+="<a href='"+urlPersonaje+"' target='_blank'>";
					 		contenidoHTML+="<img src='"+imagen+"' class='img-thumbnail'>";
					 	contenidoHTML+="</a>";
					 	contenidoHTML+="<h3>"+element.name+"</h3>";
					 contenidoHTML+="</div>";

					 if((i+1)%4==0){
					 	contenidoHTML+="</div>";
					 	contenidoHTML+="<div class='row'>";
					 }
				}
				contenedor.innerHTML= contenidoHTML;

			},
			error:function(){
				mensaje.innerHTML='Error....';
			}
		});
	}
};
marvel.render();
