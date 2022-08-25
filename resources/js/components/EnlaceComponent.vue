<template>
    <div id="cuerpo" class="container-fluid">
        <!-- <button @click="cargardebackend()" class="btn btn-success">
            Cargar manualmente datos de la base de datos
        </button> -->
        <button
            v-if="user_id"
            id="btn_mostrar_menu"
            @click="mostrarMenuInsercion()"
            class="btn btn-info"
        >
            Mostrar Menu de Inserción
        </button>
        <button
            id="btn_ocultar_menu"
            @click="ocultarMenuInsercion()"
            class="btn btn-info d-none"
        >
            Ocultar Menu de Inserción
        </button>

        <input
            v-model="texto_a_buscar_con_vmodel"
            placeholder="Introduce texto a buscar y pulsa intro"
            type="text"
            @keyup.enter="filtrarEnBackend()"
        />

        <!-- Formulario en cabecera para insertar registros -->
        <section id="menu_insercion" class="form d-none">
            <form action="" class="text-center">
                <!--Aqui uso v-model Creacion Campo 1-->
                <input
                    v-model="titulo_para_insertar_con_vmodel"
                    type="text"
                    class="form-control"
                    placeholder="Introduzca el Titulo a Crear"
                />
                <!--Aqui uso v-model Creacion Campo 2 -->
                <input
                    v-model="sitioweb_para_insertar_con_vmodel"
                    type="text"
                    placeholder="Introduzca el Sitio Web a Crear"
                    class="form-control"
                />
                <!-- Botón para añadir -->
                <input
                    @click="insertarDirectamenteEnBackend"
                    type="button"
                    value="Crear Registro - Nuevo"
                    class="btn btn-success"
                />
            </form>
        </section>

        <!-- Tabla para mostrar todos los registros (En modo editar muestra dos inputs)-->
        <section class="data">
            <caption>
                Enlaces
            </caption>
            <table class="table table-hover table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Sitio WEB</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(enlace, index) in enlaces" :key="enlace.id">
                        <td>{{ enlace.id }}</td>
                        <td>
                            <span
                                v-if="
                                    modo_editar && registro_en_edicion == index
                                "
                            >
                                <!-- Si es Modo Actualizacion es True, se muestra input en vez de registros normales -->
                                <!--Aqui uso uno de los 4 v-model -->
                                <input
                                    v-model="titulo_para_editar_con_vmodel"
                                    type="text"
                                    class="form-control"
                                />
                            </span>
                            <span v-else>
                                <!-- Dato titulo -->
                                {{ enlace.titulo }}
                            </span>
                        </td>
                        <td >
                            <!-- Si Modo Actualizacion es True, se muestra input en vez de registros normales -->
                            <span
                                v-if="
                                    modo_editar && registro_en_edicion == index
                                "
                            >
                                <!--Aqui uso uno de los 4 v-model -->
                                <input
                                    v-model="sitioweb_para_editar_con_vmodel"
                                    type="text"
                                    class="form-control"
                                />
                            </span>
                            <span v-else>
                                <!-- Dato sitioweb -->
                                <a
                                    target="_blank"
                                    v-bind:href="enlace.sitioweb"
                                >
                                    {{ enlace.sitioweb }}</a
                                >
                                <!-- {{ enlace.sitioweb }}   si es solo mostrar el dato sin enlace -->
                            </span>
                        </td>
                        <td v-if="user_id">
                            <!-- Si es Modo Edicion, se muestran los botones guardar registro editado y cancelar edicion-->
                            <span
                                v-if="
                                    modo_editar && registro_en_edicion == index
                                "
                            >
                                <!-- Botón para guardar registro editado -->
                                <button
                                    @click="
                                        guardarDirectamenteEnBackloeditado(
                                            enlace.id
                                        )
                                    "
                                    class="btn btn-success"
                                >
                                    Guardar
                                </button>
                                <!-- Botón cancelar edicion -->
                                <button
                                    @click="cancelarEdicionEnFrontend()"
                                    class="btn btn-primary"
                                >
                                    Cancelar
                                </button>
                            </span>

                            <!-- En caso contrario (Modo Normal), se muestran losbotones Editar y borrar -->
                            <span v-else>
                                <!-- Botón para editar -->
                                <button
                                    @click="cambiarAModoEditarenFrontend(index)"
                                    class="btn btn-warning"
                                >
                                    Editar
                                </button>
                                <!-- Botón para borrar -->

                                <button
                                    @click="
                                        borrarDirectamenteEnBackend(enlace.id)
                                    "
                                    class="btn btn-danger"
                                >
                                    Borrar
                                </button>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
</template>

<script>
export default {
    computed: {
        // enlaces() {
        //     return enlaces.filter((enlace) => {
        //         return enlace.titulo
        //             .toLowerCase()
        //             .includes(this.buscar_con_vmodel.toLowerCase());
        //     });
        // },
        // items() {
        //   return datos.filter(item => {
        //     return item.nombre.toLowerCase().includes(this.buscar_con_vmodel.toLowerCase());
        //   });
        // },
    },

    props: ["user_id"],

    data() {
        return {
            buscar_con_vmodel: "", //para buscar en front
            // Campos en modo normal.
            titulo_para_insertar_con_vmodel: "", // Input titulo con v-model
            sitioweb_para_insertar_con_vmodel: "", // Input sitioweb con v-model

            // Campos que se muestran en modo edicion
            titulo_para_editar_con_vmodel: "", // Valor del Input titulo_para_editar con v-model

            sitioweb_para_editar_con_vmodel: "", // Valor del Input sitioweb_para_editar_con_vmodel con v-model

            texto_a_buscar_con_vmodel: "", // Valor del texto a buscar . No es necesario inicializarlo

            modo_editar: false, // Ver o no ver los campos de edicion (y botones) en el listado

            registro_en_edicion: 0, // // La posición del listado donde mostramos los input de ediion (y botones)

            // Lista de enlaces
            enlaces: [],
            // enlace independiente que se esta editando o insertando
            enlace: {
                id: 0,
                titulo: " ",
                sitioweb: " ",
            },
        };
    },
    methods: {
        //------------------- Metodos para Trabajar directamente en Backend sin pasar por Front --------------------
        async listartodos() {
            const respuesta = await axios.get("enlaces"); //recupera todos los anuncios
            this.enlaces = respuesta.data;
        },

        async filtrarEnBackend() {
            const respuesta = await axios.get(
                "/enlaces/filtrar/" + this.texto_a_buscar_con_vmodel
            );
            this.enlaces = respuesta.data;
        },
        async insertarDirectamenteEnBackend() {
            this.enlace.titulo = this.titulo_para_insertar_con_vmodel;
            this.enlace.sitioweb = this.sitioweb_para_insertar_con_vmodel;
            const respuesta = await axios
                .post("/enlaces", this.enlace) //Inserta un registro nuevo
                .then((response) => {
                    console.log(response);
                    // this.$toast.show('guardado con exito');
                })
                .catch((error) => {
                    console.log("Error al guardar: " + error.response);
                });
            this.listartodos();
        },
        async borrarDirectamenteEnBackend(id) {
            const respuesta = await axios
                .delete("/enlaces/" + id) //borra el registro que tenga la id
                .then((response) => {
                    console.log(response);
                    // this.$toast.show('guardado con exito');
                })
                .catch((error) => {
                    console.log("Error al guardar");
                });
            this.listartodos();
        },

        async guardarDirectamenteEnBackloeditado(id) {
            this.enlace.id = id;
            this.enlace.titulo = this.titulo_para_editar_con_vmodel;
            this.enlace.sitioweb = this.sitioweb_para_editar_con_vmodel;
            //console.log(this.enlace);
            const respuesta = await axios
                .put("/enlaces/" + id, this.enlace)
                .then((response) => {
                    console.log(response);
                    // this.$toast.show('guardado con exito');
                })
                .catch((error) => {
                    console.log("Error al guardar");
                });
            this.cancelarEdicionEnFrontend();
            this.listartodos();
        },

        //
        async cargardebackend() {
            //recupera todos los enlaces
            const respuesta = await axios.get("enlaces");
            this.enlaces = respuesta.data;
        },

        //----------------------- Metodos para el Frontend --------------------------------------
        // ------ utiliza metodo javacript para listas o arrays ---------------

        cambiarAModoEditarenFrontend: function (enlace_id) {
            // Relleno los inputs con los valores a editar usando la bidireccionalidad de v-model
            this.registro_en_edicion = enlace_id;
            this.titulo_para_editar_con_vmodel = this.enlaces[enlace_id].titulo;
            this.sitioweb_para_editar_con_vmodel =
                this.enlaces[enlace_id].sitioweb;

            // Cambio a modo edicion para mostrar los inputs
            this.modo_editar = true;
        },

        //----------------------- Metodos para la interfaz --------------------------------------
        cancelarEdicionEnFrontend: function () {
            this.modo_editar = false;
        },

        mostrarMenuInsercion: function () {
            // removeClass
            // addClass
            btn_ocultar_menu.className = "d-block";
            btn_mostrar_menu.className = "d-none";
            menu_insercion.className = "d-block";
        },
        ocultarMenuInsercion: function () {
            menu_insercion.className = "d-none";
            btn_ocultar_menu.className = "d-none";
            btn_mostrar_menu.className = "d-block";
        },
    },
    created() {
        this.cargardebackend();
    },
};
</script>

<style scoped>
@media (max-width: 30em) {
    /* 30x16=480px*/

    a {
        font-size: 0.8em;
    }

    main {
        padding: 1 em, 2 em;
    }
    body {
        background: rgba(6, 6, 45, 0.766);
    }
    table tr {
        display: flex;
        flex-direction: column;
        border: 0px solid orange;
        padding: 1em;
        margin-bottom: 1em;
    }
    table {
        border-collapse: collapse;
    }

    tr,
    td {
        padding: 1px 1 px;
    }
} /* fin de los estilos a aplicar cuando sea tamaño de mobil */
/* 
table {
    border-collapse: collapse;
    width: 100%;
    margin: 1%;
    padding: 2%;
    background-color: rgb(250, 247, 242);

    border-radius: 20px;
} */
div {
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
}
</style>
