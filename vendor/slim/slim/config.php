<?php

use lib\Config;

// DB Config
Config::write('db.host', 'localhost');
Config::write('db.port', '');
Config::write('db.basename', 'ls26upgradetest');
Config::write('db.user', 'root');
Config::write('db.password', 'root');

// Project Config
Config::write('path', 'http://localhost:8888/rdrctr/vendor/slim/slim');