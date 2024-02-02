<script setup>
import { ref } from 'vue';
const props = defineProps(["pokemonsFiltratuta", "motak"]);
const emit = defineEmits(["filtratu"]);
const mota = ref('');
</script>

<template>
    <h1>Pokemonak iragazi</h1>
    <br>
    <label for="type">Mota: </label><br>
    <select id="type" v-model="mota" @change="emit('filtratu', mota)">
        <option value="" disabled>--Please choose an option--</option>
        <option v-for="(mota, index) in motak" :value="mota" :key="index">{{ mota }}</option>
    </select>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Izena</th>
                <th>Mota</th>
                <th>Trebetasuna</th>
                <th>Irudia</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(poke, index) in pokemonsFiltratuta">
                <td>{{ poke.id }}</td>
                <td>{{ poke.name }}</td>
                <td>{{ poke.type }}</td>
                <td>{{ poke.ability }}</td>
                <td><img :src="poke.imageURL"></td>
            </tr>
        </tbody>
    </table>
</template>