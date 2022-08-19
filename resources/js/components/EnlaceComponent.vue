<template>
    <div class="container">
        <button @click="cargardebackend()" class="btn btn-danger">
            Cargar datos de la base de datos
        </button>

        <!-- Seccion que se usa unicamente para añadir registros -->
        <section class="form">
            <form action="" class="text-center">
                <input
                    v-model="titulo"
                    type="text"
                    class="form-control"
                    placeholder="Titulo"
                />
                <input
                    v-model="sitioweb"
                    type="text"
                    name="sitioweb"
                    placeholder="Sitio Web"
                    class="form-control"
                />
                <!-- Botón para añadir -->
                <input
                    @click="crearEnlace"
                    type="button"
                    value="Crear Registro"
                    class="btn btn-success"
                />
            </form>
        </section>
        <!-- Tabla donde se muestran los datos -->
        <section class="data">
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
                                v-if="formActualizar && idActualizar == index"
                            >
                                <!-- Formulario para editar -->
                                <input
                                    v-model="tituloActualizar"
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
                            <span
                                v-if="formActualizar && idActualizar == index"
                            >
                                <!-- Formulario para editar -->
                                <input
                                    v-model="sitiowebActualizar"
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
                            <!-- Botón para guardar la información actualizada -->
                            <span
                                v-if="formActualizar && idActualizar == index"
                            >
                                <button
                                    @click="guardarActualizacion(index)"
                                    class="btn btn-success"
                                >
                                    Guardar
                                </button>
                            </span>
                            <span v-else>
                                <!-- Botón para mostrar el formulario de editar -->
                                <button
                                    @click="verFormActualizar(index)"
                                    class="btn btn-warning"
                                >
                                    Editar
                                </button>
                                <!-- Botón para borrar -->
                                <button
                                    @click="borrarEnlace(index)"
                                    class="btn btn-danger"
                                >
                                    Borrar
                                </button>
                            </span>
                        </td>
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
            titulo: "",   // Input titulo con v-model
            sitioweb: "", // Input sitioweb con v-model

            // Campos que se muestran en modo edicion
            tituloActualizar: "",  // Input tituloActualizar con v-model
            // Input tituloActualizar dentro del formulario de editar con v-model
            sitiowebActualizar: "",

            // Input sitioweb dentro del formulario de editar
            // Ver o no ver el formulario de editar
            formActualizar: false,
            // La posición de tu lista donde te gustaría editar
            idActualizar: 0,
            // Input titulo dentro del formulario de editar
            tituloActualizar: "",
            // Input sitioweb dentro del formulario de editar
            modoEdicion: "",
            // Lista de enlaces
            enlaces: [],
            enlace: {
                id: 0,
                titulo: " ",
                sitioweb: " ",
            },
        };
    },
    methods: {
        async borrarenbackend(enlace_id) {
            const respuesta = await axios.delete("/enlaces/" + enlace_id); //borra el registro que tenga la id
        },
        async insertarenbackend(enlace_id) {
            alert(enlace_id);
            // this.enlaces[enlace_id].titulo = this.tituloActualizar;
            // this.enlaces[enlace_id].sitioweb = this.modoEdicion;
            this.enlace.id = enlace_id;
            this.enlace.titulo = this.enlaces[enlace_id].titulo;
            this.enlace.sitioweb = this.enlaces[enlace_id].sitioweb;

            const respuesta = await axios.post("/enlaces", this.enlace); //Inserta un registro nuevo
        },

        async guardarenbackend(enlace_id) {
            alert(enlace_id);
            // this.enlaces[enlace_id].titulo = this.tituloActualizar;
            // this.enlaces[enlace_id].sitioweb = this.modoEdicion;
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
        crearEnlace: function () {
            // Añadimos a nuestra lista
            this.enlaces.push({
                titulo: this.titulo,
                sitioweb: this.sitioweb,
            });
            // Vaciamos el formulario de añadir
            this.titulo = "";
            this.sitioweb = "";
        },
        verFormActualizar: function (enlace_id) {
            // Antes de mostrar el formulario de editar, rellenamos sus campos
            this.idActualizar = enlace_id;
            this.tituloActualizar = this.enlaces[enlace_id].titulo;
            this.modoEdicion = this.enlaces[enlace_id].sitioweb;

            // Mostramos el formulario
            this.formActualizar = true;
        },
        borrarEnlace: function (enlace_id) {
            // Eliminamos el elemento de la lista
            this.enlaces.splice(enlace_id, 1);
        },
        guardarActualizacion: function (enlace_id) {
            // Ocultamos elementos span de nuestro formulario de editar
            this.formActualizar = false;
            // Actualizamos los datos
            this.enlaces[enlace_id].titulo = this.tituloActualizar;
            this.enlaces[enlace_id].sitioweb = this.modoEdicion;
        },
    },
};
</script>

<style></style>
