<template>
    <ul>
        <li v-for="task in tasks" :key="task">
            {{ task.title }}
        </li>
    </ul>
</template>

<script>
export default {
    props: [
        'tasks'
    ],
    data() {
        return {

        }
    },
    methods: {
        // test() {
        //     axios.get('api/tasks/show').then(res => {
        //         console.log(res.data);
        //         this.tasks.push(res.data);
        //     });
        // }
    }
}
</script>
