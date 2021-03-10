var protocol = window.location.protocol;
var host = window.location.hostname;

function showDataTable(link) {
    $("#data_aset").DataTable({
        "processing": true,
        "serverSide": true,
        "searching": true,
        "scrollX": true,
        "order":[],  
        "ajax":{  
            "url": link,  
            "type": "POST"
        },  
        "columnDefs":[  
            {  
                "width": "10",
                "targets":0,  
                "orderable":false,  
                "class":"text-center" 
            }, 
            {  
                "targets":1,  
                "orderable":false, 
                "class":"no-wrap" 
            },
            {  
                "targets":2,  
                "width": "150"
            },
            {  
                "targets":5,  
                "class":"text-center" 
            }, 
            {  
                "targets":6,  
                "class":"text-center" 
            }, 
            {  
                "targets":7,  
                "class":"text-center" 
            },
            {  
                "targets":8,  
                "width": "150"
            },
            {  
                "targets":9,  
                "class":"text-center" 
            }, 
            {  
                "targets":10,  
                "class":"text-center" 
            }, 
            {  
                "targets":11,  
                "class":"text-center" 
            }, 
            {  
                "targets":13,  
                "class":"text-center" 
            }, 
            {  
                "targets":14,  
                "class":"text-right" 
            }
        ],  
        "pageLength": 10
    });
}
