require('./bootstrap');

import { createApp } from 'vue';
import ListComponent from './components/ListComponent.vue';
import router from './routes/router.js';
import VueGridLayout from "vue-grid-layout";
import { GridItem, GridLayout } from "vue-grid-layout";

createApp({
    components:{
        ListComponent,
        GridItem,
        GridLayout,
    }
}).use(router).use(VueGridLayout).mount('#app');
