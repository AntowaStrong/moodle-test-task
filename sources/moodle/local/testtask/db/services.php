<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Local plugin for test task.
 *
 * @package local_testtask
 */

defined('MOODLE_INTERNAL') || exit(0);

$functions = [
    'local_testtask_users' => [
        'classname'   => 'local_testtask_external',
        'methodname'  => 'get_users',
        'classpath'   => 'local/testtask/externallib.php',
        'description' => 'Get users list.',
        'type'        => 'read',
    ],
    'local_testtask_courses' => [
        'classname'   => 'local_testtask_external',
        'methodname'  => 'get_courses',
        'classpath'   => 'local/testtask/externallib.php',
        'description' => 'Get courses list.',
        'type'        => 'read',
    ],
    'local_testtask_grades' => [
        'classname'   => 'local_testtask_external',
        'methodname'  => 'get_grades',
        'classpath'   => 'local/testtask/externallib.php',
        'description' => 'Get ratings of enrolled users.',
        'type'        => 'read',
    ]
];

$services = [
    'TestTask Service' => [
        'functions' => [
            'local_testtask_users',
            'local_testtask_courses',
            'local_testtask_grades'
        ],
        'enabled' => 1,
        'restrictedusers' => 0,
        'requiredcapability' => '',
    ]
];