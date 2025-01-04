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
                    case '1': Swal.fire({
                        title:'Error!',
                        text: 'Contraseña incorrecta',
                        icon: 'error',
                        confirmButtonText:'aceptar'
                    });
                    break;
                    case '2': Swal.fire({
                        title:'Error!',
                        text: 'Usuario no registrado',
                        icon: 'error',
                        confirmButtonText:'aceptar'
                    });
                }
            });
    }else{
        if(!jsonData['correo']){
            Swal.fire({
                title:'Oops!',
                text: 'Falta ingresar el correo',
                icon: 'warning',
                confirmButtonText:'aceptar'
            })
        }else if(!jsonData['contrasena']){
            Swal.fire({
                title:'Oops!',
                text: 'Falta ingresar el contraseña',
                icon: 'warning',
                confirmButtonText:'aceptar'
            })
        }
    }
    
}