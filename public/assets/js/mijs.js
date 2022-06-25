// DataTable: paginacion, busqueda y ordenar
$(document).ready(function () {
    $('#tabla_users').DataTable({
        language: {
            lengthMenu: 'Mostrar _MENU_ registros',
            zeroRecords: 'No se encuentran registros',
            info: 'Mostrando página _PAGE_ de _PAGES_',
            infoEmpty: '',
            infoFiltered: '(filtrado de un total de _MAX_ registros)',
            sSearch: 'Buscar',
            oPaginate: {
                sFirst: 'Primera',
                sLast: 'Última',
                sNext: 'Siguiente',
                sPrevious: 'Anterior'
            },
            sProcessing: 'Procesando...',
        },
    });
});



// Buscador de productos

//Variables
contenedor = document.getElementById("contenedor-buscador");
buscador = document.getElementById("buscador");
lupita = document.getElementById("search");
resultado = document.getElementById("resultado");
fondo = document.getElementById("cover");

//Ejecutar funciones
document.getElementById("buscador").addEventListener("click", mostrar_cover);
document.getElementById("cover").addEventListener("click", ocultar_buscador);
document.getElementById("search").addEventListener("click", mostrar_cover);

//Funcion para activar cover
function mostrar_cover(){
    fondo.style.display = "block";
    resultado.style.display = "block";
    buscador.focus();
}

//Funcion para ocultar el buscador
function ocultar_buscador(){
    fondo.style.display = "none";
    resultado.style.display = "none";
    buscador.value = "";
    resultado.innerHTML = "";
}