async function user(){
    const {default: apiFetch } = await import('../utils/apiFetch.js');
    await apiFetch('/users/getInfo', {method: 'GET'})
        .then((user) => {
            console.log(user.data);
            // document.getElementById('userName').innerText = user.data.full_name;
        })
        .catch((error) => {

        })
}
user();