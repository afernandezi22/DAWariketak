<script setup>
  defineProps(["pokemonArray"]);
  const emit = defineEmits(["pokeBorrar"]);

</script>

<template>
  <h1>Pokémons: </h1>
  <table border="1px solid black">
    <tr>
      <th>Nombre</th>
      <th>Tipo</th>
      <th>Habilidad</th>
      <th>Borrar</th>
    </tr>

    <tr v-for="(pokemon, index) in pokemonArray" :key="index">
      <td>{{ pokemon.name }}</td>
      <td>{{ pokemon.type }}</td>
      <td>{{ pokemon.ability }}</td>
      <td><button type="button" @click="emit('pokeBorrar', index)">X</button></td>
    </tr>
  </table>
</template>