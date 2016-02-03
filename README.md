# sfWkHtmlToPdfPlugin

sfWkHtmlToPdfPlugin is a symfony 1.4 plugin allowing thumbnail, snapshot or PDF generation from a url or a html page.
It uses the excellent webkit-based [wkhtmltopdf and wkhtmltoimage](http://wkhtmltopdf.org/)
available on OSX, linux, windows and is based on [KnpLabs/snappy](https://github.com/KnpLabs/snappy) library.

## Installation 

1. Download and install wkhtmltopdf and/or wkhtmltoimage in your system.
2. Configure path to executable files of wkhtmltopdf and wkhtmltoimage in `config/app.yml` directory of this plugin 
- this can be set in run-time script (optional)
3. Enable plugin in project configuration file `config/ProjectConfiguration.class.php`

```php
class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
  		// ...
		$this->enablePlugins('sfWkHtmlToPdfPlugin');
  }
}
```

## Usage
```php
// PDF examples
$pdf = sfWkHtml::create('pdf');

// Set binary path (this can be pass as a second argument of sfWkHtml::create method
$pdf->setBinary('/usr/local/bin/wkhtmltopdf'); // this is default path set in config/app.yml

// Set other options
// Type wkhtmltopdf -H to see the list of options
$pdf->setOption('disable-javascript', true);
$pdf->setOption('no-background', true);
$pdf->setOption('allow', array('/path1', '/path2'));
$pdf->setOption('cookie', array('key' => 'value', 'key2' => 'value2'));
$pdf->setOption('cover', 'pathToCover.html');
// .. or pass a cover as html
$pdf->setOption('cover', '<h1>Bill cover</h1>');
$pdf->setOption('toc', true);
$pdf->setOption('cache-dir', '/path/to/cache/dir');

// Generate PDF from string
$pdf->generateFromHtml('<h1>Hello World</h1><p>Lorem ipsum.</p>', '/tmp/hello-world.pdf');

// Image examples
$image = sfWkHtml::create('image');
$image->generateFromHtml('<h1>Hello World</h1><p>Lorem ipsum.</p>', '/tmp/hello-world.jpg');
```
