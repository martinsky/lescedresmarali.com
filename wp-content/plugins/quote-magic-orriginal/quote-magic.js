/**
 * 
 */
function getRandom() {
	var my_num = Math.floor(Math.random() * 5);
	jQuery("#price_total").append(my_num);
}

function updateQuote() {
	var length_in_feet;
	var distance_between_trees;
	var unit_price;
	var installation_price;
	var number_of_trees;
	var number_of_trees_to_plant;
	var price_without_installation;
	var price_with_installation;
	var installation_cost;
	var total_price;
	var description;
	var photo_url;

	// This piece of code check if the user wants to have
	// unit in Meters or in Foot.
	if (jQuery("input[name=distance_unit]:checked").val() == 'M') {
		length_in_feet = jQuery("#distance").val() * 3.2808399;
	} else if (jQuery("input[name=distance_unit]:checked").val() == 'F') {
		length_in_feet = jQuery("#distance").val();
	}

	// This piece of code check what option the customer wants
	// option 1 = ceder

	if (jQuery("input[name=option_cedres]:checked").val() == '1') {
		distance_between_trees=1.5;
		unit_price=4;
		if(length_in_feet<50){
			installation_price=18;
		}else{
			installation_price=16;
		}
		description="Cèdres hauteur 2 à 3 pieds. Distance 1.5 pied";
		photo_url='<img src="http://www.lescedresmarali.com/wp-content/uploads/2013/04/cedres-2-a-3-pieds-au-pied-et-demi.jpg" width="100%" height="100%">';

	} else if (jQuery("input[name=option_cedres]:checked").val() == '2') {
		distance_between_trees=2;
		unit_price=4;
		if(length_in_feet<50){
			installation_price=18;
		}else{
			installation_price=16;
		}
		description="Cèdres hauteur 2 à 3 pieds. Distance 2 pieds";
		photo_url='<img src="http://www.lescedresmarali.com/wp-content/uploads/2013/04/cedres-2-a-3-pieds-au-deux-pieds.jpg" width="100%" height="100%">';

	} else if (jQuery("input[name=option_cedres]:checked").val() == '3') {
		distance_between_trees=2;
		if(length_in_feet<50){
			installation_price=35;
		}else{
			installation_price=32;
		}
		unit_price=12.50;
		description="Cèdres hauteur 3 à 4 pieds. Distance 2 pieds";
		photo_url='<img src="http://www.lescedresmarali.com/wp-content/uploads/2013/04/cedres-4-pieds-au-deux-pieds.jpg"width="100%" height="100%">';
	}
	
	number_of_trees = Math.ceil(length_in_feet/distance_between_trees);
	total_price = (number_of_trees * unit_price).toFixed(2);
	price_without_installation = (number_of_trees * unit_price).toFixed(2);
	installation_cost = (number_of_trees * installation_price).toFixed(2);
	price_with_installation = ((number_of_trees * unit_price)+(number_of_trees * installation_price)).toFixed(2);
	
	number_of_trees_to_plant = number_of_trees;
	
	jQuery("#quantite_de_cedres").text(number_of_trees);
	jQuery("#description").text(description);
	jQuery("#unit_price").text(unit_price+" $ ");
	jQuery("#price_without_installation").text(price_without_installation+" $ ");
	jQuery("#number_of_trees_to_plant").text(number_of_trees_to_plant);
	jQuery("#installation_price").text(installation_price+" $ ");
	jQuery("#installation_cost").text(installation_cost+" $ ");
	jQuery("#price_with_installation").text(price_with_installation+" $");
	jQuery("#photo_url").prepend(photo_url);
	
	// alert($("input[name=distance_unit]:checked").val()); 
}


 jQuery().ready(function() {
	updateQuote();
	jQuery("#distance").keyup(function(event) {
	jQuery("#photo_url").empty();
	updateQuote();
	});
	
	jQuery("input[name=distance_unit]").click(function(event) {
		jQuery("#photo_url").empty();
		updateQuote();
	});
	
	jQuery("input[name=option_cedres]").click(function(event) {
		jQuery("#photo_url").empty();
		updateQuote();
	});

}); // End document.ready()
