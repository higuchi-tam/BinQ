require('./bootstrap');

require('./components/dropdown');


window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// const app = new Vue({
//     el: '#app',
// });
