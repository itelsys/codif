function openLeftMenu() {
    document.getElementById("leftMenu").style.display = "block";
}
function closeLeftMenu() {
    document.getElementById("leftMenu").style.display = "none";
}

function ShowHideDiv() {
        var  selectbox= document.getElementById("ChosenSelect");
        var  div= document.getElementById("Showing");
        div.style.display = selectbox.value == "" ? "none" : "block";
    }


function ShowClickDiv(){
       var x = document.getElementById("ShowingbyClick");
       if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
}

function ShowClickDivAll(){
       var x = document.getElementById("ShowingAll");
       if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
}

var modal=document.getElementById('modal-wrapper');
window.onclick=function(event){
    if(event.target == modal){
        modal.style.display="none";
    }
}