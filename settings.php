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
 * @package    block_miro_web_bot
 * @copyright  2020 - 2022 Université de Perpignan (https://www.univ-perp.fr)
 * @author     Samuel Calegari <samuel.calegari@univ-perp.fr>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $settings->add(
        new admin_setting_configtext(
            'block_miro_web_bot/bearer',
            get_string('bearer', 'block_miro_web_bot'),
            get_string('config_bearer', 'block_miro_web_bot'),
            ''
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            'block_miro_web_bot/show_btn',
            get_string('show_btn', 'block_miro_web_bot'),
            get_string('config_show_btn', 'block_miro_web_bot'),
            1
        )
    );

    $settings->add(
        new  admin_setting_configtextarea(
            'block_miro_web_bot/btn_content',
            get_string('btn_content', 'block_miro_web_bot'),
            get_string('config_btn_content', 'block_miro_web_bot'),
            ''
        )
    );

    $settings->add(
        new  admin_setting_configtextarea(
            'block_miro_web_bot/btn_style',
            get_string('btn_style', 'block_miro_web_bot'),
            get_string('config_btn_style', 'block_miro_web_bot'),
            ''
        )
    );
}
