
document.addEventListener("DOMContentLoaded", function () {
    const cep = localStorage.getItem('cep');
    console.log('CEP:', cep);
    if (cep) {
        geocodeCEP(cep);
    } else {
        console.log('CEP não encontrado no localStorage.');
    }
});

function geocodeCEP(cep) {
    const apiKey = 'a330c43a2712484196901d58f5fb2044';
    const url = `https://api.opencagedata.com/geocode/v1/json?q=${cep}&key=${apiKey}&countrycode=br`;

    console.log('Solicitando URL:', url);

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Resposta da API OpenCage:', data);
            if (data.results && data.results.length > 0) {
                const location = data.results[0].geometry;
                console.log('Coordenadas:', location);
                const lat = location.lat;
                const lon = location.lng;

                document.getElementById('map').innerHTML = `
                            <iframe class="mapa_mapeamento" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7311.792049240626!2d${lon}!3d${lat}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1716063091242!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>`;
            } else {
                document.getElementById('map').innerHTML = `<p>Não foi possível obter as coordenadas para o CEP informado.</p>`;
            }
        })
        .catch(error => {
            console.error('Erro ao obter as coordenadas:', error);
            console.log('Detalhes do Erro:', error.message);
            document.getElementById('map').innerHTML = `<p>Ocorreu um erro ao obter as coordenadas: ${error.message}</p>`;
        });
}
