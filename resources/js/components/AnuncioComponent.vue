<template>
<div id="cuerpo" class="container-fluid">
        <h3 class="text-center"><a href="/vistaAnuncios">Anuncios</a></h3>

        <button class="btn btn-warning" @click="filtrarportexto()">
            filtrar por titulo o descripcion
        </button>

        <input type="text" id="textobuscado" @keyup.enter="filtrarportexto()" />
        <span v-if="user_id" class="float-right"
            ><button class="btn btn-primary" @click="mostrarDivAgregar()">
                Agregar nuevo Anuncio
            </button>

            <button
                v-if="user_id"
                @click="listartodos()"
                class="btn btn-danger"
            >
                Cancelar
            </button>
        </span>

        <!-- campos para editar o crear registros -->
        <div id="divagregar" class="container d-none">
            <p>
                <input
                    v-if="user_id"
                    type="text"
                    id="id_nuevo"
                    placeholder="id"
                />
            </p>
            <p>
                <input
                    v-if="user_id"
                    type="text"
                    id="titulo_nuevo"
                    placeholder="Titulo del Anuncio"
                />
            </p>
            <p>
                <textarea
                    v-if="user_id"
                    id="descripcion_nuevo"
                    rows="3"
                    cols="40"
                    placeholder="Texto completo del Anuncio"
                ></textarea>
            </p>

            <p>
                <input
                    v-if="user_id"
                    type="text"
                    id="enlace_nuevo"
                    placeholder="enlace externo http://.."
                />
            </p>
            <p>
                <input
                    v-if="user_id"
                    type="text"
                    id="documento_nuevo"
                    placeholder="nombre documento subido a plataforma"
                />
            </p>
            <p>
                <input
                    v-if="user_id"
                    class="form-control"
                    type="file"
                    id="documentoaadjuntar"
                />
            </p>
            <p>
                <button v-if="user_id" @click="subir()" class="btn btn-warning">
                    subir y agregar
                </button>
            </p>

            <p>
                <button
                    v-if="user_id"
                    @click="guardareditado(anuncio.id)"
                    class="btn btn-warning"
                >
                    Guardar edicion
                </button>
            </p>

            <p>
                <button
                    v-if="user_id"
                    @click="agregarnuevo(anuncio.id)"
                    class="btn btn-danger"
                >
                    Agregar
                </button>
            </p>
        </div>

        <table class="table table-hover table table-bordered">
            <thead>
                <tr v-if="user_id">
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Enlace</th>
                    <th scope="col">documento</th>
                    <th v-if="user_id" scope="col" colspan="2">Operacion</th>
                </tr>

                <!-- <tr v-else>
                    <th scope="col">Anuncio</th>
                </tr> -->
            </thead>

            <!-- _____________________________________  -->

            <!-- USUARIO REGISTRADO -->
            <!-- _____________________________________ -->

            <!-- campos en modo edicion - Usuario Registrado -->
            <p></p>
            <tbody v-if="user_id">
                <tr v-for="anuncio in anuncios" :key="anuncio.id">
                    <th scope="row">{{ anuncio.id }}</th>
                    <td>{{ anuncio.titulo }}</td>
                    <td>{{ anuncio.descripcion }}</td>
                    <td>{{ anuncio.enlace }}</td>
                    <td>{{ anuncio.documento }}</td>

                    <td>
                        <button
                            v-if="user_id"
                            @click="
                                editarseleccionado(
                                    anuncio.id,
                                    anuncio.titulo,
                                    anuncio.descripcion,
                                    anuncio.enlace,
                                    anuncio.documento
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
            </tbody>

            <!-- _____________________________________  -->

            <!-- USUARIO NO REGISTRADO -->
            <!-- _____________________________________ -->

            <!-- campos en modo visualizacion - usuario no registrado -->
            <tbody v-else>
                <tr v-for="anuncio in anuncios" :key="anuncio.id">
                    <!-- <th scope="row">{{ anuncio.id }}</th> -->
                    <h4>{{ anuncio.titulo }}</h4>
                    <p>{{ anuncio.descripcion }}</p>
                    <p>
                        <a target="_blank" v-bind:href="anuncio.enlace">
                            {{ anuncio.enlace }}</a
                        >
                    </p>

                    <p>
                        <!-- link: '@/assets/pdfs/folder/download.pdf', -->
                        <!-- public_path() . '/DOCUMENTOS/' -->

                        <!-- <a target="_blank" v-bind:href="anuncio.documento"
                            >descargar pdf: {{ anuncio.documento }}</a
                        > -->
                        <a
                            target="_blank"
                            v-bind:href="'/DOCUMENTOS/' + anuncio.documento"
                        >
                            {{ anuncio.documento }}</a
                        >
                    </p>
                    <!-- <h2 class="text-warning bg-dark"><router-link v-bind:to="'http://'+anuncio.enlace">{{anuncio.enlace }}</router-link></h2> -->
                    <!-- <p>{{ anuncio.enlace }}</p> -->
                    <!-- <p><a class="nav-link" href="{{ anuncioenlace }}">Nueva nota</a></p>  -->
                    <!-- <p>  <a href="{{ url('anuncio.enlace')}}"  target="_blank"> {{ anuncio.enlace }}  </a> </p> -->
                </tr>
            </tbody>
        </table>

        <!-- <p>Logueado: {{ user_id }}</p> -->
    </div>
</template>

<script>
import axios from "axios";
import { list } from "postcss";

export default {
    computed: {},

    props: ["user_id"],
    data() {
        return {
            mostrarElementosUsuarioAutentificado: false,
            anuncio: {
                id: 0,
                titulo: " ",
                descripcion: " ",
                enlace: " ",
                documento: " ",
            },
            anuncios: [],
        };
    },
    methods: {
        mostrarDivAgregar() {
            var divamostrar = document.getElementById("divagregar");

            divamostrar.className = "d-block";
            // divamostrar.removeAttribute("class");
            // divamostrar.removeAttribute("style");
        },
        agregarnuevo() {
            var haydocumento = false;
            var nombredocumento = "";
            var documento = null;
            var documento =
                document.getElementById("documentoaadjuntar").files[0];
            alert(documento);
            if (documento === undefined) {
                haydocumento = false;
                nombredocumento = "";
            } else {
                haydocumento = true;
                nombredocumento = documento.value;
            }

            // alert("hasta aqui hemos llegado");
            // var inputdocumento = document.getElementById("archivonuevo2");
            /*             var rutaynombredocumento2 = document
                .getElementById("archivonuevo2")
                .value.replace(
                    "C:\\fakepath\\",
                    "C:\\Users\\dell\\Desktop\\BACKEND\\"
                );
 */
            this.anuncio.titulo = document.getElementById("titulo_nuevo").value;
            this.anuncio.descripcion =
                document.getElementById("descripcion_nuevo").value;
            this.anuncio.enlace = document.getElementById("enlace_nuevo").value;
            this.anuncio.documento = nombredocumento; //¿?

            let data = new FormData();

            data.append("titulo", this.anuncio.titulo);

            data.append("descripcion", this.anuncio.descripcion);
            data.append("enlace", this.anuncio.enlace);
            if (haydocumento) {
                data.append(
                    "documento_nuevo",
                    document.getElementById("documentoaadjuntar").files[0]
                );
            }

            const respuesta = axios.post("/anuncios", data);

            this.listartodos();

            //   alert("hasta aqui hemos llegado");
        },
        editarseleccionado(id, titulo, descripcion, enlace, documento) {
            var inputid = document.getElementById("id_nuevo");
            inputid.value = id;
            var inputtitulo = document.getElementById("titulo_nuevo");
            inputtitulo.value = titulo;
            var inputdescripcion = document.getElementById("descripcion_nuevo");
            inputdescripcion.value = descripcion;
            var inputenlace = document.getElementById("enlace_nuevo");
            inputenlace.value = enlace;
            var inputdocumento = document.getElementById("documento_nuevo");
            inputdocumento.value = documento;
            this.mostrarDivAgregar();
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

            var inputdocumento = document.getElementById("documento_nuevo");
            this.anuncio.documento = inputdocumento.value;

            console.log("llamando a update");

            const respuesta = await axios
                .put("/anuncios/" + inputid, this.anuncio)
                .then((response) => {
                    console.log(response);
                    // this.$toast.show('guardado con exito');
                })
                .catch((error) => {
                    console.log("Error al guardar");
                });

            this.listartodos();
        },

        async listartodos() {
            const respuesta = await axios.get("anuncios"); //recupera todos los anuncios
            this.anuncios = respuesta.data;
            var divamostrar = document.getElementById("divagregar");
            divamostrar.className = "d-none";
        },
        async filtrarportexto() {
            var inputtextobuscado =
                document.getElementById("textobuscado").value;

            const respuesta = await axios.get(
                "/anuncios/filtrar/" + inputtextobuscado
            );
            this.anuncios = respuesta.data;
        },
        async borrarseleccionado(id) {
            const respuesta = await axios.delete("/anuncios/" + id); //borra el registro que tenga la id
            this.listartodos();
        },
        async agregarnuevo_sin_documento(id) {
            console.log(this.anuncio);

            var inputtitulo = document.getElementById("titulo_nuevo");
            this.anuncio.titulo = inputtitulo.value;

            var inputdescripcion = document.getElementById("descripcion_nuevo");
            this.anuncio.descripcion = inputdescripcion.value;

            var inputenlace = document.getElementById("enlace_nuevo");
            this.anuncio.enlace = inputenlace.value;

            var inputdocumento = document.getElementById("documento_nuevo");
            this.anuncio.documento = inputdocumento.value;

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
@media (max-width: 30em) {
    p a {
        font-size: 0.75em;
    }
}

div li {
    margin-left: 3%;
}

h3 {
    background-color: darkblue;
    color: white;
    padding: 0;
    border: 0;
    margin: 0;
}

a {
    text-decoration: none;
}
h3 a:visited {
    color: white;
}
a:hover {
    text-decoration: underline;
}

h4 {
    background-color: antiquewhite;
}
/* p {
 border: 1px solid;
    border-color: cornflowerblue;
} */

table tr {
    /*una fila por anuncio*/
    display: flex;
    flex-direction: column;
    border: 1px solid rgb(176, 132, 57);
    padding: 1em;
    margin-bottom: 1em;
    background-color: rgb(255, 255, 255);
    border-radius: 20px;

    /* width: 95%; */
}
div {
    background-color: rgb(132, 177, 223);
    border: 1px solid rgb(14, 14, 14);
    border-radius: 20px;
    border-top: 250px;
    padding: 2%;
}

/* div {
    margin: 1%;
    padding: 2%;
    background-color: rgb(250, 247, 242);
    border: 1px solid rgb(14, 14, 14);
    border-radius: 20px;
}
div li {
    margin-left: 3%;
}

h3 {
    background-color: darkblue;
    color: white;
    padding: 0;
    border: 0;
    margin: 0;
}

a {
    text-decoration: none;
}
h3 a:visited {
    color: white;
}
a:hover {
    text-decoration: underline;
}

h4 {
    background-color: antiquewhite;
}
p {
    border: 1px solid;
    border-color: cornflowerblue;
}
div {
    border-top: 250px;
} */
</style>
