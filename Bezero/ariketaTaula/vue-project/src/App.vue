<script setup>
import { ref } from 'vue';
import TaulaOsoa from './components/TaulaOsoa.vue';
import AnadirPokemon from './components/AnadirPokemon.vue';
import FiltroPokemon from './components/FiltroPokemon.vue';

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

var pokemonesFilter = ref([...pokemones.value]);
var types = ref(Array.from(new Set(pokemones.value.map(pokemon => pokemon.type))));

const ezabatu = (index) => {
  console.log(index);
  pokemones.value.splice(index, 1);
};

const anadir = (name, type, ability) => {
  console.log("Name: " + name + " Type: " + type + " Ability: " + ability);
  var datuak = { "name": name, "type": type, "ability": ability };
  pokemones.value.push(datuak);
  types = Array.from(new Set(pokemones.value.map(pokemon => pokemon.type)));
}


const filtratu = (type) => {
  console.log(type);
  const filteredPokemones = pokemones.value.filter(pokemon => pokemon.type === type);
  pokemonesFilter.value = [...filteredPokemones];
  console.log(pokemonesFilter.value);
}
</script>

<template>
  <TaulaOsoa :pokemones="pokemones" @ezabatu="ezabatu" />
  <br>
  <AnadirPokemon @anadir="anadir" />
  <br>
  <FiltroPokemon :pokemonesFilter="pokemonesFilter" :types="types" @filtratu="filtratu" />
</template>

<style scoped></style>


<!-- LO MISMO, PERO CON FETCH -->
<!-- <script setup>
import { ref, onMounted } from 'vue';
import TaulaOsoa from './components/TaulaOsoa.vue';
import AnadirPokemon from './components/AnadirPokemon.vue';
import FiltroPokemon from './components/FiltroPokemon.vue';

const pokemones = ref([]);
const pokemonesFilter = ref([]);
const types = ref([]);

const llamadaFetch = async () => {
  try {
    const response = await fetch("https://pokeapi.co/api/v2/pokemon?limit=25");
    const data = await response.json();
    pokemones.value = data.results.map((pokemon, index) => ({
      name: pokemon.name,
      type: "unknown",  // Puedes definir el tipo según tu lógica o realizar otra solicitud para obtener más detalles.
      ability: "unknown"  // Puedes definir la habilidad según tu lógica o realizar otra solicitud.
    }));
    types.value = Array.from(new Set(pokemones.value.map(pokemon => pokemon.type)));
  } catch (error) {
    console.error("Error al cargar los datos desde la API:", error);
  }
};

onMounted(() => {
  llamadaFetch();
});

const ezabatu = (index) => {
  console.log(index);
  pokemones.value.splice(index, 1);
  actualizarTipos();
};

const anadir = (name, type, ability) => {
  console.log("Name: " + name + " Type: " + type + " Ability: " + ability);
  var datuak = { "name": name, "type": type, "ability": ability };
  pokemones.value.push(datuak);
  actualizarTipos();
}

const actualizarTipos = () => {
  types.value = Array.from(new Set(pokemones.value.map(pokemon => pokemon.type)));
}

const filtratu = (type) => {
  console.log(type);
  const filteredPokemones = pokemones.value.filter(pokemon => pokemon.type === type);
  pokemonesFilter.value = [...filteredPokemones];
  console.log(pokemonesFilter.value);
}
</script>

<template>
  <TaulaOsoa :pokemones="pokemones" @ezabatu="ezabatu" />
  <br>
  <AnadirPokemon @anadir="anadir" />
  <br>
  <FiltroPokemon :pokemonesFilter="pokemonesFilter" :types="types" @filtratu="filtratu" />
</template>

<style scoped></style> -->
