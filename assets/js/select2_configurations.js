	// Inicialize select2 plugin
	$(".um_nadador").select2({
		maximumSelectionLength: 1,
  		minimumInputLength: 0,
		ajax:{
			
			processResults: function (data) {
			return {
				results: data,
      			};
    		}
		}
		
	});
	$(".dois_nadadores").select2({
		maximumSelectionLength: 2,
  		minimumInputLength: 0,
		ajax:{
			
			processResults: function (data) {
			return {
				results: data,
      			};
    		}
		}
		
	});
	$(".tres_nadadores").select2({
		maximumSelectionLength: 3,
  		minimumInputLength: 0,
		ajax:{
			
			processResults: function (data) {
			return {
				results: data,
      			};
    		}
		}
		
	});
	// Select nadadores that will show up in the select box
	$('.multiple-select').on('select2:select', function (e) {

		var  {id, text}  = e.params.data;
		var { dia, praia, turno, data1,data2} = e.currentTarget.dataset
		// When a nadadores is selected, send it to database
		$.post('data.php', { dia, praia, id, turno, data1,data2 })
			.done(() => updateNadadores(dia, praia, id, turno,data1,data2))
			.fail(function() {
				alert( "error" );
			})
		})

	
	// Same logic above but to remove
	$('.multiple-select').on('select2:unselect', function (remove) {
		var  {id}  = remove.params.data;
		
		var { dia, praia, turno} = remove.currentTarget.dataset
		
		$.post('remove.php',  { dia, praia, id, turno})
			
			
	});
	// Create a modal when a nadador has more than 2 days of disponibility
	function updateNadadores(dia, praia, id, turno,data1,data2) {
		$.get('request.php',  { dia, praia, id, turno,data1,data2},function( data ) {
			$.get('checked.php',  { dia, praia, id, turno,data1,data2},function( checked ) {    
				console.warn(checked)                          
			if (data != 'false'){
					for (var value of JSON.parse(data)) {
						var input = ""
						for (var day of JSON.parse(checked)) {
						
						if (value.toString()==day.toString()){
					
							input = `<input type="checkbox" name="checkbox" id="dias"  value="${value}" data-id="${id}" data-turno="${turno}" data-praia="${praia}" checked>`;
						}
						}

						if (input==""){
							input = `<input type="checkbox" name="checkbox" id="dias"  value="${value}" data-id="${id}" data-turno="${turno}" data-praia="${praia}">`;
						}

						$('#container')
						.append(input)
						.append(`<label for="${value}">${value}</label></div>`)
						.append(`<br>`);
					
					}
					$('#container')
						.append(`<input type="checkbox" name="checkbox" id="select-all"  >`)
						.append(`<label >   Selecionar todos </label></div>`)
						.append(`<br>`);
						$( '#container #select-all' ).click( function () {
							$( '#container input[type="checkbox"]' ).prop('checked', this.checked)
						  })
					$("#exampleModalCenter").modal('show');
		
				    $('#exampleModalCenter').on('hidden.bs.modal', function (e) {
						var container = document.getElementById("container");
						container.replaceChildren();
				 	});
					}
				});
		})             
	}
	
	$('#enviar').click(function () {

	var result = $('input[type="checkbox"]:checked');
	if (result.length > 0) {
		var resultString = "" 
		var dataId
		result.each(function () {
			resultString += $(this).val();
			dataId = $('#dias').attr("data-id");
			dataTurno = $('#dias').attr("data-turno");
			dataPraia = $('#dias').attr("data-praia");
		});
		console.log(resultString,dataId,dataTurno,dataPraia)
		
		$.post('modal_checkbox.php', { resultString,dataId,dataTurno,dataPraia })
	
		document.location.reload(true)
		
	
	}
	})
	
				