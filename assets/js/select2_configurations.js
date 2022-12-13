
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


				var input = document.createElement("input");
				$('#exampleModalCenter').on('shown.bs.modal', function (e) {
					$radioContainer = $('<div>').attr('id', 'my-radio-container');
					$('#my-form').append($radioContainer);
					var x = JSON.parse(data)
					var array=[]
					x.forEach(dias => {
						array.push(dias.dias)
						for(var i = 1;i<array.length;i++){
							var radio = $('<input>').attr('type', 'radio').attr('name', 'my-radio-group').attr('value', 'data');
							var label = $('<label>').text(array[i]).prepend(radio)
							console.log("a")
							$radioContainer.append(label);
						}
					});
					
					console.log("array"+array)

				  });
				  $('#exampleModalCenter').on('hidden.bs.modal', function (e) {
					data = null;
				  });
				$("#exampleModalCenter").modal('show');
					
			
				
			}
		  })
	}


	// $(document).ready(function() {
	// 	$.ajax({
    //         type: "GET",
    //         url: "dropDownSelecionados.php",
    //         success: function(data) {
    //             alert(data);
    //         }
    //     });
	// });

	



								
								
