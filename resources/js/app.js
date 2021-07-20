require('./bootstrap');

import Vue from 'vue';
import App from './components/AppComponent';
import Table from './components/TableComponent';

const app = new Vue({
    el: '#app',
    components: {App, Table}
});
