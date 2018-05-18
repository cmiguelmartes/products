function confirmDelete(productId)
{
	var r = confirm("¿Seguro desea borrar el producto?");
	if (r == true) {
	    window.location.replace("http://localhost/products/delete?id="+productId);
	} 
}

