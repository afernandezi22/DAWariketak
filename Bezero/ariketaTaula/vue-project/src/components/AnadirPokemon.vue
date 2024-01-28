<script setup>
import { ref } from 'vue';

const name = ref('');
const type = ref('');
const ability = ref('');

const emit = defineEmits(["anadir"]);

</script>

<template>
    <h1>Añadir Pokemones</h1>
    <br>
    <form>
        <label for="name">
            Name
        </label><br>
        <input type="text" id="name" v-model="name"><br>
        <label for="type">
            Type
        </label><br>
        <input type="text" id="type" v-model="type"><br>
        <label for="ability">
            Ability
        </label><br>
        <input type="text" id="ability" v-model="ability"><br>
        <button type="button" :disabled="name === '' || type === '' || ability === ''" @click="emit('anadir', name, type, ability)">Añadir</button>
    </form>
</template>