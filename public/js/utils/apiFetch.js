function apiFetch(uri, option = {}) {
    const baseUrl = 'http://localhost:8080/api',
        token = localStorage.getItem('token');
    const defaultHeaders = {};
    if (token) {
        defaultHeaders.Authorization = `Bearer ${token}`;
    }
    return fetch(`${baseUrl}${uri}`, {
        ...option,
        headers: {...defaultHeaders, ...option.headers},
    })
        .then(async response => {
            if (!response.ok) {
                const error = new Error("HTTP error");
                error.data = await response.json();
                throw error;
            }
            return response.json();
        })
        .catch(error => {
            throw error;
        });
}
export default apiFetch;