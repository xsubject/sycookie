$(function() {
	function getCookie(name) {
	  let matches = document.cookie.match(new RegExp(
	    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
	  ));
	  return matches ? decodeURIComponent(matches[1]) : undefined;
	}

	function setCookie(name, value, options = {}) {

	  options = {
	    path: '/',
	    secure: true
	  };

	  if (options.expires instanceof Date) {
	    options.expires = options.expires.toUTCString();
	  }

	  let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

	  for (let optionKey in options) {
	    updatedCookie += "; " + optionKey;
	    let optionValue = options[optionKey];
	    if (optionValue !== true) {
	      updatedCookie += "=" + optionValue;
	    }
	  }

	  document.cookie = updatedCookie;
	}

	function load(host) {
		$.ajax({
			type: "POST",
			url: host,
			data: {"action": "get"},
			xhrFields: {withCredentials: true},
			success: function(response) {
				if(response.success) {
					var val = response.data.val;
					var key = response.data.key;

					if(getCookie(key) != val) {
						setCookie(key, val, {'max-age': 3600*24*365});
					}

					$(document).trigger('sycookie', [response]);
					$("[sycookie]").val(val);

					console.log('sycookie connected successfully with host: ' + host);
				}
			},
			dataType: "json"
		});
	}

	$scr = $("[syhost]")
	if ($scr.length > 0) {
		host = $($scr[0]).attr('syhost');
		load(host)
	}	
})

