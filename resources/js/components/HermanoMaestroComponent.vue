<template>
    <div class="Hermanomaestro">
      <p>Aquí está la página del componente padre</p>
      <button @click="muestraDetalle(true)">Mostrar</button>
      <button @click="muestraDetalle(false)">Ocultar</button> 
      <button @click="muestraHermanoDetalle(false)">Muestra Componente Hermano</button> 

      <!-- <detalle
        v-if="detalle_visible" 
        :detalle_visible="detalle_visible"
        @detalleVisibleEvento="muestraDetalle">
    </detalle> -->
    </div>
  </template>
  
  <script>
  // Introducir subcomponentes
  // import detalle from "./DetalleComponent.vue";
  
  export default {
    // components: { detalle },
    data() {
      return {
        // Verdadero, muestra el componente de detalle, false lo oculta
        detalle_visible: false
      }
    },
    methods: {
      muestraDetalle(visible) {
        this.detalle_visible = visible; 
      },
      muestraHermanoDetalle(visible){
        this.$emit('detalleVisibleEvento', false); 
        alert("hol");
      }
    },
    update() {
        console.log("Component hermano detalle updateado"); 
    },
    mounted() {
        console.log("Component HERMANO MAESTRO mounted.");
    },
};
  </script>
  
  <style  scoped>

  .Hermanomaestro {
    height: 300px;
    width: 400px;
    text-align: center;
    padding: 20px;
    background-color: #9dfad0;
  }
  </style>
  