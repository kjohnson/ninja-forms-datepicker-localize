<?php if ( ! defined( 'ABSPATH' ) ) exit;

/*
Plugin Name: Ninja Forms - Datepicker Localize
Plugin URI: http://ninjaforms.com/
Description: Set defaults for the jQuery UI Datepicker in Ninja Forms
Version: 0.0.1
Author: Kyle B. Johnson
Author URI: http://kylebjohnson.me

Copyright (c) 2015 The WP Ninjas/Kyle B. Johnson

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

class NF_Datepicker_Localize
{
    public $file_name;

    private $locale;

    public function __construct()
    {
        $this->locale = get_locale();
        add_action( 'ninja_forms_display_js', array( $this, 'localize' ), 8 );
    }

    public function localize()
    {
        switch( $this->locale ) {
            case 'de_DE':
                $this->file_name = 'ninja-forms-datepicker-localize-de_DE.js';
                break;
            case 'en_US':
                $this->file_name = 'ninja-forms-datepicker-localize-en_US.js';
                break;
            default:
                //TODO: Add debug message if localization is not found.
                return;
        }

        wp_enqueue_script(
            'nf-datepicker-localize',
            plugin_dir_url(__FILE__) . 'js/' . $this->file_name,
            array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker')
        );
    }
}

new NF_Datepicker_Localize();
