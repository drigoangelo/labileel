var campos = [
    document.querySelector('#nome'),
document.querySelector('#cidade'),
document.querySelector('#senha')
];

console.log(campos);

document.querySelector('.form').addEventListener('submit',function (event) {
    alert('Cadastro feito com sucesso');
});