/**
 * @preserve
 * Developed by Sid Vishnoi
 * (https://github.com/sidvishnoi)
 * Copyright 2018
 */

const isFrontPage = () =>
  window.location.pathname === '/sankalan/';

if (isFrontPage()) {
  document.body.classList.add('is-front-page');
}
