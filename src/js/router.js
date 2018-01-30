/* global bg, isFrontPage */

let initLoader;
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
};

const loaderListener = (e) => {
  e.preventDefault();
  const target = e.target.closest('a');
  document.body.classList.add('loading');
  reqStartTime = new Date();
  const wait = isFrontPage() ? 600 : 0;
  setTimeout(() => {
    showLoader();
    loadPage(target.href);
  }, wait);
};

initLoader = () => {
  const links = document.querySelectorAll('a');

  for (const link of links) {
    link.removeEventListener('click', loaderListener);
    const { href } = link;
    const relHref = href.replace(`${window.location.protocol}//${window.location.host}`, '');
    if (relHref === href) {
      return; // is external
    }
    if (href === window.location.href) {
      link.addEventListener('click', e => e.preventDefault());
      // eslint-disable-next-line no-continue
      continue;
    }
    link.addEventListener('click', loaderListener);
  }
};

initLoader();
