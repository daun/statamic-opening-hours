<br>
<picture>
  <source media="(prefers-color-scheme: dark)" srcset="https://insight-media.be/images/gh/logo-dark.svg">
  <img alt="Insight Media Logo" src="https://insight-media.be/images/gh/logo-light.svg">
</picture>

# Statamic Opening hours

> Define your business' opening hours and exceptional closing times in the Statamic control panel.
>
> Display the opening hours in your antler views, or query the open/close status for a specific time.

## Features

- Adds an 'opening hours' page to the CP navigation, where you can define multiple opening hours per weekday
- Add exceptional closing times, which override the default opening hours
- Display the opening hours using the provided tag
- Query for open/close status
- Query for next/previous opening hours/closing times
- Uses the [Spatie Opening Hours package](https://github.com/spatie/opening-hours) to perform queries

## How to Install

You can search for this addon in the `Tools > Addons` section of the Statamic control panel and click **install**, or run the following command from your project root:

``` bash
composer require insight-media/statamic-opening-hours
```

## How to Use

### In your antlers templates

Define your business' opening hours in the Statamic control panel.

### In your antlers templates

Use the openingHours tag to display or query opening hours:

``` antlers
{{ openingHours:isOpenNow }}
{{ openingHours:isClosedNow }}
{{ openingHours:isOpenOn day="monday" }}
{{ openingHours:isOpenOn day="2022-12-31" }}
{{ openingHours:isOpenAt date="2022-12-31 19:00:00" }}
{{ openingHours:isClosedOn day="monday" }}
{{ openingHours:isClosedOn day="2022-12-31" }}
{{ openingHours:isClosedAt date="2022-12-31 19:00:00" }}

{{ openingHours:forDay day="monday" format="H:i" }} 
    <div>{{ from }}-{{ to }}</div> 
{{ /openingHours:forDay }}

{{ openingHours:forWeek format="H:i" }}
    {{ day }}: {{ hours }} <div>{{ from }}-{{ to }}</div> {{ /hours }}<br>
 {{ /openingHours:forWeek }}
 
{{ openingHours:forDate date="2022-12-14" format="H:i" }}
    <div>{{ from }}-{{ to }}</div> 
{{ /openingHours:forDate }}

{{ openingHours:nextOpen date="2022-12-31 19:00:00" format="Y-m-d H:i:s" }}
{{ openingHours:nextClose date="2022-12-31 19:00:00" format="Y-m-d H:i:s" }}
{{ openingHours:previousOpen date="2022-12-31 19:00:00" format="Y-m-d H:i:s" }}
```
