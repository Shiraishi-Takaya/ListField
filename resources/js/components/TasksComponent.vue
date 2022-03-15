<template>
    <p @click="test">click here</p>
    <ul>
        <li v-for="task in tasks" :key="task">
            {{ task.title }}
        </li>
    </ul>
</template>

<script>
export default {
    data() {
        return {
            tasks: []
        }
    },
    methods: {
        test() {
            axios.get('api/tasks/show').then(res => {
                console.log(res.data);
                this.tasks.push(res.data);
            });
        }
    }
}
</script>
