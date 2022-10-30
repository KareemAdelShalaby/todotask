<template>

    <div>
        <div class="one-item">
            <input type="checkbox" :checked="item.is_completed == 1" @change="updatedCheck()"
                v-model="item.completed" />
            <span :class="[item.is_completed == 1 ? 'completed' : '', 'itemText']">
                {{ item.title }}
            </span>
            <span class="delete" @click="deleteTask()">
                X
            </span>
            <span class="edit" @click="editTask(item)">
                Edit
            </span>
            <span class="date">
                [ {{ item.date }} ]
            </span>
        </div>
        <div class="edit-item" v-if="allowEdit">
            <button @click="allowEdit = false" class="x">X</button>
            <h3>Update Task</h3>
            <label for="">Title</label>
            <input type="text" v-model="newItem.title" />
            <label for="">Note</label>
            <textarea row="4" v-model="newItem.note"></textarea>
            <label for="">Date</label>
            <input type="date" v-model="newItem.date" />
            <button @click="updateTask()">Update</button>
        </div>
    </div>
</template>

<script>
export default {
    props: ['item'],
    data: function () {
        return {
            newItem: {
                title: "",
                note: "",
                date: "",

            },
            allowEdit: false,
        }
    },
    methods: {
        updatedCheck() {
            axios.put('api/task/complete/' + this.item.id, {
                item: this.item
            })
                .then(response => {
                    if (response.status == 200) {
                        this.$emit('itemCahnged');
                    }
                })
                .catch(error => {
                    console.log(error);

                })
        },
        deleteTask() {
            axios.delete('api/task/delete/' + this.item.id)
                .then(response => {
                    if (response.status == 200) {
                        this.$emit('itemCahnged');
                    }
                })
                .catch(error => {
                    console.log(error);

                })
        },
        editTask(item) {
            this.newItem.title = item.title;
            this.newItem.note = item.note;
            this.newItem.date = item.date;
            this.allowEdit = true;
            console.log(this.newItem.title);
        },
        updateTask() {
            if(this.item.title == '' || this.item.note == '' || this.item.date == ''){
                return;
            }
            axios.put('api/task/update/' + this.item.id,  this.newItem )
                .then(response => {
                    if (response.status == 200) {
                        this.$emit('itemCahnged');
                    }
                })
                .catch(error => {
                    console.log(error);

                })
        },
    }
}
</script>
<style>
.one-item {
    display: flex;
    /* padding: 10px; */
    max-width: 1000px;
    margin-bottom: 3px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #ecf0f1;
    position: relative;
}

input {
    width: 40px;
    color: #333;
    accent-color: #333;
    background-color: #333;
}

.date {
    margin: 10px 10px;
    right: 0;
    position: absolute;
    color: #333;
}

.itemText {
    width: 100%;
    padding: 10px;
}

.completed {
    text-decoration: line-through;
    background-color: #95a5a6;
    color: #333;

}

.delete {
    color: #FFF;
    border-radius: 10px;
    right: 120px;
    position: absolute;
    cursor: pointer;
    padding: 10px;
    background-color: #e74c3c;
}

.edit {
    color: #FFF;
    border-radius: 10px;
    right: 160px;
    position: absolute;
    cursor: pointer;
    padding: 10px;
    background-color: #2980b9;
}

.edit-item {
    position: fixed;
    right: 0;
    top: 20px;
    width: 500px;
    z-index: 1;
    background: #F9F9F9 !important;
    padding: 25px;
    border-radius: 10px;
    border: 1px solid #ddd;
    /* margin: 150px 0; */
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

.edit-item input,
.edit-item textarea {

    background: rgba(255, 255, 255, 0.1);
    border: none;
    font-size: 16px;
    height: auto;
    margin: 10px;
    outline: 0;
    padding: 15px;
    width: 90%;
    background-color: #e8eeef;
    color: #333;
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
    transition: all 0.25s;
    margin-bottom: 30px;
    border-radius: 6px;
}

button {
    display: block;
    padding: 10px;
    margin: 0px 10px;
    border-radius: 6px;
    transition: all 0.25s;
    cursor: pointer;
    border: 1px solid transparent;
    color: #FFF;
    background: #2980b9;
}

.x {
    background: #ccc;
    position: absolute;
    top: 0;
    left: 0;
    margin: 0;
}
</style>
