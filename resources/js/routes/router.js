import { createRouter, createWebHistory } from 'vue-router';
import TasksComponent from '../components/TasksComponent.vue';

const routes = [
	{
		path: '/',
		name: 'tasks',
		component: TasksComponent
	}
];

export default createRouter({
	history: createWebHistory(),
	routes
});
