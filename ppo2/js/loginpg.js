const tabButtons = document.querySelectorAll('.tab-btn');
const pessoaForm = document.getElementById('pessoa-form');
const empresaForm = document.getElementById('empresa-form');

tabButtons.forEach(button => {
    button.addEventListener('click', () => {
        tabButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');
        if (button.dataset.target === 'pessoa-form') {
            pessoaForm.style.display = 'block';
            empresaForm.style.display = 'none';
        } else {
            pessoaForm.style.display = 'none';
            empresaForm.style.display = 'block';
        }
    });
});