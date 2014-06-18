<?php
//cli-config.php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once 'bootstrap.php';

// Om via de CL 'SchemaTool' van Doctrine de tabellen van de database te kunnen laten genereren
return ConsoleRunner::createHelperSet($mgr);

