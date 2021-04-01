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
                "width": "10",
                "targets":1,  
                "orderable":false,  
                "class":"text-center" 
            }, 
            {  
                "targets":2,  
                "orderable":false, 
                "class":"no-wrap" 
            },
            {  
                "targets":3,  
                "width": "150"
            },
            {  
                "targets":6,  
                "class":"text-center" 
            },
            // {  
            //     "targets":6,  
            //     "class":"text-center" 
            // },
            {  
                "targets":7,  
                "class":"text-center" 
            },
            {  
                "targets":8,  
                "class":"text-center" 
            },
            {  
                "targets":9,  
                "class":"text-left" 
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
                "targets":12,  
                "class":"text-center" 
            },
            {  
                "targets":13,  
                "class":"text-center" 
            },
            {  
                "targets":14,  
                "class":"text-center" 
            },
            {  
                "targets":15,  
                "class":"text-center" 
            },
            {  
                "targets":16,  
                "class":"text-center" 
            },
            {  
                "targets":17,  
                "class":"text-left" 
            },
            {  
                "targets":18,  
                "class":"text-right" 
            }
        ],  
        "pageLength": 10
    }).on('draw.dt', function () {
        cekChangePage();
        activeIcheck();
    });
}
