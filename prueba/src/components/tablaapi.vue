<script setup>
  import {ref} from "vue";
  const items = ref ([]);
fetch ("https://thronesapi.com/api/v2/Characters")
.then (result => result.json())
.then (data => items.value=data);

console.log(items);
const emit = defineEmits(["filtrarporid"])
</script>
<template>
    <table>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>FOTO</th>
        </tr>
        <tr v-for="item in items" :key="index">
            <td>{{item.id}}</td>
            <td>{{item.firstName}} {{item.lastName}}</td>
            <td><img :src="item.imageUrl" style="max-width: 100px;" @click="emit('filtrarporid',item.id)"/></td>
        </tr>
    </table>
  </template>