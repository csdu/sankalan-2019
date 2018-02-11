/* global bg gtag GA_TRACKING_ID isFrontPage */

let initLoader;
let trackClicks;
const maxDelay = 500; // if request takes maore than this much ms, we won't show user the "loading"
let reqStartTime;

const changeHistory = (page) => {
  document.title = page.title;
  window.history.pushState(page, page.title, page.link);
};

const showLoader = () => {
  document.body.classList.add('loading');
  bg.changeBackground('#000');
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
    bg.changeBackground('#fff');
  } else {
    document.body.classList.remove('is-front-page');
    bg.changeBackground('#000');
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

  return json;
};

const loadPage = (href) => {
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
    hideLoader();
    bg.changeBackground(isFrontPage() ? '#fff' : '#000');
  };

  const url = `${href}index.json`;

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
    link.removeEventListener('click', loaderListener);
    const { href } = link;
    const relHref = href.replace(`${window.location.protocol}//${window.location.host}`, '');
    if (relHref === href) {
      continue; // is external
    }
    if (href === window.location.href) {
      link.addEventListener('click', e => e.preventDefault());
      continue;
    }
    link.addEventListener('click', loaderListener);
  }
};

// track all clicks
trackClicks = () => {
  const links = document.querySelectorAll('a');
  const isExternal = url =>
    !url.startsWith(window.location.host, 7);

  const fn = (e) => {
    const target = e.target.closest('a');
    const label = target.dataset.id || target.innerText;
    const action = target.href.split(window.location.host)[1] || target.href;
    const props = {
      event_category: 'Click Open',
      event_label: label,
    };
    if (isExternal(target.href)) {
      e.preventDefault();
      const callback = () => {
        document.location.href = target.href;
        return true;
      };
      setTimeout(callback, 1000);
      props.transport_type = 'beacon';
      props.event_callback = callback;
    }
    gtag('event', action, props);
  };

  for (const link of links) {
    link.addEventListener('click', fn);
  }
};

initLoader();
trackClicks();

/* eslint-disable */
// google analytics
loadJs('https://www.googletagmanager.com/gtag/js?id=UA-113942220-1');

gtag('js', new Date());

gtag('config', GA_TRACKING_ID);
