<html lang="en"> 
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Búsqueda de Resultados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f0f0f0;
        font-family: Arial, sans-serif;
      }

      .container {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        width: 100%;
      }

      h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
      }

      #searchInput {
        width: 100%;
        max-width: 400px;
        background-color: #f0f0f0;
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
        font-size: 16px;
        color: #333;
        margin-bottom: 20px;
        margin-left: 10%;
      }

      #searchButton {
        display: block;
        margin: 0 auto;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      #searchButton:hover {
        background-color: #45a049;
      }

      #resultTable {
        margin-top: 20px;
        width: 100%;
      }
    </style>
  </head>
  <body>

  
  <div class="container">
      <h1>Búsqueda de Resultados</h1>
      <input type="number" id="searchInput" placeholder="Ingrese un número">
      <button id="searchButton">Buscar</button>
      <table class="table" id="resultTable" style="display: none;">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Número de Documento</th>
            <th scope="col">Nombre</th>
            <th scope="col">Teléfono</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');
    const resultTable = document.getElementById('resultTable');
    const tableBody = resultTable.getElementsByTagName('tbody')[0];

    searchButton.addEventListener('click', function() {
        const searchValue = searchInput.value.trim();
        if (searchValue) {
            fetchData(searchValue);
        } else {
            alert('Por favor, ingrese un número de documento para buscar.');
        }
    });

    function fetchData(searchValue) {
        // Mostrar un indicador de carga
        tableBody.innerHTML = '<tr><td colspan="4" class="text-center">Cargando...</td></tr>';
        resultTable.style.display = 'table';


        fetch(`buscar_documentos.php?searchValue=${encodeURIComponent(searchValue)}`)
        
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Documento encontrado
                    tableBody.innerHTML = `
                        <tr>
                            <th scope="row">${data.data.id}</th>
                            <td>${data.data.num_id}</td>
                            <td>${data.data.nombre}</td>
                            <td>${data.data.telefono}</td>
                        </tr>
                    `;
                } else {
                    // Documento no encontrado
                    tableBody.innerHTML = '<tr><td colspan="4" class="text-center">' + data.message + '</td></tr>';
                }
        })
      
            .catch(error => {
                console.error('Error al obtener los datos:', error);
                tableBody.innerHTML = `<tr><td colspan="4" class="text-center text-danger">Error al cargar los datos: ${error.message}</td></tr>`;
            });
    }
});
  </script>
</body>
</html>
