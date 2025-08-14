var tableauSrc = document.getElementById("container").getAttribute("data-link");
var tableauHeight = 0;
var tableauMargin = 18;

//var tailleContainer = document.getElementById('container').offsetHeight;
//var tableauIframe = document.getElementById('tableau');
//tableauIframe.style.height = tailleContainer;

var form;
var formHeight; // Taille dynamique du form
var formFlouteur;
var closeForm;

var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
var eventer = window[eventMethod];
var messageEvent = eventMethod === "attachEvent" ? "onmessage" : "message";

eventer(messageEvent, function (e) {
    if (e.origin !== tableauSrc){
        if (e.data.slice(0,6) == "tableH") {
            tableauHeight =  parseInt(e.data.replace("tableH-",""));
            tableau.style.height = tableauHeight+40+"px";
        }
        if (e.data.slice(0,6) == "table-") {
            showform(e.data.replace("table-",""))
        }

        if (e.data == "form-close") {
            closeForm();
        }
    }
});

var tableau = document.createElement("iframe");
tableau.setAttribute("id", "tableau");
tableau.setAttribute("onload", "window.parent.scroll(0,0)");
tableau.setAttribute("src", tableauSrc);
tableau.setAttribute("class", "fullscreen-iframe");
tableau.style.height = 1000+"px";

tableau.addEventListener("load", function(){
    form = document.createElement("iframe");
    form.setAttribute("id", "form");
    form.setAttribute("class", "fullscreen-iframe");
    form.addEventListener("load", function(){
        form.style.opacity = "1";
    })
})

document.getElementById("container").appendChild(tableau);

function showform(href) {
    if (!document.getElementById("form")) {
        form.setAttribute("src", href);
        document.getElementById("container").appendChild(form);
        setTimeout(function(){
            formFlouteur.style.backgroundColor = "black";
        },1)
    }else{
        document.getElementById("form").setAttribute("src", href)
    }
}  

function closeForm(){
    document.getElementById("container").removeChild(form);
    form.style.opacity = "";
}
//chargement 2ème iframe avec bouton balise A
var countLoad = 0;
$('#iframe_2').on('load', function() {
    // console.log('loading 4');
    countLoad++;
    if(countLoad == 2){
        // console.log('chargement 2eme iframe')
        $("#iframe_2").attr('style','display:block; height:100%; width: 100%; background-color: rgba(0, 0, 0, 0.5); position: fixed; z-index: 100000;');
    }
});

// fermeture 2eme iframe
// $("#iframe_2").find(".btnCloseIframe").click(function(){
//     // console.log('fermeture iframe 1');
// });
// $(document).on('click', '.btnCloseIframe', function(e){
//     // console.log('fermeture iframe 2');
// });

//gestion token
let searchParams = new URLSearchParams(window.location.search);
if(searchParams.has('private')){
    $("#tableau").attr('src', $("#tableau").attr('src') + '?private=' + searchParams.get('private'));
}