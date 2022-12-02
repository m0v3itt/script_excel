
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
<<<<<<< HEAD
		var  {id, text}  = e.params.data;
		var { dia, praia, turno} = e.currentTarget.dataset

		$.post('data.php', { dia, praia, id, turno })
=======
		var  {id}  = e.params.data;
		
		var { dia, praia, turno, codigo} = e.currentTarget.dataset
		
		console.log({ dia, praia, id, turno, codigo});
		$.post('data.php', { dia, praia, id, turno , codigo})
		// console.log(data);
		
>>>>>>> f3b9eac9e21985634a094c040ac0264dd6d9c2df
	})

	$('.multiple-select').on('select2:unselect', function (remove) {
		var  {id}  = remove.params.data;
<<<<<<< HEAD
		
		var { dia, praia, turno} = remove.currentTarget.dataset
		console.log(id,dia, praia, turno);
		$.post('remove.php',  { dia, praia, id, turno})
		
=======
		var { dia, praia, turno, codigo} = remove.currentTarget.dataset
		$.post('remove.php',  { dia, praia, id, turno, codigo})
        console.log( { dia, praia, id, turno , codigo});
>>>>>>> f3b9eac9e21985634a094c040ac0264dd6d9c2df
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

	



								
								
