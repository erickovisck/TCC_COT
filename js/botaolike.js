
document.querySelectorAll('.like_button').forEach((button) => {
  button.addEventListener('click', () => {


      const messageId = button.parentNode.getAttribute('data-id');
      const cont_likeElement = button.parentNode.querySelector('.likes');
      let cont_like = parseInt(cont_likeElement.innerHTML);

      // Verifique se o usuário já deu "like"
      const hasLiked = button.classList.contains('liked');

      if (hasLiked) {
          // Remove o "like"
          cont_like--;
          button.classList.remove('liked');
      } else {
          // Adiciona o "like"
          cont_like++;
          button.classList.add('liked');
      }

      // Enviar cont_like para o PHP usando AJAX
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'comunidade.php');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = () => {
          if (xhr.status === 200) {
              // Atualize o valor de cont_like no elemento HTML após a confirmação do servidor
              cont_likeElement.innerHTML = cont_like;
          } else {
              // Lida com erros, se houverem
              console.error('Erro na solicitação AJAX');
          }
      };

      xhr.send(`id_mensagem=${messageId}&cont_like=${cont_like}`);
  });
});


