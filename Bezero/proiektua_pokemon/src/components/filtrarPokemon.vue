<script setup>
import { defineProps, ref, watch } from 'vue';

const msg = "Filtra Pokémon por tipo:";

const props = defineProps(['pokemonArray']);

const selectedType = ref('');

var auxArrayPokemon = ref(props.pokemonArray);

// Actualizar auxArrayPokemon cuando cambie selectedType
watch(() => selectedType.value, (newType) => {
  if (newType === '') {
    auxArrayPokemon.value = props.pokemonArray;
  } else {
    auxArrayPokemon.value = props.pokemonArray.filter(poke => poke.type === newType);
  }
});

// Obtener tipos únicos
const uniqueTypes = Array.from(new Set(props.pokemonArray.map(poke => poke.type)));


</script>

<template>
  <div class="greetings">
    <h1 class="green">{{ msg }}</h1>

    <select name="" id="" v-model="selectedType" @change="seleccionarTipo">
      <option value="" disabled selected>Selecciona un tipo</option>
      <option v-for="poke in uniqueTypes" :key="poke" :value="poke">{{ poke }}</option>
    </select>

    <table border=1>
      <thead>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Habilidad</th>
      </thead>
      <tbody>
        <tr v-for="(poke, index) in auxArrayPokemon" :key="index">
          <td> {{ poke.name }} </td>
          <td> {{ poke.type }} </td>
          <td> {{ poke.ability }} </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<style scoped>
h1 {
  font-weight: 500;
  font-size: 2.6rem;
  position: relative;
  top: -10px;
}

h3 {
  font-size: 1.2rem;
}

.greetings h1,
.greetings h3 {
  text-align: center;
}

@media (min-width: 1024px) {

  .greetings h1,
  .greetings h3 {
    text-align: left;
  }
}
</style>
