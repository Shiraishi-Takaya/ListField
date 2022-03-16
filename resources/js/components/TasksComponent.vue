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
        <form>
            <input type="text" placeholder="タイトルを入力"><br>
            <input type="date">
            <div>
                <label><input type="radio" name="color" value="0">0</label>
                <label><input type="radio" name="color" value="1">1</label>
                <label><input type="radio" name="color" value="2">2</label>
                <label><input type="radio" name="color" value="3">3</label>
                <label><input type="radio" name="color" value="4">4</label>
                <label><input type="radio" name="color" value="5">5</label>
                <label><input type="radio" name="color" value="6">6</label>
                <label><input type="radio" name="color" value="7">7</label>
            </div>
            <textarea placeholder="詳細を入力"></textarea>
        </form>
    </div>
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
