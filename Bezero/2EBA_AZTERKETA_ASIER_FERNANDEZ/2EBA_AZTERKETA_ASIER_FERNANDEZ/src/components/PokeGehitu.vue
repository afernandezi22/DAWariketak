<script setup>
import { ref } from 'vue';

const id = ref('');
const name = ref('');
const type = ref('');
const ability = ref('');

const emit = defineEmits(["gehitu"]);
</script>

<template>
    <h1>Pokemon-a gehitu</h1>
    <br>
    <label for="id">Id: </label><br>
    <input type="text" id="id" v-model="id"><br>
    <label for="name">Izena: </label><br>
    <input type="text" id="name" v-model="name"><br>
    <label for="type">Mota: </label><br>
    <input type="text" id="type" v-model="type"><br>
    <label for="ability">Ability: </label><br>
    <input type="text" id="ability" v-model="ability"><br>
    <button type="btn" class="btn btn-success btn-sm" @click="emit('gehitu', id, name, type, ability)"
    :disabled="id === '' || isNaN(id) || name === '' || type === '' || ability === ''"> Gehitu </button>
    <!-- <hr> -->
</template>