<template>
    <div>
        <button @click="allow = true">Add New + </button>
        <Transition name="slide-fade">
            <div  class="add-item" v-if="allow">
            <button @click="allow = false" class="x">X</button>
            <h3>Add New Taks</h3>
            <label for="">Title</label>
            <input type="text" v-model="item.title" />
            <label for="">Note</label>
            <textarea row="4" v-model="item.note" ></textarea>
            <label for="">Date</label>
            <input type="date" v-model="item.date" />
            <button @click="addItem()">Add</button>
        </div>
        </Transition>

    </div>
</template>

<script>
export default {
 data: function () {
    return {
        item: {
            title: "",
            note: "",
            date: "",

        },
        allow: false,
    }
 },
 methods: {
    addItem(){
        if(this.item.title == '' || this.item.note == '' || this.item.date == ''){
            return;
        }
        else{
            axios.post('api/task/store', this.item )
            .then(response => {
                if(response.status == 200){
                    this.item.title ="";
                    this.item.note ="";
                    this.item.date ="";
                    this.$emit('reloadList');
                    this.allow =false;
                    console.log('ok');
                }
            })
            .catch(error => {
                console.log(error);

            })
        }
    }
 },
}
</script>

<style scoped>
.add-item{
    position: fixed;
    right: 0;
    top: 20px;
    width: 500px;
    z-index: 1;
    background: #F9F9F9 !important;
    padding: 25px;
    border-radius:10px;
    /* margin: 150px 0; */
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
input,textarea{

    background: rgba(255,255,255,0.1);
    border: none;
    font-size: 16px;
    height: auto;
    margin: 10px;
    outline: 0;
    padding: 15px;
    width: 90%;
    background-color: #e8eeef;
    color: #333;
    box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    transition: all 0.25s;
    margin-bottom: 30px;
    border-radius: 6px;
}
button{
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
.x{
  background: #ccc;
  position: absolute;
  top: 0;
  left: 0;
  margin: 0;
}


.slide-fade-enter-active {
  transition: all 0.8s ease-out;
}

.slide-fade-leave-active {
  transition: all 0.1s cubic-bezier(1, 0.5, 0.8, 1);
}
</style>
