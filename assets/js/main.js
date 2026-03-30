function scrollToTarget(target, trigger) {
	const currentScroll = window.scrollY || document.documentElement.scrollTop;
	let destination = 0;
	let duration = 1000;

	if (target === 0 || target === '0') {
		destination = trigger ? trigger.closest('.bloc').offsetHeight : 0;
	} else if (target === 2 || target === '2') {
		destination = document.documentElement.scrollHeight;
	} else if (target === 1 || target === '1') {
		destination = 0;
	} else {
		const targetElement = document.querySelector(target);

		if (!targetElement) {
			return;
		}

		destination = targetElement.getBoundingClientRect().top + window.scrollY;

		const stickyNav = document.querySelector('.sticky-nav');

		if (stickyNav) {
			destination -= stickyNav.offsetHeight;
		}
	}

	if (trigger && trigger.matches('[data-scroll-speed]')) {
		duration = parseInt(trigger.getAttribute('data-scroll-speed'), 10);
	}

	const travelDistance = Math.abs(currentScroll - destination);
	const animationDuration = Math.max(0.1, Math.min(travelDistance / duration, 0.8));
	let progress = 0;

	function animateScroll() {
		progress += 1 / 60;

		const normalizedTime = progress / animationDuration;
		const easing = Math.sin(Math.min(normalizedTime, 1) * (Math.PI / 2));
		const nextPosition = currentScroll + (destination - currentScroll) * easing;

		window.scrollTo(0, nextPosition);

		if (normalizedTime < 1) {
			window.requestAnimFrame(animateScroll);
		}
	}

	animateScroll();
}

function scrollBtnVisible() {
	const button = document.querySelector('.scrollToTop');

	if (!button) {
		return;
	}

	if (window.pageYOffset > window.innerHeight / 3) {
		button.classList.add('showScrollTop');
	} else {
		button.classList.remove('showScrollTop');
	}
}

function reCalculateParallax() {
	if (!document.querySelector('.b-parallax')) {
		return;
	}

	const parallaxElements = document.querySelectorAll('.parallax__container .parallax');

	parallaxElements.forEach((element) => {
		element.style.height = '100%';
	});

	if (typeof calculateHeight === 'function') {
		setTimeout(() => {
			calculateHeight(parallaxElements, 3);
		}, 400);
	}
}

function toggleVisibilityItem(element) {
	if (!element) {
		return;
	}

	element.classList.add('toggled-item');

	const isHidden = window.getComputedStyle(element).getPropertyValue('height') === '0px' || element.classList.contains('object-hidden');

	if (isHidden) {
		element.classList.remove('object-hidden');
		element.style.removeProperty('display');
		element.style.height = 'auto';

		const expandedHeight = `${element.clientHeight}px`;

		element.style.height = '0px';
		element.offsetHeight;
		element.classList.remove('toggled-item-hidden');

		setTimeout(() => {
			element.style.height = expandedHeight;
		}, 0);

		setTimeout(() => {
			element.style.minHeight = expandedHeight;
			element.style.removeProperty('height');
		}, 360);
	} else {
		element.style.height = `${element.scrollHeight}px`;
		element.offsetHeight;
		element.style.removeProperty('min-height');
		element.classList.add('toggled-item-hidden');

		window.setTimeout(() => {
			element.style.height = '0';

			if (element.style.height === '0px') {
				element.style.display = 'none';
			}
		}, 0);
	}

	reCalculateParallax();
}

function setUpVisibilityToggle() {
	document.querySelectorAll('[data-toggle-visibility]').forEach((trigger) => {
		trigger.addEventListener('click', (event) => {
			event.preventDefault();

			const targetIds = trigger.getAttribute('data-toggle-visibility').split(',');

			targetIds.forEach((targetId) => {
				toggleVisibilityItem(document.getElementById(targetId.trim()));
			});
		});
	});
}

function setUpClassToggle() {
	document.querySelectorAll('[data-toggle-class-target]').forEach((trigger) => {
		trigger.addEventListener('click', (event) => {
			event.preventDefault();

			const targets = trigger.getAttribute('data-toggle-class-target');
			const className = trigger.getAttribute('data-toggle-class');

			if (!className) {
				return;
			}

			targets.split(',').forEach((targetId) => {
				const element = document.getElementById(targetId.trim());

				if (element) {
					element.classList.toggle(className);
				}
			});

			reCalculateParallax();
		});
	});
}

function setUpImgProtection() {
	document.querySelectorAll('.img-protected').forEach((image) => {
		image.addEventListener('contextmenu', (event) => {
			event.preventDefault();
		});

		image.addEventListener('mousedown', (event) => {
			event.preventDefault();
		});
	});
}

function closeSiteHeader(header, toggle, panel) {
	header.classList.remove('is-open');
	toggle.setAttribute('aria-expanded', 'false');
	panel.setAttribute('aria-hidden', 'true');
	document.body.classList.remove('menu-open');
}

function setUpSiteHeader() {
	const header = document.querySelector('.site-header');

	if (!header) {
		return;
	}

	const toggle = header.querySelector('.site-header__toggle');
	const panel = header.querySelector('.site-header__panel');

	if (!toggle || !panel) {
		return;
	}

	toggle.addEventListener('click', () => {
		const isOpen = header.classList.toggle('is-open');

		toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
		panel.setAttribute('aria-hidden', isOpen ? 'false' : 'true');
		document.body.classList.toggle('menu-open', isOpen);
	});

	panel.querySelectorAll('a').forEach((link) => {
		link.addEventListener('click', () => {
			if (window.innerWidth < 992) {
				closeSiteHeader(header, toggle, panel);
			}
		});
	});

	document.addEventListener('click', (event) => {
		if (window.innerWidth < 992 && header.classList.contains('is-open') && !header.contains(event.target)) {
			closeSiteHeader(header, toggle, panel);
		}
	});

	document.addEventListener('keydown', (event) => {
		if (event.key === 'Escape') {
			closeSiteHeader(header, toggle, panel);
		}
	});

	window.addEventListener('resize', () => {
		if (window.innerWidth >= 992) {
			closeSiteHeader(header, toggle, panel);
		}
	});
}

document.addEventListener('DOMContentLoaded', () => {
	setUpSiteHeader();
	setUpVisibilityToggle();
	setUpClassToggle();
	setUpImgProtection();

	document.querySelectorAll('a[onclick^="scrollToTarget"]').forEach((link) => {
		link.addEventListener('click', (event) => {
			event.preventDefault();
		});
	});

	if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
		document.body.classList.add('dark-theme');
	}
});

window.addEventListener('load', () => {
	scrollBtnVisible();

	window.addEventListener('scroll', () => {
		scrollBtnVisible();
	});

	const preloader = document.getElementById('page-loading-blocs-notifaction');

	if (preloader) {
		preloader.classList.add('preloader-complete');
	}
});

window.requestAnimFrame = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || function(callback) {
	window.setTimeout(callback, 1000 / 60);
};
