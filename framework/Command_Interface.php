<?php

namespace Framework;

interface Command_Interface {
    public function execute(CommandContext $context) : bool;
}