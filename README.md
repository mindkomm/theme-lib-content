# Content

A collection of content helper functions for WordPress themes.

## Installation

You can install the package via Composer:

```bash
composer require mindkomm/theme-lib-content
```

## Usage

### The content filter

A `content` filter that you can use for text [that is not the main content](https://themehybrid.com/weblog/how-to-apply-content-filters).

```twig
{{ post.custom_text|apply_filters('content') }}
```

## Functions

| Name | Summary | Type | Returns/Description |
| --- | --- | --- | --- |
| [gender](#gender) | Gets string by gender. | `string` |  |
| [lines_to_array](#lines_to_array) | Turns each line of a text into an array. | `array` |  |
| [strip_control_characters](#strip_control_characters) | Strips out forbidden Control Characters that came from copy-pasting text into WYSIWYG editor. | `string` | The filtered text. |
| [truncate_close](#truncate_close) | Truncates a text close a certain number of characters. | `string` | Truncated string. |

### strip\_control\_characters

<p class="summary">Strips out forbidden Control Characters that came from copy-pasting text into WYSIWYG editor.</p>

You can’t see these Control Characters when you look at the text, yet they can still lead to
unexpected behavior.

`strip_control_characters( string $text )`

**Returns:** `string` The filtered text.

| Name | Type | Description |
| --- | --- | --- |
| $text | `string` | The text to filter. |

---

### lines\_to\_array

<p class="summary">Turns each line of a text into an array.</p>

`lines_to_array( string $string )`

**Returns:** `array` 

| Name | Type | Description |
| --- | --- | --- |
| $string | `string` | Multiline string. |

**Twig**

```twig
<ul>
{% for line in multiline_text|lines_to_array %}
    <li>{{ line }}</li>
{% endfor %}
</ul>
```

---

### truncate\_close

<p class="summary">Truncates a text close a certain number of characters.</p>

This function doesn’t cut off words, but only adds the words that still fit into the maximum width.

`truncate_close( string $string, int $desired_width = 200, string $more = &nbsp;&hellip; )`

**Returns:** `string` Truncated string.

| Name | Type | Description |
| --- | --- | --- |
| $string | `string` | String to truncate. |
| $desired_width | `int` | Optional. The amount of characters you want to end up with. |
| $more | `string` | Optional. The text to append as 'more'. Default is a non-breaking space followed by an ellipsis. |

**Twig**

```twig
{{ post.content|truncate_close }}
```

---

### gender

<p class="summary">Gets string by gender.</p>

Yes, for now, this supports only male and female genders.

`gender( string $male, string $female, string $gender, array $female_identifiers = [] )`

**Returns:** `string` 

| Name | Type | Description |
| --- | --- | --- |
| $male | `string` | Male representation of string. |
| $female | `string` | Female representation of string. |
| $gender | `string` | Gender identifier. |
| $female_identifiers | `array` | Identifier keys for female representation. Default `[ 'f', 'female' ]`. |

**PHP**

```php
<?php
echo gender( 'Schreiner', 'Schreinerin', $post->gender );
```

**Twig**

```twig
{{ gender( 'Schreiner', 'Schreinerin', post.gender ) }}
```

---

## Support

This is a library that we use at MIND to develop WordPress themes. You’re free to use it, but currently, we don’t provide any support. 

