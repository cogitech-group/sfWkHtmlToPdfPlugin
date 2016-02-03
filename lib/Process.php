<?php
namespace WkHtmlToPdf;

class Process {
	private $output;
	private $exitCode;
	private $commandline = null;
	
	public static $exitCodes = array(
	    0 => 'OK',
	    1 => 'General error',
	    2 => 'Misuse of shell builtins',
	    126 => 'Invoked command cannot execute',
	    127 => 'Command not found',
	    128 => 'Invalid exit argument',
	    // signals
	    129 => 'Hangup',
	    130 => 'Interrupt',
	    131 => 'Quit and dump core',
	    132 => 'Illegal instruction',
	    133 => 'Trace/breakpoint trap',
	    134 => 'Process aborted',
	    135 => 'Bus error: "access to undefined portion of memory object"',
	    136 => 'Floating point exception: "erroneous arithmetic operation"',
	    137 => 'Kill (terminate immediately)',
	    138 => 'User-defined 1',
	    139 => 'Segmentation violation',
	    140 => 'User-defined 2',
	    141 => 'Write to pipe with no one reading',
	    142 => 'Signal raised by alarm',
	    143 => 'Termination (request to terminate)',
	    // 144 - not defined
	    145 => 'Child process terminated, stopped (or continued*)',
	    146 => 'Continue if stopped',
	    147 => 'Stop executing temporarily',
	    148 => 'Terminal stop signal',
	    149 => 'Background process attempting to read from tty ("in")',
	    150 => 'Background process attempting to write to tty ("out")',
	    151 => 'Urgent data available on socket',
	    152 => 'CPU time limit exceeded',
	    153 => 'File size limit exceeded',
	    154 => 'Signal raised by timer counting virtual time: "virtual timer expired"',
	    155 => 'Profiling timer expired',
	    // 156 - not defined
	    157 => 'Pollable event',
	    // 158 - not defined
	    159 => 'Bad syscall',
	);
	
	
	public function __construct($cmd) {
		$this->commandline = $cmd;
	}
	
	public function run()
	{
		exec($this->commandline, $this->output, $this->exitCode);
	}
	
	public function setTimeout($value) {
		return false;
	}
	
	public function getExitCode() {
		return $this->exitCode;
	}
	
	public function getOutput() {
		return is_array($this->output) ? trim(implode(';', $this->output), ';') : $this->output;
	}
	
	public function getErrorOutput() {
		return isset(self::$exitCodes[$this->getExitCode()]) ? self::$exitCodes[$this->getExitCode()] : '';
	}
}