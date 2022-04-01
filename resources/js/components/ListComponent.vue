<template>
    <grid-layout
        id="grid-layout"
        v-model:layout="layout"
        :col-num="32"
        :row-height="32"
        :is-draggable="true"
        :is-resizable="true"
        :vertical-compact="true"
        :margin="[10, 10]"
        :prevent-collosion="false"
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
            @moved="moved"
            @resized="resized"
        >
            <div class="item-inner">
                <div class="item-datetime">
                    <p>{{ item.date.slice(5).replace(/-/g, '/').replace(/^0+/, '') }}</p>
                    <p>{{ item.time.slice(0, -3) }}</p>
                </div>
                <div class="item-title">{{ item.title }}</div>
                <div class="check">□</div>
            </div>
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
                color: '',
                y: ''
            },
            newPosition: {
                target: '',
                x: '',
                y: ''
            },
            newSize: {
                target: '',
                w: '',
                h: ''
            },
            layout: []
        }
    },
    methods: {
        create() {
            let layoutHeight = document.getElementById('grid-layout').clientHeight;
            this.newTask.y = (layoutHeight - 10) / 42;

            axios.post('api/tasks/create', this.newTask).then(res => {
                res.data.time = `${res.data.time}:00`;
                this.layout.push(res.data);
                window.dispatchEvent(new Event("resize"));
                console.log(this.layout);
            });
        },
        moved(i, newX, newY) {
            this.newPosition.target = i;
            this.newPosition.x = newX;
            this.newPosition.y = newY;

            axios.patch('api/tasks/move', this.newPosition).then(res => {
                console.log(this.layout);
            });
        },
        resized(i, newH, newW) {
            this.newSize.target = i;
            this.newSize.h = newH;
            this.newSize.w = newW;

            axios.patch('api/tasks/resize', this.newSize).then(res => {
                console.log(this.layout);
            });
        }
    },
    mounted() {
        this.layout = this.tasks;
        console.log(this.layout);
    }
}
</script>

<style scoped>
.vue-grid-layout {
    background: #fff;
}
.vue-grid-item:not(.vue-grid-placeholder) {
    border-radius: 4px;
    padding: 8px;
    background: #e67c73;
}
.vue-grid-item .resizing {
    opacity: 0.9;
}
.vue-grid-item .static {
    background: #000;
}
/* .vue-grid-item .text {
    font-size: 24px;
    height: 100%;
    width: 100%;
    color: #fff;
} */
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
/* .vue-draggable-handle {
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
} */
.flex {
    display: flex;
}
.item-inner {
    position: relative;
    width: 100%;
    height: 100%;
    color: #fff;
}
.item-inner::after {
    content: "";
    position: absolute;
    right: -8px;
    bottom: -8px;
    width: 16px;
    height: 16px;
    border-top: 8px solid transparent;
    border-right: 8px solid #000;
    border-bottom: 8px solid #000;
    border-left: 8px solid transparent;
    z-index: 0;
    pointer-events: none;
}
.item-inner .item-datetime {
    display: flex;
    margin-bottom: 6px;
    font-size: 14px;
}
.item-inner .item-datetime p:first-child {
    margin-right: 8px;
}
.item-inner .item-title {
    font-size: 18px;
}
.item-inner .check {
    position: absolute;
    top: 0;
    right: 0;
}
</style>
