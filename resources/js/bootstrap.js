import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');
window._ = require('lodash');
window.axios = require('axios');

try {
    // window.Popper = require('popper.js').default;
    // window.$ = window.jQuery = require('jquery');

    // require('bootstrap');
} catch (e) {}


window.Echo = new Echo({
    broadcaster: 'pusher',
    key: "a837cedbc13c28b484b1",
    cluster: "ap1",
});
