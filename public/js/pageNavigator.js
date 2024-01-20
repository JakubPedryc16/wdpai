
function redirectToPage(newPageString) {

    if (typeof newPageString === 'string') {
        window.location.href = newPageString;
    }
    else{
        alert("newPageString is not of string type")
    }
}
window.addEventListener('pageshow', function (event) {
    if (event.persisted) {
        if(!sessionStorage.getItem('idUser')){
            redirectToPage('/');
        }
    }
});
