document.querySelector('#media').addEventListener('change', function(event) {
    const mediaView = document.querySelector('.imagemview');
    const file = event.target.files[0];
    if (file) {
        const carregar = new FileReader();
        carregar.onload = function(e) {
            if (file.type.startsWith('image/')) {
                mediaView.innerHTML = `<img src="${e.target.result}" alt="Preview da Imagem" width="500vh" id='imagempreview'>`;
            } else if (file.type.startsWith('video/')) {
                mediaView.innerHTML = `<video controls width="500vh" id='videopreview'>
                                           <source src="${e.target.result}" type="${file.type}">
                                           Seu navegador não suporta a tag de vídeo.
                                       </video>`;
            }
        }
        carregar.readAsDataURL(file);
    }
});

const btnEnviar = document.querySelector("#btnEnviar");

btnEnviar.addEventListener('click', function(event) {
    event.preventDefault();
    const descricao = document.querySelector('#descricao').value;
    const media = document.querySelector('#media').value;

    if (media) {
        const formData = new FormData();
        formData.append('descricao', descricao);
        formData.append('media', media);

        $.ajax({
            url: 'php/upload.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(resp) {
                console.log("Resposta recebida do servidor:", resp); // Log para verificar a resposta
                try {
                    const jsonResponse = typeof resp === 'object' ? resp : JSON.parse(resp);
                    if (jsonResponse.status === 'success') {
                        alert('Imagem enviada com sucesso');
                    } else {
                        alert('Erro ao enviar imagem: ' + jsonResponse.message);
                    }
                } catch (e) {
                    console.error('Erro ao processar resposta JSON:', e);
                    alert('Erro ao processar resposta do servidor.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Erro ao enviar imagem:', error);
                alert('Erro ao enviar imagem. Verifique o console para mais detalhes.');
            }
        });
    } else {
        alert('Por favor, selecione uma imagem ou vídeo para enviar.');
    }
});