# Contribution Guide
You can contribute to this website's content, or fix a design issue or a bug, by forking this repository and follow the build instructions to get it running.

What kind of content you can add?
- Add new event page ([how?](#add-new-event)).
- Modify a page's content
- Tweak/Fix UI Problems, etc.


## Add New Event

To Add an new Event page, follow these steps one by one:

#### Step 1: Add Event Information to YAML file

Open `/src/content/_data/events.yaml` in your editor. Edit this file to add new event's information. Append the event's information and Take a look at generalised schema for each event:

> **NOTE:** Indentation matters in YAML, make sure you properly indent using 2 spaces (*not tabs*) or use a sophisticated code editor (if you're still using Notepad++ or gedit).

```yaml
dummy-event:  # this is the key which is needed to contruct event page 
  title: Dummy Event # (title that needs to be displayed on pages)
  quote:
    text: This could be a quotation text. #(optional)
    by: Anonymous - who said it? #(optional)
  description: |-
    This is just a dummy event description It can be multi line.
    To give a multi line description notice the `|-` symbol in the beginning
  islive: false
  isover: false 
  isnontech: false #is it a technical event?
  image: <link to image> # this can be a link to third-party app
  teamSize: 2
  lang: cpp
  rounds:
    - First Round is MCQ based round.
    - Describe Final Round.
    - But here can be multiple Rounds (if needed).
```

Please refer to YAML [docs](https://yaml.org/start.html) for syntax.

#### Step 2: Create a event's description page using `pug`
Create a new file in `/src/content` directory,  name this file as `events-<event-name>.pug` _(kebab-cased)_ with the following contents:
```pug
include _mixins/eventPage
+eventPage(events['event-yaml-key']) 
```
Make sure you replace the `event-yaml-key` with the event key, that you specified in _Step 1_. 

>**Example:** According to the example we used in _Step 1_, it should be `dummy-event`.

#### Step 3: Add Event's Page meta information to `pages.js`.

This is very important step, make sure you add meta information to `pages.js` file, or the event's information page will not be generated.

Open `/scripts/build/pages.js` in your editor and add the meta information using following schema:

```js
modue.exports = {
    ... 
    some_other_event: {
        ...
    }, // make sure you add this comma.
    events_dummy: {
        title: "Dummy", // page title -  this appear on page's title bar.
        slug: "events/dummy/",  //slug - it cannot contain spaces and special characters, use hyphen (-) instead of spaces
        file: "events-dummy.pug", //pug file name without path
        image: "<link to image thumbnail>",
        description: "Give it a short description. This is what will appear in search results in search engines."
    },
}
```

That's it! This is all that you need to do to create a new event's page. Still having trouble? Feel free to opne an issue.