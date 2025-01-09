const cancelButton = document.querySelector('#cancel-article');
const formContainer = document.querySelector('#addArticleContainer');
const openForm = document.querySelector('#open-add-article');
const form = document.querySelector('#addArticleForm');

cancelButton.addEventListener('click', function() {
    formContainer.style.display = 'none';
    form.reset();
});

openForm.addEventListener('click', function() {
    formContainer.style.display = 'flex';
});


//================================================================================================


const optionAuthorStatistics = document.querySelector('#author-statistics');
const optionAuthorProfile = document.querySelector('#author-profile');
const optionAuthorArticles = document.querySelector('#author-articles');

const manageAuthorStatistics = document.querySelector('#auth-stat');
const manageAuthorArticles = document.querySelector('#auth-art');
const viewAllArticles = document.querySelector('#view-all-articles');
const manageProfile = document.querySelector('#auth-profile');


optionAuthorStatistics.addEventListener('click', function() {
    optionAuthorStatistics.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAuthorProfile.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAuthorArticles.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAuthorStatistics.style.display = 'block';
    manageAuthorArticles.style.display = 'none';
    manageProfile.style.display = 'none';
});

optionAuthorProfile.addEventListener('click', function() {
    optionAuthorProfile.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAuthorStatistics.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAuthorArticles.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAuthorStatistics.style.display = 'none';
    manageAuthorArticles.style.display = 'none';
    manageProfile.style.display = 'flex';
});

optionAuthorArticles.addEventListener('click', function() {
    optionAuthorArticles.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAuthorStatistics.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAuthorProfile.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAuthorStatistics.style.display = 'none';
    manageAuthorArticles.style.display = 'grid';
    manageProfile.style.display = 'none';
});

viewAllArticles.addEventListener('click', function() {
    optionAuthorArticles.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAuthorStatistics.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAuthorProfile.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAuthorStatistics.style.display = 'none';
    manageAuthorArticles.style.display = 'grid';
    manageProfile.style.display = 'none';
});