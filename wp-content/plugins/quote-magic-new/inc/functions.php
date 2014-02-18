<?php
function quote_magic_function() {
    $quote_form='
        <div id="quote_form">
        <h1>Calculatrice de Prix</h1>
        <table border="0" width="100%">
        <tr>
        <td valign="top">Distance nécessaire pour votre projet: <input type="text" id="distance" name="distance" size="4" value="100"/>
        <input type="radio"  name="distance_unit" value="F" CHECKED/>Pied(s)
        <input type="radio"  name="distance_unit" value="M"/>Metres
        </tr>
        </table>
        </div>
        <div id="quote">
        <div class="cssTable" >
        <table>
        <!-- Headers of the HTML table -->
        <tr>
        <td>Type de service</td>
        <td>Quantité de cèdres requis</td>
        <td>Description</td>
        <td>Prix/Unité</td>
        <td>Total</td>
        <td>Photo</td>
        </tr>
        <!-- Row without fancy services -->
        <tr>
        <td rowspan="6">Cèdres seulement</td>
        <!-- First row -->
        <td><div id="quantite_de_cedres_2_1_5"></div></td>
        <td>Hauteur 2 pieds espacement 1.5 pied</td>
        <td><div id="unit_price_2_1_5"></div></td>
        <td><div id="total_price_without_installation_2_1_5"></div></td>
        <td rowspan="2"><img src="http://www.lescedresmarali.com/wp-content/uploads/2013/04/cedres-2-a-3-pieds-au-pied-et-demi.jpg" width="100%" height="100%"></div></td>
        </tr>
        <!-- second row -->
        <tr>
        <td><div id="quantite_de_cedres_3_1_5"></div></td>
        <td>Hauteur 3 pieds espacement 1.5 pied</td>
        <td><div id="unit_price"></td>
        <td><div id="price_without_installation_2_1_5"></td>
        </tr>
        <!-- third row -->
        <tr>
        <td><div id="quantite_de_cedres"></div> </td>
        <td>Hauteur 2 pieds espacement 2 pied</td>
        <td><div id="unit_price"></td>
        <td><div id="price_without_installation"></td>
        <td rowspan="2"><div id="photo_url_abc"></div></td>
        </tr>
        <!-- fourth row -->
        <tr>
        <td><div id="quantite_de_cedres"></div> </td>
        <td>Hauteur 3 pieds espacement 2 pied</td>
        <td><div id="unit_price"></td>
        <td><div id="price_without_installation"></td>
        </tr>
        <!-- fith row -->
        <tr>
        <td><div id="quantite_de_cedres"></div> </td>
        <td>Hauteur 3 pieds espacement 2 pied</td>
        <td><div id="unit_price"></td>
        <td><div id="price_without_installation"></td>
        <td rowspan="2"><div id="photo_url"></div></td>
        </tr>
        <!-- sixth row -->
        <tr>
        <td><div id="quantite_de_cedres"></div> </td>
        <td>Hauteur 4 pieds espacement 2 pied</td>
        <td><div id="unit_price"></td>
        <td><div id="price_without_installation"></td>
        </tr>
        <!-- Row with a lot of fancy service -->
        <tr>
        <td rowspan="6">Cèdres et service de plantation</td>
        <td><div id="quantite_de_cedres"></div> </td>
        <td>Hauteur 2 pieds espacement 1.5 pied</td>
        <td><div id="unit_price"></td>
        <td><div id="price_without_installation"></td>
        <td rowspan="2"><div id="photo_url"></div></td>
        </tr>
        <tr>
        <td><div id="quantite_de_cedres"></div> </td>
        <td>Hauteur 3 pieds espacement 1.5 pied</td>
        <td><div id="unit_price"></td>
        <td><div id="price_without_installation"></td>
        </tr>
        <tr>
        <td><div id="quantite_de_cedres"></div> </td>
        <td>Hauteur 2 pieds espacement 2 pied</td>
        <td><div id="unit_price_2_1_5"></td>
        <td><div id="price_without_installation"></td>
        <td rowspan="2"><div id="photo_url"></div></td>
        </tr>
        <tr>
        <td><div id="quantite_de_cedres"></div> </td>
        <td>Hauteur 3 pieds espacement 2 pied</td>
        <td><div id="unit_price"></td>
        <td><div id="price_without_installation"></td>
        </tr>
        <tr>
        <td><div id="quantite_de_cedres"></div> </td>
        <td>Hauteur 3 pieds espacement 2 pied</td>
        <td><div id="unit_price"></td>
        <td><div id="price_without_installation"></td>
        <td rowspan="2"><div id="photo_url"></div></td>
        </tr>
        <tr>
        <td><div id="quantite_de_cedres"></div> </td>
        <td>Hauteur 4 pieds espacement 2 pied</td>
        <td><div id="unit_price"></td>
        <td><div id="price_without_installation"></td>
        </tr>
        </table>
        </div>
        </div>
        ';
    return $quote_form;
}

function register_shortcodes(){
    add_shortcode('quote-magic', 'quote_magic_function');
}

add_action( 'init', 'register_shortcodes');
