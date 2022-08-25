<template>
    <div class="componente">
        <p>
            <font face="algerian, fantasy" size="3em" style="font-size: 3em">
                <i><b>edificio antigua comandancia de marina</b></i></font
            >
        </p>
        <div align="center" class="contenedor" style="border-radius: 20px">
            <img
                class="contenido"
                src="/images/cartel_escudo_ayto.gif"
                name="graficos9"
                align="left"
                hspace="1"
            />
            <img
                class="contenido"
                src="/images/cartel_escudo_eressan.gif"
                name="graficos11"
                align="center"
                border="0"
            />
            <img
                class="contenido"
                src="/images/cartel_escudo_ayto.gif"
                name="graficos9"
                align="right"
            />
        </div>
        <p align="center">
            <font face="arial, sans-serif" size="5">
                <b>TRIBUTOS MUNICIPALES</b>
            </font>
        </p>

        <!-- <P style="letter-spacing: 3px">
            GESTIÓN TRIBUTARIA – RECAUDACIÓN VOLUNTARIA Y EJECUTIVA – GESTIÓN
            CATASTRAL
        </P> -->
        <P style="letter-spacing: 3px">
            <a href="/rentas" class="btn btn-outline-link btn-sm"
                >GESTIÓN TRIBUTARIA
            </a>
            -
            <a href="/eressan" class="btn btn-outline-link btn-sm"
                >RECAUDACIÓN VOLUNTARIA</a
            >
            -
            <a href="/diputacion" class="btn btn-outline-link btn-sm"
                >EJECUTIVA</a
            >
            -
            <a href="/catastro" class="btn btn-outline-link btn-sm"
                >GESTION CATASTRAL</a
            >
        </P>
    </div>
</template>
<style scoped>
div.componente {
    border: 0px, 0px, 0px, 0px solid #000000;
    margin: 25px;
}
img {
    padding: 0cm;
    height: 5em;
    margin-left: 30px;
    margin-right: 30px;
}
p {
    border: 0px solid #000000;
    padding: 0cm;
    margin: 0;
    text-align: center;
}
.contenedor {
    background-color: rgb(254, 255, 255);
    width: 100%;
    height: 100px;
    display: flex;
    justify-content: space-around;
}
.contenido {
    height: 80px;
    width: auto;
    float: left;
    margin: 10px;
}
</style>
