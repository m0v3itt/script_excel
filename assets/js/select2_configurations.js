
	$(".multiple-select").select2({
		maximumSelectionLength: 2,
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
		console.log(e);
		var  {id, text}  = e.params.data;
		var { dia, praia, turno} = e.currentTarget.dataset

		$.post('data.php', { dia, praia, id, turno })
	})

	$('.multiple-select').on('select2:unselect', function (remove) {
		var  {id}  = remove.params.data;
		
		var { dia, praia, turno} = remove.currentTarget.dataset
		console.log(id,dia, praia, turno);
		$.post('remove.php',  { dia, praia, id, turno})
		
	});

	// $(document).ready(function() {
	// 	$.ajax({
    //         type: "GET",
    //         url: "dropDownSelecionados.php",
    //         success: function(data) {
    //             alert(data);
    //         }
    //     });
	// });

	



								
								
