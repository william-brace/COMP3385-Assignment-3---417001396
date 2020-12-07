<?php 

namespace Framework;

interface Observable_Interface
{
    public function attach(Observer_Interface $observer);
    public function detach(Observer_Interface $observer);
    public function notify();
}