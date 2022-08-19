<template>
    <div>
  <div>
      <p v-if="activada">Aplicación activada</p>
      <p v-else>Aplicación Desactivada</p>

      <button @click="cambiarEstado()" v-if="!activada">Activar</button>
      <button @click="cambiarEstado()" v-else>Desactivar</button>
  </div>
    </div>
</template>



<script>
export default {
  name: 'app',
  data () {
    return {
      activada : true,
    }
  },
  methods:{
    cambiarEstado(){
      this.activada = !this.activada;
    },
  }
}
</script>

</script>

<style scoped>

 button{
   padding:1rem;
   font-size: 15px;
   min-width: 150px;
   border: none;
   cursor: pointer;
 }
 p{
   font-size:20px;
 }

</style>
