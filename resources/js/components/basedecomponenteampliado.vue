<template>
    <div>
        <div v-if="user_id">
            <input
                v-model="titulo_para_insertar_con_vmodel"
                type="text"
                placeholder="Introduzca el Titulo a Crear"
            />
        </div>
    </div>
</template>

<script>
export default {
    props: ["user_id"],

    data() {
        return {
            titulo_para_insertar_con_vmodel: "", // Input titulo con v-model
            enlaces: [],
        };
    },
    methods: {
        //------------------- Metodo que llama a la API --------------------
        async listartodos() {
            const respuesta = await axios.get("enlaces"); //recupera todos los registros
            this.enlaces = respuesta.data;
        },
        //------------------- Otros Métodos de control de Interfaz ----------
        mostrarDivAgregar() {
            var divamostrar = document.getElementById("divagregar");
            divamostrar.className = "d-block";
        },
    },
};
</script>

<style scoped>
div {
    background-color: brown;
}

@media (max-width: 30em) {
    p a {
        font-size: 0.75em;
    }
}
</style>
