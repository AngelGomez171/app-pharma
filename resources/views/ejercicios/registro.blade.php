<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cliente</title>
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
</head>
<body>

    <form action="#" method="POST">
        <h1>Registro de Cliente</h1>

        <label for="codigo">Código del Cliente</label>
        <input type="text" id="codigo" name="codigo">

        <label for="nombre">Nombre Completo</label>
        <input type="text" id="nombre" name="nombre">

        <label for="telefono">Teléfono de Contacto</label>
        <input type="text" id="telefono" name="telefono">

        <label for="direccion">Dirección Completa</label>
        <input type="text" id="direccion" name="direccion">

        <label for="departamento">Departamento</label>
        <select id="departamento" name="departamento">
            <option value="">Seleccionar Departamento...</option>
            <option value="san_salvador">San Salvador</option>
            <option value="la_libertad">La Libertad</option>
        </select>

        <label for="municipio">Municipio</label>
        <select id="municipio" name="municipio">
            <option value="">Seleccionar Municipio...</option>
            <option value="san_salvador">San Salvador</option>
            <option value="santa_ana">Santa Ana</option>
        </select>

        <label for="distrito">Distrito</label>
        <select id="distrito" name="distrito">
            <option value="">Seleccionar Distrito...</option>
            <option value="distrito1">Distrito 1</option>
            <option value="distrito2">Distrito 2</option>
        </select>

        <br><br>
        <button type="submit">Guardar Registro</button>
        <button type="button">Cancelar</button>

    </form>

</body>
</html>