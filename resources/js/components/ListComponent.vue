<template>
    <grid-layout
        v-model:layout="layout"
        :col-num="32"
        :row-height="32"
        :is-draggable="true"
        :is-resizable="true"
        :is-mirrored="false"
        :vertical-compact="true"
        :margin="[10, 10]"
        :use-css-transforms="true"
    >
        <grid-item
            v-for="item in layout"
            :x="item.x"
            :y="item.y"
            :w="item.w"
            :h="item.h"
            :i="item.i"
            :key="item.i"
        >
            {{ item.i }}
        </grid-item>
    </grid-layout>
    <hr>
    <div>
        <form @submit.prevent="create">
            <input type="text" placeholder="タイトルを入力" name="title" v-model="newTask.title"><br>
            <input type="date" name="date" v-model="newTask.date">
            <input type="time" name="time" v-model="newTask.time">
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
                date: '',
                time: '',
                color: ''
            },
            layout: []
        }
    },
    methods: {
        create() {
            axios.post('api/tasks/create', this.newTask).then(res => {
                console.log(res.data);
            });
        }
    },
    mounted() {
        this.tasks.forEach(task => {
            this.layout.push(task);
        });
    }
}
</script>

<style scoped>
.vue-grid-layout {
  background: #eee;
}
.vue-grid-item:not(.vue-grid-placeholder) {
  background: #ccc;
  border: 1px solid black;
}
.vue-grid-item .resizing {
  opacity: 0.9;
}
.vue-grid-item .static {
  background: #cce;
}
.vue-grid-item .text {
  font-size: 24px;
  text-align: center;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  height: 100%;
  width: 100%;
}
.vue-grid-item .no-drag {
  height: 100%;
  width: 100%;
}
.vue-grid-item .minMax {
  font-size: 12px;
}
.vue-grid-item .add {
  cursor: pointer;
}
.vue-draggable-handle {
  position: absolute;
  width: 20px;
  height: 20px;
  top: 0;
  left: 0;
  background: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='10' height='10'><circle cx='5' cy='5' r='5' fill='#999999'/></svg>")
    no-repeat;
  background-position: bottom right;
  padding: 0 8px 8px 0;
  background-repeat: no-repeat;
  background-origin: content-box;
  box-sizing: border-box;
  cursor: pointer;
}
</style>
