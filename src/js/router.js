/* global loadJs gtag GA_TRACKING_ID */

let initLoader;
let trackClicks;
const maxDelay = 500; // if request takes maore than this much ms, we won't show user the "loading"
let reqStartTime;
let notFoundFlag = false;

const changeHistory = (page) => {
  document.title = page.title;
  window.history.pushState(page, page.title, page.link);
};

const showLoader = () => {
  document.body.classList.add('loading');
};

const hideLoader = () => {
  let delay = new Date() - reqStartTime;
  if (delay > maxDelay) {
    delay = 0;
  } else {
    delay = maxDelay - delay;
  }
  window.setTimeout(() =>
    document.body.classList.remove('loading'), delay);
};

const showContent = (json) => {
  const main = document.getElementById('main');
  const isHomePage = json.slug === '';
  if (isHomePage) {
    document.body.classList.add('is-front-page');
  } else {
    document.body.classList.remove('is-front-page');
  }
  if (!json.link) throw new Error('bad content');

  window.scrollTo(0, 0);
  main.innerHTML = json.content;
  hideLoader();

  // track page view
  gtag('config', GA_TRACKING_ID, {
    page_title: json.title,
    page_path: json.link,
  });

  notFoundFlag = false;

  return json;
};

const setURL = (href) => {
  const path = href.split(window.location.host)[1];
  window.history.replaceState(window.history.state, document.title, path);
};

const loadPage = (href) => {
  const pastUrl = window.location.href;
  // change url so that slow requests don't lead to full page reload (due to trackClicks() callback)
  setURL(href);

  const parseResponse = (res) => {
    const contentType = res.headers.get('Content-Type');
    if (!res.ok) {
      return Promise.reject(new Error(res.statusCode));
    } else if (!contentType.includes('application/json')) {
      return Promise.reject(new Error('invalid response'));
    }
    return Promise.resolve(res.json());
  };

  const handleLoadError = (err) => {
    console.error(err);
    notFoundFlag = true;
    setURL(pastUrl); // reset url and history
    hideLoader();
  };

  let url = href;
  if (url.substr(-1) === '/') {
    url += 'index.json';
  } else if (url.endsWith('/index.json')) {
    /* do nothing */
  } else {
    url += '/index.json'; // when url ends without a trailing slash
  }

  return window.fetch(url)
    .then(parseResponse)
    .then(showContent)
    .then(changeHistory)
    .then(initLoader)
    .catch(handleLoadError);
};

window.onpopstate = ({ state }) => {
  if (!state || !state.link) {
    window.location.href = window.location.href;
  }

  reqStartTime = new Date().valueOf() + 250;
  showLoader();
  showContent(state);
  initLoader();
  trackClicks();
};

const loaderListener = (e) => {
  e.preventDefault();
  const target = e.target.closest('a');
  reqStartTime = new Date();
  showLoader();
  loadPage(target.href);
};

initLoader = () => {
  const links = document.querySelectorAll('a.xhr');

  for (const link of links) {
    link.removeEventListener('click', loaderListener, true);
    const { href } = link;
    const relHref = href.replace(`${window.location.protocol}//${window.location.host}`, '');
    if (relHref === href) {
      continue; // is external
    }
    if (href === window.location.href) {
      link.addEventListener('click', e => e.preventDefault());
      continue;
    }
    link.addEventListener('click', loaderListener, true);
  }
};

// track all clicks
trackClicks = () => {
  const links = document.querySelectorAll('a');
  const isExternal = url =>
    !url.includes(window.location.host);

  const fn = (e) => {
    e.preventDefault();
    let done = false;
    const target = e.target.closest('a');
    const label = target.dataset.id || target.innerText;
    const { href } = target;
    const action = href.split(window.location.host)[1] || href;
    const callback = () => {
      done = true;
      if (document.location.href !== href && !notFoundFlag) { // XXX
        document.location.href = href;
        console.log('callback', true);
      } else {
        console.log('callback', false);
      }
    };
    const props = {
      event_category: 'Click Open',
      event_label: label,
      event_callback: callback,
    };
    if (isExternal(href)) {
      if (!done) setTimeout(callback, 1000);
      props.transport_type = 'beacon';
    }
    gtag('event', action, props);
  };

  for (const link of links) {
    link.addEventListener('click', fn, false);
  }
};

initLoader();
trackClicks();

// google analytics
loadJs('https://www.googletagmanager.com/gtag/js?id=UA-113942220-1');

gtag('js', new Date());

gtag('config', GA_TRACKING_ID);
