<template>
    <div  class="container">
        <button @click="cargardebackend()" class="btn btn-success">
            Cargar manualmente datos de la base de datos
        </button>
        <button @click="mostrarMenuInsercion()" class="btn btn-info">
            Mostrar Menu de Inserción
        </button>

        <!-- Formulario en cabecera para insertar registros -->
        <section id="menu_insercion" class="form  d-none">
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
                    @click="insertarEnFrontend"
                    type="button"
                    value="Crear Registro"
                    class="btn btn-success"
                />
            </form>
        </section>

        <!-- Tabla para mostrar todos los registros (En modo editar muestra dos inputs)-->
        <section class="data" >
            <caption>
                Enlaces
            </caption>
            <table class="table">
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
                        <td>
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
                                {{ enlace.sitioweb }}
                            </span>
                        </td>
                        <td>
                            <!-- Si es Modo Edicion, se muestran los botones guardar registro editado y cancelar edicion-->
                            <span
                                v-if="
                                    modo_editar && registro_en_edicion == index
                                "
                            >
                                <!-- Botón para guardar registro editado -->
                                <button
                                    @click="
                                        guardarRegistroEditadoEnFrontend(index)
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
                                    @click="borrarRegistroEnFrontend(index)"
                                    class="btn btn-danger"
                                >
                                    Borrar
                                </button>
                            </span>
                        </td>
                        <!-- Botones para backend -->
                        <td>
                            <button
                                @click="guardarenbackend(index)"
                                class="btn btn-danger"
                            >
                                Actualizar en base de datos
                            </button>
                        </td>
                        <td>
                            <button
                                @click="insertarenbackend(index)"
                                class="btn btn-danger"
                            >
                                Insertar en base de datos
                            </button>
                        </td>
                        <td>
                            <button
                                @click="borrarenbackend(index)"
                                class="btn btn-danger"
                            >
                                borrar en base de datos
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
</template>

<script>
export default {
    computed: {},

    props: [],

    data() {
        return {
            // Campos en modo normal
            titulo_para_insertar_con_vmodel: "", // Input titulo con v-model
            sitioweb_para_insertar_con_vmodel: "", // Input sitioweb con v-model

            // Campos que se muestran en modo edicion
            titulo_para_editar_con_vmodel: "", // Valor del Input titulo_para_editar con v-model

            sitioweb_para_editar_con_vmodel: "", // Valor del Input sitioweb_para_editar_con_vmodel con v-model

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
        // ----------------- Metodos para el backend -----------------------------------
        async borrarenbackend(enlace_id) {
            const respuesta = await axios.delete("/enlaces/" + enlace_id); //borra el registro que tenga la id
        },

        async insertarenbackend(enlace_id) {
            this.enlace.id = enlace_id;
            this.enlace.titulo = this.enlaces[enlace_id].titulo;
            this.enlace.sitioweb = this.enlaces[enlace_id].sitioweb;
            const respuesta = await axios.post("/enlaces", this.enlace); //Inserta un registro nuevo
        },

        async guardarenbackend(enlace_id) {
            this.enlace.id = enlace_id;
            this.enlace.titulo = this.enlaces[enlace_id].titulo;
            this.enlace.sitioweb = this.enlaces[enlace_id].sitioweb;
            this.enlace.id = enlace_id + 1;
            const respuesta = await axios
                .put("/enlaces/" + enlace_id, this.enlace)
                .then((response) => {
                    console.log(response);
                    // this.$toast.show('guardado con exito');
                })
                .catch((error) => {
                    console.log("Error al guardar");
                });
        },
        //
        async cargardebackend() {
            //recupera todos los enlaces
            const respuesta = await axios.get("enlaces");
            this.enlaces = respuesta.data;
        },

        //----------------------- Metodos para el Frontend --------------------------------------
        // ------ utiliza metodo javacript para listas o arrays ---------------

        insertarEnFrontend: function () {
            // insertamos en la lista Front con push
            //  (javascript) array.push("elemento")  Añade el elemento al final de una lista
            this.enlaces.push({
                titulo: this.titulo_para_insertar_con_vmodel,
                sitioweb: this.sitioweb_para_insertar_con_vmodel,
            });
            // Utilizamos en enlace bidireccional de v-model para poner en blanco los inputs de insercion
            this.titulo_para_insertar_con_vmodel = "";
            this.sitioweb_para_insertar_con_vmodel = "";
             menu_insercion.className = "d-none";
        },
        cambiarAModoEditarenFrontend: function (enlace_id) {
            // Relleno los inputs con los valores a editar usando la bidireccionalidad de v-model
            this.registro_en_edicion = enlace_id;
            this.titulo_para_editar_con_vmodel = this.enlaces[enlace_id].titulo;
            this.sitioweb_para_editar_con_vmodel =
                this.enlaces[enlace_id].sitioweb;

            // Cambio a modo edicion para mostrar los inputs
            this.modo_editar = true;
        },
        guardarRegistroEditadoEnFrontend: function (enlace_id) {
            // Ocultamos elementos span de nuestro formulario de editar
            this.modo_editar = false;
            // Actualizamos el array de datos en frontend.
            // vue detecta cambios y refresca automaticamente la vista. No es necesario ejecutar ningun metodo para refrescar
            this.enlaces[enlace_id].titulo = this.titulo_para_editar_con_vmodel;
            this.enlaces[enlace_id].sitioweb =
                this.sitioweb_para_editar_con_vmodel;
        },
        borrarRegistroEnFrontend: function (enlace_id) {
            // Usamos el metodo splice para borrar elemento de una lista. busca la posicion enlace_id y borra un elemento
            // (javascript) array.splice(start[, deleteCount[, item1[, item2[, ...]]]])
            this.enlaces.splice(enlace_id, 1);
        },

        //----------------------- Metodos para la interfaz --------------------------------------
        cancelarEdicionEnFrontend: function () {
            // ------¿?-------
            this.modo_editar = false;
        },

        mostrarMenuInsercion: function () {
            menu_insercion.className = "d-block";
        },
    },
    created() {
        this.cargardebackend();
    },
};
</script>

<style></style>
