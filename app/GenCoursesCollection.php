<?php

namespace Framework;

use Framework\GenCollection_Abstract;

class GenCoursesCollection extends GenCollection_Abstract
{
    public function targetClass(): string
    {
        return Courses::class;
    }
}