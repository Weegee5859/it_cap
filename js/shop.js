/*
	Author:
	Date: 9/20/2022
	Filename: shop.js
*/
var dateObject = new Date();


var shirts = document.getElementById("shirts")

//shirts.onclick = 

function showProducts(value,clickedButton) {
	var products = document.getElementsByClassName("product")
	for (let i = 0; i < products.length; i++) {
		let desc = products[i].getElementsByClassName("productDesc")[0].value.toLowerCase()
		//console.log(desc)
		if (desc.includes(value) || value == "all") {
			products[i].style.display = "flex";
			continue;
		}
		products[i].style.display = "none";	
	}

	var navItems = document.getElementsByClassName("navItem")
	for (let i = 0; i < navItems.length; i++) {
		console.log(navItems)
		navItems[i].id = "off"
	}
	clickedButton.id = "on"
}