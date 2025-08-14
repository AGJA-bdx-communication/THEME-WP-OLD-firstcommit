var tableauSrc = document.getElementById("egyla").getAttribute("data-link");

var egylaAge = document.getElementById("egyla-age");
if(egylaAge){
    var tableauAgeSrc = egylaAge.getAttribute("data-link");
}

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
//console.log('1: ' + eventMethod,'2: ' + eventer,'3: ' + messageEvent)
//console.log(messageEvent)
eventer(messageEvent, function (e) {
    //console.log(e);
    //console.log(e.target.document);
    // Section summary
    if (e.origin !== tableauSrc){
        if (e.data.slice(0,6) == "tableH") {
            tableauHeight =  parseInt(e.data.replace("tableH-",""));
            console.log('sent : ' + tableauHeight, 'iframe : ' + (tableau.style.height).replace('px', ''))
            tableau.style.height = tableauHeight+100+"px";
        }
        if (e.data.slice(0,6) == "table-") {
            showform(e.data.replace("table-",""))
        }
        if (e.data.slice(0,7) == "cart_id") {
            document.cookie = e.data;
        }
        if (e.data.slice(0, 4) == "slug") {
            document.cookie = e.data;
        }
        if (e.data == "form-close") {
            closeForm();
        }
        if(e.data == 'full'){
            location.href = '#content';
        }
    }
    // Tableau des âges
    if(e.origin !== tableauAgeSrc){
        if (e.data.slice(0,3) == "age") {
            tableauAgeHeight =  parseInt(e.data.replace("age-",""));
            tableauAge.style.height = tableauAgeHeight+50+"px";
        }
    }
});
// Tableau des âges
if(egylaAge){
    var tableauAge = document.createElement("iframe");
    tableauAge.setAttribute("id", "tableauAge");
    tableauAge.setAttribute("onload", "window.parent.scroll(0,0)");
    tableauAge.setAttribute("src", tableauAgeSrc);
    tableauAge.setAttribute("class", "fullscreen-iframe");
    tableauAge.style.height = 500+"px";
    document.getElementById("egyla-age").appendChild(tableauAge);
}
// Section summary
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
document.getElementById("egyla").appendChild(tableau);
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
	console.log(searchParams.get('private'));
    $("#tableau").attr('src', $("#tableau").attr('src') + '?private=' + searchParams.get('private'));
    if(egylaAge){$("#tableauAge").attr('src', $("#tableauAge").attr('src') + '?private=' + searchParams.get('private'));}
}
// CHANGE
$("#tableau").on('load',()=>{
    $(this).contents().on("mousedown, mouseup, click", function(){
        console.log("Click detected inside iframe.");
    });
});