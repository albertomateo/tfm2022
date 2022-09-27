<template>
    <div>
        <h3><a href="/catastro">Oficina Técnica de Catastro</a></h3>

        <img
            class="contenido"
            src="/images/cartel_escudo_catastro.gif"
            name="graficos11"
            align="center"
            border="0"
        />

        <p>
            Para solicitar información llame al
            <a href="tel:+34953388036">956 388 034</a>
        </p>

        <p>Para pedir cita previa presencial puede solicitarla en la web:</p>

        <p>
            <a href="http://citaprevia.sanlucardebarrameda.es"
                >citaprevia.sanlucardebarrameda.es</a
            >
        </p>

        <div class="d-flex position-relative">
            <div>
                <li>Mis datos: DNI, Teléfono, Email.</li>
                <li>Centro: Comandancia de Marina</li>
                <li>Servicio: Catastro</li>
                <li>Motivo de su cita: Escoja su opción</li>
            </div>
            <div>
                <a href="/catastro" class="btn btn-outline-primary btn-lg   stretched-link"
                    >Entrar a Catastro</a
                >
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style scoped>
div {
    margin: 1%;
    padding: 2%;
    background-color: rgb(250, 247, 242);
    border: 1px solid grey;
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
</style>
