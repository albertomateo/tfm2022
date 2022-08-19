<template>
    <div>
  <div>
      <p v-if="propiedad=5">La propiedad vale 5</p>
      <p v-else>La propiedad no vale 5</p>


  </div>
    </div>
</template>



<script>
export default {
  name: 'app',
data: () => {
  const datos = {
      propiedad: 5,
      unaFuncion: () => {
        console.log(datos.propiedad);
      }
    };
    return datos;
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
