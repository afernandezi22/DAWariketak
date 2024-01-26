<script setup>
import { ref } from "vue";
import Cabecera from './components/Cabecera.vue';
import CreadorTaula from './components/CreadorTaula.vue';

const data = [
  {
    "ID": 1,
    "Izena": "Jon",
    "Abizena": "Ortiz",
    "NAN": "12345678A",
    "JaiotzeData": "12-04-67",
    "Adina": 52
  },
  {
    "ID": 2,
    "Izena": "Peru",
    "Abizena": "Felix",
    "NAN": "12323678A",
    "JaiotzeData": "30-11-90",
    "Adina": 29
  },
  {
    "ID": 3,
    "Izena": "Maddi",
    "Abizena": "Azkona",
    "NAN": "12346348A",
    "JaiotzeData": "02-12-59",
    "Adina": 60
  }
];

</script>

<template>
  <div id="vm" class="container">
    <h1 class="text-center">Erabiltzaileen taula</h1>
    <table id="t1" class="table table-striped">
      <Cabecera />
      <CreadorTaula :data="data"/>
    </table>
  </div>
</template>