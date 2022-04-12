import { createRouter, createWebHistory } from 'vue-router';
import ListComponent from '../components/ListComponent.vue';
import LoginComponent from '../components/LoginComponent.vue';

const routes = [
    {
        path: '/',
        name: 'login',
        component: LoginComponent
    },
	{
		path: '/list',
		name: 'list',
		component: ListComponent
	}
];

const router = createRouter({
	history: createWebHistory(),
	routes
});

export default router;
