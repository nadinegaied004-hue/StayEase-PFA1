// Simple Navbar - Same for ALL pages
const ORANGE = '#e67e22';
const navbarHTML = `
<nav style="position:fixed;top:0;left:0;right:0;z-index:50;background:white;box-shadow:0 4px 20px rgba(0,0,0,0.06);height:70px;">
  <div style="height:100%;display:flex;align-items:center;justify-content:space-between;padding:0 8px;">
    <div style="display:flex;align-items:center;">
      <a href="index.html" style="text-decoration:none;">
        <span style="font-size:1.75rem;font-weight:bold;color:${ORANGE};font-family:serif;margin-right:8px;">StayEase</span>
      </a>
    </div>
    <div style="display:flex;align-items:center;position:absolute;left:50%;transform:translateX(-50%);">
      <a href="index.html" style="color:#333;font-weight:600;text-decoration:none;padding:8px 16px;border-radius:25px;font-size:0.9rem;margin-right:4px;display:flex;align-items:center;gap:6px;"><i data-lucide="home" style="width:16px;height:16px;"></i>Accueil</a>
      <a href="hotels.html" style="color:#333;font-weight:600;text-decoration:none;padding:8px 16px;border-radius:25px;font-size:0.9rem;margin-right:4px;display:flex;align-items:center;gap:6px;"><i data-lucide="building-2" style="width:16px;height:16px;"></i>Logements</a>
      <a href="avis.html" style="color:#333;font-weight:600;text-decoration:none;padding:8px 16px;border-radius:25px;font-size:0.9rem;margin-right:4px;display:flex;align-items:center;gap:6px;"><i data-lucide="star" style="width:16px;height:16px;"></i>Avis Clients</a>
      <a href="avis-personnel.html" style="color:#333;font-weight:600;text-decoration:none;padding:8px 16px;border-radius:25px;font-size:0.9rem;margin-right:4px;display:flex;align-items:center;gap:6px;"><i data-lucide="clipboard-list" style="width:16px;height:16px;"></i>Avis Personnel</a>
      <a id="nav-update" href="proprietaire.html" style="color:#333;font-weight:600;text-decoration:none;padding:8px 16px;border-radius:25px;font-size:0.9rem;display:none;margin-right:4px;"><i data-lucide="settings" style="width:16px;height:16px;"></i>Mise à jour</a>
    </div>
    <div style="display:flex;align-items:center;">
      <span id="user-name" style="color:#333;font-weight:600;font-size:0.9rem;margin-right:12px;"></span>
      <button id="auth-btn" onclick="handleAuth()" style="background:${ORANGE};color:white;border:none;padding:8px 20px;border-radius:25px;cursor:pointer;font-weight:600;font-size:0.9rem;"></button>
    </div>
  </div>
</nav>
`;

const footerHTML = `
<footer style="
  background:linear-gradient(135deg,#1a3a4a 0%,#264653 100%);
  color:white;
  padding:1.4rem 0 0.8rem;
  margin-top:1.5rem;

  /* pleine largeur */
  width:100vw;
  margin-left:calc(-50vw + 50%);
">
  
  <div style="
    width:100%;
    padding:0 6rem;
    box-sizing:border-box;
  ">
    
    <div style="
      display:grid;
      grid-template-columns:repeat(4,1fr);
      gap:1rem;
      margin-bottom:1rem;
      align-items:start;
    ">
      
      <div>
        <h3 style="
          font-size:1.45rem;
          font-weight:bold;
          margin-bottom:0.5rem;
          color:#f4a261;
        ">
          StayEase
        </h3>

        <p style="
          color:#b8c5cc;
          font-size:0.8rem;
          line-height:1.4;
          margin-bottom:0.6rem;
        ">
          Votre plateforme de réservation d'hébergements en Tunisie.
        </p>

        <div style="display:flex;gap:0.5rem;">
          <a href="#" style="
            width:30px;
            height:30px;
            background:#3a5a6a;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            color:white;
            text-decoration:none;
          "><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg></a>

          <a href="#" style="
            width:30px;
            height:30px;
            background:#3a5a6a;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            color:white;
            text-decoration:none;
          "><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg></a>

          <a href="#" style="
            width:30px;
            height:30px;
            background:#3a5a6a;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            color:white;
            text-decoration:none;
          "><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a>
        </div>
      </div>

      <div>
        <h4 style="
          font-weight:bold;
          margin-bottom:0.5rem;
          color:#f4a261;
          font-size:0.9rem;
        ">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#f4a261" stroke-width="2" style="vertical-align:middle;margin-right:4px;"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          Hébergements
        </h4>

        <ul style="
          list-style:none;
          padding:0;
          margin:0;
          color:#b8c5cc;
          font-size:0.76rem;
          line-height:1.5;
        ">
          <li><a href="hotels.html" style="color:#b8c5cc;text-decoration:none;">Tunis</a></li>
          <li><a href="hotels.html" style="color:#b8c5cc;text-decoration:none;">Sousse</a></li>
          <li><a href="hotels.html" style="color:#b8c5cc;text-decoration:none;">Djerba</a></li>
          <li><a href="hotels.html" style="color:#b8c5cc;text-decoration:none;">Maisons d'hôtes</a></li>
        </ul>
      </div>

      <div>
        <h4 style="
          font-weight:bold;
          margin-bottom:0.5rem;
          color:#f4a261;
          font-size:0.9rem;
        ">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#f4a261" stroke-width="2" style="vertical-align:middle;margin-right:4px;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          Services
        </h4>

        <ul style="
          list-style:none;
          padding:0;
          margin:0;
          color:#b8c5cc;
          font-size:0.76rem;
          line-height:1.5;
        ">
          <li><a href="avis.html" style="color:#b8c5cc;text-decoration:none;">Avis</a></li>
          <li><a href="avis-personnel.html" style="color:#b8c5cc;text-decoration:none;">Réservations</a></li>
          <li><a href="#" style="color:#b8c5cc;text-decoration:none;">Guide</a></li>
          <li><a href="#" style="color:#b8c5cc;text-decoration:none;">Transfert</a></li>
        </ul>
      </div>

      <div>
        <h4 style="
          font-weight:bold;
          margin-bottom:0.5rem;
          color:#f4a261;
          font-size:0.9rem;
        ">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#f4a261" stroke-width="2" style="vertical-align:middle;margin-right:4px;"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
          Contact
        </h4>

        <ul style="
          list-style:none;
          padding:0;
          margin:0;
          color:#b8c5cc;
          font-size:0.76rem;
          line-height:1.6;
        ">
          <li><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align:middle;margin-right:4px;"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg> contact@stayease.tn</li>
          <li><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align:middle;margin-right:4px;"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg> +216 55 123 456</li>
          <li><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align:middle;margin-right:4px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg> Tunis</li>
        </ul>
      </div>

    </div>

    <div style="
      text-align:center;
      padding-top:0.6rem;
      border-top:1px solid rgba(244,162,97,0.25);
    ">
      <p style="
        color:#8a9aa6;
        font-size:0.72rem;
        margin:0;
      ">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#4ade80" stroke-width="2" style="vertical-align:middle;margin-right:3px;"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10" stroke="#4ade80"/></svg>
        Données sécurisées |
        © 2026 StayEase |
        <a href="#" style="color:#b8c5cc;">Mentions légales</a> |
        <a href="#" style="color:#b8c5cc;">Confidentialité</a>
      </p>
    </div>

  </div>
</footer>
`;
var currentLang = localStorage.getItem('lang') || 'FR';

setTimeout(function() {
  console.log('Setting navbar and footer after timeout');
  var navContainer = document.getElementById('navbar');
  if (navContainer) navContainer.innerHTML = navbarHTML;
  
  var footerContainer = document.getElementById('footer');
  console.log('footerContainer:', footerContainer);
  if (footerContainer) {
    console.log('Setting footer HTML');
    footerContainer.innerHTML = footerHTML;
  } else {
    console.log('Footer container NOT found');
  }
  
  updateUserDisplay();
}, 500);

function updateUserDisplay() {
  var userName = document.getElementById('user-name');
  var authBtn = document.getElementById('auth-btn');
  var navUpdate = document.getElementById('nav-update');
  var user = localStorage.getItem('user');
  
  if (!user) {
    if (userName) userName.style.display = 'none';
    if (authBtn) { authBtn.textContent = 'Connexion'; authBtn.onclick = function() { window.location.href = 'connexion.html'; }; }
    if (navUpdate) navUpdate.style.display = 'none';
    return;
  }
  
  try {
    var userData = JSON.parse(user);
    var name = ((userData.prenom || '') + ' ' + (userData.nom || '')).trim().toUpperCase();
    
    if (userName) {
      userName.textContent = name || userData.email || '';
      userName.style.display = name ? 'inline' : 'none';
    }
    if (authBtn) {
      authBtn.textContent = 'Déconnexion';
      authBtn.onclick = logout;
    }
    if (navUpdate && userData.role === 'proprietaire') {
      navUpdate.style.display = 'inline';
    }
  } catch(e) {
    if (userName) userName.style.display = 'none';
    if (authBtn) { authBtn.textContent = 'Connexion'; authBtn.onclick = function() { window.location.href = 'connexion.html'; }; }
    if (navUpdate) navUpdate.style.display = 'none';
  }
}

function handleAuth() {
  var user = localStorage.getItem('user');
  if (user) {
    logout();
  } else {
    window.location.href = 'connexion.html';
  }
}

function logout() {
  localStorage.removeItem('user');
  window.location.href = 'index.html';
}

