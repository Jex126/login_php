async function login() {
    const form = document.getElementById('contenedor__form');
    const formData = new FormData(form);
    const jsonData = {};
    formData.forEach((value, key) => {
        jsonData[key] = value;
    });
    data = JSON.stringify(jsonData);
    if(jsonData['correo'] && jsonData['contrasena']){
        fetch("http://localhost/", {
            method: "POST",
            body: data,
            headers: {
                "Content-Type": "application/json",
            },
        })
            .then((res) => res.json())
            .catch((error) => console.error("Error:", error))
            .then((response) => {
                switch(response['status']){
                    case '0': window.location.href = "/principal";
                    break;
                    case '1': alert("Contraseña Incorrecta");
                    break;
                    case '2': alert("Usuario no registrado");
                }
            });
    }else{
        if(!jsonData['correo']){
            alert("Ingrese el correo");
        }else if(!jsonData['contrasena']){
            alert("Ingrese la contraseña");
        }
    }
    
}