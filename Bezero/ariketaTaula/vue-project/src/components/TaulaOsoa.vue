<script setup>
    const props = defineProps(["pokemones"]);

    const erakutsi = (x) => {
        console.log(x);
    }

    const emit = defineEmits(["ezabatu"]);
</script>

<template>
    <h1>Pokemon zerrenda</h1>
    <br>
    <table border="1px solid black">
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Ability</th>
            <th>Borrar</th>
        </tr>

        <tr v-for="(pokemon, index) in pokemones">
            <td>{{ pokemon.name }}</td>
            <td>{{ pokemon.type }}</td>
            <td>{{ pokemon.ability }}</td>
            <td><button type="button" @click="emit('ezabatu', index)"> X </button></td>
        </tr>
    </table>
</template>