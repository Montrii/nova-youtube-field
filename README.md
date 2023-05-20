
# Nova-Youtube-Field

This is a short little package, allowing you to include Youtube videos in your Nova Resources within Nova 4!






## Installation

```
# Install the Package
composer require montri/nova-youtube-field

```


## Usage

```php
use Montri\VideoYoutube\VideoYoutube;

...

VideoYoutube::make('Youtube Video', 'url') // Video with Name and attribute

VideoYoutube::make('Youtube Video', 'url')->onlyAllowValidLinks(bool) // Only Allow real Youtube Links on Form

VideoYoutube::make('Youtube Video', 'url')->clickable(bool)->openInSameTab(bool)
// Make Video in Index View clickable and if yes, open in new or same tab.

VideoYoutube::make('Youtube Video', 'url')->withWidth(int)->withHeight(int)
// Sets Width and Height of Video in Detail View.

// All Methods are optional.

```

## Screenshots


Down here you can see some screenshots on how the bot sends messages.


![Detail View](https://i.imgur.com/Hkg9HeL.png)

![Index View](https://i.imgur.com/TzUEDkt.png)

![Form View](https://i.imgur.com/9jTp266.png)


## License

[MIT](https://choosealicense.com/licenses/mit/)

