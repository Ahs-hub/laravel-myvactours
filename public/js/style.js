//#region filter tour 
document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll(".category-btn");
        const cards = document.querySelectorAll(".tour-card");

        buttons.forEach(button => {
            button.addEventListener("click", function () {
                const selectedCategory = this.getAttribute("data-category");

                // Remove active from all
                buttons.forEach(btn => btn.classList.remove("active"));
                // Add active to clicked
                this.classList.add("active");

                // Show/hide cards
                cards.forEach(card => {
                    if (selectedCategory === "all" || card.getAttribute("data-category") === selectedCategory) {
                        card.style.display = "block";
                    } else {
                        card.style.display = "none";
                    }
                });
            });
        });
    });
//#endregion filter tour 

//#region search tour 
    document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll(".category-btn");
        const cards = document.querySelectorAll(".tour-card");
        const searchInput = document.getElementById("searchInput");

    // Only run filter logic if #searchInput exists
    if (searchInput) {
        let selectedCategory = "all";

        function filterCards() {
            const searchTerm = searchInput.value.toLowerCase();

            cards.forEach(card => {
                const category = card.getAttribute("data-category");
                const title = card.querySelector(".card-title").textContent.toLowerCase();

                const matchesCategory = selectedCategory === "all" || category === selectedCategory;
                const matchesSearch = title.includes(searchTerm);

                if (matchesCategory && matchesSearch) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        }

        // Handle category button click
        buttons.forEach(button => {
            button.addEventListener("click", function () {
                buttons.forEach(btn => btn.classList.remove("active"));
                this.classList.add("active");

                selectedCategory = this.getAttribute("data-category");
                filterCards();
            });
        });

        // Handle search input
        searchInput.addEventListener("input", filterCards);
      }
    });
//#endregion search tour

//#region Carousel (Home Carousel)
    document.addEventListener('DOMContentLoaded', function () {
        const homeSwiperEl = document.querySelector('.mySwiper');
        if (homeSwiperEl) {
            const homeSwiper = new Swiper('.mySwiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    },
                },
            });

            // Optional: Button interactions
            document.querySelectorAll('.square-yellow-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const serviceName = this.closest('.car-card').querySelector('h5').textContent;
                    alert(`Learn more about: ${serviceName}`);
                });
            });

            const viewAllBtn = document.querySelector('.view-all-btn');
            if (viewAllBtn) {
                viewAllBtn.addEventListener('click', function () {
                    alert('Redirecting to all services page...');
                });
            }
        }
    });
//#endregion Carousel
  
//#region gallery swiper tour detailed

// document.addEventListener('DOMContentLoaded', function () {
    let gallerySwiper;
    const modal = document.getElementById('galleryModal');

    if (modal) {
        modal.addEventListener('shown.bs.modal', function () {
            if (!gallerySwiper) {
                gallerySwiper = new Swiper('#gallerySwiper', {
                    direction: 'horizontal',
                    loop: true,
                    centeredSlides: true,
                    slidesPerView: 1,
                    spaceBetween: 20,
                    speed: 800,
                    grabCursor: true,
                    keyboard: { enabled: true, onlyInViewport: true },
                    mousewheel: { enabled: true, sensitivity: 1 },
                    autoplay: {
                        delay: 6000,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                        type: 'bullets',
                    },
                    effect: 'slide',
                    parallax: true,
                    on: {
                        slideChange: updateCounter,
                        init: updateCounter,
                        slideChangeTransitionStart() {
                            const activeSlide = this.slides[this.activeIndex];
                            const img = activeSlide.querySelector('img');
                            if (img) {
                                img.style.transform = 'scale(1.1)';
                                setTimeout(() => {
                                    img.style.transform = 'scale(1)';
                                }, 100);
                            }
                        }
                    }
                });
            } else {
                gallerySwiper.autoplay.start();
            }
        });

        modal.addEventListener('hidden.bs.modal', function () {
            if (gallerySwiper) {
                gallerySwiper.autoplay.stop();
            }
        });

        // Touch gesture support for swipe navigation
        let touchStartX = 0;
        let touchEndX = 0;

        document.addEventListener('touchstart', function (e) {
            touchStartX = e.changedTouches[0].screenX;
        });

        document.addEventListener('touchend', function (e) {
            touchEndX = e.changedTouches[0].screenX;
            const threshold = 50;
            if (modal.classList.contains('show') && gallerySwiper) {
                if (touchEndX < touchStartX - threshold) gallerySwiper.slideNext();
                if (touchEndX > touchStartX + threshold) gallerySwiper.slidePrev();
            }
        });

        // ESC closes modal
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && modal.classList.contains('show')) {
                bootstrap.Modal.getInstance(modal).hide();
            }
        });

        // Update counter
        function updateCounter() {
            if (!gallerySwiper) return;
        
            document.getElementById('currentSlide').textContent = gallerySwiper.realIndex + 1;
        
            let totalSlides = gallerySwiper.slides.length;
            if (gallerySwiper.params.loop) {
                // Subtract duplicated slides added by loop mode
                totalSlides -= gallerySwiper.loopedSlides;
            }
        
            document.getElementById('totalSlides').textContent = totalSlides + 1;
        }
    }
// });

//#endregion gallery swiper tour detailed

