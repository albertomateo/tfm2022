<template>
    <div class="detalle">
      <p>Aquí está la ventana del componente hijo</p>
      <button @click="ocultar">ocultar</button> 
    </div>
  </template>
  
  <script>
  export default {
    props: {
      detalle_visible: Boolean
    },
    data() {
      return {
        visible: this.detalle_visible
      }
    },
    watch: {
      visible(val) {
        this.detalle_visible = val;
      }
    },
    methods: {
        ocultar() {
        // Activa el evento dialogVisibleEvent en el componente principal y pasa parámetros
        this.$emit('detalleVisibleEvento', false); 
      }
    },
    mounted() {
        console.log("Component DETALLE mounted.");
    },
    unmounted() {
        console.log("Component DETALLE unmounted.");
    },
  };
  </script>
  
  <style scoped>
  .detalle {
    height: 150px;
    width: 100%;
    padding: 20px;
    text-align: center;
    margin-top: 20px;
    background-color: #1f6fb5;
    color: #fff;
  }
  </style>
  