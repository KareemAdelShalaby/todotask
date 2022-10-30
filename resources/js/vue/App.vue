<template>
    <div class="container">
        <div class="heading"></div>
        <h2> Todo List </h2>

        <add-item-form  v-on:reloadList="getList()"/>
        <div class="tasks">

            <list-view :items="items" v-on:reloadList="getList()" />
        </div>
    </div>


</template>

<script>
import addItemForm from './addItemForm.vue'
import listView from './listView.vue'

export default {
    data: function () {
        return {
            items: [],
            Compleatedcounter: "",
            item_id: "",
        }
    },
    components: {
        addItemForm,
        listView
    },
    mounted() {
        this.getList();
        // this.Compleatedcounter();
    },
    methods: {
        getList() {
            fetch('api/tasks/index')
                .then(res => res.json())
                .then(res => {
                    this.items = res.data;
                    console.log('fetch list')
                })
                .catch(error => {
                    console.log(error);

                })

        },
        // Compleatedcounter() {
        //     fetch('api/tasks/compleatedcounter')
        //         .then(res => res.json())
        //         .then(res => {
        //             this.Compleatedcounter = res.data;
        //             console.log('Compleatedcounter')
        //         })
        //         .catch(error => {
        //             console.log(error);

        //         })

        // },

    },
}
</script>

<style scoped>
.container {
    margin: 20px;
    background-color: #fafafd;
    padding: 5px;
    border-radius: 10px;

}

h2 {
    font-weight: bold;
    margin: 10px 0;
}

.tasks {
    margin: 20px;
}
</style>
