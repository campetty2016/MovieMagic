/**
 * Author: Candace Petty
 * File Name: app.js
 * Date: 11/16/15
 */

//The Ready Function
$(document).ready(function(){

    //Initialize Function that Displays the Data from the Database
    init();

});

//Initialize Function
function init() {

    //Database URL
    var dbURL = "php/nav.php";

        //Posts Data from the Database URL onto the Page
        $.post(dbURL, function (data) {

            //Stores and Parses the Data from the Database to JSON
            var menu = JSON.parse(data);

            //Loops through Each Instance of the Data and Appends the Following Attributes from the Buttons to the Page
            $.each(menu, function(key, menuButton){

                //Appends Post Data from the Database to the Navigation bar
                $("nav").append('<a id="' + menuButton.nav_title.toLowerCase() + '" href="#'+ menuButton.nav_name +'" class="'+ menuButton.nav_class +'">' + menuButton.nav_name.toUpperCase() + '</a>');
            });

            //Loops through Each Instance of the Data and Appends the Following Attributes from the Buttons to the Page
            $.each(menu, function(key, menuButton){

                //Appends Post Data from the Database to the Footer
                $("footer").append('<a id="' + menuButton.nav_title.toLowerCase() + '"href="#'+ menuButton.nav_name +'" class="'+ menuButton.nav_class +'">' + menuButton.nav_name.toUpperCase() + '</a>');
            });
        });
}
