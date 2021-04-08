function hapusDataAll(data) {
	var dataid      = data.dataid;
	var link        = data.link;
	var table       = data.table;
	var csrf_name   = data.csrfname;
    var csrf_code   = data.csrfcode;
	
	swal({
		title: "Hapus Data",
		text: "Apakah data ingin dihapus?",
		icon: "warning",
		showCancelButton: true,
		buttons: {
			cancel: {
				text: "Batal",
				value: null,
				visible: true,
				className: "btn-warning",
				closeModal: true,
			},
			confirm: {
				text: "Ya, Hapus",
				value: true,
				visible: true,
				className: "btn-danger",
				closeModal: false,
			},
		},
	}).then((isConfirm) => {
		if (isConfirm) {
			$.post(
				link,
				{
                    table: table,
					dataid: dataid,
					[csrf_name]: csrf_code,
				},
				function (data) {
					if (data == "Success") {
						location.reload();
					} else {
						location.reload();
					}
				}
			);
			// swal("Deleted!", id, "success");
		}
	});
}

function pilihBarang(data, type) {
	let id = $(data).val();
	
	if (id == 0) {
		if(type=='ifChecked'){
			$('.skin-check input:checkbox').iCheck('check');
		} else {
			$('.skin-check input:checkbox').iCheck('uncheck');
		}
	} else {
		var select_id  = $('#delete_all').val();
		var value_id   = '';

		if(type=='ifChecked'){
			if (select_id == '') {
				value_id  = id;
				$('#btn_delete').attr('disabled',false);
			} else {
				value_id += select_id + ';' + id;
			}
		} else {
			var arr = select_id.split(";");
			var result = arr.filter(function(val){
				return val != id; 
			});
			value_id = result.join(';');

			if (result.length == 0) {
				$('#btn_delete').attr('disabled',true);
			}
		}
		$('#delete_all').val(value_id);
	}
}
