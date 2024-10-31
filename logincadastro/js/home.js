const espaco = document.getElementById('espaco');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
  espaco.classList.add("active");
});
loginBtn.addEventListener('click', () => {
  espaco.classList.remove("active");
});

// const recuperar_senha = document.getElementById('senha');
// const recuperar_usuario = document.getElementById('usuario');

// recuperar_senha.addEventListener('click', () => {
//   espaco.classList.add("senha");
// });
// recuperar_usuario.addEventListener('click', () => {
//   espaco.classList.add("usuario");
// });

const tipo_telefoneBtn = document.getElementById('tell_espaco');
const comunidadeBtn = document.getElementById('comunidade');
const condominioBtn = document.getElementById('condominio');
const comunidadeBtn2 = document.getElementById('comunidade2');
const condominioBtn2 = document.getElementById('condominio2');

comunidadeBtn.addEventListener('click', () => {
  tipo_telefoneBtn.classList.add("pronto_comunidade");
  tipo_telefoneBtn.classList.remove("pronto_condominio");
});
condominioBtn.addEventListener('click', () => {
  tipo_telefoneBtn.classList.add("pronto_condominio");
  tipo_telefoneBtn.classList.remove("pronto_comunidade");
});

comunidadeBtn2.addEventListener('click', () => {
  tipo_telefoneBtn.classList.add("pronto_comunidade");
  tipo_telefoneBtn.classList.remove("pronto_condominio");
});
condominioBtn2.addEventListener('click', () => {
  tipo_telefoneBtn.classList.add("pronto_condominio");
  tipo_telefoneBtn.classList.remove("pronto_comunidade");
});

const icones = document.getElementById('icones');
const icon1Btn = document.getElementById('icon1');
const icon2Btn = document.getElementById('icon2');
const icon3Btn = document.getElementById('icon3');

icon1Btn.addEventListener('click', () => {
  icones.classList.add("pronto_icon1");
  icones.classList.remove("pronto_icon2");
  icones.classList.remove("pronto_icon3");
});
icon2Btn.addEventListener('click', () => {
  icones.classList.remove("pronto_icon1");
  icones.classList.add("pronto_icon2");
  icones.classList.remove("pronto_icon3");
});
icon3Btn.addEventListener('click', () => {
  icones.classList.remove("pronto_icon1");
  icones.classList.remove("pronto_icon2");
  icones.classList.add("pronto_icon3");
});
 
const mobile_login = document.getElementById('mobile_login');
const mobile_cadastro = document.getElementById('mobile_cadastro');

mobile_login.addEventListener('click', () => {
  espaco.classList.add("mobile");
});
mobile_login.addEventListener('click', () => {
  icones.classList.remove("pronto_icon1");
  icones.classList.remove("pronto_icon2");
  icones.classList.remove("pronto_icon3");
});

mobile_cadastro.addEventListener('click', () => {
  espaco.classList.remove("mobile");
});
mobile_cadastro.addEventListener('click', () => {
  tipo_telefoneBtn.classList.remove("pronto_condominio");
  tipo_telefoneBtn.classList.remove("pronto_comunidade");
});

document.getElementById('informecpf').addEventListener
  ('input', function (e) {
    var value = e.target.value;
    var cpfPattern = /^(\d{3})(\d{3})(\d{3})(\d{2})$/;
    if (cpfPattern.test(value)) {
      e.target.value = value.replace(cpfPattern, '$1.$2.$3-$4');
    }
  });
document.getElementById('tel').addEventListener
  ('input', function (e) {
    var value = e.target.value;
    var cpfPattern = /^(\d{2})(\d{5})(\d{4})$/;
    if (cpfPattern.test(value)) {
      e.target.value = value.replace(cpfPattern, '$1 $2-$3');
    }
  }); 
  // document.getElementById('informevalor').addEventListener
  // ('input', function (e) {
  //   var value = e.target.value;
  //   var cpfPattern = /^(\d{3})(\d{3})(\d{2})$/;
  //   if (cpfPattern.test(value)) {
  //     e.target.value = value.replace(cpfPattern, '$1.$2,$3');
  //   }
  // }); 