<?php
class sfWkHtml {
	static public function create($type = 'pdf', $binary = null, $options = array()) {
		$type = strtolower($type);
		
		if ( $type == 'pdf' ) {
			$config = sfConfig::get('app_sfWkHtmlToPdf_pdf', array('binary' => null, 'options' => array()));
			return new WkHtmlToPdf\Pdf(is_null($binary) ? $config['binary'] : $binary, $options + $config['options']);
		} else if ( $type == 'image' ) {
			$config = sfConfig::get('app_sfWkHtmlToPdf_image', array('binary' => null, 'options' => array()));
			return new WkHtmlToPdf\Image(is_null($binary) ? $config['binary'] : $binary, $options + $config['options']);
		}
		
		throw new sfException(sprintf('Wrong type \'%s\'.', $type));
	}
}