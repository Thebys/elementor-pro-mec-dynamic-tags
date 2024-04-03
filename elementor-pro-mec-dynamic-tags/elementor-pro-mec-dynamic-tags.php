<?php

/**
 * Plugin Name: Elementor Pro - MEC Event Dynamic Tags
 * Description: This plugin adds Elementor Pro Dynamic Tags for single MEC Event. Ideal for using ME Calendar to manage events and using Elementor to display them. Beware - This plugin overrides MEC single event template when active to allow for native Elementor Template.
 * Version:     1.1.0
 * Author:      Tomáš Biheler
 * Author URI:  https://biheler.eu
 *
 * Requires Plugins: elementor,elementor-pro,modern-events-calendar-lite
 * Elementor tested up to: 3.20.0
 * Elementor Pro tested up to: 3.20.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Register Dynamic Fields based on MEC event.
 *
 * Include dynamic tag file and register tag class.
 *
 * @since 1.0.0
 * @param \Elementor\Core\DynamicTags\Manager $dynamic_tags_manager Elementor dynamic tags manager.
 * @return void
 */
function elmedyta_register_mec_event_dynamic_tags($dynamic_tags_manager)
{
    require_once(__DIR__ . '/dynamic-tags/mec-event-tags.php');

    $dynamic_tags_manager->register(new Elementor_Dynamic_Tag_MEC_Event_Name());
    $dynamic_tags_manager->register(new Elementor_Dynamic_Tag_MEC_Event_Location_Name());
    $dynamic_tags_manager->register(new Elementor_Dynamic_Tag_MEC_Event_Location_Address());
    $dynamic_tags_manager->register(new Elementor_Dynamic_Tag_MEC_Event_Organizer_Name());
    $dynamic_tags_manager->register(new Elementor_Dynamic_Tag_MEC_Event_Organizer_Website());
    $dynamic_tags_manager->register(new Elementor_Dynamic_Tag_MEC_Event_Cost());
    $dynamic_tags_manager->register(new Elementor_Dynamic_Tag_MEC_Event_Start_Date());
    $dynamic_tags_manager->register(new Elementor_Dynamic_Tag_MEC_Event_Start_Time());
    $dynamic_tags_manager->register(new Elementor_Dynamic_Tag_MEC_Event_End_Date());
    $dynamic_tags_manager->register(new Elementor_Dynamic_Tag_MEC_Event_End_Time());
}
add_action('elementor/dynamic_tags/register', 'elmedyta_register_mec_event_dynamic_tags');

/**
 * Register new dynamic tag group
 *
 * @since 1.0.0
 * @param \Elementor\Core\DynamicTags\Manager $dynamic_tags_manager Elementor dynamic tags manager.
 * @return void
 */
function elmedyta_register_new_dynamic_tag_group($dynamic_tags_manager)
{

    $dynamic_tags_manager->register_group(
        'mec-event',
        [
            'title' => 'MEC Event'
        ]
    );
}
add_action('elementor/dynamic_tags/register', 'elmedyta_register_new_dynamic_tag_group');


/* Override MEC template to allow native Elementor Template
    - Needs priority > 99 to work.
*/
function elmedyta_override_mec_template($template)
{
    if (is_singular('mec-events')) {
        // Path to the new template file within your plugin directory.
        $new_template = plugin_dir_path(__FILE__) . 'templates/single-mec-events.php';
        if (file_exists($new_template)) {
            return $new_template;
        }
    }
    return $template;
}
add_filter('template_include', 'elmedyta_override_mec_template', 101);
