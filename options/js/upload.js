const btnEnviar = document.querySelector("#btnEnviar");

btnEnviar.addEventListener('click', function(event) {
    event.preventDefault();
    const descricao = document.querySelector('#description_problemas').value;
    const media = document.querySelector('#fileInput_problemas').files[0];
    const titulo = document.querySelector('#title_problema').value


    if (media) {
        const formData = new FormData();
        formData.append('descricao', descricao);
        formData.append('media', media);
        formData.append('titulo', titulo);

        $.ajax({
            url: 'php/upload.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(resp) {
                console.log("Resposta recebida do servidor:", resp);
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