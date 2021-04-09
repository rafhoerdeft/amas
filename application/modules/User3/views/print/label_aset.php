<?php 
	
	// Panggil class PHPExcel nya
	$excel = new PHPExcel();

	// Settingan awal fil excel
	$excel->getProperties()->setCreator('DISKOMINFO')
							->setLastModifiedBy('Erdeft')
							->setTitle("Cetak Label Aset ".date('dmY'))
							->setSubject("Aset Diskominfo Kab. Magelang")
							->setDescription("Cetak Label Aset Diskominfo")
							->setKeywords("Cetak Label Aset");

	// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
	$style1 = array(
		'font' => array(
			'name'  => 'Arial',
	      	'bold' => TRUE,
	      	'size' => (9)
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
        ),
        'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		),
		// 'fill' => array(
        //     'type' => PHPExcel_Style_Fill::FILL_SOLID,
        //     'color' => array('rgb' => 'ffffff')
        // )
	);

    $style2 = array(
		'font' => array(
			'name'  => 'Arial',
	      	'bold' => FALSE,
	      	'size' => (8)
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
        ),
        'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			// 'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			// 'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		),
		// 'fill' => array(
        //     'type' => PHPExcel_Style_Fill::FILL_SOLID,
        //     'color' => array('rgb' => 'ffffff')
        // )
	);

    $style3 = array(
		'font' => array(
			'name'  => 'Arial',
	      	'bold' => FALSE,
	      	'size' => (8)
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
        ),
        'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			// 'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			// 'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		),
		// 'fill' => array(
        //     'type' => PHPExcel_Style_Fill::FILL_SOLID,
        //     'color' => array('rgb' => 'ffffff')
        // )
	);

    $style4 = array(
		'font' => array(
			'name'  => 'Arial',
	      	'bold' => FALSE,
	      	'size' => (6)
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
        ),
        'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		),
		// 'fill' => array(
        //     'type' => PHPExcel_Style_Fill::FILL_SOLID,
        //     'color' => array('rgb' => 'ffffff')
        // )
	);
	

	// BARIS HEADER
	// $excel->setActiveSheetIndex(0)->setCellValue('A'.$row_first, "NO");
	// $excel->setActiveSheetIndex(0)->getStyle('A'.$row_first)->getAlignment()->setWrapText(true);

	// $excel->setActiveSheetIndex(0)->setCellValue('B'.$row_first, "TANGGAL");
	// $excel->setActiveSheetIndex(0)->getStyle('B'.$row_first)->getAlignment()->setWrapText(true);

	// $excel->setActiveSheetIndex(0)->setCellValue('C'.$row_first, "RINCIAN SETORAN");
	// $excel->setActiveSheetIndex(0)->getStyle('C'.$row_first)->getAlignment()->setWrapText(true);

	// $excel->setActiveSheetIndex(0)->setCellValue('D'.$row_first, "JUMLAH (Rp)");
	// $excel->setActiveSheetIndex(0)->getStyle('D'.$row_first)->getAlignment()->setWrapText(true);

	// $excel->setActiveSheetIndex(0)->setCellValue('E'.$row_first, "SUB TOTAL (Rp)");
	// $excel->setActiveSheetIndex(0)->getStyle('E'.$row_first)->getAlignment()->setWrapText(true);

	// Apply style 
	// $excel->getActiveSheet()->getStyle('A'.$row_first)->applyFromArray($style_header1);
	// $excel->getActiveSheet()->getStyle('B'.$row_first)->applyFromArray($style_header1);
	// $excel->getActiveSheet()->getStyle('C'.$row_first)->applyFromArray($style_header1);
	// $excel->getActiveSheet()->getStyle('D'.$row_first)->applyFromArray($style_header1);
	// $excel->getActiveSheet()->getStyle('E'.$row_first)->applyFromArray($style_header2);

	// Set Repeat Header
	// $excel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1,4);

	// Set width kolom
	// $excel->getActiveSheet()->getColumnDimension('A')->setWidth(4.85);
	// $excel->getActiveSheet()->getColumnDimension('B')->setWidth(19);
	// $excel->getActiveSheet()->getColumnDimension('C')->setWidth(48.10);
	// $excel->getActiveSheet()->getColumnDimension('D')->setWidth(19.5);
	// $excel->getActiveSheet()->getColumnDimension('E')->setWidth(19.5);

	// $excel->getActiveSheet()->getRowDimension($row_first)->setRowHeight(36.5);


	// BARIS BODY / ISI DATA
    $row = 1;
    $row_merge_1 = 5;
    $row_merge_2 = 3;
    $space_row = 1;
	foreach ($dataAset as $val) { 
		$no++;

    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setName('Kode Aset');
        $objDrawing->setDescription('Kode Aset');
        $objDrawing->setPath(FCPATH.'assets/img/qrcode/'.$val->id_aset.'_code.png');
        $excel->getActiveSheet()->mergeCells('A'.$row.':A'.$row_merge_1);
        $objDrawing->setCoordinates('A'.$row);                      
        //setOffsetX works properly
        // $objDrawing->setOffsetX(12.5); 
        // $objDrawing->setOffsetY(5);                
        //set width, height
        $objDrawing->setWidth(70); 
        $objDrawing->setHeight(70); 
        $objDrawing->setWorksheet($excel->getActiveSheet());

        // =================================================

        $objDrawing->setName('Logo Kab Mgl');
        $objDrawing->setDescription('Logo Kab Mgl');
        $objDrawing->setPath(FCPATH.'assets/img/logo/logo_kab_lg.png');
        $excel->getActiveSheet()->mergeCells('B'.$row.':B'.$row_merge_1);
        $objDrawing->setCoordinates('B'.$row);                      
        //setOffsetX works properly
        // $objDrawing->setOffsetX(12.5); 
        // $objDrawing->setOffsetY(5);                
        //set width, height
        // $objDrawing->setWidth(70); 
        $objDrawing->setHeight(70); 
        $objDrawing->setWorksheet($excel->getActiveSheet());

        // $excel->getActiveSheet()->mergeCells('B'.$row.':B'.$row_merge_1);
		// $excel->setActiveSheetIndex(0)->setCellValue('B'.$row, $no);


		// Apply style
		$excel->getActiveSheet()->getStyle('A'.$row)->applyFromArray($style4);
		$excel->getActiveSheet()->getStyle('B'.$row)->applyFromArray($style4);
		// $excel->getActiveSheet()->getStyle('C'.$row)->applyFromArray($style_body4);
		// $excel->getActiveSheet()->getStyle('D'.$row)->applyFromArray($style_body6);
		// $excel->getActiveSheet()->getStyle('E'.$row)->applyFromArray($style_body6);

        $row         += $row_merge_1 + $space_row;
        $row_merge_1 += $row_merge_1 + $space_row;
        $row_merge_2 += $row_merge_1 + $space_row;
	}


	// $excel->getActiveSheet()->mergeCells('A'.$row.':D'.$row);
	// $excel->setActiveSheetIndex(0)->setCellValue('A'.$row, "JUMLAH TOTAL SETORAN");
	// $excel->getActiveSheet()->getStyle('A'.$row.':D'.$row)->applyFromArray($style_foot1);

	// // $excel->setActiveSheetIndex(0)->setCellValue('E'.$row, $tot_setor);
	// $excel->setActiveSheetIndex(0)->setCellValueExplicit('E'.$row, nominal($tot_setor), PHPExcel_Cell_DataType::TYPE_STRING);
	// $excel->getActiveSheet()->getStyle('E'.$row)->applyFromArray($style_foot2);

	// $excel->getActiveSheet()->getRowDimension($row)->setRowHeight(20);


	// $excel->getActiveSheet()->mergeCells('D'.$newRow7.':E'.$newRow7);
	// $excel->setActiveSheetIndex(0)->setCellValue('D'.$newRow7,"NIP. ".$kepalaDinas->nip);
	// $excel->getActiveSheet()->getStyle('D'.$newRow7)->getFont()->setName('Calibri');
	// $excel->getActiveSheet()->getStyle('D'.$newRow7)->getFont()->setSize(12);
	// $excel->getActiveSheet()->getStyle('D'.$newRow7)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	// // MENGETAHUI
	// 	$excel->getActiveSheet()->mergeCells('B'.$newRow1.':D'.$newRow1);
	// $excel->setActiveSheetIndex(0)->setCellValue('B'.$newRow1,"MENGETAHUI,");
	// $excel->getActiveSheet()->getStyle('B'.$newRow1)->getFont()->setName('Times New Roman');
	// $excel->getActiveSheet()->getStyle('B'.$newRow1)->getFont()->setSize(12);
	// $excel->getActiveSheet()->getStyle('B'.$newRow1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	// $excel->getActiveSheet()->mergeCells('B'.$newRow2.':D'.$newRow2);
	// $excel->setActiveSheetIndex(0)->setCellValue('B'.$newRow2,"KASIE PELAYANAN INFORMASI PUBLIK");
	// $excel->getActiveSheet()->getStyle('B'.$newRow2)->getFont()->setName('Times New Roman');
	// $excel->getActiveSheet()->getStyle('B'.$newRow2)->getFont()->setSize(12);
	// $excel->getActiveSheet()->getStyle('B'.$newRow2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


	// $excel->getActiveSheet()->mergeCells('B'.$newRow3.':D'.$newRow3);
	// $excel->setActiveSheetIndex(0)->setCellValue('B'.$newRow3,"KASTOLANI,S.Sos");
	// $excel->getActiveSheet()->getStyle('B'.$newRow3)->getFont()->setName('Times New Roman');
	// $excel->getActiveSheet()->getStyle('B'.$newRow3)->getFont()->setSize(12);
	// $excel->getActiveSheet()->getStyle('B'.$newRow3)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	// $excel->getActiveSheet()->mergeCells('B'.$newRow4.':D'.$newRow4);
	// $excel->setActiveSheetIndex(0)->setCellValue('B'.$newRow4,"NIP. 1966087 1986081001");
	// $excel->getActiveSheet()->getStyle('B'.$newRow4)->getFont()->setName('Times New Roman');
	// $excel->getActiveSheet()->getStyle('B'.$newRow4)->getFont()->setSize(12);
	// $excel->getActiveSheet()->getStyle('B'.$newRow4)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
	

	// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	// $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
	// Set orientasi kertas jadi PORTRAIT
	$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
	$excel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

	// Set Footer
	$excel->getActiveSheet()->getHeaderFooter()->setOddFooter('&R Halaman Ke-&P dari &N');
	$excel->getActiveSheet()->getHeaderFooter()->setEvenFooter('&R Halaman Ke-&P dari &N');

	// Set judul file excel nya
	$excel->getActiveSheet(0)->setTitle("Cetak Label Aset ".date('dmY'));
	$excel->setActiveSheetIndex(0);
	// Proses file excel
	ob_end_clean();
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename="Cetak Label Aset '.date('dmY').'.xlsx"'); // Set nama file excel nya
	header('Cache-Control: max-age=0');
	ob_end_clean();
	$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	$write->save('php://output');

 ?>