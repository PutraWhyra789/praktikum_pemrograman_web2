document.addEventListener("DOMContentLoaded", () => {
  const animateSkillBars = () => {
    const skillBars = document.querySelectorAll(".skill-bar-fill")

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const target = entry.target
            const percent = target.getAttribute("data-percent")

            anime({
              targets: target,
              width: percent + "%",
              easing: "easeInOutQuart",
              duration: 1800,
              delay: (el, i) => i * 100,
            })

            const percentEl = target.parentNode.querySelector(".skill-percent")
            if (percentEl) {
              anime({
                targets: percentEl,
                innerHTML: [0, percent],
                round: 1,
                easing: "easeInOutExpo",
                duration: 1800,
                delay: (el, i) => i * 100,
              })
            }
            observer.unobserve(target)
          }
        })
      },
      { threshold: 0.2 },
    )

    skillBars.forEach((bar) => {
      observer.observe(bar)
    })
  }

  const animateIcons = () => {
    const icons = document.querySelectorAll(".skill-icon, .hobby-icon")

    icons.forEach((icon) => {
      icon.addEventListener("mouseenter", () => {
        anime({
          targets: icon,
          scale: [1, 1.2],
          rotate: "1turn",
          duration: 800,
          easing: "easeOutElastic(1, .5)",
        })
      })

      icon.addEventListener("mouseleave", () => {
        anime({
          targets: icon,
          scale: [1.2, 1],
          rotate: "0turn",
          duration: 600,
          easing: "easeOutQuad",
        })
      })
    })
  }
  const anime = window.anime

  animateSkillBars()
  animateIcons()

  const profileCard = document.querySelector(".profile-card")
  if (profileCard) {
    profileCard.addEventListener("click", () => {
      profileCard.classList.toggle("is-flipped")
    })
  }
})