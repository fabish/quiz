$(document).ready(function (){
    $('#levels').jtable({
        title : 'JTable de levels',
        paging: true, //Paginacion de la tabla es verdadera
        pageSize: 3,//Nos muestra el numero de registros
        sorting: true,//Ordenamiento de registros
        defaultSorting: 'pkLevel ASC',//Manera de ordenar
        actions: {
            listAction:'./controllers/acciones2.php?action=list',
        },
        fields:{
            pkLevel:{
                title:'pkLevel',
                key:true,
                create:false,
                edit:false,
                list:true
            },
            level:{
                title:'level',
                width:'10%'
            },
            timeLevel:{
                title:'timeLevel',
                width:'10%',
                type:'date',
                create:false,
                edit:false
            }
        }

    });
    //Load person list from server
    $('#levels').jtable('load');
})