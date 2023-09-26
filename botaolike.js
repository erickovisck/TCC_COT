document.querySelector('.like-button').addEventListener('click', () => {
    // Obtenha o ID da mensagem que está sendo curtida
    const messageId = document.querySelector('.message').getAttribute('data-id');
    // Crie um objeto de solicitação para enviar ao servidor
    const request = new XMLHttpRequest();
    request.open('POST', 'like.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`message_id=${messageId}`);
    // Quando a solicitação for concluída, atualize a contagem de curtidas
    request.onload = () => {
      if (request.status === 200) {
        const likesCount = document.querySelector('.likes');
        likesCount.innerHTML = parseInt(likesCount.innerHTML) + 1;
      }
    };
  });