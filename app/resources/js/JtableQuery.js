$(document).ready(function (){
    $('#customers').jtable({
        title : 'JTable de customers',
        paging: true, //Paginacion de la tabla es verdadera
        pageSize: 5,//Nos muestra el numero de registros
        sorting: true,//Ordenamiento de registros
        defaultSorting: 'pkPhone ASC',//Manera de ordenar
        actions: {
            listAction:'./controllers/acciones.php?action=list',
        },
        fields:{
            pkPhone:{
                title:'Telefono',
                key:true,
                create:false,
                edit:false,
                list:true
            },
            name:{
             title:'Nombre del customer',
             width:'10%'
            },
            firstName:{
                title:'Apellido Paterno',
                width:'10%'
            },
            lastName:{
                title:'Apellido Materno',
                width:'10%'
            },
            level:{
                title:'Level',
                width:'10%'
            },
            timeCustomer:{
                title:'Fecha',
                width:'10%',
                type:'date',
                create:false,
                edit:false
            }
        }

    });
    //Load person list from server
    $('#customers').jtable('load');
})