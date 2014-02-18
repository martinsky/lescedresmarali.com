/**
 * 
 */
function updateQuote() {
    var length_in_feet;
    var distance_between_trees;
    var unit_price;
    var unit_price_2_1_5=3.99;
    var installation_price;
    var number_of_trees;
    var number_of_trees_to_plant;
    var price_without_installation;
    var price_with_installation;
    var installation_cost;
    var total_price;
    var description;
    var photo_url;
    var photo_url_small;
    var photo_url_medium;
    var photo_url_large;
    var distance_between_trees_1_5=1.5;
    var distance_between_trees_2=2;


    // This piece of code check if the user wants to have
    // unit in Meters or in Foot.
    if (jQuery("input[name=distance_unit]:checked").val() == 'M') {
        length_in_feet = jQuery("#distance").val() * 3.2808399;
    } else if (jQuery("input[name=distance_unit]:checked").val() == 'F') {
        length_in_feet = jQuery("#distance").val();
    }

    number_of_trees_2_1_5 = Math.ceil(length_in_feet/distance_between_trees_1_5);
    number_of_trees_3_1_5 = Math.ceil(length_in_feet/distance_between_trees_1_5);
    total_price_without_installation_2_1_5 = (number_of_trees_2_1_5 * unit_price_2_1_5).toFixed(2);
    price_without_installation = (number_of_trees * unit_price).toFixed(2);
    installation_cost = (number_of_trees * installation_price).toFixed(2);
    price_with_installation = ((number_of_trees * unit_price)+(number_of_trees * installation_price)).toFixed(2);

    number_of_trees_to_plant = number_of_trees;
    photo_url_small = '<img src="http://www.lescedresmarali.com/wp-content/uploads/2013/04/cedres-2-a-3-pieds-au-pied-et-demi.jpg" width="100%" height="100%">';
    jQuery("#quantite_de_cedres_2_1_5").text(number_of_trees_2_1_5);
    jQuery("#quantite_de_cedres_3_1_5").text(number_of_trees);
    jQuery("#description").text(description);
    jQuery("#unit_price_2_1_5").text(unit_price_2_1_5+"$ ");
    jQuery("#total_price_without_installation_2_1_5").text(total_price_without_installation_2_1_5+"$ ");
    
    jQuery("#price_without_installation").text(price_without_installation+"$ ");
    jQuery("#price_without_installation_2_1_5").text(total_price_2_1_5+"$ ");
    jQuery("#number_of_trees_to_plant").text(number_of_trees_to_plant);
    jQuery("#installation_price").text(installation_price+" $ ");
    jQuery("#installation_cost").text(installation_cost+" $ ");
    jQuery("#price_with_installation").text(price_with_installation+" $");
    jQuery("#photo_url").prepend(photo_url_small);

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
