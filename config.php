<?php

use lib\Config;

include 'moodlequery/config.php'; 

// DB Config
Config::write('db.host', 'localhost');
Config::write('db.port', '');
Config::write('db.basename', 'ls26upgradetest');
Config::write('db.user', 'root');
Config::write('db.password', 'root');

Config::write('moodle.config', $CFG);

Config::write('site.root', 'http://localhost:8888/learningspace-26');

// Project Config
Config::write('path', 'http://localhost:8888/rdrctr');