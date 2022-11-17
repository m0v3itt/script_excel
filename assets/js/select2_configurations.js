
	$(".multiple-select").select2({
		maximumSelectionLength: 2,
		ajax:{
			processResults: function (data) {
			// Transforms the top-level key of the response object from 'items' to 'results'
			return {
				results: data
      			};
    		}
		}
	});
	
	$('.multiple-select').on('select2:select', function (e) {
		console.log(e);
		var  {id}  = e.params.data;
		
		var { dia, praia, turno, codigo} = e.currentTarget.dataset
		
		console.log({ dia, praia, id, turno, codigo});
		$.post('data.php', { dia, praia, id, turno , codigo})
		
		
	})
	
	$('.multiple-select').on('select2:unselect', function (remove) {
		var  {id}  = remove.params.data;
		var { dia, praia, turno, codigo} = remove.currentTarget.dataset
		$.post('remove.php',  { dia, praia, id, turno, codigo})
        console.log( { dia, praia, id, turno , codigo});
	});



