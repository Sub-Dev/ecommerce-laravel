// Função para adicionar produto ao carrinho
window.addToCart = function (productId) {
  console.log('Tentando adicionar produto:', productId);
  console.log('Estado de autenticação:', window.isAuthenticated);

  // Verifica se o usuário está autenticado
  if (!window.isAuthenticated) {
    console.log('Usuário não autenticado');
    window.showLoginModal();
    return;
  }

  // Faz a requisição para adicionar ao carrinho
  fetch(`/cart/add/${productId}`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    }
  })
    .then(response => response.json())
    .then(data => {
      console.log('Resposta do servidor:', data);
      if (data.success) {
        window.showNotification('Produto adicionado ao carrinho!', 'success');
        window.updateCartCount(data.cartCount);
      } else {
        window.showNotification('Erro ao adicionar produto ao carrinho', 'error');
      }
    })
    .catch(error => {
      console.error('Erro:', error);
      window.showNotification('Erro ao adicionar produto ao carrinho', 'error');
    });
}

// Função para mostrar o modal de login
window.showLoginModal = function () {
  console.log('Mostrando modal de login');
  const modal = document.getElementById('loginModal');
  modal.classList.remove('hidden');
}

// Função para fechar o modal
window.closeLoginModal = function () {
  console.log('Fechando modal de login');
  const modal = document.getElementById('loginModal');
  modal.classList.add('hidden');
}

// Função para mostrar notificações
window.showNotification = function (message, type = 'success') {
  console.log('Mostrando notificação:', message, type);
  const notification = document.createElement('div');
  notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg ${type === 'success' ? 'bg-green-500' : 'bg-red-500'} text-white`;
  notification.textContent = message;

  document.body.appendChild(notification);

  setTimeout(() => {
    notification.remove();
  }, 3000);
}

// Função para atualizar o contador do carrinho
window.updateCartCount = function (count) {
  console.log('Atualizando contador do carrinho:', count);
  const cartCount = document.getElementById('cartCount');
  if (cartCount) {
    cartCount.textContent = count;
  }
}

// Log quando o arquivo é carregado
console.log('Arquivo cart.js carregado'); 