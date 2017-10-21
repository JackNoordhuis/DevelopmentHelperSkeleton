<?php

/**
 * Main.php – DevelopmentHelperSkeleton
 *
 * Copyright (C) 2015-2017 Jack Noordhuis
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author Jack Noordhuis
 *
 */

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