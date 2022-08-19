<template>
    <div>
        <h1 class="text-center">Anuncios</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Enlace</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="anuncio in anuncios" :key="anuncio.id">
                    <th scope="row">{{ anuncio.id }}</th>
                    <td>{{ anuncio.titulo }}</td>
                    <td>{{ anuncio.descripcion }}</td>
                    <td>{{ anuncio.enlace }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from "axios";
import { list } from "postcss";

export default {
    data() {
        return {
            anuncios: [],
        };
    },
    methods: {
        async list() {
            const respuesta = await axios.get("anuncios");
            this.anuncios = respuesta.data;
        },
    },

    created() {
        this.list();
    },

    mounted() {
        console.log("Component mounted.");
    },
};
</script>
<style scoped>
div {
    border-top: 250px;
}
</style>
