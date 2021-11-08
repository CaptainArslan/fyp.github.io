<script type="text/javascript">
    //For responsive menu bar
    function myFunction() {
        var x = document.getElementById("nav");
        if (x.className === "mynav") {
            x.className += " responsive";
        } else {
            x.className = "mynav";
        }
    }
    //Get the button
    var mybutton = document.getElementById("button");
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
            nav.style.animation = "moveDown 2s cubic-bezier(0.165, 0.840, 0.440, 1.000)";
        } else {
            mybutton.style.display = "none";
        }
    }
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.style.scrollBehavior = "smooth";
        document.documentElement.scrollTop = 0;
    }
    //For PopUp Page
    function openSearch() {
        document.getElementById("myPopup").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("myPopup").style.display = "none";
    }
    /*********************************** */

    //For Admin Side***********************************
    function Tab_bar(div_id) {
        var i, tabcontent, tab;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tab = document.getElementsByClassName("tab");
        for (i = 0; i < tab.length; i++) {
            tab[i].style.display = "block";
        }
        document.getElementById(div_id).style.display = "block"
    }
    /***********************************/

    //For User Side
    const CurrentLocation = location.href;
    const MenuItem = document.querySelectorAll('a');
    const MenuLength = MenuItem.length
    for (let i = 0; i < MenuLength; i++) {
        if (MenuItem[i].href === CurrentLocation) {
            MenuItem[i].className = "Active"
        }
    }
    /************************* */
    var expanded = false;

    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('.multi_select').selectpicker();
    })
</script>
<!-- <script>
    var iprice = document.getElementsByClassName("iprice");
    var iQuantity = document.getElementsByClassName("prdQuantity");
    var iTotal = document.getElementsByClassName("iTotal");
    var iqTotal = document.getElementsByClassName("iqTotal");
    var iq = document.getElementsByClassName("iq")

    function subTotal() 
    {
        $qT = 0;
        for (i = 0; i < iprice.length; i++) 
        {
            iTotal[i].innerText = (iprice[i].value)*(iQuantity[i].value);
            iq[i].innerText = (iQuantity[i].value);
        }
    }
    subTotal();
</script> -->