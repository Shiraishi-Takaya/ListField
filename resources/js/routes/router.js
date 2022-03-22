import { createRouter, createWebHistory } from 'vue-router';
import ListComponent from '../components/ListComponent.vue';

const routes = [
	{
		path: '/',
		name: 'list',
		component: ListComponent
	}
];

export default createRouter({
	history: createWebHistory(),
	routes
});
