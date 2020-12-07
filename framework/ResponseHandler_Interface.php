<?php

namespace Framework;

interface ResponseHandler_Interface {

    public function giveHeader() : ResponseHandler;

    public function giveState() : ResponseState;

    public function giveLogger() : ResponseLogger;

}