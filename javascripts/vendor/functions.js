$(document).ready(function(){
	$('input#cpf').on('keydown',function(e) {
		/* Allow backspace, delete, tab, esc e enter */
		if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
		/* Allow CTRL+A */
		(event.keyCode == 65 && event.ctrlKey === true) || 
		/* Allow CTRL+C */
		(event.keyCode == 67 && event.ctrlKey === true) || 
		/* Allow CTRL+X */
		(event.keyCode == 88 && event.ctrlKey === true) || 
		/* Allow CTRL+V */
		(event.keyCode == 86 && event.ctrlKey === true) || 
		/* Allow Command+A (Mac) */
		(event.keyCode == 65 && event.metaKey === true) || 
		/* Allow Command+C (Mac) */
		(event.keyCode == 67 && event.metaKey === true) || 
		/* Allow Command+X (Mac) */
		(event.keyCode == 88 && event.metaKey === true) || 
		/* Allow Command+V (Mac) */
		(event.keyCode == 86 && event.metaKey === true) || 
		/* Allow home, end, left e right keys */
		(event.keyCode >= 35 && event.keyCode <= 39)){
			return;	
		}else{
			if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )){
				event.preventDefault(); 
			}   
		}
	});
});