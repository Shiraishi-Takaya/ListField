require('./bootstrap');

import { createApp } from 'vue';
import TasksComponent from './components/TasksComponent.vue';

createApp({
    components:{
        TasksComponent
    }
}).mount('#app');
