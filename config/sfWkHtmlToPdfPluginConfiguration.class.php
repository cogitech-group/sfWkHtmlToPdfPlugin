<?php
/**
 * sfWkHtmlToPdfPlugin configuration.
 * 
 * @package     sfWkHtmlToPdfPlugin
 * @subpackage  config
 * @author      cogitech
 */
class sfWkHtmlToPdfPluginConfiguration extends sfPluginConfiguration
{
  const VERSION = '1.0.0';

  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
  	  $knp_dir = __DIR__ . '/../lib/vendor/knp-snappy/';
  	  
  	  require_once(__DIR__ . '/../lib/Process.php');
  	  require_once($knp_dir . 'GeneratorInterface.php');
  	  require_once($knp_dir . 'AbstractGenerator.php');
  	  require_once($knp_dir . 'Image.php');
  	  require_once($knp_dir . 'Pdf.php');
  }
}


