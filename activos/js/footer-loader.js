(function () {
  function ensureFooterStylesheet() {
    var existingLink = document.querySelector('link[data-shared-footer-css="true"]');
    if (existingLink) {
      return;
    }

    var link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = 'activos/css/footer.css';
    link.setAttribute('data-shared-footer-css', 'true');
    document.head.appendChild(link);
  }

  function loadSharedFooter() {
    var container = document.getElementById('shared-footer');
    if (!container) {
      return;
    }

    fetch('footer.html')
      .then(function (response) {
        if (!response.ok) {
          throw new Error('No se pudo cargar footer.html');
        }
        return response.text();
      })
      .then(function (html) {
        container.innerHTML = html;
      })
      .catch(function (error) {
        console.error(error);
      });
  }

  document.addEventListener('DOMContentLoaded', function () {
    ensureFooterStylesheet();
    loadSharedFooter();
  });
})();
