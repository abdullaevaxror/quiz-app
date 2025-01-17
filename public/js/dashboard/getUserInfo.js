async function user(){
    const {default: apiFetch } = await import('../utils/allFetch.js');
    await apiFetch('/users/getInfo', {method: 'GET'})
        .then((user) => {
            document.getElementById('userName').innerText = user.user.full_name;
        })
        .catch((error) => {

        })
}
user();