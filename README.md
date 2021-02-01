# SIC Public Tag

A OXID Support Flarum extension to integrate a public tag mechanism into their Support Information Center (SIC).

## Installation
- Navigate to your Flarum installation.
- Execute command `composer require oxid-support/sic-public-tag`.
- Log in to your Flarum administration area and activate the extension.
- Put in the ID of the tag you want to use as public tag.

## Behavior & Usage
With active extension, all tags are visible to guests even if they are restricted to view. This does not count for the discussions tagged with restricted tags. This means, if a tag restricts the view of dicussions, guest can see the existence of the tag, but not the restricted discussions.

You can tag any discussion with your public tag defined in the extension settings to make it visible to guests. This counts also for discussion restricted to view globally or by tags. Therefore it is recommended to set the global view rights just to *Members* or any specific user group(s). The tag the dicussion you want to view to guest with your public tag. This imitates a whitelisting mechanism.
