# sycookie
A small library that helps you identify clients, just select one server as the central

### Requirements
* PHP 7.0+
* JQuery, Ajax

### Get Started
Copy this repo in your php website
```sh
git clone https://github.com/zaycev-cpu/sycookie.git
```

Include javascript on your html page on all your sites, specify the address of the central server as an argument(syhost) to this script
```html
<script src="http://myhost.org/sycookie/public/sycookie.dev.js" syhost="http://myhost.org/sycookie/"></script>
```

And use cookies as usual. Default key `sycookie_id`
```php
<?php
echo $_COOKIE['sycookie_id'];
```

You can also get the key using jquery
```js
$(document).on("sycookie", function(event, response) {
  alert(response.data.key + '='+ response.data.val);
})
```
