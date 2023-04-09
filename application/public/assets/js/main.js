 
 function updateProduct(){
		const notyf = new Notyf({
		duration: 9000,
		position: {
		x: 'right',
		y: 'top',
		}
	})
	notyf.success('Your changes have been successfully saved!');
}	
