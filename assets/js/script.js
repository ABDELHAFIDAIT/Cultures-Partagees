const cancelButton = document.querySelector('#cancel-article');
const formContainer = document.querySelector('.fixed');
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


//my-articles
//author-statistics
//author-profile

// active : bg-purple-700 border-r-4 border-white
// non active : 


const optionAuthorStatistics = document.querySelector('#author-statistics');
const optionAuthorProfile = document.querySelector('#author-profile');
const optionAuthorArticles = document.querySelector('#author-articles');


// auth-stat
// auth-art

const manageAuthorStatistics = document.querySelector('#auth-stat');
const manageAuthorArticles = document.querySelector('#auth-art');
const viewAllArticles = document.querySelector('#view-all-articles');


optionAuthorStatistics.addEventListener('click', function() {
    optionAuthorStatistics.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAuthorProfile.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAuthorArticles.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAuthorStatistics.style.display = 'block';
    manageAuthorArticles.style.display = 'none';
});

optionAuthorProfile.addEventListener('click', function() {
    optionAuthorProfile.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAuthorStatistics.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAuthorArticles.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAuthorStatistics.style.display = 'none';
    manageAuthorArticles.style.display = 'none';
});

optionAuthorArticles.addEventListener('click', function() {
    optionAuthorArticles.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAuthorStatistics.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAuthorProfile.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAuthorStatistics.style.display = 'none';
    manageAuthorArticles.style.display = 'grid';
});

viewAllArticles.addEventListener('click', function() {
    optionAuthorArticles.classList.add('bg-purple-700', 'border-r-4', 'border-white');
    optionAuthorStatistics.classList.remove('bg-purple-700', 'border-r-4', 'border-white');
    optionAuthorProfile.classList.remove('bg-purple-700', 'border-r-4', 'border-white');

    manageAuthorStatistics.style.display = 'none';
    manageAuthorArticles.style.display = 'grid';
});