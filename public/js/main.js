async function login() {
    event preventDefault();
    let form = document.getElementById("form"),
        formData = new FormData(form);


    fetch('http://localhost:8080/api/login', {
        method: 'POST',
        body: formData

    })
        .then(function (response) {
            if (response.ok) {
                return response.json();
            }
            return Promise.reject(response);

        })
        .then(function (data) {
            localStorage.setItem('token', data.token);
            localStorage.setItem('token', data.token);
            window.location.href = "/dashboard";
        })
        .catch(function (error) {
            console.error(error)
        });

}












// async function register() {
//     let form = document.getElementById("form"),
//         formData = new FormData(form);
//
//
//     fetch('http://localhost:8080/api/register', {
//         method: 'POST',
//         body: formData
//
//     })
//         .then(function (response) {
//             if (response.ok) {
//                 return response.json();
//             }
//             return Promise.reject(response);
//
//         })
//         .then(function (data) {
//
//             console.log(data);
//         })
//         .catch(function (error) {
//             console.error(error)
//         });
// }