/**
 * @preserve
 * Developed by Sudhanshu Vishnoi
 * (https://github.com/sidvishnoi)
 * Copyright 2019
 */

window.dataLayer = window.dataLayer || [];
function gtag() {
  dataLayer.push(arguments);
}
const GA_TRACKING_ID = 'UA-113942220-1';

// print that status message in console :D
const pprint = {
  ct: `${'\u00a0'.repeat(13)}Hey you, Hackerman!${'\u00a0'.repeat(16)}
${'\u00a0'.repeat(2)}I see you are interested in the source code.${'\u00a0'.repeat(2)}
${'\u00a0'.repeat(13)}Let me help you :)${'\u00a0'.repeat(17)}`,
  st: 'background: #bada55;color:#000;font-weight: bold;',
};
console.log(`%c${pprint.ct}`, pprint.st);
console.log(`%c${'\u00a0'.repeat(1)}https://github.com/sidvishnoi/sankalan-2019${'\u00a0'.repeat(2)}`, 'color: yellow;padding:4px;background:#000');

const isFrontPage = () =>
  window.location.pathname.replace('index.html', '') === '/sankalan/';

if (isFrontPage()) {
  document.body.classList.add('is-front-page');
}
