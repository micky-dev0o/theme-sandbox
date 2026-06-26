/**
 * Main JS — mobile nav toggle. Keep this file small; pull in only what
 * each project actually needs (sliders, accordions, etc.) per-build.
 */

document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.querySelector(".site-header__hamburger");
  const nav = document.getElementById("site-header__mobile-nav");

  if (!toggleBtn || !nav) return;

  const openNav = () => {
    nav.classList.add("is-open");
    toggleBtn.setAttribute("aria-expanded", "true");
    toggleBtn.setAttribute("aria-label", "Close navigation menu");
  };

  const closeNav = () => {
    nav.classList.remove("is-open");
    toggleBtn.setAttribute("aria-expanded", "false");
    toggleBtn.setAttribute("aria-label", "Open navigation menu");
  };

  const toggleNav = () => {
    nav.classList.contains("is-open") ? closeNav() : openNav();
  };

  toggleBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    toggleNav();
  });

  // Close on Escape, return focus to the button
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && nav.classList.contains("is-open")) {
      closeNav();
      toggleBtn.focus();
    }
  });

  // Close on outside click
  document.addEventListener("click", (e) => {
    if (
      nav.classList.contains("is-open") &&
      !nav.contains(e.target) &&
      !toggleBtn.contains(e.target)
    ) {
      closeNav();
    }
  });

  // Close when a nav link is clicked (mobile menus usually should)
  nav.addEventListener("click", (e) => {
    if (e.target.closest(".site-header__mobile-nav-link")) {
      closeNav();
    }
  });
});
