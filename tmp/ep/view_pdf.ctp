<?php 

	// create new PDF document 
	//tcpdf loaded via Composer from https://packagist.org/packages/tecnick.com/tcpdf 
	$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true); 

	// set document header information. This appears at the top of each page of the PDF document 
	$pdf->SetHeaderData('', '',"Client Form", ''); 

	// set header and footer fonts 
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', 20)); 
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); 

	// set default monospaced font 
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED,'', 12); 

	//set margins 
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT); 
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER); 
	$pdf->SetFooterMargin(10); 
	$pdf->SetTopMargin(15);

	//set auto page breaks 
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 

	//set image scale factor 
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 

	// add a page 
	$pdf->AddPage(); 

	$pdf->Ln(); 

	$pdf->SetFillColor(114, 155, 120); 

	//Column titles 
	$titles = array('Item Name','Item Description', 'somthing heading', 'Email', 'Tel', 'Height', 'Clothing Size', 'Shoe Size', 'Hair Colour', 'Eye Colour', 'How would you describe your body shape?','What sort of occasions are you looking for your clothes to suit? (please specify. E.g. Work/going out/weekend wear/dinner etc)', 'Are there any current trends you would like to emulate?', 'What brands/shops do you shop at currently?',
		'How would you describe your CURRENT style/image?', 'How would you describe your IDEAL style/image?', 'What frustrations do you have with your current wardrobe?', 'What concerns do you have about your body (if any)?',
			'What do you love best about your body and wardrobe?', 'Are there certain colours that make you feel good when you wear them?', 'Which colours do you try to avoid wearing?', 'Do you consider shopping to be a delight or a chore?',
				'What do you hope to achieve at the end of your consultation?', 'If you are going on the Shopping Trip, do you have a specific budget in mind?', 'How much would you say is a reasonable amount to spend on a Fashion Top?', 
				'How much would you say is a reasonable amount to spend on a Fashion Dress?', 'How much would you say is a reasonable amount to spend on a Fashion Jean?'); 
	$data = array($item->firstname, $user->lastname, $user->address, $user->email, $user->tel, $user->height, $user->clothing_size, $user->shoe_size, $user->hair_colour, $user->eye_colour, $user->body_shape, $user->occasion, $user->emulate, $user->brand, $user->current_look, $user->ideal_look, $user->frustrations, $user->concerns, $user->body_wardrobe, $user->liked_colours, $user->avoid_colours, $user->shopping_opinion, $user->hope, $user->budget, $user->fashion_top, $user->fashion_dress, $user->fashion_jean);
	$table= $this->PDF->ColouredTable($titles,$data); 

	$pdf->writeHTML($table, true, true, true,true,''); 
	ob_clean(); 

	//Close and output PDF document 
	$pdf->Output($user->firstname . '_' . $user->lastname . '.pdf', 'D'); 
	exit(); 
?>