<?php
function quote_magic_function() {
$quote_form='
<div id="quote_form">
    <h1>Calculatrice de Prix</h1>
    <table border="0" width="100%">
        <tr></tr>
        <td valign="top"><input type="text" id="distance" name="distance" size="4" value="100"/>
            <input type="radio"  name="distance_unit" value="F" CHECKED/>Pied(s)
            <input type="radio"  name="distance_unit" value="M"/>Metres
        </td>
        <td colspan="2" valign="top">
            <input type="radio" name="option_cedres" value="1" /> Cèdres hauteur 2 à 3 pieds. Distance 1.5 pied
            <br>
            <input type="radio" name="option_cedres" value="2" CHECKED/> Cèdres hauteur 2 à 3 pieds. Distance 2 pieds
            <br>
            <input type="radio" name="option_cedres" value="3" /> Cèdres hauteur 3 à 4 pieds. Distance 2 pieds
        </td>
        <td align="right"><div id="photo_url"></div></td>
    </tr>


</table>
        </div>
        <div id="quote">
            <div class="cssTable" >
                <table >
                    <tr>
                        <td>
                            Qty
                        </td>
                        <td >
                            Description
                        </td>
                        <td>
                            Prix/Unité
                        </td>
                        <td>
                            Total
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <div id="quantite_de_cedres">
                            </div>
                        </td>
                        <td>
                            <div id="description"></div>Taxes incluses
                        </td>
                        <td>
                            <div id="unit_price"></div>
                            Taxes incluses</td>
                        <td>
                            <div id="price_without_installation"></div>
                            Taxes incluses </td>
                    </tr>
                    <tr>
                        <td >
                            <div id="number_of_trees_to_plant"></div>
                        </td>
                        <td>
                            Service de plantation, entretiens, engrais et taille compris. <br>Taxes incluses
                        </td>
                        <td>
                            <div id="installation_price"></div> 
                            Taxes incluses</td>
                        <td>
                            <div id="installation_cost"></div>  
                            Taxes incluses</td>
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
