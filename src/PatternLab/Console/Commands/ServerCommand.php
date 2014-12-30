<?php

/*!
 * Console Server Command Class
 *
 * Copyright (c) 2014 Dave Olsen, http://dmolsen.com
 * Licensed under the MIT license
 *
 */

namespace PatternLab\Console\Commands;

use \PatternLab\Config;
use \PatternLab\Console;
use \PatternLab\Console\Command;
use \PatternLab\Timer;

class ServerCommand extends Command {
	
	public function __construct() {
		
		parent::__construct();
		
		$this->command = "server";
		
		Console::setCommand($this->command,"Start the PHP-based server","The server command will start PHP's web server for you.","s");
		
	}
	
	public function run() {
		
		// set-up defaults
		$publicDir = Config::getOption("publicDir");
		$coreDir   = Config::getOption("coreDir");
		
		Console::writeInfo("server started on localhost:8080. use ctrl+c to exit...");
		passthru("cd ".$publicDir." && ".$_SERVER["_"]." -S localhost:8080 ".$coreDir."/server/router.php");
		
	}
	
}