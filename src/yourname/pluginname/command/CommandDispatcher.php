<?php

/**
 * CommandDispatcher.php – DevelopmentHelperSkeleton
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

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use yourname\pluginname\Main;

class CommandDispatcher implements CommandExecutor {

	/** @var Main */
	private $plugin;

	/** @var DispatchableCommand[] */
	private $dispatchables;

	/**
	 * Fallback prefix for all commands in this plugin
	 *
	 * @var string
	 */
	protected $fallbackPrefix = "test";

	public function __construct(Main $plugin) {
		$this->plugin = $plugin;

		$this->loadCommands();
	}

	public function getPlugin() : Main {
		return $this->plugin;
	}

	/**
	 * Load the plugins commands from the list
	 */
	protected function loadCommands() {
		$commands = json_decode(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "resources" . DIRECTORY_SEPARATOR . "commands_list.json"));
		foreach($commands as $namespace) {
			if(class_exists($namespace)) {
				/** @var $dispatchable DispatchableCommand */
				$this->registerCommand($dispatchable = new $namespace($this), new PluginCommand($dispatchable->getName(), $this->getPlugin()));
			} else {
				// TODO: Handle unknown command errors
				$this->getPlugin()->getLogger()->debug("failed to load command with namespace '{$namespace}'");
			}
		}
	}

	/**
	 * Register a pocketmine command from a dispatchable
	 *
	 * @param DispatchableCommand $dispatchable
	 * @param PluginCommand $command
	 */
	protected function registerCommand(DispatchableCommand $dispatchable, PluginCommand $command) {
		$command->setExecutor($this);
		$command->setDescription($dispatchable->getDescription());
		$command->setUsage($dispatchable->getUsage());
		$command->setAliases($dispatchable->getAliases());
		$this->dispatchables[strtolower($command->getName())] = $dispatchable;
		$this->getPlugin()->getServer()->getCommandMap()->register($this->fallbackPrefix, $command);
	}

	/**
	 * Look for the executed command in the list of dispatchable commands
	 *
	 * @param CommandSender $sender
	 * @param Command $command
	 * @param string $label
	 * @param array $args
	 *
	 * @return bool
	 */
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {
		if(isset($this->dispatchables[$name = strtolower($command->getName())])) {
			return $this->dispatchables[$name]->dispatch($sender, $label, $args);
		}

		return false; // TODO: Handle unknown command dispatch
	}
}