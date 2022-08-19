<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Insercion de Anuncios</div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Titulos</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Enlace</th>
                                    <th scope="col" colspan="2">Operacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td scope="row">
                                    <input type="text" id="id_nuevo" />
                                </td>
                                <td><input type="text" id="titulo_nuevo" /></td>
                                <td>
                                    <input type="text" id="descripcion_nuevo" />
                                </td>
                                <td>
                                    <input type="text" id="enlace_nuevo" />
                                </td>
                                <td>
                                    <button class="btn btn-warning">
                                        Editar
                                    </button>
                                </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
