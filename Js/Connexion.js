function load(){
    document.getElementById('idinscription').style.display="block";
    document.getElementById('idconnexiondirrecte').style.display="block";
}
// Connexion //
var modal = document.getElementById('idinscription');
var modaldirrecte = document.getElementById('idconnexiondirrecte');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }if (event.target == modaldirrecte) {
        modaldirrecte.style.display = "none";
    }
}
