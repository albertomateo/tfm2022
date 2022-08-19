<template>
    <div>
        <h1 class="text-center">Anuncios CON PDF</h1>

        <input class="form-control" type="file" id="archivonuevo2" />
        <button @click="subir()" class="btn btn-warning">subir</button>
        <p v-if="mostrarElementosUsuarioAutentificado">Aplicación activada</p>
        <table class="table table-hover">
            <div class="container">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Titulos</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Enlace</th>
                        <th scope="col" colspan="2">Operacion</th>
                    </tr>
                </thead>
                <tbody>
                    <td scope="row"><input type="text" id="id_nuevo" /></td>
                    <td>
                        <input
                            class="form-control"
                            type="text"
                            id="titulo_nuevo"
                        />
                    </td>
                    <td>
                        <input
                            class="form-control"
                            type="text"
                            id="descripcion_nuevo"
                        />
                    </td>
                    <td>
                        <input
                            class="form-control"
                            type="text"
                            id="enlace_nuevo"
                        />
                    </td>
                    <td>
                        <input
                            class="form-control"
                            type="file"
                            id="documento_nuevo"
                        />
                    </td>
                    <td>
                        <button
                            @click="guardareditado(anuncio.id)"
                            class="btn btn-warning"
                        >
                            Guardar edicion
                        </button>
                    </td>

                    <td>
                        <button
                            @click="agregarnuevo(anuncio.id)"
                            class="btn btn-danger"
                        >
                            Agregar
                        </button>
                    </td>
                    <!-- </div>
                <div class="container"> -->
                    <tr v-for="anuncio in anuncios" :key="anuncio.id">
                        <td scope="row">{{ anuncio.id }}</td>
                        <td>{{ anuncio.titulo }}</td>
                        <td>{{ anuncio.descripcion }}</td>
                        <td>{{ anuncio.enlace }}</td>
                        <td>
                            <button
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
                                @click="borrarseleccionado(anuncio.id)"
                                class="btn btn-danger"
                            >
                                Borrar
                            </button>
                        </td>
                    </tr>
                </tbody>
            </div>
        </table>
    </div>
</template>

<script>
import axios from "axios";
import { list } from "postcss";

export default {
    data() {
        return {
            mostrarElementosUsuarioAutentificado: true,
            anuncio: {
                id: 0,
                titulo: "",
                descripcion: "",
                enlace: "",
                documento: "",
            },
            anuncios: [],
        };
    },
    methods: {
        subir() {
            var nombredocumento =
                document.getElementById("archivonuevo2").files[0].name;
            var inputdocumento = document.getElementById("archivonuevo2");
            var rutaynombredocumento2 = document
                .getElementById("archivonuevo2")
                .value.replace(
                    "C:\\fakepath\\",
                    "C:\\Users\\dell\\Desktop\\BACKEND\\"
                );
            // alert(rutaynombredocumento2);

            this.anuncio.titulo = document.getElementById("titulo_nuevo").value;
            this.anuncio.descripcion =
                document.getElementById("descripcion_nuevo").value;
            this.anuncio.enlace = document.getElementById("enlace_nuevo").value;
            this.anuncio.documento = nombredocumento; //¿?

            let data = new FormData();

            data.append("titulo", this.anuncio.titulo);

            data.append("descripcion", this.anuncio.descripcion);
            data.append("enlace", this.anuncio.enlace);
            data.append(
                "documento_nuevo",
                document.getElementById("archivonuevo2").files[0]
            );

            // axios.post("/Upload/File", data).then(function (response) {
            //     console.log(response.data);
            // });
            // this.anuncio.documento =documento2;
            // console.log(this.anuncio.documento);

            //this.anuncio.titulo = "hola";
            // const respuesta = axios.post("/anuncios", this.anuncio); //Inserta un registro nuevo
            const respuesta = axios.post("/anuncios", data);

            this.listartodos();
            //   alert("hasta aqui hemos llegado");
        },
        editarseleccionado(id, titulo, descripcion, enlace) {
            var inputid = document.getElementById("id_nuevo");
            inputid.value = id;
            var inputtitulo = document.getElementById("titulo_nuevo");
            inputtitulo.value = titulo;
            var inputdescripcion = document.getElementById("descripcion_nuevo");
            inputdescripcion.value = descripcion;
            var inputenlace = document.getElementById("eenlacenuevo");
            inputenlace.value = eenlace;
        },
        async guardareditado() {
            var inputid = document.getElementById("id_nuevo");
            this.anuncio.id = inputid.value;

            var inputtitulo = document.getElementById("titulo_nuevo");
            this.anuncio.titulo = inputtitulo.value;

            var inputdescripcion = document.getElementById("descripcion_nuevo");
            this.anuncio.descripcion = inputdescripcion.value;

            var inputenlace = document.getElementById("eenlacenuevo");
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

            var inputenlace = document.getElementById("eenlacenuevo");
            this.anuncio.enlace = inputenlace.value;

            var inputdocumento = document.getElementById("documento_nuevo");

            this.anuncio.documento = inputdocumento.value;
            this.anuncio.documento = this.anuncio.documento.replace(
                "C:\\fakepath\\",
                "C:\\Users\\dell\\Desktop\\BACKEND\\"
            );

            console.log(this.anuncio.documento);

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
