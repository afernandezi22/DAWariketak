<script setup>
import PokeTaula from './components/PokeTaula.vue';
import { ref } from 'vue';

const pokemones = ref([
  { "name": "bulbasaur", "type": "plant", "ability": "Razor Leaf" },
  { "name": "ivysaur", "type": "plant", "ability": "Seed Bomb" },
  { "name": "venusaur", "type": "plant", "ability": "Solar Beam" },
  { "name": "charmander", "type": "fire", "ability": "Ember" },
  { "name": "charmeleon", "type": "fire", "ability": "Flamethrower" },
  { "name": "charizard", "type": "fire", "ability": "Inferno" },
  { "name": "squirtle", "type": "water", "ability": "Water Gun" },
  { "name": "wartortle", "type": "water", "ability": "Water Pulse" },
  { "name": "blastoise", "type": "water", "ability": "Hydro Pump" },
  { "name": "caterpie", "type": "bug", "ability": "String Shot" },
  { "name": "metapod", "type": "bug", "ability": "Harden" },
  { "name": "butterfree", "type": "bug", "ability": "Stun Spore" },
  { "name": "weedle", "type": "bug", "ability": "Poison Sting" },
  { "name": "kakuna", "type": "bug", "ability": "Harden" },
  { "name": "beedrill", "type": "bug", "ability": "Poison Jab" },
  { "name": "pidgey", "type": "flying", "ability": "Tangled Feet" },
  { "name": "pidgeotto", "type": "flying", "ability": "Wing Attack" },
  { "name": "pidgeot", "type": "flying", "ability": "Air Slash" },
  { "name": "rattata", "type": "normal", "ability": "Quick Attack" },
  { "name": "raticate", "type": "normal", "ability": "Tail Whip" },
  { "name": "spearow", "type": "flying", "ability": "Peck" },
  { "name": "fearow", "type": "flying", "ability": "Sky Attack" },
  { "name": "ekans", "type": "poison", "ability": "Poison Sting" },
  { "name": "arbok", "type": "poison", "ability": "Toxic" },
  { "name": "pikachu", "type": "electric", "ability": "Thunder Shock" }
]);

const borrar = (index) => {
  // Accede al valor actual del objeto ref usando .value
  if (index >= 0 && index < pokemones.value.length) {
    // Elimina el Pokémon en la posición dada
    pokemones.value.splice(index, 1);
    console.log(`Borrando Pokémon en la posición ${index}`);
    console.log(pokemones.value);
  } else {
    console.error(`Posición inválida: ${index}`);
  }
}

</script>

<template>
  <PokeTaula :pokemonArray="pokemones" @pokeBorrar = "borrar" />
</template>

<style scoped></style>
