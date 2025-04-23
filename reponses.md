
# 📘 Questions sur les Sessions Web & le Pattern MVC

---

## 1. Schéma du pattern MVC

```svg
<svg width="600" height="300" xmlns="http://www.w3.org/2000/svg">
  <rect x="50" y="100" width="100" height="60" fill="#87CEEB" stroke="#000" />
  <text x="100" y="135" text-anchor="middle" font-size="14" fill="#000">View</text>

  <rect x="250" y="30" width="100" height="60" fill="#90EE90" stroke="#000" />
  <text x="300" y="65" text-anchor="middle" font-size="14" fill="#000">Controller</text>

  <rect x="450" y="100" width="100" height="60" fill="#FFD700" stroke="#000" />
  <text x="500" y="135" text-anchor="middle" font-size="14" fill="#000">Model</text>

  <line x1="150" y1="130" x2="250" y2="60" stroke="#000" marker-end="url(#arrow)" />
  <line x1="350" y1="60" x2="450" y2="130" stroke="#000" marker-end="url(#arrow)" />
  <line x1="500" y1="100" x2="100" y2="100" stroke="#000" marker-end="url(#arrow)" />

  <defs>
    <marker id="arrow" markerWidth="10" markerHeight="10" refX="6" refY="3" orient="auto">
      <path d="M0,0 L0,6 L9,3 z" fill="#000" />
    </marker>
  </defs>
</svg>
```

---

## 2. Qu’est-ce qu’une session dans le cadre des applications web ?

Une **session web** est un mécanisme permettant de conserver l'état d’un utilisateur entre différentes requêtes HTTP, qui sont normalement sans état.

- Lorsqu’un utilisateur se connecte, le serveur crée une **session** et associe un identifiant unique (**session ID**).
- Ce session ID est souvent stocké dans un **cookie** et transmis à chaque requête.
- Cela permet de maintenir des informations comme l’authentification, le panier d’achat, etc.

---

## 3. Attaques liées aux sessions

### ▶ Session Hijacking (détournement de session)

L’attaquant intercepte ou devine un **identifiant de session valide** pour accéder aux données d’un utilisateur légitime.

```svg
<svg width="700" height="200" xmlns="http://www.w3.org/2000/svg">
  <circle cx="100" cy="100" r="30" fill="#87CEEB" stroke="#000"/>
  <text x="100" y="105" text-anchor="middle" font-size="12">Utilisateur</text>

  <circle cx="350" cy="100" r="30" fill="#90EE90" stroke="#000"/>
  <text x="350" y="105" text-anchor="middle" font-size="12">Serveur</text>

  <circle cx="600" cy="100" r="30" fill="#FF6347" stroke="#000"/>
  <text x="600" y="105" text-anchor="middle" font-size="12">Attaquant</text>

  <line x1="130" y1="100" x2="320" y2="100" stroke="#000" marker-end="url(#arrow)" />
  <line x1="580" y1="70" x2="370" y2="70" stroke="red" marker-end="url(#arrow)" />
  <text x="470" y="60" font-size="12" fill="red">Session ID volé</text>

  <defs>
    <marker id="arrow" markerWidth="10" markerHeight="10" refX="6" refY="3" orient="auto">
      <path d="M0,0 L0,6 L9,3 z" fill="#000" />
    </marker>
  </defs>
</svg>
```

**Protection :**
- Utiliser HTTPS
- Régénérer l’ID de session après login
- Limiter la durée de vie des sessions
- Vérification d’IP / user-agent

---

### ▶ Session Fixation

L’attaquant **force une session prédéfinie** sur la victime. Une fois celle-ci connectée, l’attaquant utilise cette session pour accéder à ses données.

```svg
<svg width="700" height="200" xmlns="http://www.w3.org/2000/svg">
  <circle cx="100" cy="100" r="30" fill="#FF6347" stroke="#000"/>
  <text x="100" y="105" text-anchor="middle" font-size="12">Attaquant</text>

  <circle cx="350" cy="100" r="30" fill="#87CEEB" stroke="#000"/>
  <text x="350" y="105" text-anchor="middle" font-size="12">Victime</text>

  <circle cx="600" cy="100" r="30" fill="#90EE90" stroke="#000"/>
  <text x="600" y="105" text-anchor="middle" font-size="12">Serveur</text>

  <line x1="130" y1="100" x2="320" y2="100" stroke="red" marker-end="url(#arrow)" />
  <text x="200" y="90" font-size="12" fill="red">Session ID imposé</text>

  <line x1="380" y1="100" x2="570" y2="100" stroke="#000" marker-end="url(#arrow)" />

  <defs>
    <marker id="arrow" markerWidth="10" markerHeight="10" refX="6" refY="3" orient="auto">
      <path d="M0,0 L0,6 L9,3 z" fill="#000" />
    </marker>
  </defs>
</svg>
```

**Protection :**
- Ne jamais accepter de session ID dans l’URL
- Toujours régénérer l’ID de session après authentification
- Utiliser les cookies `Secure` et `HttpOnly`

---
