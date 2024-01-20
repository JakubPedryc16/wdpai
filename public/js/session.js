
function init(idUser, userRole) {
    alert(userRole);
    let storedId = sessionStorage.getItem('idUser');
    if(storedId){
        return;
    }
    if (idUser === 0) {
        window.location.href = '/';
    } else {
        if (!storedId) {
            sessionStorage.setItem('idUser', idUser);
            sessionStorage.setItem('userRole', userRole)
        }
    }
}

function checkId() {
    let storedId = sessionStorage.getItem('idUser');
    if (!storedId) {
        window.location.href = '/';
    }
}

function getId(){
    let storedId = sessionStorage.getItem('idUser');
    if(!storedId){
        return null;
    }
    return storedId;
}

function logout(){
    sessionStorage.clear();
    window.location.href = '/';
}


