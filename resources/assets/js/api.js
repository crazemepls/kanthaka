import axios from 'https://unpkg.com/axios/dist/axios.min.js';

const $axios = axios.create({
    baseURL: '/api',
    headers: {
        Authorization: localStorage.getItem('token') != 'null' ? 'Bearer ' + JSON.stringify(localStorage.getItem('token')):'',
        'Content-Type': 'application/json'
    }
});

export default $axios;