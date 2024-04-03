<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Elementor_Dynamic_Tag_MEC_Event_Name extends \Elementor\Core\DynamicTags\Tag
{
    public function get_name()
    {
        return 'mec-event-name';
    }

    public function get_title()
    {
        return 'Event Name';
    }

    public function get_group()
    {
        return 'mec-event';
    }

    public function get_categories()
    {
        return ['text'];
    }

    public function render()
    {
        global $post;
        if (is_singular(['mec-events', 'mec_esb'])) {
            $eventID = $post->ID;
            echo $post->post_title;
        } else {
            return;
        }
    }
}


class Elementor_Dynamic_Tag_MEC_Event_Location_Name extends \Elementor\Core\DynamicTags\Tag
{
    public function get_name()
    {
        return 'mec-event-location-name';
    }

    public function get_title()
    {
        return 'Location Name';
    }

    public function get_group()
    {
        return 'mec-event';
    }

    public function get_categories()
    {
        return ['text'];
    }
    public function render()
    {
        global $post;
        if (is_singular(['mec-events', 'mec_esb'])) { // Check if it's a single event page.
            $eventID = $post->ID; // This is your event ID.
            $locationTermId = get_post_meta($eventID, 'mec_location_id', true);
            $locationTerm = get_term($locationTermId, 'mec_location');
            echo $locationTerm->name;
        } else {
            return;
        }
    }
}

class Elementor_Dynamic_Tag_MEC_Event_Location_Address extends \Elementor\Core\DynamicTags\Tag
{
    public function get_name()
    {
        return 'mec-event-location-address';
    }

    public function get_title()
    {
        return 'Location Address';
    }

    public function get_group()
    {
        return 'mec-event';
    }

    public function get_categories()
    {
        return ['text'];
    }
    public function render()
    {
        global $post;
        if (is_singular(['mec-events', 'mec_esb'])) {
            $eventID = $post->ID;
            $locationTermId = get_post_meta($eventID, 'mec_location_id', true);
            $addressTermMeta = get_term_meta($locationTermId, 'address', true);
            echo $addressTermMeta;
        } else {
            return;
        }
    }
}
class Elementor_Dynamic_Tag_MEC_Event_Organizer_Name extends \Elementor\Core\DynamicTags\Tag
{
    public function get_name()
    {
        return 'mec-event-organizer-name';
    }
    public function get_title()
    {
        return 'Organizer Name';
    }
    public function get_group()
    {
        return 'mec-event';
    }
    public function get_categories()
    {
        return ['text'];
    }
    public function render()
    {
        global $post;
        if (is_singular(['mec-events', 'mec_esb'])) {
            $organizerTermId = get_post_meta($post->ID, 'mec_organizer_id', true);
            $organizerTerm = get_term($organizerTermId);
            echo $organizerTerm->name;
        } else {
            return;
        }
    }
}
class Elementor_Dynamic_Tag_MEC_Event_Organizer_Website extends \Elementor\Core\DynamicTags\Tag
{
    public function get_name()
    {
        return 'mec-event-organizer-website';
    }
    public function get_title()
    {
        return 'Organizer Website';
    }
    public function get_group()
    {
        return 'mec-event';
    }
    public function get_categories()
    {
        return ['text', 'url'];
    }
    public function render()
    {
        global $post;
        if (is_singular(['mec-events', 'mec_esb'])) {
            $organizerTermId = get_post_meta($post->ID, 'mec_organizer_id', true);
            $website = get_term_meta($organizerTermId, 'url', true);
            echo $website;
        } else {
            return;
        }
    }
}
class Elementor_Dynamic_Tag_MEC_Event_Cost extends \Elementor\Core\DynamicTags\Tag
{
    public function get_name()
    {
        return 'mec-event-cost';
    }
    public function get_title()
    {
        return 'Event Cost';
    }
    public function get_group()
    {
        return 'mec-event';
    }
    public function get_categories()
    {
        return ['text'];
    }
    public function render()
    {
        global $post;
        if (is_singular(['mec-events', 'mec_esb'])) {
            $cost = get_post_meta($post->ID, 'mec_cost', true);
            echo $cost;
        } else {
            return;
        }
    }
}
class Elementor_Dynamic_Tag_MEC_Event_Start_Date extends \Elementor\Core\DynamicTags\Tag
{
    public function get_name()
    {
        return 'mec-event-start-date';
    }
    public function get_title()
    {
        return 'Event Start Date';
    }
    public function get_group()
    {
        return 'mec-event';
    }
    public function get_categories()
    {
        return ['text'];
    }
    public function render()
    {
        global $post;
        if (is_singular(['mec-events', 'mec_esb'])) {
            global $wpdb;
            $table_name = $wpdb->prefix . 'mec_events';
            $query = $wpdb->prepare("SELECT start FROM $table_name WHERE post_id = %d", $post->ID);
            $start_date = $wpdb->get_var($query);
            $date_format = get_option('date_format');
            echo date($date_format, strtotime($start_date));
        } else {
            return;
        }
    }
}
class Elementor_Dynamic_Tag_MEC_Event_End_Date extends \Elementor\Core\DynamicTags\Tag
{
    public function get_name()
    {
        return 'mec-event-end-date';
    }
    public function get_title()
    {
        return 'Event End Date';
    }
    public function get_group()
    {
        return 'mec-event';
    }
    public function get_categories()
    {
        return ['text'];
    }
    public function render()
    {
        global $post;
        if (is_singular(['mec-events', 'mec_esb'])) {
            global $wpdb;
            $table_name = $wpdb->prefix . 'mec_events';
            $query = $wpdb->prepare("SELECT end FROM $table_name WHERE post_id = %d", $post->ID);
            $end_date = $wpdb->get_var($query);
            $date_format = get_option('date_format');
            echo date($date_format, strtotime($end_date));
        } else {
            return;
        }
    }
}
class Elementor_Dynamic_Tag_MEC_Event_Start_Time extends \Elementor\Core\DynamicTags\Tag
{
    public function get_name()
    {
        return 'mec-event-start-time';
    }
    public function get_title()
    {
        return 'Event Start Time';
    }
    public function get_group()
    {
        return 'mec-event';
    }
    public function get_categories()
    {
        return ['text'];
    }
    public function render()
    {
        global $post;
        if (is_singular(['mec-events', 'mec_esb'])) {
            global $wpdb;
            $table_name = $wpdb->prefix . 'mec_events';
            $query = $wpdb->prepare("SELECT time_start FROM $table_name WHERE post_id = %d", $post->ID);
            $start_time_seconds = $wpdb->get_var($query);
            $time_format = get_option('time_format');
            $datetime = new DateTime();
            $datetime->setTimestamp($start_time_seconds);
            echo $datetime->format($time_format);
        } else {
            return;
        }
    }
}
class Elementor_Dynamic_Tag_MEC_Event_End_Time extends \Elementor\Core\DynamicTags\Tag
{
    public function get_name()
    {
        return 'mec-event-end-time';
    }
    public function get_title()
    {
        return 'Event End Time';
    }
    public function get_group()
    {
        return 'mec-event';
    }
    public function get_categories()
    {
        return ['text'];
    }
    public function render()
    {
        global $post;
        if (is_singular(['mec-events', 'mec_esb'])) {
            global $wpdb;
            $table_name = $wpdb->prefix . 'mec_events';
            $query = $wpdb->prepare("SELECT time_end FROM $table_name WHERE post_id = %d", $post->ID);
            $end_time_seconds = $wpdb->get_var($query);
            $time_format = get_option('time_format');
            $datetime = new DateTime();
            $datetime->setTimestamp($end_time_seconds);
            echo $datetime->format($time_format);
        } else {
            return;
        }
    }
}
