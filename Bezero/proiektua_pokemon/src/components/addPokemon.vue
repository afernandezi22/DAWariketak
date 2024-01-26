<script setup>
  import { defineProps } from 'vue';

  const msg = "Añadir Pokémons:";
  const nuevoNombre="";
  const nuevoTipo="";
  const nuevaHabilidad="";
  //add pokemon
  const emit = defineEmits(["pokemonAAnadir"]);
</script>

<template>
  <div class="greetings">
    <h1 class="green">{{ msg }}</h1>

    <label for="">Nombre</label>
    <input v-model="nuevoNombre"/>

    <label for="">Tipo</label>
    <input v-model="nuevoTipo"/>

    <label for="">Habilidad</label>
    <input v-model="nuevaHabilidad"/>


    <button @click = "emit('pokemonAAnadir', nuevoNombre, nuevoTipo, nuevaHabilidad)" type="button"> Añadir </button> 
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
