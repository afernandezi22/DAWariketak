<script setup>
import { ref } from 'vue';
import PokeTaula from './components/PokeTaula.vue';
import Pokemon from './pokemons.json';
import PokeGehitu from './components/PokeGehitu.vue';
import PokeFiltro from './components/PokeFiltro.vue';
import PokeOrrikatu from './components/PokeOrrikatu.vue';

// Pokemonak gordetzeko ref-arraya
const pokemons = ref(Pokemon);
// pokemons arrayan dauden motak gordetzeko arraya
var motak = ref(Array.from(new Set(pokemons.value.map(pokemon => pokemon.type))));
// Filtratutako pokemonak gordetzeko, hasieran Pokemon guztiak izango ditu filtorik ez dagoelako jarrita
const pokemonsFiltratuta = ref(Pokemon);


// Orrikatzeko logika. Lehenengo aldagaian orrialde bakoitzeko zenbat Pokemon agertuko diren markatzen du, bigarrena "hasierako" erreferentzia eta hirugarrena "amaierakoa"
const pokeOrrialdeko = 5;
const hasiera = ref(0);
const amaiera = ref(pokeOrrialdeko);

// Funtzio honekin atzerantz orrikatzen da
const prev = () => {
  hasiera.value -= pokeOrrialdeko;
  amaiera.value -= pokeOrrialdeko;
}

// Funtzio honekin aurrerantz orrikatzen da
const next = () => {
  hasiera.value += pokeOrrialdeko;
  amaiera.value += pokeOrrialdeko;
}

// Ezabatzeko logika. Arrayko posizio bat hartuz bertatik hasita bat kenduko du, hau da, aukeratutakoa
const ezabatu = (index) => {
  console.log(index);
  pokemons.value.splice(index, 1);
};

// Gehitzeko logika. Behar diren parametroak hartuz array-en push funtzioa erabiliko du gehitzeko
const gehitu = (id, name, type, ability) => {
  var poke = {
    "id": id,
    "name": name,
    "type": type,
    "ability": ability
  };
  console.log(poke);
  pokemons.value.push(poke);
};

// Filtratzeko logika. Arrayen filter funtzioa erabiliz mota parametroarekin konparatuko du eta bakarrik horiek sartuko ditu arraya-ren barruan
const filtratu = (mota) => {
  const filteredPokemones = pokemons.value.filter(pokemon => pokemon.type === mota);
  pokemonsFiltratuta.value = [...filteredPokemones];
  motak = ref(Array.from(new Set(pokemons.value.map(pokemon => pokemon.type))));
  console.log(pokemonsFiltratuta.value);
};

</script>

<template>
  <div class="container">
    <h1>POKEMON CRUD</h1>
    <PokeOrrikatu :hasiera="hasiera" :amaiera="amaiera" :max="pokemons.length" @next="next" @prev="prev" />
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Izena</th>
          <th>Mota</th>
          <th>Trebetasuna</th>
          <th>Irudia</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <PokeTaula v-for="(poke, index) in pokemons.slice(hasiera, amaiera)" :id="poke.id" :name="poke.name"
          :type="poke.type" :ability="poke.ability" :imageURL="poke.imageURL" :index="index" @ezabatu="ezabatu" />
      </tbody>
    </table>
    <PokeGehitu @gehitu="gehitu" />
    <PokeFiltro :motak="motak" :pokemonsFiltratuta="pokemonsFiltratuta" @filtratu="filtratu" />
  </div>
</template>

<style>
h1 {
  height: 20%;
  text-align: center;
  background-color: coral;
}
</style>
