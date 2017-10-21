<?php

namespace yourname\pluginname\command;

use pocketmine\command\CommandSender;

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