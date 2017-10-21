<?php

/**
 * DispatchableCommand.php – DevelopmentHelperSkeleton
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