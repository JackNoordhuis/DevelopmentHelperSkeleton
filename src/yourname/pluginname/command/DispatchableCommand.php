<?php

namespace yourname\pluginname\command;

use pocketmine\command\CommandSender;

abstract class DispatchableCommand {

	/**
	 * Name of the command
	 *
	 * @var string
	 */
	protected $name = "unknown";

	/**
	 * Description of the command
	 *
	 * @var string
	 */
	protected $description = "unknown command";

	/**
	 * Usage of the command
	 *
	 * @var string
	 */
	protected $usage = "/unknown";

	/**
	 * Aliases for the command
	 *
	 * @var array
	 */
	protected $aliases = [];

	/** @var CommandDispatcher */
	protected $dispatcher;

	public function __construct(CommandDispatcher $dispatcher) {
		$this->dispatcher = $dispatcher;
	}

	public function getDispatcher() : CommandDispatcher {
		return $this->dispatcher;
	}

	/**
	 * Run the command
	 *
	 * @param CommandSender $sender Executor of the command
	 * @param string $label         Label/alias used to execute the command
	 * @param array $args           Arguments sent with the command
	 *
	 * @return bool
	 */
	abstract public function dispatch(CommandSender $sender, string $label, array $args) : bool;

	public function getName() : string {
		return $this->name;
	}

	public function getDescription() : string {
		return $this->description;
	}

	public function getUsage() : string {
		return $this->usage;
	}

	/**
	 * @return string[]
	 */
	public function getAliases() : array {
		return $this->aliases;
	}

}