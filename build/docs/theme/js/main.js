$(window).load(function() {
	var $document = $(document);
	var $navigation = $('#navigation');
	var navigationHeight = $navigation.height();
	var $left = $('#left');
	var $right = $('#right');
	var $rightInner = $('#rightInner');
	var $splitter = $('#splitter');
	var $groups = $('#groups');
	var $content = $('#content');
	var $activatedSideLink = $('#left #menu .active');
	var hasFocusedTabindexMinusOne = false;
	var $skipMenuContent = $('#skip-to-content');
	var $mainContent = $('#right .page-header h1')
	var $dropdown = $('.dropdown');
	var $index = $('.index');

	// mechanism for skipping menu content
	$mainContent.attr('id', 'main-content')
	$skipMenuContent.click(function(event) {
		$mainContent.attr('tabindex', -1).focus();
	});

	//tabindex for menu links
	if ($activatedSideLink) {
		$activatedSideLink.attr('tabindex', '-1');
		$document.on('keydown', function(e) {
			if (!hasFocusedTabindexMinusOne && e.keyCode === 9) {
				$activatedSideLink.focus();
				hasFocusedTabindexMinusOne = true
			}
		});
	}

	// Menu

	// Hide deep packages and namespaces
	$('ul button', $groups).click(function(event) {
		event.preventDefault();
		event.stopPropagation();
		$(this)
			.toggleClass('collapsed')
			// .parent()
			.next('ul')
			.toggleClass('collapsed');
		$(this).attr( 'aria-expanded', $(this).attr('aria-expanded') === 'true' ? false : true);
	}).click();

	$active = $('ul li.active', $groups);
	if ($active.length > 0) {
		// Open active
		$('> button', $active).click();
	} else {
		$main = $('> ul > li.main', $groups);
		if ($main.length > 0) {
			// Open first level of the main project
			$('> button', $main).click();
		} else {
			// Open first level of all
			$('> ul > li > button', $groups).click();
		}
	}

	// Content

	// Add current location to feedback link
	$('.feedback-message a').attr('href', $('.feedback-message a').attr('href') + '&topic_url=' + encodeURI(window.location.href));

	// Search autocompletion
	var autocompleteFound = false;
	var autocompleteFiles = {'c': 'class', 'co': 'constant', 'f': 'function', 'm': 'class', 'mm': 'class', 'p': 'class', 'mp': 'class', 'cc': 'class'};
	var $search = $('#search input[name=q]');
	$search
		.autocomplete(AWS.searchIndex, {
			matchContains: true,
			scrollHeight: 200,
			max: 20,
			width: 300,
			noRecord: '',
			highlight: function(value, term) {
				var term = term.toUpperCase().replace(/([\^\$\(\)\[\]\{\}\*\.\+\?\|\\])/gi, "\\$1").replace(/[A-Z0-9]/g, function(m, offset) {
					return offset === 0 ? '(?:' + m + '|^' + m.toLowerCase() + ')' : '(?:(?:[^<>]|<[^<>]*>)*' + m + '|' + m.toLowerCase() + ')';
				});
				return value.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + term + ")(?![^<>]*>)(?![^&;]+;)"), "<strong>$1</strong>");
			},
			formatItem: function(data) {
				return data.hasOwnProperty('name') && data.hasOwnProperty('description') ?
					'<span>' + data.name + '<br/><small><em>' + data.description + '</em></small></span>'
					: data.match;
			},
			formatMatch: function(data) {
				return data.match;
			},
			formatResult: function(data) {
				return data.name;
			},
			show: function($list) {
				var $items = $('li span', $list);
				var maxWidth = Math.max.apply(null, $items.map(function() {
					return $(this).width();
				}));
				// 10px padding
				$list.width(Math.max(maxWidth + 10, $search.innerWidth()));
			}
		}).result(function(event, data) {
		autocompleteFound = true;
		var location = window.location.href.split('/');
		location.pop();
		location.push(data.link);
		window.location = location.join('/');

		// Workaround for Opera bug
		$(this).closest('form').attr('action', location.join('/'));
	}).closest('form')
		.submit(function() {
			var query = $search.val();
			if ('' === query) {
				return false;
			}
			return !autocompleteFound && '' !== $('#search input[name=cx]').val();
		});

	// Save natural order
	$('table.summary tr[data-order]', $content).each(function(index) {
		do {
			index = '0' + index;
		} while (index.length < 3);
		$(this).attr('data-order-natural', index);
	});

	// Switch between natural and alphabetical order
	var $caption = $('table.summary', $content)
		.filter(':has(tr[data-order])')
		.prev('h2');
	$caption
		.click(function() {
			var $this = $(this);
			var order = $this.data('order') || 'natural';
			order = 'natural' === order ? 'alphabetical' : 'natural';
			$this.data('order', order);
			$.cookie('order', order, {expires: 365});
			var attr = 'alphabetical' === order ? 'data-order' : 'data-order-natural';
			$this
				.next('table')
				.find('tr').sortElements(function(a, b) {
				return $(a).attr(attr) > $(b).attr(attr) ? 1 : -1;
			});
			return false;
		})
		.addClass('switchable')
		.attr('title', 'Switch between natural and alphabetical order');
	if ((null === $.cookie('order') && 'alphabetical' === ApiGen.config.options.elementsOrder) || 'alphabetical' === $.cookie('order')) {
		$caption.click();
	}

	// Announce results in Autocomplete
	var $suggestionsHelp = $('#suggestions-help');

	$('[data-suggest]').on('input', function() {
		$suggestionsHelp.text(
			'There are suggestions. Use the up and down arrows to browse.'
		);
	});

	// Open details
	if (ApiGen.config.options.elementDetailsCollapsed) {
		$(document.body).on('click', 'tr', function(ev) {

			var short = this.querySelector('.short')
				, detailed = this.querySelector('.detailed')

			if (!short || !detailed) return

			$(short).toggleClass('hidden')
			$(detailed).toggleClass('hidden')

		})
	}

	// Splitter
	var splitterWidth = $splitter.width();
	var splitterPosition = $.cookie('splitter') ? parseInt($.cookie('splitter')) : null;
	var splitterPositionBackup = $.cookie('splitterBackup') ? parseInt($.cookie('splitterBackup')) : null;
	function setSplitterPosition(position)
	{
		splitterPosition = position;

		$left.width(position);
		$right.css('margin-left', position + splitterWidth);
		$splitter.css('left', position);
	}
	function setNavigationPosition()
	{
		var height = $(window).height() - navigationHeight;
		$left.height(height);
		$splitter.height(height);
	}
	function setContentWidth()
	{
		var width = $rightInner.width();
		$rightInner
			.toggleClass('medium', width <= 960)
			.toggleClass('small', width <= 650);
	}
	function toggleSplitter() {
		if (splitterPosition) {
			splitterPositionBackup = $left.width();
			setSplitterPosition(0);
		} else {
			setSplitterPosition(splitterPositionBackup);
			splitterPositionBackup = null;
		}

		setContentWidth();

		$.cookie('splitter', splitterPosition, {expires: 365});
		$.cookie('splitterBackup', splitterPositionBackup, {expires: 365});
	}
	function collapseSplitter() {
		$splitter.hide();
		$right.css('margin-left', '0px')
		$dropdown.show();
		$left.css({"width" : "100%", "background-color" : "white"})
		$index.append($left);
	}

	function showSplitter() {
		$right.removeClass('container');
		$rightInner.removeClass('row');
		$left.css({"width" : "", "background-color" : ""})
		$right.css('margin-left', '')
		$left.insertAfter($navigation);
		$splitter.show();
		if (null !== splitterPosition) {
			setSplitterPosition(splitterPosition);
		}
		setNavigationPosition();
		setContentWidth();
	}

	function checkWindowSize() {
		var width = $(window).width();

		if (width < 768) {
			if (width < 340) {
				$right.addClass('container');
				$rightInner.addClass('row')
			} else {
				$right.removeClass('container');
				$rightInner.removeClass('row');
			}
			$('.form-group').addClass('container');
			collapseSplitter();
		} else {
			if ($splitter.is(':hidden')) {
				showSplitter();
			}
			$dropdown.hide();
			$('.form-group').removeClass('container');
		}
	}

	$splitter.mousedown(function() {
		$splitter.addClass('active');

		$document.mousemove(function(event) {
			if (event.pageX >= 230 && $document.width() - event.pageX >= 600 + splitterWidth) {
				setSplitterPosition(event.pageX);
				setContentWidth();
			}
		});

		$()
			.add($splitter)
			.add($document)
			.mouseup(function() {
				$splitter
					.removeClass('active')
					.unbind('mouseup');
				$document
					.unbind('mousemove')
					.unbind('mouseup');

				$.cookie('splitter', splitterPosition, {expires: 365});
			});

		return false;
	});
	$splitter.dblclick(toggleSplitter);
	if (null !== splitterPosition) {
		setSplitterPosition(splitterPosition);
	}
	setNavigationPosition();
	setContentWidth();
	$(document).ready(function() {
		checkWindowSize();
	});
	$(window)
		.resize(setNavigationPosition)
		.resize(setContentWidth)
		.resize(checkWindowSize);

	// Select selected lines
	var matches = window.location.hash.substr(1).match(/^\d+(?:-\d+)?(?:,\d+(?:-\d+)?)*$/);
	if (null !== matches) {
		var lists = matches[0].split(',');
		for (var i = 0; i < lists.length; i++) {
			var lines = lists[i].split('-');
			lines[0] = parseInt(lines[0]);
			lines[1] = parseInt(lines[1] || lines[0]);
			for (var j = lines[0]; j <= lines[1]; j++) {
				$('#' + j).addClass('selected');
			}
		}

		var $firstLine = $('#' + parseInt(matches[0]));
		if ($firstLine.length > 0) {
			$right.scrollTop($firstLine.position().top);
		}
	}

	// Save selected lines
	var lastLine;
	$('.l a').click(function(event) {
		event.preventDefault();

		var selectedLine = $(this).parent().index() + 1;
		var $selectedLine = $('pre.code .l').eq(selectedLine - 1);

		if (event.shiftKey) {
			if (lastLine) {
				for (var i = Math.min(selectedLine, lastLine); i <= Math.max(selectedLine, lastLine); i++) {
					$('#' + i).addClass('selected');
				}
			} else {
				$selectedLine.addClass('selected');
			}
		} else if (event.ctrlKey) {
			$selectedLine.toggleClass('selected');
		} else {
			var $selected = $('.l.selected')
				.not($selectedLine)
				.removeClass('selected');
			if ($selected.length > 0) {
				$selectedLine.addClass('selected');
			} else {
				$selectedLine.toggleClass('selected');
			}
		}

		lastLine = $selectedLine.hasClass('selected') ? selectedLine : null;

		// Update hash
		var lines = $('.l.selected')
			.map(function() {
				return parseInt($(this).attr('id'));
			})
			.get()
			.sort(function(a, b) {
				return a - b;
			});

		var hash = [];
		var list = [];
		for (var j = 0; j < lines.length; j++) {
			if (0 === j && j + 1 === lines.length) {
				hash.push(lines[j]);
			} else if (0 === j) {
				list[0] = lines[j];
			} else if (lines[j - 1] + 1 !== lines[j] && j + 1 === lines.length) {
				hash.push(list.join('-'));
				hash.push(lines[j]);
			} else if (lines[j - 1] + 1 !== lines[j]) {
				hash.push(list.join('-'));
				list = [lines[j]];
			} else if (j + 1 === lines.length) {
				list[1] = lines[j];
				hash.push(list.join('-'));
			} else {
				list[1] = lines[j];
			}
		}

		hash = hash.join(',');
		$backup = $('#' + hash).removeAttr('id');
		window.location.hash = hash;
		$backup.attr('id', hash);
	});
});
