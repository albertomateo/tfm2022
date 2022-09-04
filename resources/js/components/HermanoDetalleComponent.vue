<template>
    <div class="Hermanodetalle">
        <p>Aquí está la ventana del componente hijo</p>
        <button @click="ocultar">ocultar</button>
    </div>
</template>

<script>
export default {
    props: {
        detalle_visible: Boolean,
    },
    data() {
        return {
            visible: this.detalle_visible,
        };
    },
    watch: {
        visible(val) {
            this.detalle_visible = val;
        },
    },
    methods: {
        ocultar() {
            // Activa el evento dialogVisibleEvent en el componente principal y pasa parámetros
            this.$emit("detalleVisibleEvento", false);
        },
    },
    update() {
        console.log("Component hermano detalle updateado");
    },
    mounted() {
        console.log("Component HERMANO DETALLE mounted.");
    },
};
</script>

<style scoped>
.Hermanodetalle {
    height: 150px;
    width: 100%;
    padding: 20px;
    text-align: center;
    margin-top: 20px;
    background-color: #1fb53f;
    color: #fff;
}
</style>
