<template>
    <div>
        <ul>
            <li v-for="task in tasks" :key="task">
                {{ task.title }}
            </li>
        </ul>
    </div>
    <hr>
    <div>
        <form @submit.prevent="create">
            <input type="text" placeholder="タイトルを入力" name="title" v-model="newTask.title"><br>
            <input type="date" name="deadline" v-model="newTask.deadline">
            <div>
                <label><input type="radio" name="color" value="0" v-model="newTask.color">0</label>
                <label><input type="radio" name="color" value="1" v-model="newTask.color">1</label>
                <label><input type="radio" name="color" value="2" v-model="newTask.color">2</label>
                <label><input type="radio" name="color" value="3" v-model="newTask.color">3</label>
                <label><input type="radio" name="color" value="4" v-model="newTask.color">4</label>
                <label><input type="radio" name="color" value="5" v-model="newTask.color">5</label>
                <label><input type="radio" name="color" value="6" v-model="newTask.color">6</label>
                <label><input type="radio" name="color" value="7" v-model="newTask.color">7</label>
            </div>
            <textarea placeholder="詳細を入力" name="description" v-model="newTask.description"></textarea>
            <button>保存</button>
        </form>
    </div>
</template>

<script>
import axios from "axios"

export default {
    props: [
        'tasks'
    ],
    data() {
        return {
            newTask: {
                title: '',
                description: '',
                deadline: '',
                color: ''
            }
        }
    },
    methods: {
        create() {
            axios.post('api/tasks/create', this.newTask).then(res => {
                console.log(res.data);
            });
        }
    }
}
</script>
