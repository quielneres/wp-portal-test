document.addEventListener("DOMContentLoaded", function() {
    var check_icon_menu = document.getElementById("header__menu--bt");
    // var sea_class = document.getElementsByClassName("header__sea");
    // var search_visib_class = document.getElementsByClassName("header__search--visib");
    // var input_class = document.getElementsByClassName("header__search--input");
    var bt_class = document.getElementsByClassName("header__search--bt");
    var x = window.matchMedia("(max-width: 991px)");
    // var y = window.matchMedia("(max-width: 576px)");

    // for(var i = 0; i < sea_class.length; i++){

    //     sea_class[i].addEventListener('mouseover', function(event) {
    //         // search_visib_class[0].style.display = "block";
    //         input_class[0].focus();
    //     });        
    // }

    // // search_visib_class[0].addEventListener('mouseout', function(event) {
    // //     search_visib_class[0].style.display = "none";
    // // });

    // bt_class[1].addEventListener("click", function(event){
    //     // alert("sadsa");
    // });

    // input_class[0].addEventListener('focus', function() {
    //     // alert("wqeqw");
    //     search_visib_class[0].style.display = "block";
    // });

    // // search_visib_class[0].addEventListener('blur', function(event) {
    // //     search_visib_class[0].style.display = "none";
    // // });

    //click

    check_icon_menu.addEventListener("click", function(event){
        if(x.matches) {
            if(check_icon_menu.checked == true){
                bt_class[0].style.display = "none";
            } else {
                bt_class[0].style.display = "block";
            }
        } 
    });

    
});