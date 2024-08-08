<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atracciones</title>
    <!-- Incluye Bootstrap si lo estás utilizando -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Atracciones</h1>
        <ul id="atracciones-list" class="list-group"></ul>
    </div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Token de acceso, debe ser configurado correctamente
            


        fetch('http://127.0.0.1:8000/api/comentarios', {
    method: 'POST',
    headers: {
        'Authorization': 'Bearer your-access-token',
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        id_atraccion: 1,
        nombre_usuario: 'Juan Pérez',
        calificación: 5,
        detalles: '¡Excelente atracción!'
    })
})
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.error('Error:', error));

fetch('http://127.0.0.1:8000/api/especies', {
    method: 'GET',
    headers: {
        'Authorization': 'Bearer your-access-token'
    }
})
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.error('Error:', error));
fetch('http://127.0.0.1:8000/api/especies/1/atracciones', {
    method: 'GET',
    headers: {
        'Authorization': 'Bearer your-access-token'
    }
})
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.error('Error:', error));
fetch('http://127.0.0.1:8000/api/atracciones/1', {
    method: 'PUT',
    headers: {
        'Authorization': 'Bearer your-access-token',
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        titulo: 'Nueva Atracción',
        descripcion: 'Descripción actualizada',
        id_especie: 2
    })
})
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
