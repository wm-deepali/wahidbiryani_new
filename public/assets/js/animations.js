// Wahid Biryani GSAP Animation Engine
// Elegant, slow, cinematic motion - Nazaakat, Shan, Tehzeeb

window.WahidAnimations = {
  // Preloader animation
  initPreloader: function (onComplete) {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      document.getElementById('preloader').style.display = 'none';
      if (onComplete) onComplete();
      return;
    }

    const tl = gsap.timeline({
      onComplete: function () {
        document.getElementById('preloader').style.display = 'none';
        if (onComplete) onComplete();
      }
    });

    // 1. Background is visible
    // 2. Gold line draws
    tl.to('.preloader-line', {
      width: '100%',
      duration: 0.3,
      ease: 'power2.inOut'
    })
      // 3. Logo fades in
      .to('.preloader-logo', {
        opacity: 1,
        y: 0,
        duration: 0.3,
        ease: 'power3.out'
      }, '-=0.1')
      // 4. "Since 1955" reveals
      .to('.preloader-subtitle', {
        opacity: 1,
        y: 0,
        duration: 0.2,
        ease: 'power3.out'
      }, '-=0.1')
      // Hold logo
      .to({}, { duration: 0.2 })
      // 5. Gold line retracts
      .to('.preloader-line', {
        width: '0%',
        duration: 0.2,
        ease: 'power2.inOut'
      })
      .to('.preloader-logo, .preloader-subtitle', {
        opacity: 0,
        y: -10,
        duration: 0.2,
        ease: 'power3.in'
      }, '-=0.1')
      // 6. Loader curtain splits/reveals website
      .to('.page-curtain-left', {
        xPercent: -100,
        duration: 0.4,
        ease: 'power4.inOut'
      })
      .to('.page-curtain-right', {
        xPercent: 100,
        duration: 0.4,
        ease: 'power4.inOut'
      }, '-=0.4');
  },

  // Standard Page Curtain Reveal (e.g. on direct entry or page load without loader)
  initPageReveal: function () {
    gsap.set('.page-curtain', { display: 'block' });

    gsap.timeline()
      .to('.page-curtain-left', {
        xPercent: -100,
        duration: 0.35,
        ease: 'power4.inOut'
      })
      .to('.page-curtain-right', {
        xPercent: 100,
        duration: 0.35,
        ease: 'power4.inOut'
      }, '-=0.35')
      .set('.page-curtain', { display: 'none' });
  },

  // Elegant header entrance & shrink on scroll
  initHeader: function () {
    // 1. Initial Page Load Entrance
    const tl = gsap.timeline({ delay: 0.2 });

    tl.fromTo('.announcement-bar', {
      y: -30,
      opacity: 0
    }, {
      y: 0,
      opacity: 1,
      duration: 0.6,
      ease: 'power3.out'
    })
      .fromTo('.logo-link', {
        y: -20,
        opacity: 0
      }, {
        y: 0,
        opacity: 1,
        duration: 0.6,
        ease: 'power3.out'
      }, '-=0.3')
      .fromTo('.nav-menu li', {
        y: -15,
        opacity: 0
      }, {
        y: 0,
        opacity: 1,
        stagger: 0.06,
        duration: 0.5,
        ease: 'power3.out'
      }, '-=0.4')
      .fromTo('.nav-cta', {
        scale: 0.96,
        opacity: 0
      }, {
        scale: 1,
        opacity: 1,
        duration: 0.5,
        ease: 'power3.out'
      }, '-=0.3')
      .fromTo('.header-border', {
        scaleX: 0,
        opacity: 0
      }, {
        scaleX: 1,
        opacity: 0.5,
        duration: 0.8,
        ease: 'power2.inOut'
      }, '-=0.5');

    // 2. Shrink on Scroll (Direct scroll listener to prevent loading/preloader layout glitches)
    const handleScroll = () => {
      const header = document.querySelector('.heritage-header');
      if (!header) return;
      if (window.scrollY > 50) {
        header.classList.add('compact');
      } else {
        header.classList.remove('compact');
      }
    };
    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll(); // Set correct state on load
  },

  // Premium GSAP Navigation Dropdown Fades
  initDropdowns: function () {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    const dropdowns = document.querySelectorAll('.heritage-header .dropdown');
    dropdowns.forEach(dropdown => {
      const menu = dropdown.querySelector('.dropdown-menu');
      if (!menu) return;
      const items = menu.querySelectorAll('li');
      let tl = null;

      dropdown.addEventListener('mouseenter', () => {
        if (window.matchMedia('(max-width: 1279px)').matches) return;

        if (tl) tl.kill();
        tl = gsap.timeline();

        tl.set(menu, { visibility: 'visible', pointerEvents: 'auto' })
          .fromTo(menu, {
            opacity: 0,
            y: 15,
            clipPath: 'inset(0 0 100% 0)'
          }, {
            opacity: 1,
            y: 0,
            clipPath: 'inset(0 0 0% 0)',
            duration: 0.5,
            ease: 'power3.out'
          })
          .fromTo(items, {
            opacity: 0,
            y: 8
          }, {
            opacity: 1,
            y: 0,
            stagger: 0.06,
            duration: 0.35,
            ease: 'power2.out'
          }, '-=0.3');
      });

      dropdown.addEventListener('mouseleave', () => {
        if (window.matchMedia('(max-width: 1279px)').matches) return;

        if (tl) tl.kill();
        tl = gsap.timeline();

        tl.to(menu, {
          opacity: 0,
          y: 10,
          clipPath: 'inset(0 0 100% 0)',
          duration: 0.35,
          ease: 'power3.inOut',
          onComplete: () => {
            gsap.set(menu, { visibility: 'hidden', pointerEvents: 'none' });
          }
        });
      });
    });
  },

  // Cinematic Hero Reveal
  initHero: function () {
    const tl = gsap.timeline();

    // 1. Background image scale reveal
    tl.to('.hero-bg', {
      scale: 1,
      opacity: 1,
      duration: 1.5,
      ease: 'power3.out'
    })
      // 2. Dark overlay fade
      .to('.hero-overlay', {
        opacity: 1,
        duration: 1.0,
        ease: 'power2.out'
      }, '-=1.2')
      // 3. Urdu eyebrow & subtitle reveals
      .to('.hero-urdu, .hero-subtitle', {
        y: 0,
        opacity: 1,
        stagger: 0.15,
        duration: 0.6,
        ease: 'power3.out'
      }, '-=0.8')
      // 4. Main heading reveals word-by-word
      // Target custom word elements created by splitText helper
      .to('.hero-heading .word', {
        y: '0%',
        opacity: 1,
        stagger: 0.05,
        duration: 0.8,
        ease: 'power4.out'
      }, '-=0.6')
      // 5. Description reveals
      .to('.hero-desc', {
        y: 0,
        opacity: 1,
        duration: 0.8,
        ease: 'power3.out'
      }, '-=0.5')
      // 6. CTA buttons reveal
      .to('.hero-ctas', {
        y: 0,
        opacity: 1,
        duration: 0.6,
        ease: 'power3.out'
      }, '-=0.5')
      // 7. Gold ornament draws
      .to('.hero-ornament', {
        scale: 1,
        opacity: 1,
        duration: 0.8,
        ease: 'power2.out'
      }, '-=0.4')
      .to('.hero-ornament .ornament-line', {
        strokeDashoffset: 0,
        duration: 1.2,
        ease: 'power2.inOut'
      }, '-=0.8');

    // 8. Hero image subtle parallax on scroll
    if (!window.matchMedia('(max-width: 768px)').matches && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      gsap.to('.hero-bg', {
        yPercent: 8,
        ease: 'none',
        scrollTrigger: {
          trigger: '.hero-section',
          start: 'top top',
          end: 'bottom top',
          scrub: true
        }
      });
    }
  },

  // General scroll reveal for headings, texts
  initTextReveals: function () {
    // Reveal text split into words
    gsap.utils.toArray('.split-words').forEach(elem => {
      const words = elem.querySelectorAll('.word');
      if (words.length > 0) {
        gsap.to(words, {
          y: 0,
          opacity: 1,
          stagger: 0.04,
          duration: 0.8,
          ease: 'power3.out',
          scrollTrigger: {
            trigger: elem,
            start: 'top 90%'
          }
        });
      }
    });

    // Reusable vertical slide-up text reveal
    gsap.utils.toArray('.reveal-up').forEach(elem => {
      gsap.fromTo(elem, {
        y: 40,
        opacity: 0
      }, {
        y: 0,
        opacity: 1,
        duration: 0.8,
        ease: 'power3.out',
        scrollTrigger: {
          trigger: elem,
          start: 'top 90%'
        }
      });
    });

    gsap.utils.toArray('.reveal-left').forEach(elem => {
      gsap.fromTo(elem, {
        x: -40,
        opacity: 0
      }, {
        x: 0,
        opacity: 1,
        duration: 0.8,
        ease: 'power3.out',
        scrollTrigger: {
          trigger: elem,
          start: 'top 90%'
        }
      });
    });

    gsap.utils.toArray('.reveal-right').forEach(elem => {
      gsap.fromTo(elem, {
        x: 40,
        opacity: 0
      }, {
        x: 0,
        opacity: 1,
        duration: 0.8,
        ease: 'power3.out',
        scrollTrigger: {
          trigger: elem,
          start: 'top 90%'
        }
      });
    });

    gsap.utils.toArray('.reveal-scale').forEach(elem => {
      gsap.fromTo(elem, {
        scale: 0.95,
        opacity: 0
      }, {
        scale: 1,
        opacity: 1,
        duration: 0.8,
        ease: 'power3.out',
        scrollTrigger: {
          trigger: elem,
          start: 'top 90%'
        }
      });
    });

    // Custom paragraph word/line reveals
    gsap.utils.toArray('.text-reveal').forEach(elem => {
      // Split element lines or words, then animate them
      const words = elem.querySelectorAll('.word');
      if (words.length > 0) {
        gsap.to(words, {
          y: 0,
          opacity: 1,
          stagger: 0.02,
          duration: 0.8,
          ease: 'power3.out',
          scrollTrigger: {
            trigger: elem,
            start: 'top 85%'
          }
        });
      } else {
        gsap.to(elem, {
          opacity: 1,
          duration: 1.0,
          ease: 'power2.out',
          scrollTrigger: {
            trigger: elem,
            start: 'top 85%'
          }
        });
      }
    });

    // Elegant delicate line reveals (SVGs drawing on entrance)
    gsap.utils.toArray('.line-reveal').forEach(svg => {
      const lines = svg.querySelectorAll('.ornament-line');
      gsap.to(lines, {
        strokeDashoffset: 0,
        duration: 1.4,
        ease: 'power3.inOut',
        scrollTrigger: {
          trigger: svg,
          start: 'top 85%'
        }
      });
      gsap.to(svg, {
        opacity: 1,
        duration: 0.8,
        scrollTrigger: {
          trigger: svg,
          start: 'top 85%'
        }
      });
    });
  },

  // Reusable image reveals with scale and clip-path
  initImageReveals: function () {
    gsap.utils.toArray('.image-reveal').forEach(wrapper => {
      const img = wrapper.querySelector('img');
      const tl = gsap.timeline({
        scrollTrigger: {
          trigger: wrapper,
          start: 'top 82%'
        }
      });

      // Animate clip path and image scaling
      tl.to(wrapper, {
        opacity: 1,
        clipPath: 'inset(0% 0% 0% 0%)',
        duration: 1.2,
        ease: 'power4.inOut'
      })
        .to(img, {
          scale: 1,
          duration: 1.4,
          ease: 'power3.out'
        }, '-=1.2');
    });
  },

  // Responsive Parallax setup
  initParallax: function () {
    const mm = gsap.matchMedia();

    // Desktop only parallax
    mm.add('(min-width: 1280px)', () => {
      gsap.utils.toArray('[data-parallax-speed]').forEach(elem => {
        const speed = parseFloat(elem.getAttribute('data-parallax-speed')) || 0.1;
        gsap.to(elem, {
          yPercent: speed * 100,
          ease: 'none',
          scrollTrigger: {
            trigger: elem,
            start: 'top bottom',
            end: 'bottom top',
            scrub: true
          }
        });
      });
    });

    // Tablet: reduced parallax
    mm.add('(min-width: 768px) and (max-width: 1279px)', () => {
      gsap.utils.toArray('[data-parallax-speed]').forEach(elem => {
        const speed = parseFloat(elem.getAttribute('data-parallax-speed')) || 0.1;
        gsap.to(elem, {
          yPercent: (speed * 0.4) * 100,
          ease: 'none',
          scrollTrigger: {
            trigger: elem,
            start: 'top bottom',
            end: 'bottom top',
            scrub: true
          }
        });
      });
    });

    // Mobile: disable or replace with tiny translation
    mm.add('(max-width: 767px)', () => {
      gsap.utils.toArray('[data-parallax-speed]').forEach(elem => {
        gsap.set(elem, { yPercent: 0 });
      });
    });
  },

  // Family Archive Legacy Timeline (Vertical on all screens)
  initLegacyTimeline: function () {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      gsap.utils.toArray('.timeline-card').forEach(card => card.classList.add('active'));
      return;
    }

    // 1. Grow central gold line on scroll
    gsap.fromTo('.timeline-track', {
      height: '0%'
    }, {
      height: '100%',
      ease: 'none',
      scrollTrigger: {
        trigger: '.timeline-section',
        start: 'top 20%',
        end: 'bottom 80%',
        scrub: true
      }
    });

    // 2. Animate items in on scroll
    gsap.utils.toArray('.timeline-item').forEach(item => {
      const badge = item.querySelector('.timeline-badge');
      const card = item.querySelector('.timeline-card');
      const year = item.querySelector('.timeline-year');
      const img = item.querySelector('.timeline-image-wrapper img');

      const tl = gsap.timeline({
        scrollTrigger: {
          trigger: item,
          start: 'top 75%'
        }
      });

      tl.to(badge, {
        scale: 1,
        backgroundColor: '#C49A45',
        duration: 0.4,
        ease: 'back.out(1.7)'
      })
        .to(card, {
          opacity: 1,
          x: 0,
          y: 0,
          rotation: 0,
          duration: 0.8,
          ease: 'power3.out',
          onComplete: () => card.classList.add('active')
        }, '-=0.2');

      if (img) {
        tl.fromTo(img, {
          scale: 1.15
        }, {
          scale: 1,
          duration: 1.2,
          ease: 'power2.out'
        }, '-=0.8');
      }
    });
  },

  // Cinematic Biryani Dum Animation Section
  initDumStory: function () {
    const mm = gsap.matchMedia();

    mm.add('(min-width: 1280px)', () => {
      // 1. Handi upward movement and background glow scaling
      gsap.to('.dum-handi', {
        yPercent: -15,
        ease: 'none',
        scrollTrigger: {
          trigger: '.dum-section',
          start: 'top bottom',
          end: 'bottom top',
          scrub: true
        }
      });

      gsap.to('.dum-bg-glow', {
        scale: 1.3,
        ease: 'none',
        scrollTrigger: {
          trigger: '.dum-section',
          start: 'top bottom',
          end: 'bottom top',
          scrub: true
        }
      });

      // 2. Rising steam layers (slow loop)
      const steamLayers = gsap.utils.toArray('.dum-steam-layer');
      steamLayers.forEach((layer, idx) => {
        gsap.to(layer, {
          y: -60,
          opacity: 0.4,
          duration: 4 + idx,
          repeat: -1,
          yoyo: true,
          ease: 'sine.inOut'
        });
      });

      // 3. Staggered reveal of description cards
      gsap.utils.toArray('.dum-step-card').forEach((card, idx) => {
        gsap.to(card, {
          y: 0,
          opacity: 1,
          duration: 0.8,
          ease: 'power3.out',
          scrollTrigger: {
            trigger: card,
            start: 'top 80%'
          }
        });
      });

      // Saffron strands falling
      gsap.utils.toArray('.dum-saffron-strand').forEach((strand, idx) => {
        gsap.to(strand, {
          y: 300,
          rotation: 360,
          opacity: 0.7,
          duration: 6 + (idx * 2),
          repeat: -1,
          ease: 'none'
        });
      });
    });

    mm.add('(max-width: 1279px)', () => {
      // Mobile - simplified
      gsap.utils.toArray('.dum-step-card').forEach(card => {
        gsap.to(card, {
          y: 0,
          opacity: 1,
          duration: 0.6,
          ease: 'power3.out',
          scrollTrigger: {
            trigger: card,
            start: 'top 85%'
          }
        });
      });
    });
  },

  // Horizontal Storytelling Gallery - Pinned Scroll Trigger
  initSignatureDishes: function () {
    const mm = gsap.matchMedia();

    // Desktop: Pinned horizontal scrolling for "The Royal Dastarkhwan"
    mm.add('(min-width: 1280px)', () => {
      const track = document.querySelector('.horizontal-scroll-track');
      if (!track) return;

      const slides = gsap.utils.toArray('.horizontal-slide');
      const amountToScroll = track.offsetWidth - window.innerWidth;

      const scrollTween = gsap.to(track, {
        x: -amountToScroll,
        ease: 'none',
        scrollTrigger: {
          trigger: '.horizontal-scroll-container',
          pin: true,
          scrub: 1,
          start: 'top 100px',
          end: () => '+=' + amountToScroll,
          invalidateOnRefresh: true
        }
      });

      // Animate card entries slightly during slide
      slides.forEach((slide) => {
        const card = slide.querySelector('.story-card');
        gsap.fromTo(card, {
          y: 30,
          opacity: 0.8
        }, {
          y: 0,
          opacity: 1,
          duration: 0.5,
          scrollTrigger: {
            trigger: slide,
            containerAnimation: scrollTween,
            start: 'left right-=100px',
            toggleActions: 'play none none reverse'
          }
        });
      });
    });

    // Mobile/Tablet: Standard vertical grid, disable horizontal scroll
    mm.add('(max-width: 1279px)', () => {
      // Reset track transform
      gsap.set('.horizontal-scroll-track', { x: 0 });
    });

    // Dish Rows Hover / Reveal animation
    gsap.utils.toArray('.dish-row').forEach(row => {
      const title = row.querySelector('.dish-title');
      const desc = row.querySelector('.dish-desc');
      const img = row.querySelector('.dish-image-col');
      const num = row.querySelector('.dish-number');

      // Scroll reveal
      gsap.fromTo([num, title, desc], {
        y: 30,
        opacity: 0
      }, {
        y: 0,
        opacity: 1,
        stagger: 0.08,
        duration: 0.8,
        ease: 'power3.out',
        scrollTrigger: {
          trigger: row,
          start: 'top 85%'
        }
      });
    });
  },

  // Method 6 stages timeline
  initLegacyTimelineMethod: function () {
    const mm = gsap.matchMedia();

    // Desktop Horizontal scroll for Awadhi cooking stages
    mm.add('(min-width: 1280px)', () => {
      const track = document.querySelector('.method-horizontal-track');
      if (!track) return;

      const amountToScroll = track.offsetWidth - window.innerWidth;

      const scrollTween = gsap.to(track, {
        x: -amountToScroll,
        ease: 'none',
        scrollTrigger: {
          trigger: '.method-section',
          pin: true,
          scrub: 1,
          start: 'top top',
          end: () => '+=' + amountToScroll,
          invalidateOnRefresh: true
        }
      });

      // Highlight active slide based on scroll position
      const slides = gsap.utils.toArray('.method-slide');
      slides.forEach((slide, idx) => {
        ScrollTrigger.create({
          trigger: slide,
          start: 'left center',
          end: 'right center',
          containerAnimation: scrollTween,
          onEnter: () => {
            slides.forEach(s => s.classList.remove('active'));
            slide.classList.add('active');
          },
          onEnterBack: () => {
            slides.forEach(s => s.classList.remove('active'));
            slide.classList.add('active');
          }
        });
      });
    });

    // Mobile: vertical timeline, simply add active class as it scrolls into view
    mm.add('(max-width: 1279px)', () => {
      gsap.set('.method-horizontal-track', { x: 0 });

      const slides = gsap.utils.toArray('.method-slide');
      slides.forEach((slide) => {
        ScrollTrigger.create({
          trigger: slide,
          start: 'top center+=100px',
          end: 'bottom center',
          onEnter: () => slide.classList.add('active'),
          onLeaveBack: () => slide.classList.remove('active')
        });
      });
    });
  },

  // Gallery grid Masonry/Lightbox reveal
  initGallery: function () {
    // Reveal gallery grid items
    gsap.fromTo('.gallery-item', {
      opacity: 0,
      scale: 0.95,
      y: 40
    }, {
      opacity: 1,
      scale: 1,
      y: 0,
      stagger: 0.08,
      duration: 0.8,
      ease: 'power3.out',
      scrollTrigger: {
        trigger: '.gallery-grid',
        start: 'top 85%'
      }
    });

    // Modal Lightbox transitions
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
      modal.addEventListener('show.bs.modal', function () {
        // Find modal dialog inside and animate it
        const dialog = modal.querySelector('.modal-content');
        gsap.fromTo(dialog, {
          scale: 0.95,
          opacity: 0
        }, {
          scale: 1,
          opacity: 1,
          duration: 0.4,
          ease: 'power3.out'
        });
      });
    });
  },

  // Video thumbnails interactions
  initVideoGallery: function () {
    gsap.utils.toArray('.video-thumbnail').forEach(thumb => {
      const playBtn = thumb.querySelector('.play-btn');

      thumb.addEventListener('mouseenter', () => {
        gsap.to(playBtn, { scale: 1, duration: 0.3, ease: 'power2.out' });
      });
      thumb.addEventListener('mouseleave', () => {
        gsap.to(playBtn, { scale: 0.9, duration: 0.3, ease: 'power2.out' });
      });
    });
  },

  // Contact mehfil header and form sequential reveals
  initContactAnimations: function () {
    const tl = gsap.timeline();

    // 1. Urdu "خوش آمدید" first
    tl.fromTo('.contact-urdu', {
      y: 20,
      opacity: 0
    }, {
      y: 0,
      opacity: 1,
      duration: 0.7,
      ease: 'power3.out'
    })
      // 2. English header reveals word by word
      .to('.contact-title .word', {
        y: 0,
        opacity: 1,
        stagger: 0.05,
        duration: 0.7,
        ease: 'power3.out'
      }, '-=0.3')
      // 3. Contact information blocks
      .fromTo('.contact-info-block', {
        y: 30,
        opacity: 0
      }, {
        y: 0,
        opacity: 1,
        stagger: 0.1,
        duration: 0.6,
        ease: 'power3.out'
      }, '-=0.4')
      // 4. Form inputs reveal
      .to('.contact-form-group', {
        y: 0,
        opacity: 1,
        stagger: 0.08,
        duration: 0.6,
        ease: 'power3.out'
      }, '-=0.5');

    // Form inputs border focus using GSAP is optional but we can bind JS triggers.
  },

  // Footer book-closing animation
  initFooter: function () {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: '.heritage-footer',
        start: 'top 90%'
      }
    });

    tl.fromTo('.footer-top-ornament', {
      scale: 0.6,
      opacity: 0
    }, {
      scale: 1,
      opacity: 1,
      duration: 0.8,
      ease: 'power3.out'
    })
      .fromTo('.footer-logo', {
        y: 30,
        opacity: 0
      }, {
        y: 0,
        opacity: 1,
        duration: 0.8,
        ease: 'power3.out'
      }, '-=0.4')
      .fromTo('.footer-nav-link', {
        y: 10,
        opacity: 0
      }, {
        y: 0,
        opacity: 1,
        stagger: 0.05,
        duration: 0.5,
        ease: 'power3.out'
      }, '-=0.4')
      .fromTo('.footer-social-link', {
        scale: 0.8,
        opacity: 0
      }, {
        scale: 1,
        opacity: 1,
        stagger: 0.06,
        duration: 0.5,
        ease: 'back.out(1.5)'
      }, '-=0.3')
      .fromTo('.footer-divider', {
        scaleX: 0
      }, {
        scaleX: 1,
        duration: 0.8,
        ease: 'power2.inOut'
      }, '-=0.2')
      .fromTo('.footer-copyright', {
        opacity: 0
      }, {
        opacity: 0.85,
        duration: 0.4
      }, '-=0.1');
  },

  // Clean up animation on reduced motion or screen shifts
  initReducedMotion: function () {
    ScrollTrigger.getAll().forEach(trigger => trigger.kill());
    gsap.killTweensOf('*');

    // Set all animation values immediately
    gsap.set('.reveal-up, .reveal-left, .reveal-right, .reveal-scale, .image-reveal, .line-reveal, .text-reveal', {
      opacity: 1,
      y: 0,
      x: 0,
      scale: 1,
      clipPath: 'none'
    });

    gsap.set('.hero-bg', { scale: 1, opacity: 1 });
    gsap.set('.hero-overlay', { opacity: 1 });
    gsap.set('.hero-urdu, .hero-desc, .hero-ctas, .hero-ornament', { opacity: 1, y: 0, scale: 1 });
    gsap.set('.hero-heading .word, .split-words .word', { y: 0, opacity: 1 });
    gsap.set('.preloader-logo, .preloader-subtitle', { opacity: 1, y: 0 });
    gsap.set('.timeline-track', { height: '100%' });
    gsap.set('.timeline-card', { opacity: 1, x: 0, y: 0, rotation: 0 });
    document.querySelectorAll('.timeline-card').forEach(c => c.classList.add('active'));
    document.querySelectorAll('.method-slide').forEach(s => s.classList.add('active'));
  }
};
