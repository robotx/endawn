function load(){
    document.getElementById('idinscription').style.display="block";
    document.getElementById('idconnexion').style.display="block";
    document.getElementById('iddemandederesetmdp').style.display="block";
}
// Connexion //
var modal = document.getElementById('idinscription');
var modal2 = document.getElementById('idconnexion');
var modaldemandederesetmdp = document.getElementById('iddemandederesetmdp');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }if (event.target == modaldemandederesetmdp) {
        modaldemandederesetmdp.style.display = "none";
    }if (event.target == modal2) {
        modal2.style.display = "none";
    }
}
