<?php

namespace yourname\pluginname;

use pocketmine\plugin\PluginBase;
use yourname\pluginname\command\CommandDispatcher;

class Main extends PluginBase {

	/** @var CommandDispatcher */
	protected $commandDispatcher;

	public function onEnable() {
		$this->commandDispatcher = new CommandDispatcher($this);
	}

}