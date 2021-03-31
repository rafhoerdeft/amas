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
