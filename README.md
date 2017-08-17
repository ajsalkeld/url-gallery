# url-gallery
A wordpress shortcode plugin for making galleries with urls.

## Usage
Add WP shortcode to post in place of normal [gallery] tag:
```
[url-gallery imgs="http://example.com/2017/08/Image.jpg, /2017/08/Image2.jpg, P204052.jpg"]
```

## Known Issues
- Relies on image URL being ~~same as its~~ `LIKE` its `guid`. If domain/path to `wp-content` has changed after the image was uploaded, `guid` doesn't, thus we can run into issues.
