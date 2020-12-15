import './bootstrap';
import Vue from 'vue';
import List from './components/List.vue';

new Vue({
    el: '#list',
    render: h => h(List)
})