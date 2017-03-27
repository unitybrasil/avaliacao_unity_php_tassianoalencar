$(document).ready(function() {

	$(function(){
		$('#add-categoria').popover({
			placement: 'bottom',
			title: 'Popover Form',
			html:true,
			content:  $('#myForm').html()
		})
		.on('click', function(){

			$('.btn-primary').click(function(){
				var data = $('#popForm').serialize();

				$.ajax({
					type: "POST",
					url: baseUrl+'/categoria',
					data: data,
					success: function(data) {
						
						$('#categoria')
							.append($("<option></option>")
							.attr("value", data.id)
							.text(data.nome)); 
					},
					error: function(data) {

					}
				},
				function(r){
					$('#pops').popover('hide')
				})
			})
		})
	})
});

