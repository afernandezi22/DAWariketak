<script setup>
import { ref } from 'vue';
const props = defineProps(["pokemonesFilter", "types"]);
const emit = defineEmits(["filtratu"]);

const type = ref('');
</script>

<template>
    <h1>PokeFiltro</h1>
    <br>
    <form>
        <label for="type">Type: </label><br>
        <select id="type" v-model="type" @change="emit('filtratu', type)">
            <option value="" disabled>--Please choose an option--</option>
            <option v-for="(type, index) in types" :value="type" :key="index">{{ type }}</option>
        </select>

        <br>
        <table border="1px solid black">
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Ability</th>
            </tr>

            <tr v-for="(pokemon, index) in pokemonesFilter">
                <td>{{ pokemon.name }}</td>
                <td>{{ pokemon.type }}</td>
                <td>{{ pokemon.ability }}</td>
            </tr>
        </table>
    </form>
</template>