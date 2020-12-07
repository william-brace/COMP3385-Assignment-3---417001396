<?php

namespace Framework;

interface Observer_Interface 
{
    public function update(Observable_Model $observable);
}