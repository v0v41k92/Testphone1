(function($) {
$(function() {

	$('ul.tabs__caption').on('click', 'li:not(.active)', function() {
		$(this)
			.addClass('active').siblings().removeClass('active')
			.closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()).addClass('active');
	});

});
})(jQuery);

(function($) {
$(function() {

	$('ul.tabs__caption').each(function(i) {
		var storage = localStorage.getItem('tab' + i);
		if (storage) {
			$(this).find('li').removeClass('active').eq(storage).addClass('active')
				.closest('div.tabs').find('div.tabs__content').removeClass('active').eq(storage).addClass('active');
		}
	});

	$('ul.tabs__caption').on('click', 'li:not(.active)', function() {
		$(this)
			.addClass('active').siblings().removeClass('active')
			.closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()).addClass('active');
		var ulIndex = $('ul.tabs__caption').index($(this).parents('ul.tabs__caption'));
		localStorage.removeItem('tab' + ulIndex);
		localStorage.setItem('tab' + ulIndex, $(this).index());
	});

});
})(jQuery);

(function($) {
$(function() {

	function createCookie(name,value,days) {
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
		}
		else var expires = "";
		document.cookie = name+"="+value+expires+"; path=/";
	}
	function readCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		}
		return null;
	}
	function eraseCookie(name) {
		createCookie(name,"",-1);
	}

	$('ul.tabs__caption').each(function(i) {
		var cookie = readCookie('tabCookie' + i);
		if (cookie) {
			$(this).find('li').removeClass('active').eq(cookie).addClass('active')
				.closest('div.tabs').find('div.tabs__content').removeClass('active').eq(cookie).addClass('active');
		}
	});

	$('ul.tabs__caption').on('click', 'li:not(.active)', function() {
		$(this)
			.addClass('active').siblings().removeClass('active')
			.closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()).addClass('active');
		var ulIndex = $('ul.tabs__caption').index($(this).parents('ul.tabs__caption'));
		eraseCookie('tabCookie' + ulIndex);
		createCookie('tabCookie' + ulIndex, $(this).index(), 365);
	});

});
})(jQuery);