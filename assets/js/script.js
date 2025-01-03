const cancelButton = document.querySelector('button[name="cancel-article"]');
const formContainer = document.querySelector('.fixed');
const openForm = document.querySelector('#open-add-article');

cancelButton.addEventListener('click', () => {
    formContainer.style.display = 'none';
});

openForm.addEventListener('click', () => {
    formContainer.style.display = 'flex';
});