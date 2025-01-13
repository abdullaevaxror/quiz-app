 async function login() {
    event.preventDefault()
     let form = document.getElementById("form"),
         formData = new FormData(form);
     const {default: apiFetch} = await import('./utils/apiFetch.js');
     await apiFetch('/login', {method: 'POST', body: formData})
         .then((data) => {
             localStorage.setItem('token',data.token)
             window.location.href = '/dashboard';
         })
         .catch((error) => {
             document.getElementById('error').innerHTML='';
             Object.keys(error.data.errors).forEach(err => {
                 document.getElementById('error').innerHTML += `<p class="text-red-500 mt-1">${error.data.errors[err]}</p>`;
             })
         });
 }



//      async function register() {
//          let form = document.getElementById("form"),
//              formData = new FormData(form);
//
//
//          fetch('http://localhost:8080/api/register', {
//              method: 'POST',
//              body: formData
//
//          })
//              .then(function (response) {
//                  if (response.ok) {
//                      return response.json();
//                  }
//                  return Promise.reject(response);
//
//              })
//              .then(function (data) {
//
//                  console.log(data);
//              })
//              .catch(function (error) {
//                  console.error(error)
//              });
// }