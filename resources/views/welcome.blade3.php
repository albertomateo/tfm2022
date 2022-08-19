<!doctype html>
<html lang="es">
<body>
<main role="main" class="container-fluid" id="app">
    @yield("contenido")
    <example-component></example-component>
    <hola-mundo-component></hola-mundo-component>
</main>
<script src="{{url("/js/app.js")}}"></script>

<div class="col-12">
    <h1>Yo soy una plantilla de blade</h1>
    <p>
        Vamos a incluir un componente compilado de Vue:
    </p>
    <hola-mundo-component></hola-mundo-component>
    <example-component></example-component>
    
    
    <p>Listo. Se ha montado allá arriba</p>
    <button type="button" class="btn btn-primary">Primary Button</button>
    <button type="button" class="btn btn-warning">Warning Button</button>
</div>



</body>
</html>