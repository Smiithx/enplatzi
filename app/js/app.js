var app = {

	init: function() {
		app.getPosts();
	},

	getPosts: function() {

		var rootURL = 'http://localhost/enplatzi/wp-json/wp/v2';

		$.ajax({
			type: 'GET',
			url: rootURL + '/viaje',
			dataType: 'json',
			success: function(data){
				console.log(data);
				$("#data").val(JSON.stringify(data));
				$.each(data, function(index, value) {
			      $('ul.topcoat-list').append('<li class="topcoat-list__item">' +
					'<h3>'+value.title.rendered+'</h3>' +
					'<p>'+value.content.rendered+'</p>' +
					  '<p><b>Destino:</b> '+value.destino+'</p>' +
					  '<p><b>Vacunas Obligatorias:</b> '+value.vacunas_obligatorias+'</p>' +
					  '<p><b>Vacunas Recomendadas:</b> '+value.vacunas_recomendadas+'</p>' +
					  '<p><b>Transporte Local:</b> '+value.transporte_local+'</p>' +
					  '<p><b>Peligrosidad:</b> '+value.peligrosidad+'</p>' +
					  '<p><b>Moneda Local:</b> '+value.moneda_local+'</p>' +
				  	'</li>');
			    });
			},
			error: function(error){
				console.log(error);
			}

		});

	}

}