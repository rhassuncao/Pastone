$(".only_numbers").on("input", function(e) {

	this.value = this.value.replace(/[^0-9.]/g, ''); 
	this.value = this.value.replace(/(\..*)\./g, '$1');
});