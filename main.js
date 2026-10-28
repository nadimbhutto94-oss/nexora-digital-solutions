(function () {
  'use strict';

  /* Mobile nav toggle */
  var toggle = document.querySelector('.nav-toggle');
  var nav = document.getElementById('site-nav');
  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      var open = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', String(open));
    });
    nav.addEventListener('click', function (e) {
      if (e.target.tagName === 'A') {
        nav.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
      }
    });
  }

  /* FAQ accordion: one open at a time, keyboard accessible (native buttons) */
  var faq = document.querySelector('[data-faq]');
  if (faq) {
    var buttons = faq.querySelectorAll('.faq__btn');

    function setOpen(btn, open) {
      var panel = document.getElementById(btn.getAttribute('aria-controls'));
      btn.setAttribute('aria-expanded', String(open));
      panel.style.maxHeight = open ? panel.scrollHeight + 'px' : '0px';
    }

    buttons.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var willOpen = btn.getAttribute('aria-expanded') !== 'true';
        buttons.forEach(function (other) { setOpen(other, false); });
        if (willOpen) { setOpen(btn, true); }
      });
    });

    window.addEventListener('resize', function () {
      buttons.forEach(function (btn) {
        if (btn.getAttribute('aria-expanded') === 'true') { setOpen(btn, true); }
      });
    });
  }

  /* Contact form: friendly client-side validation (server validates too) */
  var form = document.querySelector('[data-contact-form]');
  if (form) {
    var rules = {
      name: function (v) { return v.trim().length < 2 ? 'Please enter your name.' : ''; },
      email: function (v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim()) ? '' : 'Please enter a valid email address.'; },
      message: function (v) { return v.trim().length < 10 ? 'Please write at least 10 characters.' : ''; }
    };

    function check(field) {
      var input = form.elements[field];
      var msg = rules[field](input.value);
      form.querySelector('[data-error-for="' + field + '"]').textContent = msg;
      input.setAttribute('aria-invalid', msg ? 'true' : 'false');
      return !msg;
    }

    Object.keys(rules).forEach(function (field) {
      form.elements[field].addEventListener('blur', function () { check(field); });
    });

    form.addEventListener('submit', function (e) {
      var ok = true;
      Object.keys(rules).forEach(function (field) { if (!check(field)) { ok = false; } });
      if (!ok) {
        e.preventDefault();
        var firstBad = form.querySelector('[aria-invalid="true"]');
        if (firstBad) { firstBad.focus(); }
      }
    });
  }
})();
