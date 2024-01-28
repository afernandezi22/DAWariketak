<script setup>
  import mostrarPokemon from './components/mostrarPokemon.vue'
  import addPokemon from './components/addPokemon.vue'
  import filtrarPokemon from './components/filtrarPokemon.vue'
  import { ref } from 'vue';

  // Como seria online:

  function llamadaFetch(){
    let options = {method: "GET", mode: 'cors'};
    fetch("https://pokeapi.co/api/v2/pokemon?offset=25&limit=25", options)
        .then(data => {
            return data.json();
        })
        .then(response => {
            var pokemon = response;
            console.log(pokemon);
        });
  }

  // const pokemones = ref([
  //   { "name": "bulbasaur",  "type": "plant", "ability": "Razor Leaf" },
  //   { "name": "ivysaur",  "type": "plant", "ability": "Seed Bomb" },
  //   { "name": "venusaur", "type": "plant", "ability": "Solar Beam" },
  //   { "name": "charmander",  "type": "fire", "ability": "Ember" },
  //   { "name": "charmeleon",  "type": "fire", "ability": "Flamethrower" },
  //   { "name": "charizard",  "type": "fire", "ability": "Inferno" },
  //   { "name": "squirtle",  "type": "water", "ability": "Water Gun" },
  //   { "name": "wartortle",  "type": "water", "ability": "Water Pulse" },
  //   { "name": "blastoise",  "type": "water", "ability": "Hydro Pump" },
  //   { "name": "caterpie",  "type": "bug", "ability": "String Shot" },
  //   { "name": "metapod",  "type": "bug", "ability": "Harden" },
  //   { "name": "butterfree", "type": "bug", "ability": "Stun Spore" },
  //   { "name": "weedle",  "type": "bug", "ability": "Poison Sting" },
  //   { "name": "kakuna",  "type": "bug", "ability": "Harden" },
  //   { "name": "beedrill", "type": "bug", "ability": "Poison Jab" },
  //   { "name": "pidgey",  "type": "flying", "ability": "Tangled Feet" },
  //   { "name": "pidgeotto",  "type": "flying", "ability": "Wing Attack" },
  //   { "name": "pidgeot",  "type": "flying", "ability": "Air Slash" },
  //   { "name": "rattata",  "type": "normal", "ability": "Quick Attack" },
  //   { "name": "raticate",  "type": "normal", "ability": "Tail Whip" },
  //   { "name": "spearow",  "type": "flying", "ability": "Peck" },
  //   { "name": "fearow",  "type": "flying", "ability": "Sky Attack" },
  //   { "name": "ekans",  "type": "poison", "ability": "Poison Sting" },
  //   { "name": "arbok",  "type": "poison", "ability": "Toxic" },
  //   { "name": "pikachu", "type": "electric", "ability": "Thunder Shock" }
  // ])

  const borrarPokemon = (posicionPokemon) => {
    // Accede al valor actual del objeto ref usando .value
    if (posicionPokemon >= 0 && posicionPokemon < pokemones.value.length) {
      // Elimina el Pokémon en la posición dada
      pokemones.value.splice(posicionPokemon, 1);
      console.log(`Borrando Pokémon en la posición ${posicionPokemon}`);
      console.log(pokemones.value);
    } else {
      console.error(`Posición inválida: ${posicionPokemon}`);
    }
  }

  const anadirPokemon = (nombre, tipo, habilidad) => {
      pokemones.value.push({"name" : nombre, "type": tipo, "ability": habilidad})
  }

</script>

<template>
  <header>
    <div>
      <mostrarPokemon
      :pokemonArray = pokemones
      @pokemonABorrar = "borrarPokemon"
      />

      <addPokemon
      @pokemonAAnadir = "anadirPokemon"
      />

      <filtrarPokemon
      :pokemonArray = pokemones
      />
    </div>
  </header>

  <main>
    
  </main>
</template>

<style scoped>
</style>
