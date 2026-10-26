// Wahid Biryani Main Setup and Orchestrator

document.addEventListener('DOMContentLoaded', function () {
  // 1. Text Splitting Helper for word-based reveals
  initTextSplitting();

  // 2. Setup Page Curtain Transitions
  initPageTransitions();

  // 3. Setup Mobile Navigation Offcanvas Animations
  initOffcanvasAnimation();

  // 4. Desktop-only Magnetic Buttons
  initMagneticButtons();

  // 5. Contact Form Focus & Success Validation
  initContactForm();

  // 6. Page Loader or Direct Entry Curtain Split
  const isHome = document.body.classList.contains('home-page');
  const hasLoaded = sessionStorage.getItem('wahid_preloader_loaded');

  if (isHome && !hasLoaded && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    // First time visiting homepage: run full preloader
    sessionStorage.setItem('wahid_preloader_loaded', 'true');
    window.WahidAnimations.initPreloader(function () {
      // Run subsequent animations after preloader completes
      triggerPageAnimations();
    });
  } else {
    // Already visited homepage or visiting subpage directly: split curtain directly
    document.getElementById('preloader') ? document.getElementById('preloader').style.display = 'none' : null;
    window.WahidAnimations.initPageReveal();
    // Run animations immediately
    triggerPageAnimations();
  }

  // 7. Menu Category Filter Trigger
  initMenuFilters();

  // 8. Universal Order Online Outlets Modal Trigger
  initOrderModal();

  // 9. Heritage Reels Video Auto-Play & Mobile Player
  initReelsVideoPlayer();

  // 10. Active nav link (current page)
  initActiveNav();
});

// Wrap words inside headings with split tags
function initTextSplitting() {
  document.querySelectorAll('.split-words').forEach(element => {
    const text = element.innerText.trim();
    // Split on space, map to span tags, rejoin
    const words = text.split(/\s+/);
    element.innerHTML = words.map(word => {
      return `<span class="word-wrap"><span class="word" style="display:inline-block; transform:translateY(110%); opacity:0;">${word}</span></span>`;
    }).join(' ');
  });
}

// Current page ke hisaab se nav link active karo (desktop + mobile)
function initActiveNav() {
  const clean = href => (href || '').split('#')[0].split('?')[0].split('/').pop().toLowerCase();

  let current = clean(window.location.pathname);
  if (!current) current = 'index.html';

  const isMatch = a => {
    const file = clean(a.getAttribute('href'));
    return file && file === current;
  };

  // Pehle purane active hata do
  document.querySelectorAll('.nav-link.active, .offcanvas-link.active, .offcanvas-sublink.active, .dropdown-menu a.active')
    .forEach(el => el.classList.remove('active'));

  // Desktop: top-level li ke andar koi bhi link match kare to nav-link active
  document.querySelectorAll('.heritage-header .nav-menu > li').forEach(li => {
    const links = Array.from(li.querySelectorAll('a'));
    const hit = links.find(isMatch);
    if (!hit) return;

    const top = li.querySelector(':scope > .nav-link');
    if (top) top.classList.add('active');

    // Dropdown ke andar wala link bhi mark karo
    if (hit.closest('.dropdown-menu')) hit.classList.add('active');
  });

  // Mobile offcanvas
  document.querySelectorAll('#offcanvasNav .offcanvas-nav > li').forEach(li => {
    const links = Array.from(li.querySelectorAll('a')).filter(a => !a.hasAttribute('data-bs-toggle'));
    const hit = links.find(isMatch);
    if (!hit) return;

    const top = li.querySelector(':scope > .offcanvas-link');
    if (top) top.classList.add('active');

    if (hit.classList.contains('offcanvas-sublink')) {
      hit.classList.add('active');
      const collapse = li.querySelector('.collapse');
      if (collapse) collapse.classList.add('show');
      if (top) top.setAttribute('aria-expanded', 'true');
    }
  });
}

// Curtain slide page transitions on local links
function initPageTransitions() {
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || window.matchMedia('(max-width: 767px)').matches) {
    return;
  }

  // Pre-load curtains off-screen
  gsap.set('.page-curtain-left', { xPercent: -100 });
  gsap.set('.page-curtain-right', { xPercent: 100 });

  const links = document.querySelectorAll('a:not([target="_blank"]):not([href^="#"]):not([href^="javascript"]):not([href^="tel"]):not([href^="mailto"]):not([data-bs-toggle="modal"]):not([data-action="open-order-modal"])');

  links.forEach(link => {
    link.addEventListener('click', function (e) {
      const destination = this.getAttribute('href');

      // Only transition internal pages that exist
      if (destination && destination.includes('.html')) {
        e.preventDefault();

        // Curtain closes
        gsap.timeline({
          onComplete: () => {
            window.location.href = destination;
          }
        })
          .set('.page-curtain', { display: 'block' })
          .to('.page-curtain-left', {
            xPercent: 0,
            duration: 0.25,
            ease: 'power4.inOut'
          })
          .to('.page-curtain-right', {
            xPercent: 0,
            duration: 0.25,
            ease: 'power4.inOut'
          }, '-=0.25');
      }
    });
  });
}

// Universal Order Online Modal Trigger Initializer
function initOrderModal() {
  document.querySelectorAll('[data-action="open-order-modal"], .open-order-modal, .btn-order-online').forEach(btn => {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      const modalEl = document.getElementById('orderOnlineModal');
      if (modalEl && typeof bootstrap !== 'undefined') {
        const modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
        modalInstance.show();
      }
    });
  });
}

// Heritage Reels Video Player: Desktop Hover Auto-Play & Mobile/Button Tap-to-Play
function initReelsVideoPlayer() {
  const reelCards = document.querySelectorAll('.reel-card');
  if (!reelCards.length) return;

  const isTouch = 'ontouchstart' in window || navigator.maxTouchPoints > 0;

  function stopAllReels(exceptCard) {
    reelCards.forEach(c => {
      if (c !== exceptCard) {
        c.classList.remove('is-playing');
        const v = c.querySelector('video');
        if (v) {
          v.pause();
          v.currentTime = 0;
        }
        const prog = c.querySelector('.reel-progress-bar');
        if (prog) prog.style.width = '0%';
      }
    });
  }

  function playReel(card) {
    stopAllReels(card);
    const video = card.querySelector('video');
    if (!video) return;

    card.classList.add('is-playing');
    const playPromise = video.play();
    if (playPromise !== undefined) {
      playPromise.catch(() => {
        // Fallback for autoplay policies
        video.muted = true;
        video.play().catch(() => {});
      });
    }
  }

  function pauseReel(card) {
    card.classList.remove('is-playing');
    const video = card.querySelector('video');
    if (video) {
      video.pause();
    }
  }

  reelCards.forEach(card => {
    const video = card.querySelector('video');
    const playBtn = card.querySelector('.reel-play-btn');
    const soundBtn = card.querySelector('.reel-sound-btn');
    const progressBar = card.querySelector('.reel-progress-bar');

    if (video) {
      // Progress Bar tracking
      video.addEventListener('timeupdate', function () {
        if (progressBar && video.duration) {
          const pct = (video.currentTime / video.duration) * 100;
          progressBar.style.width = pct + '%';
        }
      });

      // Loop smoothly
      video.addEventListener('ended', function () {
        video.currentTime = 0;
        video.play().catch(() => {});
      });
    }

    // 1. Desktop Hover Auto-Play (when mouse is used)
    if (!isTouch) {
      card.addEventListener('mouseenter', function () {
        playReel(card);
      });

      card.addEventListener('mouseleave', function () {
        pauseReel(card);
        if (video) video.currentTime = 0;
        if (progressBar) progressBar.style.width = '0%';
      });
    }

    // 2. Play Button Click / Card Tap for Mobile & Touch Screens
    if (playBtn) {
      playBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        if (card.classList.contains('is-playing')) {
          pauseReel(card);
        } else {
          playReel(card);
        }
      });
    }

    // Card tap for mobile
    card.addEventListener('click', function (e) {
      // Ignore clicks on sound button or anchor links inside card if any
      if (e.target.closest('.reel-sound-btn') || e.target.closest('.reel-watch-cta')) {
        return;
      }

      if (card.classList.contains('is-playing')) {
        pauseReel(card);
      } else {
        playReel(card);
      }
    });

    // 3. Sound Mute / Unmute Toggle Button
    if (soundBtn && video) {
      soundBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        video.muted = !video.muted;
        const icon = soundBtn.querySelector('i');
        if (icon) {
          if (video.muted) {
            icon.className = 'fa-solid fa-volume-xmark';
            soundBtn.setAttribute('title', 'Unmute');
          } else {
            icon.className = 'fa-solid fa-volume-high';
            soundBtn.setAttribute('title', 'Mute');
          }
        }
      });
    }
  });
}

// Mobile offcanvas animation sequences
function initOffcanvasAnimation() {
  const offcanvasEl = document.getElementById('offcanvasNav');
  if (!offcanvasEl) return;

  offcanvasEl.addEventListener('show.bs.offcanvas', function () {
    gsap.timeline()
      .fromTo('.offcanvas-nav li', {
        x: 30,
        opacity: 0
      }, {
        x: 0,
        opacity: 1,
        stagger: 0.06,
        duration: 0.5,
        ease: 'power3.out',
        delay: 0.2
      })
      .fromTo('.offcanvas-footer', {
        x: 30,
        opacity: 0
      }, {
        x: 0,
        opacity: 1,
        duration: 0.4,
        ease: 'power3.out'
      }, '-=0.2');
  });

  offcanvasEl.addEventListener('hide.bs.offcanvas', function () {
    gsap.set('.offcanvas-nav li, .offcanvas-footer', { opacity: 0, x: 30 });
  });
}

// Magnetic CTA button script (Desktop only)
function initMagneticButtons() {
  const isTouchDevice = 'ontouchstart' in window || navigator.maxTouchPoints > 0;

  if (isTouchDevice || window.matchMedia('(max-width: 1279px)').matches || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    return;
  }

  const magneticBtns = document.querySelectorAll('.magnetic-btn');

  magneticBtns.forEach(btn => {
    btn.addEventListener('mousemove', function (e) {
      const bound = this.getBoundingClientRect();
      const x = e.clientX - bound.left - (bound.width / 2);
      const y = e.clientY - bound.top - (bound.height / 2);

      // Limit offset to 6px
      const maxMove = 6;
      const moveX = (x / (bound.width / 2)) * maxMove;
      const moveY = (y / (bound.height / 2)) * maxMove;

      gsap.to(this, {
        x: moveX,
        y: moveY,
        duration: 0.3,
        ease: 'power2.out'
      });
    });

    btn.addEventListener('mouseleave', function () {
      gsap.to(this, {
        x: 0,
        y: 0,
        duration: 0.5,
        ease: 'power3.out'
      });
    });
  });
}

// Form validation and feedback handling
function initContactForm() {
  const form = document.getElementById('heritageContactForm');
  if (!form) return;

  // Custom Success state on Submit validation
  form.addEventListener('submit', function (e) {
    e.preventDefault();

    // Perform simple html5 checks
    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    // Success fade out / Shukriya fade in
    gsap.timeline()
      .to('#heritageContactForm', {
        opacity: 0,
        y: -20,
        duration: 0.4,
        ease: 'power3.in',
        onComplete: () => {
          form.style.display = 'none';
          const successBlock = document.getElementById('formSuccessBlock');
          successBlock.style.display = 'block';

          gsap.fromTo(successBlock, {
            opacity: 0,
            y: 20
          }, {
            opacity: 1,
            y: 0,
            duration: 0.6,
            ease: 'power3.out'
          });
        }
      });
  });
}

// Page animations director
function triggerPageAnimations() {
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    window.WahidAnimations.initReducedMotion();
    return;
  }

  // Common site reveals (initDropdowns hata diya: dropdown ab pure CSS hai)
  window.WahidAnimations.initHeader();
  window.WahidAnimations.initTextReveals();
  window.WahidAnimations.initImageReveals();
  window.WahidAnimations.initParallax();
  window.WahidAnimations.initFooter();

  // Page specific triggers
  if (document.body.classList.contains('home-page')) {
    window.WahidAnimations.initHero();
    window.WahidAnimations.initSignatureDishes();
    window.WahidAnimations.initDumStory();
  }

  if (document.body.classList.contains('heritage-page')) {
    window.WahidAnimations.initLegacyTimeline();
    window.WahidAnimations.initLegacyTimelineMethod();
    window.WahidAnimations.initGallery();
    window.WahidAnimations.initVideoGallery();
  }

  if (document.body.classList.contains('menu-page')) {
    window.WahidAnimations.initGallery();
  }

  if (document.body.classList.contains('contact-page')) {
    window.WahidAnimations.initContactAnimations();
  }
}

// Menu filtering logic
function initMenuFilters() {
  const catButtons = document.querySelectorAll('.menu-cat-btn');
  if (catButtons.length === 0) return;

  const items = Array.from(document.querySelectorAll('.menu-item'));
  const tabsWrap = document.querySelector('.menu-categories');
  let currentCategory = 'all';

  catButtons.forEach(btn => {
    btn.addEventListener('click', function () {
      const category = this.getAttribute('data-category');
      if (category === currentCategory) return;
      currentCategory = category;

      // Toggle button class
      catButtons.forEach(b => b.classList.remove('active'));
      this.classList.add('active');

      // Scroll active tab horizontally inside the tab bar only (mobile)
      if (tabsWrap && tabsWrap.scrollWidth > tabsWrap.clientWidth) {
        const left = this.offsetLeft - (tabsWrap.clientWidth - this.offsetWidth) / 2;
        tabsWrap.scrollTo({ left: left, behavior: 'smooth' });
      }

      // Stop running animations so quick clicks never queue up
      gsap.killTweensOf(items);

      const matches = item =>
        category === 'all' || item.getAttribute('data-category') === category;

      const visibleNow = items.filter(i => i.style.display !== 'none');

      // Step 1: soft fade-out of what is currently visible
      gsap.to(visibleNow, {
        opacity: 0,
        scale: 0.96,
        y: 10,
        duration: 0.25,
        ease: 'power2.in',
        stagger: { amount: 0.15 },
        overwrite: true,
        onComplete: () => {
          // Step 2: swap items
          items.forEach(item => {
            item.style.display = matches(item) ? 'flex' : 'none';
          });

          const toShow = items.filter(matches);

          // Step 3: smooth fade-in
          gsap.fromTo(
            toShow,
            { opacity: 0, scale: 0.95, y: 20 },
            {
              opacity: 1,
              scale: 1,
              y: 0,
              duration: 0.6,
              ease: 'power3.out',
              stagger: { amount: 0.4 },
              overwrite: true,
              clearProps: 'transform',
              onComplete: () => {
                if (window.ScrollTrigger) ScrollTrigger.refresh();
              }
            }
          );
        }
      });
    });
  });
}

// Lucknow Shaan swipers (sirf un pages par chalenge jahan Swiper aur elements hain)
window.addEventListener('load', function () {
  if (typeof Swiper === 'undefined') return;
  if (!document.querySelector('.shaan-swiper') || !document.querySelector('.lineage-swiper')) return;

  var SPEED = 600;
  var DELAY = 5000;

  // Master: image swiper (autoplay yahin chalta hai)
  var imgSwiper = new Swiper('.shaan-swiper', {
    slidesPerView: 1,
    loop: true,
    speed: SPEED,
    autoplay: {
      delay: DELAY,
      disableOnInteraction: false,
      pauseOnMouseEnter: false
    },
    pagination: {
      el: '.shaan-pagination',
      clickable: true
    }
  });

  // Follower: naam swiper (vertical)
  var nameSwiper = new Swiper('.lineage-swiper', {
    direction: 'vertical',
    slidesPerView: 1,
    loop: true,
    speed: SPEED,
    allowTouchMove: false,
    pagination: {
      el: '.lineage-pagination',
      clickable: false
    }
  });

  imgSwiper.on('slideNextTransitionStart', function () {
    nameSwiper.slideNext(SPEED);
  });

  imgSwiper.on('slidePrevTransitionStart', function () {
    nameSwiper.slidePrev(SPEED);
  });

  imgSwiper.on('slideChangeTransitionEnd', function () {
    if (nameSwiper.realIndex !== imgSwiper.realIndex) {
      nameSwiper.slideToLoop(imgSwiper.realIndex, 0);
    }
  });
});


  document.addEventListener('DOMContentLoaded', function () {
    var dropdowns = document.querySelectorAll('.heritage-header .dropdown');
    var CLOSE_DELAY = 200; // ms the menu stays open after the pointer leaves

    dropdowns.forEach(function (dd) {
      var timer = null;

      function open() {
        clearTimeout(timer);
        dropdowns.forEach(function (other) {
          if (other !== dd) other.classList.remove('is-open');
        });
        dd.classList.add('is-open');
      }

      function close() {
        clearTimeout(timer);
        timer = setTimeout(function () {
          dd.classList.remove('is-open');
        }, CLOSE_DELAY);
      }

      dd.addEventListener('mouseenter', open);
      dd.addEventListener('mouseleave', close);
      dd.addEventListener('focusin', open);
      dd.addEventListener('focusout', close);
    });
  });