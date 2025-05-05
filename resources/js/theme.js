// Verifica se há uma preferência de tema salva no localStorage
const savedTheme = localStorage.getItem('theme') || 'light';

// Aplica o tema salvo
document.documentElement.classList.toggle('dark', savedTheme === 'dark');

// Função para alternar o tema
function toggleTheme() {
  const isDark = document.documentElement.classList.toggle('dark');
  const newTheme = isDark ? 'dark' : 'light';
  localStorage.setItem('theme', newTheme);

  // Atualiza os ícones
  const sunIcon = document.getElementById('iconSun');
  const moonIcon = document.getElementById('iconMoon');
  if (sunIcon && moonIcon) {
    sunIcon.classList.toggle('hidden', isDark);
    moonIcon.classList.toggle('hidden', !isDark);
  }
}

// Exporta a função para uso global
window.toggleTheme = toggleTheme; 