import './bootstrap';
import './theme.js';

// Inicializa o tema quando o documento estiver pronto
document.addEventListener('DOMContentLoaded', () => {
  // Aplica o tema salvo
  const savedTheme = localStorage.getItem('theme') || 'light';
  document.documentElement.classList.toggle('dark', savedTheme === 'dark');
});

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
