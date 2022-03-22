require('./bootstrap');

import { createApp } from 'vue';
import ListComponent from './components/ListComponent.vue';

createApp({
    components:{
        ListComponent
    }
}).mount('#app');
