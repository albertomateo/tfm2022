<template>
    <div>
        <h1 class="text-center">Anuncios</h1>
        <!-- <p v-if="mostrarElementosUsuarioAutentificado">
            Usuario Registrado {{ mostrarElementosUsuarioAutentificado }} 
            {{props}}
        </p>
        <p v-else="mostrarElementosUsuarioAutentificado">
            Usuario NOOOO Registrado {{ mostrarElementosUsuarioAutentificado }}
            {{props}}
        </p> -->

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Enlace</th>
                    <th v-if="user_id" scope="col" colspan="2">Operacion</th>
                </tr>
            </thead>
        </table>
        <table class="table table-hover">
            
                <td v-if="user_id" ><input type="text" id="id_nuevo" size="3"/></td>
                <td v-if="user_id"><input type="text" id="titulo_nuevo" /></td>
                <td v-if="user_id"><input type="text" id="descripcion_nuevo" /></td>
                <td v-if="user_id"><input type="text" id="enlace_nuevo" /></td>
                <td>
                    <button
                    v-if="user_id"
                        @click="guardareditado(anuncio.id)"
                        class="btn btn-warning"
                    >
                        Guardar edicion
                    </button>
                </td>
                <td>
                    <button
                    v-if="user_id"
                        @click="agregarnuevo(anuncio.id)"
                        class="btn btn-danger"
                    >
                        Agregar
                    </button>
                </td>

           </table>
           <table class="table table-hover">
                <p></p>
                <tr v-for="anuncio in anuncios" :key="anuncio.id">
                    <th scope="row">{{ anuncio.id }}</th>
                    <td>{{ anuncio.titulo }}</td>
                    <td>{{ anuncio.descripcion }}</td>
                    <td>{{ anuncio.enlace }}</td>
                    <td>
                        <button
                            v-if="user_id"
                            @click="
                                editarseleccionado(
                                    anuncio.id,
                                    anuncio.titulo,
                                    anuncio.descripcion,
                                    anuncio.enlace
                                )
                            "
                            class="btn btn-warning"
                        >
                            Editar
                        </button>
                    </td>
                    <td>
                        <button
                            v-if="user_id"
                            
                            @click="borrarseleccionado(anuncio.id)"
                            class="btn btn-danger"
                        >
                            Borrar
                        </button>
                    </td>
                </tr>
            
        </table>
                <p>Logueado: {{ user_id }}</p>
    </div>
</template>

<script>
import axios from "axios";
import { list } from "postcss";

export default {

    props: ["user_id"],
    data() {
        return {
            mostrarElementosUsuarioAutentificado: false,
            anuncio: {
                id: 3,
                titulo: "tit",
                descripcion: "descri",
                enlace: "enlac",
            },
            anuncios: [],
        };
    },
    methods: {
        editarseleccionado(id, titulo, descripcion, enlace) {
            var inputid = document.getElementById("id_nuevo");
            inputid.value = id;
            var inputtitulo = document.getElementById("titulo_nuevo");
            inputtitulo.value = titulo;
            var inputdescripcion = document.getElementById("descripcion_nuevo");
            inputdescripcion.value = descripcion;
            var inputenlace = document.getElementById("enlace_nuevo");
            inputenlace.value = enlace;
        },
        async guardareditado() {
            var inputid = document.getElementById("id_nuevo");
            this.anuncio.id = inputid.value;

            var inputtitulo = document.getElementById("titulo_nuevo");
            this.anuncio.titulo = inputtitulo.value;

            var inputdescripcion = document.getElementById("descripcion_nuevo");
            this.anuncio.descripcion = inputdescripcion.value;

            var inputenlace = document.getElementById("enlace_nuevo");
            this.anuncio.enlace = inputenlace.value;
            console.log("llamando a update");

            const respuesta = await axios.put(
                "/anuncios/" + inputid,
                this.anuncio
            ); //Inserta un registro nuevo
            this.listartodos();
        },

        async listartodos() {
            const respuesta = await axios.get("anuncios"); //recupera todos los anuncios
            this.anuncios = respuesta.data;
        },
        async borrarseleccionado(id) {
            const respuesta = await axios.delete("/anuncios/" + id); //borra el registro que tenga la id
            this.listartodos();
        },
        async agregarnuevo(id) {
            console.log(this.anuncio);

            var inputtitulo = document.getElementById("titulo_nuevo");
            this.anuncio.titulo = inputtitulo.value;

            var inputdescripcion = document.getElementById("descripcion_nuevo");
            this.anuncio.descripcion = inputdescripcion.value;

            var inputenlace = document.getElementById("enlace_nuevo");
            this.anuncio.enlace = inputenlace.value;

            //this.anuncio.titulo = "hola";
            const respuesta = await axios.post("/anuncios", this.anuncio); //Inserta un registro nuevo
            this.listartodos();
        },
    },

    created() {
        this.listartodos();
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
