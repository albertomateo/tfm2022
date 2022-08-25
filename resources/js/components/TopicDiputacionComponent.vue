<template>
    <div id="cuerpo">
        <h3 class="text-center">
            <a href="/vistaTopics">Temas de Diputación</a>
        </h3>

        <button class="btn btn-warning" @click="filtrarportexto()">
            filtrar
        </button>
        <input type="text" id="textobuscado" size="28" />

        <table class="table table-hover table table-bordered">
            <thead>
                <tr v-if="user_id">
                    <th scope="col">#</th>
                    <th scope="col">organismo</th>
                    <th scope="col">tema</th>
                    <th scope="col">detalle</th>
                    <th scope="col">observaciones</th>
                    <th scope="col">enlace</th>
                    <th scope="col">orden</th>
                    <th scope="col">destacado</th>
                    <th v-if="user_id" scope="col" colspan="2">Operacion</th>
                </tr>

                <tr v-else>
                    <!-- <th scope="col">Topic</th> -->
                </tr>
            </thead>
            <!-- </table>
        <table class="table table-hover table table-bordered"> -->

            <!-- _____________________________________  -->

            <!-- USUARIO REGISTRADO -->
            <!-- _____________________________________ -->

            <!-- campos para editar o crear registros -->

            <td v-if="user_id"><input type="text" id="id_nuevo" /></td>
            <td v-if="user_id"><input type="text" id="organismo_nuevo" /></td>
            <td v-if="user_id">
                <textarea
                    v-if="user_id"
                    id="tema_nuevo"
                    rows="3"
                    cols="40"
                ></textarea>
            </td>
            <td v-if="user_id">
                <textarea
                    v-if="user_id"
                    id="detalle_nuevo"
                    rows="3"
                    cols="40"
                ></textarea>
            </td>
            <td v-if="user_id">
                <textarea
                    v-if="user_id"
                    id="observaciones_nuevo"
                    rows="3"
                    cols="40"
                ></textarea>
            </td>
            <td v-if="user_id"><input type="text" id="orden_nuevo" /></td>
            <td v-if="user_id"><input type="text" id="destacado_nuevo" /></td>
            <td v-if="user_id"><input type="text" id="enlace_nuevo" /></td>
            <td v-if="user_id">
                <input type="text" id="documento_nuevo" />
                <input
                    v-if="user_id"
                    class="form-control"
                    type="file"
                    id="documentoaadjuntar"
                />
                <button v-if="user_id" @click="subir()" class="btn btn-warning">
                    subir y agregar
                </button>
            </td>

            <td>
                <button
                    v-if="user_id"
                    @click="guardareditado(topic.id)"
                    class="btn btn-warning"
                >
                    Guardar edicion
                </button>
            </td>
            <td>
                <button
                    v-if="user_id"
                    @click="agregarnuevo(topic.id)"
                    class="btn btn-danger"
                >
                    Agregar
                </button>
            </td>

            <!-- </table>
            <table class="table table-hover table table-bordered"> -->

            <!-- campos en modo edicion - Usuario Registrado -->

            <tbody v-if="user_id">
                <tr v-for="topic in topics" :key="topic.id">
                    <th scope="row">{{ topic.id }}</th>
                    <td>{{ topic.organismo }}</td>
                    <td>{{ topic.tema }}</td>
                    <td>{{ topic.detalle }}</td>
                    <td>{{ topic.observaciones }}</td>
                    <td>{{ topic.orden }}</td>
                    <td>{{ topic.destacado }}</td>
                    <td>{{ topic.enlace }}</td>
                    <td>{{ topic.documento }}</td>

                    <td>
                        <button
                            v-if="user_id"
                            @click="
                                editarseleccionado(
                                    topic.id,
                                    topic.organismo,
                                    topic.tema,
                                    topic.detalle,
                                    topic.observaciones,
                                    topic.orden,
                                    topic.destacado,
                                    topic.enlace,
                                    topic.documento
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
                            @click="borrarseleccionado(topic.id)"
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
                <!-- ======================================================= -->

                <!-- ======================================================= -->

                <div id="matriz" class="row">
                    <div
                        v-for="topic in topics"
                        :key="topic.id"
                        class="card col-md-2 themed-grid-col"
                        
                    >
                        <div id="elementos" class="card-body">
                            <h5 class="card-title">
                                {{ topic.tema }}
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                {{ topic.organismo }}
                            </h6>
                            <p class="card-text">
                                {{ topic.detalle }}
                            </p>
                            <a href="#" class="card-link">{{ topic.enlace }}</a>
                            <a href="#" class="card-link">{{
                                topic.documento
                            }}</a>
                        </div>
                    </div>
                </div>
            </tbody>
        </table>
        //
        <p>Logueado: {{ user_id }}</p>
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
            topic: {
                id: 0,
                organismo: " ",
                tema: " ",
                detalle: " ",
                observaciones: " ",
                orden: " ",
                destacado: " ",
                enlace: " ",
                documento: " ",
            },
            topics: [],
        };
    },
    methods: {
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

            //alert("hasta aqui hemos llegado");
            // var inputdocumento = document.getElementById("archivonuevo2");
            /*             var rutaynombredocumento2 = document
                .getElementById("archivonuevo2")
                .value.replace(
                    "C:\\fakepath\\",
                    "C:\\Users\\dell\\Desktop\\BACKEND\\"
                );
 */
            this.topic.organismo =
                document.getElementById("organismo_nuevo").value;
            this.topic.tema = document.getElementById("tema_nuevo").value;
            this.topic.detalle = document.getElementById("detalle_nuevo").value;
            this.topic.observaciones = document.getElementById(
                "observaciones_nuevo"
            ).value;
            this.topic.orden = document.getElementById("orden_nuevo").value;
            this.topic.destacado =
                document.getElementById("destacado_nuevo").value;

            this.topic.enlace = document.getElementById("enlace_nuevo").value;
            this.topic.documento = nombredocumento; //¿?

            let data = new FormData();

            data.append("organismo", this.topic.organismo);

            data.append("tema", this.topic.tema);
            data.append("detalle", this.topic.detalle);
            data.append("observaciones", this.topic.observaciones);
            data.append("orden", this.topic.orden);
            data.append("destacado", this.topic.destacado);

            data.append("enlace", this.topic.enlace);
            if (haydocumento) {
                data.append(
                    "documento_nuevo",
                    document.getElementById("documentoaadjuntar").files[0]
                );
            }

            const respuesta = axios.post("/topics", data);

            this.listartodos();
            //   alert("hasta aqui hemos llegado");
        },
        editarseleccionado(
            id,
            organismo,
            tema,
            detalle,
            observaciones,
            orden,
            destacado,
            enlace,
            documento
        ) {
            var inputid = document.getElementById("id_nuevo");
            inputid.value = id;

            var inputorganismo = document.getElementById("organismo_nuevo");
            inputorganismo.value = organismo;

            var inputtema = document.getElementById("tema_nuevo");
            inputtema.value = tema;

            var inputdetalle = document.getElementById("detalle_nuevo");
            inputdetalle.value = detalle;

            var inputobservaciones = document.getElementById(
                "observaciones_nuevo"
            );
            inputobservaciones.value = observaciones;

            var inputorden = document.getElementById("orden_nuevo");
            inputorden.value = orden;

            var inputdestacado = document.getElementById("destacado_nuevo");
            inputdestacado.value = destacado;

            var inputenlace = document.getElementById("enlace_nuevo");
            inputenlace.value = enlace;
            var inputdocumento = document.getElementById("documento_nuevo");
            inputdocumento.value = documento;
        },
        async guardareditado() {
            var inputid = document.getElementById("id_nuevo");
            this.topic.id = inputid.value;

            var inputorganismo = document.getElementById("organismo_nuevo");
            this.topic.organismo = inputorganismo.value;

            var inputtema = document.getElementById("tema_nuevo");
            this.topic.tema = inputtema.value;

            var inputdetalle = document.getElementById("detalle_nuevo");
            this.topic.detalle = inputdetalle.value;

            var inputobservaciones = document.getElementById(
                "observaciones_nuevo"
            );
            this.topic.observaciones = inputobservaciones.value;

            var inputorden = document.getElementById("orden_nuevo");
            this.topic.orden = inputorden.value;

            var inputdestacado = document.getElementById("destacado_nuevo");
            this.topic.destacado = inputdestacado.value;

            var inputdetalle = document.getElementById("enlace_nuevo");
            this.topic.enlace = inputdetalle.value;

            var inputdocumento = document.getElementById("documento_nuevo");
            this.topic.documento = inputdocumento.value;

            console.log("llamando a update");

            const respuesta = await axios
                .put("/topics/" + inputid, this.topic)
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
            const respuesta = await axios.get(
                "/topics/filtrar/" + "DIPUTACION",
                {}
            );
            // const respuesta = await axios.get("topics"); //recupera todos los topics
            this.topics = respuesta.data;
        },
        async filtrarportexto() {
            // alert ("hola");

            var inputtextobuscado =
                document.getElementById("textobuscado").value;
            //alert(inputtextobuscado);

            // const respuesta =  axios.get("/filtrar/"+'ww', {
            const respuesta = await axios.get(
                "/topics/filtrar/" + inputtextobuscado,
                {
                    // params: {
                    //     textoafiltrar: "ww",
                    // },
                }
            );

            this.topics = respuesta.data;
        },
        async borrarseleccionado(id) {
            const respuesta = await axios.delete("/topics/" + id); //borra el registro que tenga la id
            this.listartodos();
        },
        async agregarnuevo_sin_documento(id) {
            console.log(this.topic);

            var inputorganismo = document.getElementById("organismo_nuevo");
            this.topic.organismo = inputorganismo.value;

            var inputtema = document.getElementById("tema_nuevo");
            this.topic.tema = inputtema.value;

            var inputdetalle = document.getElementById("detalle_nuevo");
            this.topic.detalle = inputdetalle.value;

            var inputobservaciones = document.getElementById(
                "observaciones_nuevo"
            );
            this.topic.observaciones = inputobservaciones.value;

            var inputorden = document.getElementById("orden_nuevo");
            this.topic.orden = inputorden.value;

            var inputdestacado = document.getElementById("destacado_nuevo");
            this.topic.destacado = inputtema.inputdestacado;

            var inputenlace = document.getElementById("enlace_nuevo");
            this.topic.enlace = inputenlace.value;

            var inputdocumento = document.getElementById("documento_nuevo");
            this.topic.documento = inputdocumento.value;

            const respuesta = await axios.post("/topics", this.topic); //Inserta un registro nuevo
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
</style>
