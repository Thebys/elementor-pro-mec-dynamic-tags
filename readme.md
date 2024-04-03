# Elementor Pro MEC Event Dynamic Tags
Build Single Modern Events Calendar page using Elementor with content from Dynamic Fields.

![Demo showing the Dynamic Fields available in Elementor Pro.](https://i.imgur.com/IQS8qGg.jpeg)

# Requirements
- [Elementor and Elementor Pro](https://elementor.com/)
- [MEC - Modern Events Calendar Lite](https://webnus.net/modern-events-calendar/lite/)

# How to use?
1. Install Requirements and this plugin, enable it.
2. Create new Elementor template for singular post using Theme builder.
3. Set template display condition to all (MEC) events.
4. Use any of the now available MEC Event Dynamic Fields.
5. Build MEC lite single event page template in Elementor.
6. Profit…

# Available event fields
    Event_Name
    Event_Location_Name
    Event_Location_Address
    Event_Organizer_Name
    Event_Organizer_Website
    Event_Cost
    Event_Start_Date
    Event_Start_Time
    Event_End_Date
    Event_End_Time

# Remarks
- So far no support for multiple events / calendar views.
- This plugin overrides all default template(s) for MEC single event. The intention is to use default one and especially let Elementor handle it all. Plugin template (templates/single-mec-events.php) used to replace the MEC default one is taken from Elementor Hello Theme Template, feel free to change it.
- Performance will probably be nightmare bad, query code written by AI in render methods.