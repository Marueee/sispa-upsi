/**
* Template Name: Scout
* Template URL: https://bootstrapmade.com/scout-bootstrap-multipurpose-template/
* Updated: May 05 2025 with Bootstrap v5.3.5
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

(function() {
  "use strict";

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  if (mobileNavToggleBtn) {
    mobileNavToggleBtn.addEventListener('click', mobileNavToogle);
  }

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);

  /**
   * Initiate Pure Counter
   */
  new PureCounter();

  /**
   * Frequently Asked Questions Toggle
   */
  document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle').forEach((faqItem) => {
    faqItem.addEventListener('click', () => {
      faqItem.parentNode.classList.toggle('faq-active');
    });
  });

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);

  /**
   * Correct scrolling position upon page load for URLs containing hash links.
   */
  window.addEventListener('load', function(e) {
    if (window.location.hash) {
      if (document.querySelector(window.location.hash)) {
        setTimeout(() => {
          let section = document.querySelector(window.location.hash);
          let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop),
            behavior: 'smooth'
          });
        }, 100);
      }
    }
  });

  /**
   * Navmenu Scrollspy
   */
  let navmenulinks = document.querySelectorAll('.navmenu a');

  function navmenuScrollspy() {
    navmenulinks.forEach(navmenulink => {
      if (!navmenulink.hash) return;
      let section = document.querySelector(navmenulink.hash);
      if (!section) return;
      let position = window.scrollY + 200;
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
        navmenulink.classList.add('active');
      } else {
        navmenulink.classList.remove('active');
      }
    })
  }
  window.addEventListener('load', navmenuScrollspy);
  document.addEventListener('scroll', navmenuScrollspy);

  // Client

  document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.clients-track').forEach(track => {
    // Duplicate content
    track.innerHTML += track.innerHTML;

    // Get total width after duplication
    const totalWidth = track.scrollWidth / 2; // Only one set

    // Set dynamic keyframes based on width
    const animationName = track.classList.contains('track-1') ? 'scroll-left' : 'scroll-right';
    const keyframes = `
      @keyframes ${animationName} {
        0% { transform: translateX(${animationName === 'scroll-left' ? '0' : `-${totalWidth}px`}); }
        100% { transform: translateX(${animationName === 'scroll-left' ? `-${totalWidth}px` : '0'}); }
      }
    `;

    // Inject keyframes into the DOM
    const style = document.createElement('style');
    style.innerHTML = keyframes;
    document.head.appendChild(style);
  });
});


document.addEventListener('DOMContentLoaded', function () {
        const carouselEl = document.querySelector('#beritaCarousel');
        const carousel = new bootstrap.Carousel(carouselEl, { interval: 5000 });

        document.querySelector('.berita-nav-prev').addEventListener('click', () => carousel.prev());
        document.querySelector('.berita-nav-next').addEventListener('click', () => carousel.next());

        // Swipe functionality
        let startX = 0;

        carouselEl.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });

        carouselEl.addEventListener('touchend', (e) => {
            let endX = e.changedTouches[0].clientX;
            if (startX - endX > 50) carousel.next();
            else if (endX - startX > 50) carousel.prev();
        });

        // Mouse drag for desktop
        let isDown = false;
        carouselEl.addEventListener('mousedown', (e) => {
            isDown = true;
            startX = e.clientX;
        });

        carouselEl.addEventListener('mouseup', (e) => {
            if (!isDown) return;
            isDown = false;
            let endX = e.clientX;
            if (startX - endX > 50) carousel.next();
            else if (endX - startX > 50) carousel.prev();
        });
    });

})();