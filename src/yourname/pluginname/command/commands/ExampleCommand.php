<?php

/**
 * ExampleCommand.php – DevelopmentHelperSkeleton
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

namespace yourname\pluginname\command\commands;

use pocketmine\command\CommandSender;
use yourname\pluginname\command\DispatchableCommand;

class ExampleCommand extends DispatchableCommand {

	/** @var string */
	protected $name = "example";

	/** @var string  */
	protected $description = "An example command";

	/**  @var string */
	protected $usage = "/example";

	/** @var array */
	protected $aliases = ["e"];

	public function dispatch(CommandSender $sender, string $label, array $args) : bool {
		$sender->sendMessage("Hello world!");
		return true;
	}

}