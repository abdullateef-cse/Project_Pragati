/**
 * Project Pragati - Apply translations to [data-key] elements
 * Depends on: languages.js (TRANSLATIONS)
 */

(function () {
  'use strict';

  var langSelect = document.getElementById('language-select');
  var currentLang = 'en';

  function getText(lang, key) {
    if (typeof TRANSLATIONS !== 'undefined' && TRANSLATIONS[lang] && TRANSLATIONS[lang][key]) {
      return TRANSLATIONS[lang][key];
    }
    return null;
  }

  function applyLanguage(lang) {
    currentLang = lang;
    var elements = document.querySelectorAll('[data-key]');
    elements.forEach(function (el) {
      var key = el.getAttribute('data-key');
      var text = getText(lang, key);
      if (text !== null) {
        if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
          if (el.placeholder !== undefined) el.placeholder = text;
        } else {
          el.textContent = text.replace(/\\n/g, '\n');
        }
      }
    });
    try {
      localStorage.setItem('pragati-lang', lang);
    } catch (e) {}
  }

  function init() {
    if (langSelect) {
      try {
        var saved = localStorage.getItem('pragati-lang');
        if (saved && TRANSLATIONS[saved]) {
          currentLang = saved;
          langSelect.value = saved;
        }
      } catch (e) {}

      langSelect.addEventListener('change', function () {
        applyLanguage(langSelect.value);
      });

      applyLanguage(langSelect.value);
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
