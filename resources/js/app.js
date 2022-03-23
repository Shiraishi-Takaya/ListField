require('./bootstrap');

import { createApp } from 'vue';
import ListComponent from './components/ListComponent.vue';
import VueGridLayout from "vue-grid-layout";
import { GridItem, GridLayout } from "vue-grid-layout";

createApp({
    components:{
        ListComponent,
        GridItem,
        GridLayout,
    }
}).use(VueGridLayout).mount('#app');
