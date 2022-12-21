import './bootstrap';
import axios from 'axios';
import '../css/app.css';

console.log(axios.isCancel('something'));


async function load() {
    let url = '/api/picsum';
    let obj = await (await fetch(url)).json();
    console.log(obj);
}
load();
