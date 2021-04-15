var protocol = window.location.protocol;
var host = window.location.hostname;

function showDataTable(link) {
    $("#data_barang_jasa").DataTable({
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
                "targets":0,  
                "width": "10",
                "orderable":false,  
                "class":"text-center" 
            }, 
            {  
                "targets":1,  
                "width": "10",
                "orderable":false,  
                "class":"text-center" 
            }, 
            {  
                "targets":2,  
                "width": "25",
                "class":"text-center" 
            },
            {  
                "targets":3,  
                "width": "50",
                "class":"text-center" 
            },
            {  
                "targets":4,  
                "width": "100"
            },
            {  
                "targets":5,  
                "width": "100"
            },
            {  
                "targets":6,  
                "width": "75"
            },
            {  
                "targets":7,  
                "width": "50",
                "class":"text-center" 
            },
            {  
                "targets":8,  
                "class":"text-right" 
            },
            {  
                "targets":9,  
                "class":"text-right" 
            }, 
            {  
                "targets":10,  
                "class":"text-right" 
            },
            {  
                "targets":11,  
                "class":"text-center" 
            }
        ],  
        "pageLength": 10
    }).on('draw.dt', function () {
        cekChangePage();
        activeIcheck();
    });
}
