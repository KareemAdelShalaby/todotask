<template>
    <div class="list">
        <h3>List Tasks</h3>

        <div class="  " v-for="item in items"  :key="item.id" >

           <list-item
                :item="item"

                v-on:itemCahnged="$emit('reloadList')" />

        </div>

    </div>

</template>

<script>
import listItem from './listItem.vue'
export default{
    props:['items'],
    components: {
        listItem
    },
}
</script>
<style>
</style>
