<template>
   <div id="cuerpo" class="container-fluid">
        <h3 class="text-center"><a href="/vistaTopics">Todos los Temas</a></h3>

        <!-- Boton filtrar -->
        <button class="btn btn-warning" @click="filtrarportexto()">
            filtrar
        </button>
        <input type="text" id="textobuscado" @keyup.enter="filtrarportexto()" />

        <!-- Pintamos la tabla -->

        <!-- </table>
        <table class="table table-hover table table-bordered"> -->

        <!-- _____________________________________  -->

        <!-- USUARIO REGISTRADO -->
        <!-- _____________________________________ -->

        <!-- Seccion con los campos y botones para editar o crear registros -->

        <form v-if="user_id" id="menu_insercion">
            <!-- <form action="/action_page.php"> -->
            <div class="form-group">
                <label for="id_nuevo">id</label>
                <input type="text" class="form-control" id="id_nuevo" />
            </div>

            <div class="form-group">
                <label for="organismo_nuevo"> Organismo </label>
                <input type="text" class="form-control" id="organismo_nuevo" />
            </div>
            <div class="form-group">
                <label for="tema_nuevo">Tema </label>
                <input type="text" class="form-control" id="tema_nuevo" />
            </div>

            <div class="form-group">
                <label for="detalle_nuevo">Detalle </label>
                <input type="text" class="form-control" id="detalle_nuevo" />
            </div>

            <div class="form-group">
                <label for="observaciones_nuevo">Observaciones :</label>
                <input
                    type="text"
                    class="form-control"
                    id="observaciones_nuevo"
                />
            </div>

            <div class="form-group">
                <label for="enlace_nuevo">Enlace</label>
                <input type="text" class="form-control" id="enlace_nuevo" />
            </div>

            <div class="form-group">
                <label for="orden_nuevo">Orden </label>
                <input type="text" class="form-control" id="orden_nuevo" />
            </div>
            <div class="form-group">
                <label for="destacado_nuevo">Destacado :</label>
                <input type="text" class="form-control" id="destacado_nuevo" />
            </div>

            <div class="form-group">
                <label for="documento_nuevo">Documento</label>
                <input type="text" class="form-control" id="documento_nuevo" />
            </div>

            <input class="form-control" type="file" id="documentoaadjuntar" />

            <button @click="subir()" class="btn btn-warning">
                subir y agregar
            </button>
            <button @click="guardareditado(topic.id)" class="btn btn-warning">
                Guardar edicion
            </button>
            <button @click="agregarnuevo(topic.id)" class="btn btn-danger">
                Agregar
            </button>
        </form>

        <!-- cabecera de la tabla  - Para ambos- -->

        <table class="table table-hover table table-bordered">
            <thead>
                <tr v-if="user_id">
                    <th scope="col">#</th>
                    <th scope="col">organismo</th>
                    <th scope="col">tema</th>
                    <th scope="col">detalle</th>
                    <th scope="col">observaciones</th>
                    <th scope="col">orden</th>
                    <th scope="col">destacado</th>
                    <th scope="col">enlace</th>
                    <th v-if="user_id" scope="col" colspan="2">Operacion</th>
                </tr>

                <!-- <tr v-else>
                    <th scope="col">Topic</th>
                </tr> -->
            </thead>

            <!-- campos en modo edicion - Usuario Registrado -->
            <p></p>
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
                <tr v-for="topic in topics" :key="topic.id">
                    <!-- <th scope="row">{{ topic.id }}</th> -->
                    <h4>{{ topic.tema }}</h4>

                    <p>{{ topic.detalle }}</p>
                    <p>{{ topic.orden }}</p>
                    <p>{{ topic.organismo }}</p>
                    <p>
                        <a target="_blank" v-bind:href="topic.enlace">
                            ir a: {{ topic.enlace }}</a
                        >
                    </p>

                    <p>
                        <a
                            target="_blank"
                            v-bind:href="'/DOCUMENTOS/' + topic.documento"
                        >
                            {{ topic.documento }}</a
                        >
                    </p>
                    <!-- <h2 class="text-warning bg-dark"><router-link v-bind:to="'http://'+topic.enlace">{{topic.enlace }}</router-link></h2> -->
                    <!-- <p>{{ topic.enlace }}</p> -->
                    <!-- <p><a class="nav-link" href="{{ topicenlace }}">Nueva nota</a></p>  -->
                    <!-- <p>  <a href="{{ url('topic.enlace')}}"  target="_blank"> {{ topic.enlace }}  </a> </p> -->
                </tr>
            </tbody>
        </table>
        //
        <p>Logueado: {{ user_id }}</p>
    </div>
</template>

<script>
import axios from "axios";

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
        async filtrarportexto() {
            var inputtextobuscado = // Recojemos lo escrito en el input texto a buscar
                document.getElementById("textobuscado").value;
            // alert(inputtextobuscado);
            const respuesta = await axios.get(
                // llamamos a la API con Axios
                "/topics/filtrar/" + inputtextobuscado,
                {
                    // params: {
                    //     textoafiltrar: "ww",
                    // },
                }
            );
            this.topics = respuesta.data; // almacenamos la respuesta en el array. Vue lo refresca automaticamente
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
            const respuesta = await axios.get("topics"); //recupera todos los topics
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
            this.topic.destacado = inputdestacado.value;

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
a:hover {
    text-decoration: underline;
}
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
    background-color: lightpink;
    border: 1px solid rgb(14, 14, 14);
    border-radius: 20px;
    border-top: 250px;
    padding: 2%;
}
/* div {
    background-color: rgb(250, 247, 242);
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
