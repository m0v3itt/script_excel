
	$(".multiple-select").select2({
		maximumSelectionLength: 2,
  		minimumInputLength: 0,
		ajax:{
			processResults: function (data) {
			// Transforms the top-level key of the response object from 'items' to 'results'
			return {
				results: data,
      			};
    		}
		}
		
	});
	
	$('.multiple-select').on('select2:select', function (e) {

		var  {id, text}  = e.params.data;
		var { dia, praia, turno, data1,data2} = e.currentTarget.dataset

		console.log(dia, praia, turno, data1,data2)
		$.post('data.php', { dia, praia, id, turno, data1,data2 })
			.done(() => updateNadadores(dia, praia, id, turno,data1,data2))
			.fail(function() {
				alert( "error" );
			})
		})

	

	$('.multiple-select').on('select2:unselect', function (remove) {
		var  {id}  = remove.params.data;
		
		var { dia, praia, turno} = remove.currentTarget.dataset
		
		$.post('remove.php',  { dia, praia, id, turno})
			
			
	});
	
	function updateNadadores(dia, praia, id, turno,data1,data2){
		$.get('request.php',  { dia, praia, id, turno,data1,data2},function( data ) {
			
			if (data != 'false'){
				console.log("DATA " + data);
			
					for (var value of JSON.parse(data)) {
						var i = 0
					$('#container')
						.append(`<input type="checkbox" name="checkbox" id="dias"  value="${value}">`)
					
						.append(`<label for="${value}">${value}</label></div>`)
						.append(`<br>`);
					}
					
				$("#exampleModalCenter").modal('show');
				$('#enviar').click(function () {
	
					var result = $('input[type="checkbox"]:checked');
					if (result.length > 0) {
						var resultString = result.length + " checkboxe(s) are checked;";
						result.each(function () {
							resultString += $(this).val();
						});
						console.log(resultString )
						$.post('teste.php', { resultString })
					}
				})
				  $('#exampleModalCenter').on('hidden.bs.modal', function (e) {
					var container = document.getElementById("container");
					container.replaceChildren();
				  });
			}
		  })
	}


	

//option selected


								
								
