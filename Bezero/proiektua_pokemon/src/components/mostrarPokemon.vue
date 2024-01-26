<script setup>
  import { defineProps } from 'vue';

  const msg = "Pokémons:";
  const props = defineProps(['pokemonArray']);

  //borrar pokemon
  const emit = defineEmits(["pokemonABorrar"]);

</script>

<template>
  <div class="greetings">
    <h1 class="green">{{ msg }}</h1>

    <table border = 1>
            <thead>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Habilidad</th>
                <th>Borrar</th>
            </thead>
            <tbody>
                <tr  v-for = "(poke, index) in pokemonArray">
                    <td> {{poke.name}} </td>
                    <td> {{poke.type}} </td>
                    <td> {{poke.ability}} </td>
                    <td> <button 
                      @click = "emit('pokemonABorrar', index)"
                      type="button"> X </button> 
                    </td>
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
