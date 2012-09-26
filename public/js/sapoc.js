
function markControlAsError(arr_ids) {
    for (var i = 0, item; item = arr_ids[i++];) {
        document.getElementById(item).setAttribute("class", "control-group error");
    }
}

function attach_live_search(selector, url) {
	$(selector).typeahead({
		source: function(query, process) {
			return $.get(BASE + url, { q: query },
				function(data) {
					console.log(data);
					return process(data);
				}
			);
        }
    });
}

jQuery(document).ready(
	function($) {
		attach_live_search('.live-country', '/ref/country');
        attach_live_search('.live-district', '/ref/district');
        attach_live_search('.live-town', '/ref/town');
    }
);