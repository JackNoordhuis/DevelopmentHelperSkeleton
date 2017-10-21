<?php

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