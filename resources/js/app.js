import './bootstrap';
import './theme.js';

// Função para alternar o tema
window.toggleTheme = function () {
  const html = document.documentElement;
  const isDark = html.classList.toggle('dark');
  localStorage.setItem('theme', isDark ? 'dark' : 'light');
  updateThemeIcon(isDark);
}

// Função para atualizar o ícone do tema
function updateThemeIcon(isDark) {
  const iconSun = document.getElementById('iconSun');
  const iconMoon = document.getElementById('iconMoon');

  if (isDark) {
    iconSun.classList.add('hidden');
    iconMoon.classList.remove('hidden');
  } else {
    iconSun.classList.remove('hidden');
    iconMoon.classList.add('hidden');
  }
}

// Inicializa o tema
document.addEventListener('DOMContentLoaded', () => {
  // Verifica o tema salvo
  const savedTheme = localStorage.getItem('theme');
  const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

  if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
    document.documentElement.classList.add('dark');
    updateThemeIcon(true);
  }

  // Adiciona o evento de clique ao botão de tema
  const themeToggle = document.getElementById('themeToggle');
  if (themeToggle) {
    themeToggle.addEventListener('click', window.toggleTheme);
  }
});

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
